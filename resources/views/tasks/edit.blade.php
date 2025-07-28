<x-mainlayout>
        <div class="d-flex align-items-centre">
         <div class="container card shadow mt-5" style="max-width: 500px;margin-top:100px">
        <form class="p-3 mt-2" method="POST" action="{{route('update',$task->id)}}">

            @csrf
            @method('PUT')
            <div class="fs-3 fw-bold text-center mb-3">Edit Task</div>
            <div class="mb-3">
                <input type="text" class="form-control"name="title" placeholder="Task name" value="{{ $task->title }}">
            </div>
            <div class="mb-3">
                <input type="datetime-local" name="deadline"  class="form-control" value="{{ $task->deadline }}" >
            </div>
            <div class="mb-3">
                <textarea class="form-control" rows="3" name="description"placeholder="(Task description)" >{{ $task->description }}</textarea>
            </div>
             @if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
            <button class="btn btn-success round-pill" type="submit">Update</button>
        </form>
    </div>
    </div>
</x-mainlayout>