<?php

namespace App\Http\Controllers;

use App\Models\choice2;
use App\Models\Form;
use App\Models\Secondhr;
use App\Models\HR;
use App\Models\Education;
use App\Models\experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SecondhrController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $hrs = Secondhr::where('status_hr', 0)->get();
        // dd($hrs);

        return view('secondchoice.index', compact('hrs'));
    }
    public function index4()
    {
        $hrs = Secondhr::where('status_hr', 1)->get();
        return view('secondchoice.resulttwo', compact('hrs'));
    }
    public function index3()
    {

        $hrs = Secondhr::where('status_hr', 1)->get();

        return view('secondchoicelow.index', compact('hrs'));
    }

    // public function secondchoice()
    // {


    //     $forms = Form::where('secondhrs', null)->paginate(5);


    //     return view('secondchoice.secondchoice', compact('forms'));
    // }

    public function index2()
    {

        $hrs = Secondhr::where('status_hr', 0)->get();
        // dd($hrs);

        return view('secondchoicelow.lowresource', compact('hrs'));
    }

    public function choicelow()
    {
        $forms = choice2::join('forms', 'forms.choice2_id', '=', 'choice2s.id')
            ->join('categories', 'categories.id', '=', 'choice2s.category_id')
            ->where('categories.catstatus', 'active')
            ->where('choice2s.position_type_id', 2)
            ->distinct('choice2s.id')
            ->get(['choice2s.id', 'choice2s.position', 'choice2s.jobcat2_id']);

     
        return view('secondchoicelow.pos', compact('forms'));
    }
    public function choiceDetaillow($id)
    {


        $pos_id = (int) $id;

        $hrs = Secondhr::join('forms', 'forms.id', '=', 'secondhrs.form_id')
            ->join('choice2s', 'choice2s.id', '=', 'forms.choice2_id')

            // ->where('status_hr', 1)
            ->where('choice2s.id', $pos_id)
            ->select('secondhrs.*')
            ->get();
        // dd($hrs);



        return view('secondchoicelow.index', compact('hrs'));
    }


    public function postwo()
    {

        $forms = choice2::join('forms', 'forms.choice2_id', '=', 'choice2s.id')
            ->join('categories', 'categories.id', '=', 'choice2s.category_id')
            ->where('categories.catstatus', 'active')
            ->where('choice2s.position_type_id', 1)
            ->distinct('choice2s.id')
            ->get(['choice2s.id', 'choice2s.position', 'choice2s.jobcat2_id', 'categories.category']);
            $hrs = HR::join('forms', 'forms.id', '=', 'h_r_s.form_id')
            ->join('positions', 'positions.id', '=', 'forms.position_id')
            

            ->select('h_r_s.*','forms.position_id as position_id')
            ->addSelect(DB::raw("'first_choice' as source"))
            ->where('positions.position_type_id', 2)


            ->get();
            $secondhrs = Secondhr::join('forms', 'forms.id', '=', 'secondhrs.form_id')
            ->join('choice2s', 'choice2s.id', '=', 'forms.choice2_id')
            

            ->select('secondhrs.*','forms.choice2_id as position_id')
            ->addSelect(DB::raw("'second_choice' as source"))
            ->where('choice2s.position_type_id', 2)

            ->get();
            
            $combinedData = $hrs->concat($secondhrs);
            // dd($combinedData);
            $groupedData = $combinedData->groupBy('position_id');
        return view('secondchoice.postwo', compact('groupedData'));
    }
    public function posDetailtwo($id)
    {


        $pos_id = (int) $id;

        $hrs = Secondhr::join('forms', 'forms.id', '=', 'secondhrs.form_id')
            ->join('choice2s', 'choice2s.id', '=', 'forms.choice2_id')

            // ->where('status_hr', 1)
            ->where('choice2s.id', $pos_id)
            ->select('secondhrs.*')
            ->get();



        return view('secondchoice.resulttwo', compact('hrs'));
    }





    public function createhr1($prod1_id)
    {
        $form = Form::findOrFail($prod1_id);
        $edu = Education::where('form_id', $form->id)->get();
        $forms = experience::where('form_id', $form->id)->get();


        if ($form->choice2->position_type_id == 1) {


            return view('secondchoice.evaluate', ['id' => $prod1_id, 'form' => $form, 'forms' => $forms, 'edu' => $edu]);
        } elseif ($form->choice2->position_type_id == 2) {


            return view('secondchoicelow.lowevaluation', ['id' => $prod1_id, 'form' => $form, 'forms' => $forms, 'edu' => $edu]);
        } else {
            return back();
        }
    }
    public function store(Request $request)
    {



        $res = new Secondhr;


        $res->performance = $request->Input('performance');
        $res->presidentGrade = $request->Input('presidentGrade');
        $res->user_id = auth()->user()->id;
        $res->experience = $request->Input('experience');
        $res->resultbased = $request->Input('resultbased');
        $res->exam = $request->Input('exam');
        if (($res->save() == true)) {
            // $resource->status_hr ->fill(1) ;
            // $res->status_hr = 1;
        }
        $res->save();






        if ($request->type == 'first') {
            return redirect('secondhr')->with('status', 'evaluation added successfully');
        } else if ($request->type == 'second') {
            return redirect('choiceDetaillow/' . $res->form->choice2->position_id);
        }
    }
    public function storeRestore1(Request $request, $prod1_id)
    {

        $prod1 = Form::findOrFail($prod1_id);



        $res = new Secondhr;


        $res->performance = $request->performance;
        $res->experience = $request->experience;
        $res->resultbased = $request->resultbased;
        $res->user_id = auth()->user()->id;
        $res->presidentGrade = $request->presidentGrade;
        $res->exam = $request->exam;
        $res->remark = $request->remark;
        // $resource->status_hr = $request->status_hr;
        $res->form_id = $prod1->id;
        // dd($resource->save());
        if (($res->save() == true)) {
            // $resource->status_hr ->fill(1) ;
            // $res->status_hr = 1;
            $prod1->secondhrs = 1;
        }
        $res->save();
        $prod1->save();


        // }
        if ($request->type == 'first') {
            return redirect('posDetail/' . $res->form->choice2_id)->with('status', 'evaluation added successfully');
            // return redirect('posDetail2/' . $res->form->choice2_id)->with('status', 'evaluation added successfully');
//
        } else if ($request->type == 'second') {
            return redirect('posDetail/' . $res->form->choice2_id)->with('status', 'evaluation added successfully');;
        }
    }
    public function edit($id)
    {

        $hr = Secondhr::find($id);
        $edu = Education::where('form_id', $hr->form->id)->get();

        $forms = experience::where('form_id', $hr->form->id)->get();
        if ($hr->form->choice2->position_type_id == 1) {
            return view('secondchoice.edit', ['hr' => $hr, 'forms' => $forms, 'edu' => $edu]);
        }
        if ($hr->form->choice2->position_type_id == 2) {
            return view('secondchoicelow.edit', ['hr' => $hr, 'forms' => $forms, 'edu' => $edu]);
        }
    }

    public function update(Request $request, $id)
    {
        $hr = Secondhr::find($id);


        $hr->performance = $request->Input('performance');
        $hr->experience = $request->Input('experience');
        $hr->resultbased = $request->Input('resultbased');
        $hr->exam = $request->Input('exam');
        $hr->remark = $request->Input('remark');
        $hr->user_id = auth()->user()->id;

        $hr->update();
        if ($request->type == 'first') {
            
            return redirect('positionDetailhigh/' . $hr->form->choice2_id)->with('status', 'evaluation edited successfully');

            // return redirect('posDetailtwo/' . $hr->form->choice2_id)->with('status', 'evaluation edited successfully');
        } else if ($request->type == 'second') {
            return redirect('positionDetail/' . $hr->form->choice2_id)->with('status', 'evaluation edited successfully');;
        }
    }
    public function update1(Request $request, $id)
    {
        $hr = Secondhr::find($id);


        $hr->status_hr = 1;

        $hr->submit = auth()->user()->name;
        $hr->update();


        return redirect()->back()->with('status', ' updated successfully');
    }
    public function update2(Request $request, $id)
    {
        $hr = Secondhr::find($id);


        $hr->status_hr = 1;
        $hr->submit = auth()->user()->name;

        $hr->update();


        return redirect()->back()->with('status', ' updated successfully');
    }
    public function destroy($id)
    {
        $form = Form::find($id);


        $form->delete();
        return back()->with('status', '  deleted successfully');
    }
}
