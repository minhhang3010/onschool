<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Ses

class AdminTableController extends Controller
{
    public function index(){
        return view('adminTable');
    }
    public function show_all(){
        $all_users = DB::table('create_users_table')->get();
        $display_all_users = view('adminTable')->with('all_users', $all_users);
    }
}
