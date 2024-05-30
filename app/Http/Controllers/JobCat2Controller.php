<?php

namespace App\Http\Controllers;

use App\Models\jobcat2;
use Illuminate\Http\Request;

class JobCat2Controller extends Controller
{
    public function index()
    {

        $admins = jobcat2::latest()->paginate(8);


        return view('adminpage.jobcat.index', compact('admins'));
    }
    public function create()
    {
        return view('adminpage.jobcat.create');
    }
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'addMoreInputFields.*.level' => 'required',
        // ]);
        // foreach ($request->addMoreInputFields as $key => $value) {
        //     Level::create($value);
        // };
        // return redirect()->route('level.index');
        if ($request->ajax()) {


            foreach ($request->data as $key => $value) {

                jobcat2::create([
                    "job_category" => $value["job_category"],

                ]);
            }
        }
        return response()->json(array("success" => true));
    }
    public function edit($id)
    {
        $admin =jobcat2 ::find($id);
        return view('adminpage.jobcat.edit', compact('admin'));
    }
    public function update(Request $request, $id)
    {

        $admin = jobcat2::find($id);
        $admin->job_category = $request->Input('job_category');
        $admin->update();


        return redirect('jobcat2')->with('status', 'jobcategory updated successfully');
    }
    public function destroy($id)
    {
        $admin = jobcat2::find($id);


        $admin->delete();
        return redirect('jobcat2')->with('status', 'jobcategory  deleted successfully');
    }

}
