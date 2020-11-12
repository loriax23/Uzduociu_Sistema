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
                <th scope="col">Statusas</th>
                <th scope="col">Veiksmai</th>
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
                    <td>
                        @if($task->task_status == 0)
                            Pateikta / Neatlikta
                        @else
                            Atlikta
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('edit-task-page', $task->id) }}" class="mx-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('delete-task-action', $task->id) }}" class="mx-2">
                            <i class="fas fa-trash"></i>
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
