<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\choice2;
use App\Models\Edutype;
use App\Models\Category;
use App\Models\EduLevel;
use App\Models\Position;
use App\Models\JobCategory;
use App\Models\PositionType;
use Illuminate\Http\Request;
use App\Models\EducationType;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{
    public function index()
    {

        $admins = Position::all();


        return view('adminpage.position.index', compact('admins'));
    }
    public function create()
    {

        $position = PositionType::all();
        $level = Level::all();
        $edu_level = EduLevel::all();
        $educ = DB::table('edu_levels')->get();
        $eductype = DB::table('education_types')->get();
        $lev = DB::table('levels')->get();
        $job_category = JobCategory::all();
        $category = Category::all();



        return view('adminpage.position.create', compact('lev', 'position', 'edu_level', 'eductype', 'job_category', 'educ', 'category'));
    }
    public function store(Request $request)
    {

        foreach ($request->addMoreInputFields as $key => $value) {

            Position::create(
                [
                    "position" => $value["position"],
                    "job_category_id" => $value["job_category_id"],
                    "position_type_id" => $value["position_type_id"],
                    "experience" => $value["experience"],

                    "edu_level" => $value["edu_level"],

                    "education_type" => $value["education_type"],

                    "level" => $value["level"],
                    "category_id" => $value["category_id"],
                    "quantity"=>$value["quantity"]
                    


                ]

            );





            choice2::create(
                [
                    "position" => $value["position"],
                    "jobcat2_id" => $value["job_category_id"],
                    "position_type_id" => $value["position_type_id"],
                    "experience" => $value["experience"],

                    "edu_level" => $value["edu_level"],
                    "education_type" => $value["education_type"],

                    "level" => $value["level"],
                    "category_id" => $value["category_id"],
                    "quantity"=>$value["quantity"]


                ]
            );
        }
        return redirect()->route('position.index');




    //     $input = $request->all();


    //     $hobby = $input['education_type'];
    //     $input['education_type'] = implode(',', $hobby);

    //     Position::create($input);



    //      $in = new choice2;
    //     $in->jobcat2_id = $input = $request->input('job_category_id');
    //     $in['education_type'] = implode(',',$input = $request->input('education_type'));
    //     $in->edu_level = $input = $request->input('edu_level');
    //     $in->experience = $input = $request->input('experience');
    //     $in->level = $input = $request->input('level');
    //     $in->category_id = $input = $request->input('category_id');
    //     $in->position_type_id = $input = $request->input('position_type_id');
    //     $in->position = $input = $request->input('position');


    //    $in->save();






    //     return redirect()->route('position.index');
    }
    public function edit($id)
    {
        $edu_level = EduLevel::all();
        $edutype = EducationType::all();

        $pos = PositionType::all();
        $job_category = JobCategory::all();
        $level = Level::all();
        $category = Category::all();
        $admin = Position::find($id);
        return view('adminpage.position.edit', compact('admin', 'pos', 'level', 'edu_level', 'job_category', 'edutype', 'category'));
    }
    public function update(Request $request, $id)
    {


        $admin = Position::find($id);
        $input = $request->all();


        // $hobby = $input['education_type'];
        // $input['education_type'] = implode(',', $hobby);

        $admin->position = $request->Input('position');
        $admin->experience = $request->Input('experience');
        $admin->job_category_id = $request->job_category_id;

        $admin->position_type_id = $request->position_type_id;
        $admin->edu_level = $request->Input('edu_level');
        $admin->level = $request->Input('level');
        $admin->quantity = $request->Input('quantity');

        $admin->education_type = $request->Input('education_type');
        // $admin['education_type'] = implode(',',  $input=$request->input('education_type'));
        $admin->category_id = $request->category_id;
        $admin->update();
        $admin2 = choice2::find($id);
        $admin2->position = $request->Input('position');
        $admin2->experience = $request->Input('experience');
        $admin2->jobcat2_id = $request->job_category_id;
        $admin2->position_type_id = $request->position_type_id;
        $admin2->category_id = $request->category_id;
        $admin2->edu_level = $request->Input('edu_level');
        $admin2->level = $request->Input('level');
        $admin2->quantity = $request->Input('quantity');
        $admin2->education_type = $request->Input('education_type');
        // $admin2['education_type'] = implode(',',  $input=$request->input('education_type'));


        $admin2->update();




        return redirect('position')->with('status', 'position updated successfully');
    }
    public function destroy($id)
    {

        $admin2 = choice2::find($id);
        $admin2->delete();
        $admin = Position::find($id);
        $admin->delete();

        // dd($admin,$admin2);

        // $admin2 = choice2::where($id, $admin->id)->get()->delete();

        return redirect('position')->with('status', 'position  deleted successfully');
    }
}
