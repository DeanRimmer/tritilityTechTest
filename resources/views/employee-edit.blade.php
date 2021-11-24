<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/style.css') }}">
    <title>Employee View</title>
</head>
<body>
    @if(isset(Auth::user()->email))
    @include('partials/top-bar')
    <div class = "container">
        <div class = "jumbortron">
            <form method="POST" action="/update-employee/{{$employee[0]->id}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class = "form-group">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" name="firstName" value="{{$employee[0]->firstName}}">
                    @error('firstName')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class = "form-group">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" name="lastName" value="{{$employee[0]->lastName}}">
                    @error('lastName')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class = "form-group">
                    <label for="">Company ID</label>
                    <input type="text" class="form-control" name="company_id" value="{{$employee[0]->company_id}}">
                    @error('company_id')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class = "form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" value="{{$employee[0]->email}}">
                </div>
                <div class = "form-group">
                    <label for="">Phone Number</label>
                    <input type="text" class="form-control" name="phone" value="{{$employee[0]->phone}}">
                </div>
                <div class = "modal-footer">
                    <a href = "/employee" type="button" class="btn btn-secondary">Cancel</a>
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