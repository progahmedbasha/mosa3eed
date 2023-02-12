<?php

namespace App\Http\Controllers\BranchAdmin;
use App\Http\Controllers\Controller;
use App\Models\organization\OrganizationAdmin;
use App\Models\UserBranch;
use Illuminate\Http\Request;
use App\Http\Requests\OrganizationDashboard\Employee\Store_Employee_Request;
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
    public function all_branchs()
    {
        $branchs = UserBranch::where('user_id', Auth::user()->id)->get();
        return view('branch_admin.pages.employees.allbranches', compact('branchs'));
    }
    public function org_get_employees($id)
    {
        $employees = Employee::where('branch_id', $id)->get();
        return view('branch_admin.pages.employees.employees', compact('employees','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // id >> for branch
        return view('branch_admin.pages.employees.employee_add', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store_Employee_Request $request)
    {
        // return $request;
        $branch = Branch::where('id', $request->branch_id)->first();
        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->phone = $request->input('phone');
        $employee->organization_id = $branch->organization_id;
        $employee->branch_id = $request->input('branch_id');
        $employee->save();
        return redirect()->route('branch_get_employees',$branch->id)->with('success','Employee Added Successfully');
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
        return view('branch_admin.pages.employees.employee_details', compact('employee'));
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
        $employee->save();
        return redirect()->route('branch_get_employees', $employee->branch_id)->with('success','Employee Updated Successfully');
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