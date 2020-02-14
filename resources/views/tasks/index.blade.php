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
                            <ul>
                                @forelse($tasks as $t)
                                    <li>
                                        <a href="{{ route('tasks.show', ['task' => $t->id]) }}">{{ $t->title }}</a>
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
