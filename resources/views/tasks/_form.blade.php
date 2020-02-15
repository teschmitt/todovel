@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

<p>
    <label>Title</label>
    <input type="text" name="title" value="{{ old('title', $task->title ?? null) }}" />
</p>
<p>
    <label>Description</label>
    <input type="textfield" name="description" value="{{ old('description', $task->description ?? null) }}" />
</p>
