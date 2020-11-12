@extends('layouts.app-admin')

@section('content-admin')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sukurti Užduotį</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('create-task-action') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="task_name" class="col-md-4 col-form-label text-md-right">Užduoties
                                    Pavadinimas</label>

                                <div class="col-md-6">
                                    <input id="task_name" type="text"
                                           class="form-control @error('task_name') is-invalid @enderror"
                                           name="task_name"
                                           placeholder="Pavedžioti Šunis" value="{{ old('task_name') }}"
                                           oninvalid="this.setCustomValidity('Laukelis &quot;Užduoties Pavadinimas&quot; yra privalomas.')"
                                           oninput="setCustomValidity('')"
                                           required autofocus>
                                    @error('task_name')
                                    <div class="text-danger">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="assigned_to" class="col-md-4 col-form-label text-md-right">Užduotį
                                    Atliks</label>

                                <div class="col-md-6">
                                    <input id="assigned_to" type="text"
                                           class="form-control @error('assigned_to') is-invalid @enderror"
                                           name="assigned_to"
                                           placeholder="Jonas" value="{{ old('assigned_to') }}"
                                           oninvalid="this.setCustomValidity('Laukelis &quot;Užduotį Atliks&quot; yra privalomas.')"
                                           oninput="setCustomValidity('')" required>
                                    @error('assigned_to')
                                    <div class="text-danger">
                                        <strong>
                                            {{ $message }}
                                        </strong></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="due_to" class="col-md-4 col-form-label text-md-right">Atlikti Iki</label>

                                <div class="col-md-6">
                                    <input id="due_to" type="text"
                                           class="form-control @error('due_to') is-invalid @enderror" name="due_to"
                                           placeholder="MMMM/MM/DD" value="{{ old('due_to') }}"
                                           oninvalid="this.setCustomValidity('Laukelis &quot;Atlikti Iki&quot; yra privalomas.')"
                                           oninput="setCustomValidity('')" required>
                                    @error('due_to')
                                    <div class="text-danger">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Užduoties
                                    Aprašymas</label>

                                <div class="col-md-6">
                                    <textarea rows="4" id="description" type="text"
                                              class="form-control @error('description') is-invalid @enderror"
                                              name="description" style="resize: none"
                                              oninvalid="this.setCustomValidity('Laukelis &quot;Užduoties Aprašymas&quot; yra privalomas.')"
                                              oninput="setCustomValidity('')"
                                              required>{{ old('description') }}</textarea>
                                    @error('description')
                                    <div class="text-danger">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Sukurti
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
