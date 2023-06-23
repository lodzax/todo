<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Todo;

class DashController extends Controller
{
    public function tasksCount()
    {
        $tasks = DB::table('todos')->where('id', '<>', 0 )->count();

        return view('dashboard', compact('tasks'));
    }
}
