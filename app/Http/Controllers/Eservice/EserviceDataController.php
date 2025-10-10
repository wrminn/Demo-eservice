<?php

namespace App\Http\Controllers\Eservice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

    function SelectForm()
    {
        return view('eservice.data.form');
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

   public function GeneralRequestsExportPDF($id)
    {
        $list = DB::table('table_form_1')
            ->where('form_id', $id)
            ->first();
       
        $pdf = Pdf::loadView('eservice.data.formeservice.'.$id.'.pdf.table_1_test', compact('list'))->setPaper('A4', 'portrait');
        // $pdf = Pdf::loadView('eservice.data.formeservice.1.pdf.table_1_test', compact('list'))->setPaper('A4', 'portrait');

        return $pdf->stream('แบบคำขอร้องทั่วไป' . $id . '.pdf');
    }
}
