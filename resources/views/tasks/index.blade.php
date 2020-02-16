@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tasks</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <p><a href="{{ route('tasks.create') }}">+ Add task</a></p>
                            <ul>
                                @forelse($tasks as $t)
                                    <li>
                                        <a href="{{ route('tasks.show', ['task' => $t->id]) }}">{{ $t->title }}</a>
                                        <a href="{{ route('tasks.edit', ['task' => $t->id]) }}" class="btn btn-primary">Edit</a>
                                        <form method="POST"
                                              action="{{ route('tasks.destroy', ['task' => $t->id]) }}" class="fm-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                        </form>
                                    </li>
                                @empty
                                    <li>There is nothing here yet!</li>
                                @endforelse
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
