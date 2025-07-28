<x-mainlayout>
    <x-slot name="navbar">
        <x-navbar />
    </x-slot>

    <main role="main" class="flex-shrink-0 mt-5">
        <div class="container">
            @if (session()->has('success'))
                <div class="alert alert-success mt-5">{{ session('success') }}</div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger mt-5">{{ session('error') }}</div>
            @endif
            {{-- {{ $tasks }} --}}
            <div class="my-3 p-5 bg-body rounded shadow-lg mt-5">
                <div class="text-left mb-4 fw-bolder fs-1 ">
                    <h2>
                        Welcome {{ auth()->user()->name }}
                    </h2>
                </div>
                <h6 class="border-bottom pb-2 mb-0 fs-4 fw-bolder text-success">List of Tasks</h6>
                @foreach ($tasks as $task)
                    <div class="d-flex text-body-secondary pt-4 align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-flame">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M10 2c0 -.88 1.056 -1.331 1.692 -.722c1.958 1.876 3.096 5.995 1.75 9.12l-.08 .174l.012 .003c.625 .133 1.203 -.43 2.303 -2.173l.14 -.224a1 1 0 0 1 1.582 -.153c1.334 1.435 2.601 4.377 2.601 6.27c0 4.265 -3.591 7.705 -8 7.705s-8 -3.44 -8 -7.706c0 -2.252 1.022 -4.716 2.632 -6.301l.605 -.589c.241 -.236 .434 -.43 .618 -.624c1.43 -1.512 2.145 -2.924 2.145 -4.78" />
                        </svg>
                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                            <div class="d-flex justify-content-between">
                                <strong class="text-primary fs-5 fw-bolder ">{{ $task->title }}</strong>



                            </div>
                            <span class="d-block my-0 ms-auto mb-3 mt-2">{{ $task->description }}</span>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="badge bg-warning text-dark mb-0">
                                    Deadline:
                                    {{ \Carbon\Carbon::parse($task->deadline)->format('F j, Y \a\t g:i A') }}
                                </span>
                                <div class="d-inline-flex gap-1">
                                    <a href="/taskstatus/{{ $task->id }}" class="btn btn-success"
                                        title="Mark as Complete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-checks">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 12l5 5l10 -10" />
                                            <path d="M2 12l5 5m5 -5l5 -5" />
                                        </svg>
                                    </a>
                                     <a href="{{ route('edit.task', $task->id) }}" class="btn btn-warning" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                <path d="M13.5 6.5l4 4" />
                                            </svg>
                                        </a>


                                    <a href="/taskdelete/{{ $task->id }}" class="btn btn-danger"title="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 7l16 0" />
                                            <path d="M10 11l0 6" />
                                            <path d="M14 11l0 6" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="mt-3">
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </main>

    {{-- @foreach ($tasks as $task)
        <div class="container my-5">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card shadow-sm h-100 border-0">
                        <!-- Image or Thumbnail -->
                        <img src="{{ asset('img\pexels-elijahsad-3473569.jpg') }}" class="card-img-top"
                            alt="Task Thumbnail" style="object-fit: cover; height: 10px;">

                        <!-- Card Body -->
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary fw-bold">{{ $task->title }}</h5>

                            <p class="card-text text-muted">{{ $task->description }}</p>

                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="badge bg-warning text-dark">
                                        Deadline:
                                        {{ \Carbon\Carbon::parse($task->deadline)->format('F j, Y \a\t g:i A') }}
                                    </span>
                                </div>

                                <div class="d-flex justify-content-between gap-3">
                                    <a href="/taskstatus/{{ $task->id }}" class="btn btn-success w-50"
                                        title="Mark as Complete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="me-1">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M7 12l5 5l10 -10" />
                                            <path d="M2 12l5 5m5 -5l5 -5" />
                                        </svg>
                                        Complete
                                    </a>

                                    <a href="/taskdelete/{{ $task->id }}" class="btn btn-danger w-50"
                                        title="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="me-1">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M4 7l16 0" />
                                            <path d="M10 11l0 6" />
                                            <path d="M14 11l0 6" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach --}}





    <x-slot name="footer">
        <x-footer />
    </x-slot>


</x-mainlayout>
