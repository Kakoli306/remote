<!DOCTYPE html>
<html lang="en">
<head>
  <title>Simple Search Application</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="panel panel default text search">
    <div class="panel-heading">
        <div class="row">

            @if(session('response'))
                <div class="alert alert-success">{{ session('response')}}</div>
            @endif

            <div class="col-md-4">
                <form method="POST" action="{{url ("/search") }}">
                    {{csrf_field()}}
                    <div class="input-group">
                        <input type="text" name="search" class="form-control"
                               placeholder="Search for...">
                        <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    GO
                                </button>
                            </span>
                    </div>
                </form>
            </div>
        </div>

<div class="container">
  @if(isset($developers))

  <h2>Simple Search Application</h2>
<table class="table">
    <thead>
      <tr>
        <th>Developer Id</th>
        <th>Email</th>
        <th>Programming Language</th>
        <th>Language</th>
      </tr>
    </thead>
    <tbody>

    @foreach($developers as $developer)
      <tr class="info">
        <td>{{$developer->id }}</td>
        <td>{{$developer->email}}</td>
        <td>{{$developer->getname()}}</td>
          <td>{{$developer->getlanguage()}}</td>
        @endforeach
      </tr>
    </tbody>
</table>
</div>

        @else
            <p>No posts available</p>
    </div>
</div>

@endif

</body>
</html>

