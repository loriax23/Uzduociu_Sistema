@extends('layouts.app-admin')

@section('content-admin')
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Užduoties Pavadinimas</th>
                <th scope="col">Užduoties Kūrėjas</th>
                <th scope="col">Užduotį Atliks</th>
                <th scope="col">Aprašymas</th>
                <th scope="col">Atlikti Iki</th>
                <th scope="col">Sukūrimo Data</th>
                <th scope="col">Paskutinis Atnaujinimas</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allTasks as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->task_name }}</td>
                    <td>{{ $task->creator }}</td>
                    <td>{{ $task->assigned_to }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->due_to }}</td>
                    <td>{{ $task->created_at }}</td>
                    <td>{{ $task->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination-links m-auto">
        {{ $allTasks->links() }}
    </div>

@endsection
