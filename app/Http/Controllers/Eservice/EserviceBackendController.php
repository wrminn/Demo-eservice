<?php

namespace App\Http\Controllers\Eservice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

class EserviceBackendController extends Controller
{
    function listeservice($menuId)
    {

        $list = DB::table('gennerricforms')->paginate(20);


        foreach ($list as $item) {
            $tableName = $item->gennerricforms_name_table;

            if (Schema::hasTable($tableName)) {
                $count = DB::table($tableName)
                    ->where('form_status', 'N')
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
                ->pluck('form_path')
                ->toArray();
            return $item;
        });


        $startIndex = ($list->currentPage() - 1) * $list->perPage() + 1;

        return view('eservice.backend.listformone', compact('list', 'id', 'startIndex', 'form'));
    }

    public function reply(Request $request)
    {

        $request->validate([
            'form_id' => 'required|integer',
            'reply_message' => 'required|string',
        ]);
        $tableName = 'table_form_' . $request->form_id;

        DB::table($tableName)->where('form_id', $request->form_id)
            ->update([
                'form_note' => $request->reply_message,
                'form_status' => 'R'
            ]);

        return redirect()->back()->with('success', 'ตอบกลับเรียบร้อยแล้ว');
    }
}
