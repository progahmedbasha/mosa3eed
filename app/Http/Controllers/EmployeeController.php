<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Employee\Store_Employee_Request;
use App\Models\Employee;
use App\Models\admin\Organization;
use App\Models\admin\Branch;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('admin.pages.employees.employees', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::all();
        $organizations = Organization::all();
        return view('admin.pages.employees.employee_add', compact('branches','organizations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store_Employee_Request $request)
    {
        // for return page after update
        $org_id = $request->input('organization_id');

        Employee::create($request->all());
        return redirect()->route('organizations.show',$org_id)->with('success','Employee Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $organizations = Organization::all();
        $branches = Branch::all();
        return view('admin.pages.employees.employee_details', compact('employee','organizations','branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // for return page after update
        $org_id = $request->input('organization_id');

        $employee = Employee::find($id);
        $employee->name = $request->input('name');
        $employee->phone = $request->input('phone');
        $employee->organization_id = $request->input('organization_id');
        $employee->branch_id = $request->input('branch_id');
        $employee->save();
        return redirect()->route('organizations.show',$org_id)->with('success','Employee Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->back()->with('success','Employee Deleted Successfully');
    }
}
