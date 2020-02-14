@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $task->title }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h1>{{ $task->title }}</h1>
                        <p>{{ $task->description }}</p>
                        <p>User: {{ $user->name }}</p>
                        <p>Status:
                            @if($task->done)
                                Done!
                            @else
                                Unfinished
                            @endif
                        </p>
                        <p>Added: {{ $task->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
