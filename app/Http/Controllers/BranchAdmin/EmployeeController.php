<?php

namespace App\Http\Controllers\BranchAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BranchDashboard\Employee\Store_Employee_Request;
use App\Models\Employee;
use App\Models\admin\Organization;
use App\Models\admin\Branch;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::where('organization_id', Auth::user()->organization_id)->get();
        return view('branch_admin.pages.employees.employees', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::all();
        return view('branch_admin.pages.employees.employee_add', compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store_Employee_Request $request)
    {
        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->phone = $request->input('phone');
        $employee->organization_id = Auth::user()->organization_id;
        $employee->branch_id = $request->input('branch_id');
        $employee->save();
        return redirect()->route('branch_employees.index')->with('success','Employee Added Successfully');
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
        $branches = Branch::where('organization_id', Auth::user()->organization_id)->get();
        return view('branch_admin.pages.employees.employee_details', compact('employee','branches'));
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
        $employee = Employee::find($id);
        $employee->name = $request->input('name');
        $employee->phone = $request->input('phone');
        $employee->organization_id = Auth::user()->organization_id;
        $employee->branch_id = $request->input('branch_id');
        $employee->save();
        return redirect()->route('branch_employees.index')->with('success','Employee Updated Successfully');
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
        return redirect()->route('branch_employees.index')->with('success','Employee Deleted Successfully');
    }
}
