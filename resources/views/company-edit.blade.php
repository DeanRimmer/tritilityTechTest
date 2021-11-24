<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/style.css') }}">
    <title>Company View</title>
</head>
<body>
    @if(isset(Auth::user()->email))
    @include('partials/top-bar')
    <div class = "container">
        <div class = "jumbortron">
            <form method="POST" action="/update/{{$company[0]->id}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class = "form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$company[0]->name}}">
                    @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class = "form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" value="{{$company[0]->email}}">
                </div>
                <div class = "form-group">
                    <label for="">Logo</label>
                    <input type="file" name="image" class="form-control">
                    <div>
                        <img src= "{{$company[0]->logo}}">
                    </div>
                    @error('image')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class = "form-group">
                    <label for="">Website</label>
                    <input type="text" class="form-control" name="website" value="{{$company[0]->website}}">
                </div>
                <div class = "modal-footer">
                    <a href = "/company" type="button" class="btn btn-secondary">Cancel</a>
                    <input type="submit" name="submit" class="btn btn-primary"></button>
                </div>
            </form>
        </div>
    </div>
    @else
    <script>window.location = "/login";</script>
    @endif
</body>
</html>