<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>a simple todo list</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-8">
                    <h1>todo list</h1>
                </div>
                <div class="col-4">
                    <p>
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                        <a href="{{route('todo.create')}}" class="btn btn-primary">add</a>
                        </div>
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                            <a href="{{route('todo.index',['filter'=>'all'])}}" class="btn btn-warning">all</a>
                            <a href="{{route('todo.index',['filter'=>'expired'])}}" class="btn btn-info">expired</a>
                            <a href="{{route('todo.index',['filter'=>'new'])}}" class="btn btn-info">new</a>
                        </div>
                    </p>
                </div>
            </div>
            @foreach($todoList as $todo)
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{$todo->title}}
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <a href="{{route('todo.edit', ['id' => $todo->id])}}" class="btn btn-primary">edit</a>
                        <a href="{{route('todo.destroy', ['id' => $todo->id])}}" class="btn btn-danger">done</a>
                    </div>
                </li>
            </ul>
            @endForeach
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>
