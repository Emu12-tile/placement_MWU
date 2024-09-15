<?php

namespace App\Http\Controllers;

use App\Models\HR;
use App\Models\Form;
use App\Models\Position;
use App\Models\Secondhr;
use App\Models\Education;
use App\Models\President;
use App\Models\Prestwo;
use App\Models\experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresidentialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {


        $pres = President::paginate(5);



        return view('presidential.index', compact('pres'));
    }
    // public function index2()
    // {


    //     $pres = President::where('status', 1)->paginate(5);



    //     return view('presidential.presresult', compact('pres'));
    // }


    public function pos()
    {


        $forms = Position::join('forms', 'forms.position_id', '=', 'positions.id')
               ->join('h_r_s','h_r_s.form_id','=','forms.id')
               ->join('secondhrs','secondhrs.form_id','forms.id')

            ->join('categories', 'categories.id', '=', 'positions.category_id')
            ->where('categories.catstatus', 'active')
            ->where('h_r_s.status_hr',1)
            ->where('positions.position_type_id', 1)
            ->distinct('positions.id')
            ->get(['positions.id', 'positions.position', 'positions.job_category_id','categories.category']);
    //    dd($forms);
        return view('presidential.pos', compact('forms'));
    }
    public function posDetailpres($id)
    {


        $pos_id = (int) $id;

        $pres = President::join('h_r_s', 'h_r_s.id', '=', 'presidents.h_r__id')
        ->join('forms', 'forms.id', '=', 'h_r_s.form_id')
        ->join('positions', 'positions.id', '=', 'forms.position_id')

        // ->where('status', 1)
        ->where('positions.id', $pos_id)
            ->select('presidents.*')
            ->get();
        $prestwo = Prestwo::join('secondhrs', 'secondhrs.id', '=', 'prestwos.secondhr_id')
        ->join('forms', 'forms.id', '=', 'secondhrs.form_id')
        ->join('choice2s', 'choice2s.id', '=', 'forms.choice2_id')

        // ->where('status', 1)
        ->where('choice2s.id', $pos_id)
            ->select('prestwos.*')
            ->get();



        return view('presidential.presresult', compact('pres', 'prestwo'));
    }
    public function createpresident($prod_id)
    {

        $form = HR::findOrFail($prod_id);

        $forms = experience::where('form_id', $form->form_id)->get();
        $edu = Education::where('form_id', $form->form_id)->get();


        return view('presidential.evaluate', ['id' => $prod_id, 'form' => $form, 'forms' => $forms, 'edu' => $edu]);
    }

    public function storeRestore(Request $request, $prod_id)
    {

        $prod = HR::findOrFail($prod_id);

        // dd($prod);

        $resource = new President;

        $resource->submit = auth()->user()->name;
        //  dd($resource);
        $resource->presidentGrade = $request->presidentGrade;
        $resource->remark = $request->remark;
        $resource->h_r__id = $prod->id;


        // $prod->save();
        if ($resource->save()) {
            $prod->status_president = 1;
        }
        $resource->save();
        $prod->save();


        // dd($resource->hr);
        return redirect('positionDetailhigh/' . $resource->hr->form->position_id)->with('status', 'evaluation added successfully');
    }
    public function edit($id)
    {

        $pres = President::find($id);
        $edu = Education::where('form_id', $pres->hr->form->id)->get();

        $forms = experience::where('form_id', $pres->hr->form->id)->get();

        return view('presidential.edit', ['pres' => $pres, 'edu' => $edu, 'forms' => $forms]);
    }

    public function update(Request $request, $id)
    {
        $hr = President::find($id);




        $hr->submit = auth()->user()->name;

        $hr->presidentGrade = $request->Input('presidentGrade');
        $hr->remark = $request->Input('remark');


        $hr->update();

        return redirect('posDetailpres/' . $hr->hr->form->position_id)->with('status', ' updated successfully');
    }
    public function update1(Request $request, $id)
    {
        $hr = President::find($id);




        $hr->submittedBy = auth()->user()->name;
        $hr->status = 1;

        $hr->update();


        return redirect()->back()->with('status', 'stock updated successfully');
    }







    // public function choice2()
    // {

    //     $hrs = Secondhr::where('status_president', 1)->join('forms', 'forms.id', '=', 'secondhrs.form_id')
    //         ->join('choice2s', 'choice2s.id', '=', 'forms.choice2_id')
    //         ->where('choice2s.position_type_id', 1)->paginate(5);
    //     return view('presidential.choice2evaluation', compact('hrs'));
    // }


    public function all()
    {
        $hrs = HR::all();
        return view('presidential.bothresult', compact('hrs'));
    }
}
