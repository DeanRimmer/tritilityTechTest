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
    @if(\Session::has('success'))
        <div class = "alert alert-success">
            <h4>{{Session::get('success')}}</h4>
        </div>
    @endif
    <div class="optionsContainer">
      <a href ="/add-company" class="btn btn-primary">Add Company</a>
    </div>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Logo</th>
            <th scope="col">Website</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($data as $companyItem)
            <tr>
                <th scope="row">{{$companyItem->id}}</th>
                <td>{{$companyItem->name}}</td>
                <td>{{$companyItem->email}}</td>
                <td><img src = "{{$companyItem->logo}}" class="img-thumbnail" style="max-width:20%; min-width:50px;"></td>
                <td>{{$companyItem->website}}</td>
                <td><a href ="company-edit/{{$companyItem->id}}" class="btn btn-info">Edit</a></td>
                <td><a href ="company-delete/{{$companyItem->id}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a></td>
              </tr>
            @endforeach
        </tbody>
      </table>
    @else
    <script>window.location = "/login";</script>
    @endif
</body>
</html>
