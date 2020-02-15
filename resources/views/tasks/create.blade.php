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
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                @foreach($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('tasks.store') }}">
                            @csrf
                            <p>
                                <label>Title</label>
                                <input type="text" name="title" />
                            </p>
                            <p>
                                <label>Description</label>
                                <input type="textfield" name="description" />
                            </p>
                            <button type="submit">Create</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
