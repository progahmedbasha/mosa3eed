<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\admin\Branch;
class Fetch_branchController extends Controller
{


  public function fetch_branch(Request $request)
    {
        $branchs = Branch::where('organization_id' ,$request->organization_id)->get();
        $html = view('admin.pages.job_posts.fetch_branch_ajax', compact('branchs'))->render();
        return response()->json(['status' => true, 'result' => $html]);
    }
}
