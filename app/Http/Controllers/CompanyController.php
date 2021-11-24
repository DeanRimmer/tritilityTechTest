<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Company;

class CompanyController extends Controller{
    function index(){
        $companyData = DB::table('companies')->get();
        return view('company', ['data'=>$companyData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company-create');
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
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        if($request->hasFile('image')){
            $logo = $request->file('image');
            $imageName = time().'.'.$logo->extension();
            $logo->move(public_path('images'), $imageName);
        }
        $imageName = '../images/'.$imageName;
        $company = new Company();

        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->logo = $imageName;
        $company->website = $request->input('website');

        

        $company->save();

        return redirect('company')->with('success','Company Data Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = DB::select('select * from companies where id = ?', [$id]);
        return view('company-edit', ['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $website = $request->input('website');

        if($request->file('image') != null){
            $logo = $request->file('image');
            $imageName = time().'.'.$logo->extension();
            $logo->move(public_path('images'), $imageName);
            $imageName = '../images/'.$imageName;
            DB::update('update companies set name = ?, email = ?, logo = ?, website = ? where id = ?', [$name, $email, $imageName, $website, $id]);
        }else{
            DB::update('update companies set name = ?, email = ?, website = ? where id = ?', [$name, $email, $website, $id]);
        }
        
        
        return redirect('company')->with('success','Company Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::select('delete from companies where id = ?', [$id]);
        return redirect('company')->with('success','Company Data Deleted');
    }
}
