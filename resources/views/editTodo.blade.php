<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  @if ($errors->has('name')) <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    {{ $errors->first('name') }}</p>
  @endif
  <form action="/todos/{{ $id }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <label for="name">Task</label>
    <input type="text" name="name">
    <button type="submit">Edit</button>
  </form>
</body>
</html>

