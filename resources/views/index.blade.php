<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>LinkU</title>
  </head>
  <body>
    <div class ="container">
        <h2 class="mt-5">LinkU: The URL Shortener</h2>
        @if (session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <div class="card mt-2">
            <div class="card-header from-group">
                <form class="form"action="{{route('add')}}" method="post">
                    @csrf
                    @method('post')
                    <div class="input-group mb-4">
                        <input type="text" name="link" class="form-controll" placeholder="Enter Url" autocomplete="off">
                        <div class="input-group-addon">
                            <button class="btn btn-success">Generate</button>
                        </div>
                    </div>
                    @error('link')<p class="m-0 p-0 text text-danger">{{$message}}</p>
                    @enderror
                </form>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Shorten Link</th>
                    <th>Clicks</th>
                    <th>Link</th>
                </tr>
            </thead>
            @foreach ($data as $i)
                <tr>
                    <td>{{$i->id}}</td>
                    <td><a href="{{route('code',$i->code)}}" target="_blank" >{{route('code',$i->code)}}</a></td>
                    <td>{{$i->click}}</td>
                    <td>{{$i->link}}</td>
                </tr>
            @endforeach 
        </table>
    </div>
 

  </body>
</html>