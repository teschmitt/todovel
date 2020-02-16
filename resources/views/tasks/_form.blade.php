@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $task->title ?? null) }}" />
</div>
<div class="form-group">
    <label>Description</label>
    <input type="textfield" class="form-control" name="description" value="{{ old('description', $task->description ?? null) }}" />
</div>
