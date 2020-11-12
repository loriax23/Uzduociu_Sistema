<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministratorController extends Controller
{
    public function createTaskAction(Request $request)
    {
        $request->validate([
            'task_name' => ['required', 'max:50', 'string'],
            'assigned_to' => ['required', 'max:50', 'string'],
            'description' => ['required', 'max:2000', 'string'],
            'due_to' => ['required', 'max:50', 'string'],
        ]);

        $newTask = new Task([
            'task_name' => $request->post('task_name'),
            'creator' => $request->user()->name,
            'assigned_to' => $request->post('assigned_to'),
            'description' => $request->post('description'),
            'due_to' => $request->post('due_to'),
            'task_status' => 0,
        ]);

        $newTask->save();

        return redirect()->back();
    }

    public function deleteTaskAction($id)
    {
        $toDelete = DB::table('tasks')->where('id', $id)->delete();

        return redirect()->back();
    }

    public function editTaskAction(Request $request, $id)
    {

        $request->validate([
            'task_name' => ['required', 'max:50', 'string'],
            'assigned_to' => ['required', 'max:50', 'string'],
            'description' => ['required', 'max:2000', 'string'],
            'due_to' => ['required', 'max:50', 'string'],
        ]);

        $data = new Task([
            'task_name' => $request->post('task_name'),
            'creator' => $request->user()->name,
            'assigned_to' => $request->post('assigned_to'),
            'description' => $request->post('description'),
            'due_to' => $request->post('due_to'),
        ]);

        $editTask = DB::table('tasks')->where('id', $id)->update([
            'task_name' => $data->task_name,
            'creator' => $data->creator,
            'assigned_to' => $data->assigned_to,
            'description' => $data->description,
            'due_to' => $data->due_to
        ]);

        return redirect('visos-uzduotys');
    }
}
