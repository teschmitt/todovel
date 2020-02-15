@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Task</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST"
                              action="{{ route('tasks.update', ['task' => $task->id]) }}">
                            @csrf
                            @method('PUT')

                            @include('tasks._form')

                            <button type="submit">Edit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
