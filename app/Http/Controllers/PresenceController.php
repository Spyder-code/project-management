<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;

class PresenceController extends AppBaseController
{
    public function index(Request $request)
    {
        $time_entries = DB::table('time_entries')
            ->join('users', 'users.id', '=', 'time_entries.user_id')
            ->select('users.name as namaUser', 'time_entries.id' , 'time_entries.time_start', 'time_entries.time_end')

            ->get();

        return view('presence.index')
            ->with('time_entries', $time_entries);
    }
}

