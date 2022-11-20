<?php

namespace App\Http\Controllers\BranchAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserBranch;
use App\Models\admin\Branch;
use App\Models\BranchMedicin;
use Illuminate\Support\Facades\Auth;
class BranchMedicinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $branchs = Branch::has('BranchMedicin')->where('organization_id',Auth::user()->organization_id)->paginate(50);
        return view('branch_admin.pages.branch_medicins.branch_medicins', compact('branchs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medicins = BranchMedicin::where('branch_id',$id)->paginate(50);
        return view('branch_admin.pages.branch_medicins.branch_medicin_show', compact('medicins'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
