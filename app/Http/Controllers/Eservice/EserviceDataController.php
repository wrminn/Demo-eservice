<?php

namespace App\Http\Controllers\Eservice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class EserviceDataController extends Controller
{
    public function SelectDate()
    {
        $timestamp = time();
        $thai_months = [
            1 => "มกราคม",
            2 => "กุมภาพันธ์",
            3 => "มีนาคม",
            4 => "เมษายน",
            5 => "พฤษภาคม",
            6 => "มิถุนายน",
            7 => "กรกฎาคม",
            8 => "สิงหาคม",
            9 => "กันยายน",
            10 => "ตุลาคม",
            11 => "พฤศจิกายน",
            12 => "ธันวาคม"
        ];
        $day = date('j', $timestamp);
        $month = date('n', $timestamp);
        $year = date('Y', $timestamp) + 543;

        $thai_date = $day . " " . $thai_months[$month] . " " . $year;
        return $thai_date;
    }

    public function SelectNameUser()
    {
        $NameUser = DB::table('users')
            ->pluck('user_name', 'user_id')
            ->toArray();

        return $NameUser;
    }

    function SelectForm()
    {
        return view('eservice.data.form');
    }

    function SelectFormUser()
    {
        $user = Auth::user();

        $userId = $user?->user_id;
        if (!$userId) {
            abort(403, 'ไม่พบข้อมูลผู้ใช้');
        }

        $forms = DB::table('gennerricforms')
            ->where('gennerricforms_display', 'A')
            ->select('gennerricforms_id', 'gennerricforms_name', 'gennerricforms_name_table')
            ->get();

        $unionSql = [];

        foreach ($forms as $form) {
            $tableForm = $form->gennerricforms_name_table;
            $tableUpload = 'table_form_file_' . $form->gennerricforms_id;

            if (!Schema::hasTable($tableForm)) continue;

            $sql = "
                    SELECT 
                        '$form->gennerricforms_id' AS gennerricforms_id,
                        '$form->gennerricforms_name' AS form_name,
                        '$tableForm' AS form_table,
                        f.*,
                        u.form_path,
                        u.form_type
                    FROM $tableForm AS f
                    LEFT JOIN $tableUpload AS u ON f.form_id = u.form_id
                    WHERE f.form_user_id = ?
                ";
            $unionSql[] = $sql;
        }

        if (count($unionSql) > 0) {
            $finalSql = implode(" UNION ALL ", $unionSql);
            $list = DB::select($finalSql, array_fill(0, count($unionSql), $userId));
        } else {
            $list = [];
        }

        $grouped = collect($list)
            ->groupBy('form_id')
            ->map(function ($items) {
                $first = $items->first();
                $first->file = $items->map(function ($i) {
                    return [
                        'form_path' => $i->form_path,
                        'form_type' => $i->form_type,
                    ];
                })->filter(fn($f) => $f['form_path'])->values();
                unset($first->form_path, $first->form_type);
                return $first;
            })->values();

        // echo "<pre>";
        // print_r($list);
        // exit();

        $formIds = collect($grouped)->pluck('form_id')->unique()->toArray();

        $messages = DB::table('reply_message')
            ->whereIn('reply_form_id', $formIds)
            ->orderBy('reply_id')
            ->get();

        $NameUser = $this->SelectNameUser();

        return view('eservice.data.user.history', [
            'list' => collect($grouped),
            'messages' => $messages,
            'NameUser' => $NameUser,
        ]);
    }

    function ShowForm($id)
    {

        $Date = $this->SelectDate();

        $list = DB::table('gennerricforms')
            ->where('gennerricforms_id', $id)
            ->first();

        $FilePosition = $list->gennerricforms_position_id;

        $form_page = 'eservice.data.formeservice.' . $FilePosition . '.table_' . $id;

        return view($form_page, compact('id', 'Date'));
    }

