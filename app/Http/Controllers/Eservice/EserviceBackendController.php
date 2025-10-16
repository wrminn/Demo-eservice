<?php

namespace App\Http\Controllers\Eservice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

class EserviceBackendController extends Controller
{

    public function SelectNameUser()
    {
        $NameUser = DB::table('users')
            ->pluck('user_name', 'user_id')
            ->toArray();

        return $NameUser;
    }

    function listeservice($menuId)
    {

        $list = DB::table('gennerricforms')->paginate(20);


        foreach ($list as $item) {
            $tableName = $item->gennerricforms_name_table;

            if (Schema::hasTable($tableName)) {
                $count = DB::table($tableName)
                    ->where('form_status', 'P')
                    ->count();

                $item->form_count = $count; // เก็บค่า count ไว้ใน list
            } else {
                $item->form_count = 0;
            }
        }

        $startIndex = ($list->currentPage() - 1) * $list->perPage() + 1;

        return view('backend.eservice.list', compact('title', 'list', 'menuId', 'startIndex'));
    }

    function listeserviceOne($id)
    {

        $user = Auth::user();

        $form = DB::table('gennerricforms')
            ->where('gennerricforms_position_id', $user->user_position)
            ->where('gennerricforms_display', 'A')->get();

        $tableName = 'table_form_' . $id;
        $list = DB::table($tableName)->paginate(20);

        $tableUpload = 'table_form_file_' . $id;
        $list->getCollection()->transform(function ($item) use ($tableUpload) {

            $item->file = DB::table($tableUpload)
                ->where('form_id', $item->form_id)
                ->select('form_path', 'form_type')
                ->get()
                ->toArray();
            return $item;
        });

        $messages = DB::table('reply_message')
            ->where('reply_form_id', $id)
            ->orderBy('reply_id')
            ->get();

        $startIndex = ($list->currentPage() - 1) * $list->perPage() + 1;

        $NameUser = $this->SelectNameUser();

        // echo "<pre>";
        // print_r($list);
        // exit();

        return view('eservice.backend.listformone', compact('list', 'id', 'startIndex', 'form', 'messages', 'NameUser'));
    }

    public function reply(Request $request)
    {

        // $request->validate([
        //     'form_id' => 'required|integer',
        //     'reply_message' => 'required|string',
        // ]);

        // $tableName = 'table_form_' . $request->form_id;

        // $data_texteditor_upload = [

        //     'reply_form_id' => $request->form_id,
        //     'reply_detail' => $request->reply_message,
        //     'reply_user_position' => 'A'
        // ];
        // DB::table('reply_message')->insert($data_texteditor_upload);

        // DB::table($tableName)->where('form_id', $request->form_id)
        //     ->update([
        //         'form_status' => 'N'
        //     ]);

        $request->validate([
            'form_id' => 'required|integer',
            'reply_message' => 'required|string',
            'form' => 'required|string',
        ]);

        $tableName = 'table_form_' . $request->form;

        if (!Schema::hasTable($tableName)) {
            return response()->json(['error' => 'Invalid form table.'], 400);
        }

        DB::table('reply_message')->insert([
            'reply_form_id' => $request->form_id,
            'reply_detail' => $request->reply_message,
            'reply_user_position' => 'A',
            'reply_date_insert' => now(),
        ]);

        DB::table($tableName)
            ->where('form_id', $request->form_id)
            ->update(['form_status' => 'N']);

        // return redirect()->back()->with('success', 'ตอบกลับเรียบร้อยแล้ว');
        return response()->json(['success' => true]);
    }

    public function replyNoUser(Request $request)
    {

        $request->validate([
            'form_id' => 'required|integer',
            'reply_message' => 'required|string',
        ]);
        $tableName = 'table_form_' . $request->form_table;

        $user = Auth::user();

        if ($user && $user->user_id) {
            $User = $user->user_id;
        }

        DB::table($tableName)->where('form_id', $request->form_id)
            ->update([
                'form_note' => $request->reply_message,
                'form_status' => 'C',
                'form_user_update' => $User,
            ]);

        return redirect()->back()->with('success', 'ตอบกลับเรียบร้อยแล้ว');
    }

    public function chatMessages($formId)
    {
        $messages = DB::table('reply_message')
            ->where('reply_form_id', $formId)
            ->orderBy('reply_id')
            ->get();

        return view('eservice.backend.chat_messages', compact('messages'));
    }

    public function replyUser(Request $request)
    {

        $request->validate([
            'form_id' => 'required|integer',
            'reply_message' => 'required|string',
            'form' => 'required|string',
        ]);

        $tableName = 'table_form_' . $request->form;

        if (!Schema::hasTable($tableName)) {
            return response()->json(['error' => 'Invalid form table.'], 400);
        }

        DB::table('reply_message')->insert([
            'reply_form_id' => $request->form_id,
            'reply_detail' => $request->reply_message,
            'reply_user_position' => 'U',
            'reply_date_insert' => now(),
        ]);

        DB::table($tableName)
            ->where('form_id', $request->form_id)
            ->update(['form_status' => 'N']);

        return response()->json(['success' => true]);
    }

    public function chatMessagesUser($formId)
    {
        $messages = DB::table('reply_message')
            ->where('reply_form_id', $formId)
            ->orderBy('reply_id')
            ->get();

        return view('eservice.data.user.chat_messages', compact('messages'));
    }
}
