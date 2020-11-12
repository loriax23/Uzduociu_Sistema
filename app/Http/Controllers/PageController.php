<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function showIndexPage(Request $request)
    {
        if(Auth::check()) {

            $user = $request->user();

            if ($request->user()->user_type == 1) {

                return view('pages.admin.index')->with('user', $user);
            } else {

                return view('pages.user.index')->with('user', $user);
            }
        } else {
            return view('pages.public-index');
        }
    }

    public function showCreateTaskPage()
    {
        return view('pages.admin.create-task');
    }

    public function showAllTasksPage()
    {
        $allTasks = DB::table('tasks')->paginate(14, '*', 'puslapis');

        return view('pages.admin.all-tasks')->with('allTasks', $allTasks);
    }

    public function showEditTaskPage($id)
    {
        $chosenTask = DB::table('tasks')->where('id', $id)->get();

        return view('pages.admin.edit-task')->with('chosenTask', $chosenTask);
    }

    public function showAllCompletedTasksPage()
    {
        $allTasks = DB::table('tasks')->where('task_status', '1')->paginate(14, '*', 'puspalis');

        return view('pages.admin.all-completed-tasks')->with('allTasks', $allTasks);
    }






    public function showAllMyTasksPage(Request $request)
    {
        $allTasks = DB::table('tasks')->where('assigned_to', $request->user()->name)->paginate(14, '*', 'puspalis');

        return view('pages.user.my-all-tasks')->with('allTasks', $allTasks);
    }

    public function showMyCompletedTasksPage(Request $request)
    {
        $myTasks = DB::table('tasks')->where('task_status', '1')->where('assigned_to', $request->user()->name)->paginate(14, '*', 'puspalis');

        return view('pages.user.my-completed-tasks')->with('myTasks', $myTasks);
    }
}