    function SaveForm(Request $request, $id)
    {

        $data = [];


        foreach ($request->all() as $key => $value) {
            if (preg_match('/^field_(\d+)$/', $key, $matches)) {
                $num = (int) $matches[1];
                if ($num >= 1 && $num <= 50) {
                    if (is_array($value)) {
                        if (!empty($value)) {
                            $data[$key] = 'C';
                        }
                    } else {
                        if (!empty($value)) {
                            $data[$key] = $value;
                        }
                    }
                }
            } elseif ($key === 'field_date') {
                $data[$key] = $value;
            }
        }

        $user = Auth::user();


        if ($user && $user->user_id) {
            $data['form_user_id'] = $user->user_id;
        }

        $table_name = "table_form_" . $id;
        $id_inserted = DB::table($table_name)->insertGetId($data);

        if ($request->hasFile('files')) {

            foreach ($request->file('files') as $key => $file) {

                $ext = $file->getClientOriginalExtension();
                $timestamp = now()->format('Ymd_His');
                $seq = $key + 1;

                $folder = "content/{$table_name}";
                $filename = "{$id}_formeservice_{$seq}_{$timestamp}.{$ext}";
                $path = $file->storeAs($folder, $filename, 'public');

                $fullPath = storage_path('app/public/' . $path);
                if (file_exists($fullPath)) {
                    chmod($fullPath, 0644);
                }

                $publicStoragePath = public_path('storage/' . $path);
                if (!file_exists(dirname($publicStoragePath))) {
                    mkdir(dirname($publicStoragePath), 0775, true);
                }
                copy($fullPath, $publicStoragePath);
                chmod($publicStoragePath, 0644);

                $data_texteditor_upload = [
                    'form_id' => $id_inserted,
                    'form_path' => $path,
                ];
                $table_name = "table_form_file_" . $id;
                DB::table($table_name)->insert($data_texteditor_upload);
            }
        }

        return redirect('/FormeService/id/' . $id)->with('success', 'ส่งแบบฟอร์มสำเร็จ');
    }

    function uploadFile(Request $request)
    {

        $user = Auth::user();

        if ($user && $user->user_id) {
            $data['form_user_id'] = $user->user_id;
        }

        $table_name = "table_form_" . $request->generic_id;
        DB::table($table_name)
            ->where('form_id', $request->form_id)
            ->update(['form_status' => 'M']);

        if ($request->hasFile('file')) {

            foreach ($request->file('file') as $key => $file) {

                $ext = $file->getClientOriginalExtension();
                $timestamp = now()->format('Ymd_His');
                $seq = $key + 1;

                $folder = "content/{$table_name}";
                $filename = "{$request->generic_id}_formeservice_{$seq}_{$timestamp}.{$ext}";
                $path = $file->storeAs($folder, $filename, 'public');

                $fullPath = storage_path('app/public/' . $path);
                if (file_exists($fullPath)) {
                    chmod($fullPath, 0644);
                }

                $publicStoragePath = public_path('storage/' . $path);
                if (!file_exists(dirname($publicStoragePath))) {
                    mkdir(dirname($publicStoragePath), 0775, true);
                }
                copy($fullPath, $publicStoragePath);
                chmod($publicStoragePath, 0644);

                $data_texteditor_upload = [
                    'form_id' => $request->form_id,
                    'form_path' => $path,
                    'form_type' => 'N',
                ];
                $table_name = "table_form_file_" . $request->generic_id;
                DB::table($table_name)->insert($data_texteditor_upload);
            }
        }

        return redirect('/FormSubmissionHistory')->with('success', 'ส่งแบบฟอร์มสำเร็จ');
    }

    public function GeneralRequestsExportPDF($id)
    {
        $list = DB::table('table_form_1')
            ->where('form_id', $id)
            ->first();

        $pdf = Pdf::loadView('eservice.data.formeservice.' . $id . '.pdf.table_1', compact('list'))->setPaper('A4', 'portrait');
        // $pdf = Pdf::loadView('eservice.data.formeservice.1.pdf.table_1_test', compact('list'))->setPaper('A4', 'portrait');

        return $pdf->stream('แบบคำขอร้องทั่วไป' . $id . '.pdf');
    }
}
