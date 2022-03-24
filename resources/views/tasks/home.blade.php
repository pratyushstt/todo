<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/task_home.css') }}">

    <title>ToDo App!</title>

</head>

<body>

    <div class="container py-1 my-2 mb-4">
        <h3><i class="bi bi-clipboard-check"></i>&nbsp;&nbsp;ToDo App</h3>
        <hr class="first">
    </div>

    <div class="container">
        <div class="row px-4">
            <div class="col-md-6 mb-3 p-3 border border-light rounded">
                <h3><i class="bi bi-list-task"></i>&nbsp;Task List</h3>
                <hr>
                <div class="table-responsive">
                    <table class="table table-hover table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Task</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" colspan="3" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $row)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <form action="{{ route('task.update') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $row->id }}">
                                            <input type="text" name="task" id="name{{ $row->id }}"
                                                class="form-control-plaintext p-0 px-1 text-light" readonly
                                                value="{{ $row->name }}">
                                        </form>
                                    </td>
                                    @if ($row->is_completed == 0)
                                        <td class="text-center"><i class="bi bi-hourglass-split"
                                                title="Task pending"></i></td>
                                        <td class="text-center"><a href="{{ route('task.done', $row->id) }}"
                                                class="text"><i class="bi bi-check2-circle"
                                                    title="Mark as done"></i></a></td>
                                    @else
                                        <td class="text-center"><i class="bi bi-clipboard-check"
                                                title="Task accomplished"></i></td>
                                        <td class="text-center"><a href="{{ route('task.undone', $row->id) }}"
                                                class="text"><i class="bi bi-x-circle"
                                                    title="Mark as undone"></i></a></td>
                                    @endif

                                    <td class="text-center"><i class="bi bi-pencil-square"
                                            onclick="edit({{ $row->id }})" title="Edit Task"></i></td>
                                    <td class="text-center"><a href="{{ route('task.delete', $row->id) }}"
                                            class="text"><i class="bi bi-trash-fill"
                                                title="Delete Task"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6 mb-3 p-3 rounded">
                <h3><i class="bi bi-plus-circle-fill"></i>&nbsp;Add Task</h3>
                <hr>
                <form action="{{ route('task.add') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="task" class="col-sm-2 col-form-label">Task : </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="task" name="task"
                                placeholder="Enter your task...">
                            @error('task')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary float-right" type="submit">Add Task</button>
                </form>
            </div>

        </div>
    </div>

    <div class="container mt-5">
        <div class="row pt-5">
            <div class="col-md-3 col-6 m-auto p-3">
                <a class="btn btn-block btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Exit') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JS file -->
    <script src="{{ asset('assets/js/task_home.js') }}"></script>



</body>

</html>
