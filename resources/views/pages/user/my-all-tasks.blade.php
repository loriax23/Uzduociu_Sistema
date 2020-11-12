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
                <th scope="col">Paskutinis Atnaujinimas</th>
                <th scope="col">Veiksmai</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allTasks as $task)
                <tr>
                    <td scope="row">{{ $task->task_name }}</td>
                    <td>{{ $task->creator }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->due_to }}</td>
                    <td>{{ $task->created_at }}</td>
                    <td>{{ $task->updated_at }}</td>
                    <td>
                        <a href="{{ route('complete-task-action', $task->id) }}">
                            <i class="fas fa-check-square"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination-links m-auto">
        {{ $allTasks->links() }}
    </div>

@endsection
