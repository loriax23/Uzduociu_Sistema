<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function completeTaskAction(Request $request, $id)
    {
        $assignedTo = DB::table('tasks')->select('assigned_to')->where('id', $id)->get();

        $userName = $request->user()->name;

        if ($assignedTo->isEmpty()) {
            return view('pages.unauthorized');
        } else {

            if ($userName == $assignedTo[0]->assigned_to) {

                $completedTask = DB::table('tasks')->where('id', $id)->update([
                    'task_status' => 1
                ]);

                return redirect()->back();
            } else {
                return view('pages.unauthorized');
            }
        }
    }
}
