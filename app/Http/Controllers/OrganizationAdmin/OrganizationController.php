<?php

namespace App\Http\Controllers\OrganizationAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Organization\StoreRequest;
use App\Models\admin\Organization;
use App\Models\admin\Branch;
use App\Models\organization\OrganizationAdmin;
use App\Models\Employee;
use App\Models\Country;
use App\Models\City;
use App\Models\User;
use App\Models\District;
use App\Models\Owner;
use Illuminate\Support\Facades\Auth;
use Session;
class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //   $organizations = Organization::whenSearch($request->search)->paginate(50);
             $organizations = OrganizationAdmin::where('user_id', Auth::user()->id)->paginate(50);
          return view('organization.pages.organizations.organizations', compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $districts = District::all();
        return view('organization.pages.organizations.organizations_add', compact('countries','cities','districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        // save owner 
        if( request()->owner_name )
        {
            $owner = new Owner();
            $owner->name = $request->owner_name;
            $owner->phone = $request->owner_phone;
            $owner->email = $request->owner_email;
            $owner->save();

            // save organization
            $org = new Organization();
            $org
            ->setTranslation('name', 'en', $request->input('name_en'))
            ->setTranslation('name', 'ar', $request->input('name_ar')) ;
            $org->contact_name = $request->input('contact_name');
            $org->email = $request->input('email');
            $org->phone = $request->input('phone');
            $org->bio = $request->input('bio');
            $org->type = $request->input('type');
            $org->district_id = $request->input('district_id');
            $org->address = $request->input('address');
            $org->status = $request->input('status');
            $org->owner_id = $owner->id;
            if (request()->photo){
                $filename = time().'.'.request()->photo->getClientOriginalExtension();
                request()->photo->move(public_path('data/organizations'), $filename);
                $org->photo=$filename;
                }
            $org->save();
                    // save branch
                if(request()->branch_name_en)
                {
                        $branch = new Branch();
                        $branch
                        ->setTranslation('name', 'en', $request->input('branch_name_en'))
                        ->setTranslation('name', 'ar', $request->input('branch_name_ar')) ;
                        $branch->phone_1 = $request->input('branch_phone_1');
                        $branch->phone_2 = $request->input('branch_phone_2');
                        $branch->email = $request->input('branch_email');
                        $branch->organization_id = $org->id;
                        $branch->district_id = $org->district_id;
                        $branch->address = $request->input('branch_address');
                        if (request()->photo){
                            $filename = time().'.'.request()->photo->getClientOriginalExtension();
                            request()->photo->move(public_path('data/branchs'), $filename);
                            $branch->photo=$filename;
                            }
                        $branch->save();
                }

                        // save employee
                        if(request()->employee_name)
                        {
                            $employee = new Employee();
                            $employee->name = $request->employee_name;
                            $employee->phone = $request->employee_phone;
                            $employee->organization_id = $org->id;
                            $employee->branch_id = $branch->id;
                            $employee->save();
                        }
                        //save user many to many with organization
                        $org_user = new OrganizationAdmin();
                        $org_user->organization_id = $org->id;
                        $org_user->user_id = Auth::user()->id;
                        $org_user->type = "Organization Admin";
                        $org_user->save();
             
        }
       
        return redirect()->route('user_organizations.index')->with('success','Organization Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organization = Organization::find($id);
        $countries = Country::all();
        $cities = City::all();
        $districts = District::all();
        $country_id = Country::where('id',$organization->District->City->country_id)->first();
        $city_id = City::where('id',$organization->District->city_id)->first(); 
        $branchs = Branch::where('organization_id', $id)->get();
        $organization_admins = OrganizationAdmin::where('organization_id', $id)->get();
        $employees = Employee::where('organization_id', $id)->get();
        return view('organization.pages.organizations.organizaion_show', compact('organization','countries','cities','districts','country_id','city_id','branchs','organization_admins','employees'));
    }
    public function branches($id)
    {
        $branchs = Branch::where('organization_id', $id)->get();
        return view('organization.pages.branchs.branchs', compact('branchs'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $organization = Organization::with('District')->find($id);
        $countries = Country::all();
        $cities = City::all();
        $districts = District::all();
        $country_id = Country::where('id',$organization->District->City->country_id)->first();
        $city_id = City::where('id',$organization->District->city_id)->first(); 
        return view('organization.pages.organizations.organization_details', compact('organization','countries','cities','districts','country_id','city_id'));
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
        // return $request;
        $org = Organization::find($id);
        $org
        ->setTranslation('name', 'en', $request->input('name_en'))
        ->setTranslation('name', 'ar', $request->input('name_ar')) ;
        $org->contact_name = $request->input('contact_name');
        $org->email = $request->input('email');
        $org->phone = $request->input('phone');
        $org->type = $request->input('type');
        $org->bio = $request->input('bio');
        $org->district_id = $request->input('district_id');
        $org->address = $request->input('address');
        $org->status = $request->input('status');
        if (request()->photo){
            $filename = time().'.'.request()->photo->getClientOriginalExtension();
            request()->photo->move(public_path('data/organizations'), $filename);
            $org->photo=$filename;
            }
        $org->save();
        Session::flash('success','Organization Updated Successfully');
        return redirect()->route('user_organizations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $org = Organization::has('User')->get();
        $org = Organization::find($id);
        $org->Branch()->delete();
        $org->User()->delete();
        $org->delete();
        Session::flash('success','Organization Deleted Successfully');
        return redirect()->route('organizations.index');
    }
    public function org_admins($id)
    {
         $organization_admins = OrganizationAdmin::where('organization_id', $id)->get();
        return view('organization.pages.organization_admins.organization_admins', compact('organization_admins'));

    }
}