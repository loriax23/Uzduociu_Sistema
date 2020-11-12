@extends('layouts.app-user')

@section('content-user')
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Užduoties Pavadinimas</th>
                <th scope="col">Užduoties Kūrėjas</th>
                <th scope="col">Aprašymas</th>
                <th scope="col">Atlikti Iki</th>
                <th scope="col">Sukūrimo Data</th>
            </tr>
            </thead>
            <tbody>
            @foreach($myTasks as $task)
                <tr>
                    <td scope="row">{{ $task->task_name }}</td>
                    <td>{{ $task->creator }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->due_to }}</td>
                    <td>{{ $task->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination-links m-auto">
        {{ $myTasks->links() }}
    </div>

@endsection
