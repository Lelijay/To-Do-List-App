<x-mainlayout>
    {{-- <div class="card shadow-sm mt-5"style="max-width:500px"> --}}
        <div class="d-flex align-items-centre">
         <div class="container card shadow mt-5" style="max-width: 500px;margin-top:100px">
        <form class="p-3 mt-2" method="POST" action="{{route('add.task.post')}}">
            @csrf
            <div class="fs-3 fw-bold text-center mb-3">Add new task</div>
            <div class="mb-3">
                <input type="text" class="form-control"name="title" placeholder="Task name">
            </div>
            <div class="mb-3">
                <input type="datetime-local" name="deadline"  class="form-control">
            </div>
            <div class="mb-3">
                <textarea class="form-control" rows="3" name="description"placeholder="(Task description)"></textarea>
            </div>
             @if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
            <button class="btn btn-success round-pill" type="submit">submit</button>
        </form>
    </div>
    </div>
</x-mainlayout>