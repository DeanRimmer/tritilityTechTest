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
      <a href ="/add-employee" class="btn btn-primary">Add Employee</a>
    </div>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Company ID</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @php
          $maxCompanyId = 0;
          $minCompanyId = 0;
          @endphp
          @foreach($data as $employeeItem)
            @if($loop->first)
            @php
              $minCompanyId = $employeeItem->company_id;
            @endphp
            @endif
             @if($employeeItem->company_id > $maxCompanyId)
             @php
              $maxCompanyId = $employeeItem->company_id;
             @endphp
             
             @endif
          @endforeach
          @foreach($companyData as $companyInfo)
          @if($companyInfo->id >= $minCompanyId && $companyInfo->id <= $maxCompanyId)
            <tr style = "height:100px;">
              <th scope="row" class="employeeCompany">{{$companyInfo->id}}</th>
              <td class="employeeCompany"><b>Company Name:</b></td>
              <td class="employeeCompany"><b>{{$companyInfo->name}}</b></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            @endif
            @foreach($data as $employeeItem)
              @if($employeeItem->company_id == $companyInfo->id)
                <tr>
                    <th scope="row">{{$employeeItem->id}}</th>
                    <td>{{$employeeItem->firstName}}</td>
                    <td>{{$employeeItem->lastName}}</td>
                    <td>{{$employeeItem->company_id}}</td>
                    <td>{{$employeeItem->email}}</td>
                    <td>{{$employeeItem->phone}}</td>
                    <td><a href ="employee-edit/{{$employeeItem->id}}" class="btn btn-info">Edit</a></td>
                <td><a href ="employee-delete/{{$employeeItem->id}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a></td>
                </tr>
              @endif
            @endforeach
          @endforeach
        </tbody>
      </table>
      <span>
        {{$data->links()}}
      </span>
      <style>
        .w-5{
          display: inline;
        }
        </style>
    @else
    <script>window.location = "/login";</script>
    @endif
</body>
</html>