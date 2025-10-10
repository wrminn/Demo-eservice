<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class DashboardController extends Controller
{
    function backend()
    {
        $user = Auth::user();
        $user->user_name;
        $user->user_email;
        $user->user_permission;
        $user->user_position;


        $Position = '';
        $FormList = '';
        if ($user->user_permission != 0) {
            $Position = DB::table('positions')
                ->where('positions_id', $user->user_position)
                ->first();

            $FormList = DB::table('gennerricforms')
                ->where('gennerricforms_position_id', $user->user_position)
                ->where('gennerricforms_display', 'A')
                ->paginate(10);
        } else {
            $FormList = DB::table('gennerricforms')
                ->where('gennerricforms_display', 'A')
                ->paginate(10);
        }

        foreach ($FormList as $item) {
            $tableName = $item->gennerricforms_name_table;

            if (Schema::hasTable($tableName)) {
                $count = DB::table($tableName)
                    ->where('form_status', 'N')
                    ->count();

                $item->form_count = $count;
            } else {
                $item->form_count = 0;
            }
        }


        return view('backend.dashboard', compact('user', 'Position', 'FormList'));
    }
}
