<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Employee;

class EmployeeController extends Controller{
    function index(){
        $companyData = DB::table('companies')->get();
        $employeeData = DB::table('employees')->orderBy('company_id')->paginate(15);

        return view('employee', ['data'=>$employeeData, 'companyData'=>$companyData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'company_id' => 'required',
        ]);
        $employee = new Employee();
        $employee->firstName = $request->input('firstName');
        $employee->lastName = $request->input('lastName');
        $employee->company_id = $request->input('company_id');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');

        $employee->save();
        return redirect('employee')->with('success','Employee Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = DB::select('select * from employees where id = ?', [$id]);
        return view('employee-edit', ['employee'=>$employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'company_id' => 'required',
        ]);
        
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $company_id = $request->input('company_id');
        $email = $request->input('email');
        $phone = $request->input('phone');

        DB::update('update employees set firstName = ?, lastName = ?, company_id = ?, email = ?, phone = ? where id = ?', [$firstName, $lastName, $company_id, $email, $phone, $id]);
        return redirect('employee')->with('success','Employee Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::select('delete from employees where id = ?', [$id]);
        return redirect('employee')->with('success','Employee Data Deleted');
    }
}
