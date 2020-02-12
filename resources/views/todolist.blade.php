<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Todo-List</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .fa-btn {
            margin-right: 6px;
        }

        table button {
            margin-left: 20px
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Branding Image -->
                <a class="navbar-brand" href="">
                    Task List
                </a>
            </div>
        </div>
    </nav>
        <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- New Task Form -->
                    <form action="/todos/" method="POST" class="form-horizontal">
                        @csrf
                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="">
                            </div>
                        </div>
                        @if ($errors->has('name')) <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            {{ $errors->first('name') }}</p>
                        @endif
                        <!-- Save Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Current Tasks -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Tasks
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>Task</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($todos as $todo)
                                @if ($todo->done)
                                    <tr>
                                        <td class="col-sm-6">
                                            <del>{{ $todo->name }}</del>
                                        </td>
                                        <td class="col-sm-6">
                                            <button type="submit" class="btn btn-success disabled"><i class="fa fa-btn fa-thumbs-o-up"></i>completed</button>

                                            <form action="/todos/edit/{{ $todo->id }}/" method="GET">
                                                @csrf
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-pencil"></i>edit</button>
                                            </form>

                                            <form action="/todos/{{ $todo->id }}/" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="delete">
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i>delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="col-sm-6">{{ $todo->name }}</td>
                                        <td class="col-sm-6">
                                            <form action="/todos/completed/{{ $todo->id }}/" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="PUT">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-btn fa-thumbs-o-up"></i>completed</button>
                                            </form>

                                            <form action="/todos/edit/{{ $todo->id }}/" method="GET">
                                                @csrf
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-pencil"></i>edit</button>
                                            </form>

                                            <form action="/todos/{{ $todo->id }}/" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="delete">
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i>delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>