<?php

namespace App\Http\Controllers;

use App\Models\HR;
use App\Models\Form;
use App\Models\Admin;
use App\Models\choice2;
use App\Models\Position;
use App\Models\Education;
use App\Models\Secondhr;
use App\Models\experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class ResourceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $hrs = HR::where('status_hr', 0)->get();
        return view('resource.index', compact('hrs'));
    }
    // public function index4()
    // {
    //     $hrs = HR::where('status_hr', 1)->get();
    //     return view('resource.result', compact('hrs'));
    // }

    public function poshigh()
    {
        $forms = Position::
            
            join('categories', 'categories.id', '=', 'positions.category_id')
            ->where('categories.catstatus', 'active')
            
            ->where('positions.position_type_id', 1)
            ->distinct('positions.id')

            ->get(['positions.id', 'positions.position', 'positions.job_category_id', 'categories.category','positions.position_type_id']);
        return view('resource.pos', compact('forms'));
    }
    public function posDetailhigh($id)
    {


        $pos_id = (int) $id;
        $forms = Position::
            
            join('categories', 'categories.id', '=', 'positions.category_id')
            ->where('categories.catstatus', 'active')
            
            ->where('positions.position_type_id', 1)
            ->distinct('positions.id')

            ->get(['positions.id', 'positions.position', 'positions.job_category_id', 'categories.category','positions.position_type_id']);

        $hrs = HR::join('forms', 'forms.id', '=', 'h_r_s.form_id')
            ->join('positions', 'positions.id', '=', 'forms.position_id')

            // ->where('status_hr', 1)
            ->where('positions.id', $pos_id)
            ->select('h_r_s.*')
            ->get();
            
            $secondhrs = Secondhr::join('forms', 'forms.id', '=', 'secondhrs.form_id')
            ->join('choice2s', 'choice2s.id', '=', 'forms.choice2_id')

            // ->where('status_hr', 1)
            ->where('choice2s.id', $pos_id)
            ->select('secondhrs.*')
            ->get();





        return view('resource.result', compact('hrs','secondhrs','forms'));
    }


    public function poslow()
    {
    

         $form=Form::join('positions','positions.id','forms.position_id')
                   ->join('choice2s','choice2s.id','forms.choice2_id')
                //    ->whereNotNull('forms.hrs')
                //    ->orWhereNotNull('forms.secondhrs')
                   ->where('positions.position_type_id', 2)
                   ->distinct('positions.id')
                   ->get();
                //    dd($form);
                   



        $forms = Position::
            // join('forms', 'forms.position_id', '=', 'positions.id')
                        //  ->join ('forms','forms.choice2_id','=','choice2s.id')
            join('categories', 'categories.id', '=', 'positions.category_id')
            ->where('categories.catstatus', 'active')
            // ->where('forms.pos',1)
            // ->whereNotNull('forms.hrs',)
            // ->orWhereNotNull('forms.secondhrs')
            ->where('positions.position_type_id', 2)
            ->distinct('positions.id')
            // ->get();
            ->get(['positions.id', 'positions.position', 'positions.job_category_id','position_type_id']);
       
                 

             return view('lowresource.pos', compact('forms'));
    }
    public function positionDetail($id)
    {
        $pos_id = (int) $id;
        $hrs = HR::join('forms', 'forms.id', '=', 'h_r_s.form_id')
            ->join('positions', 'positions.id', '=', 'forms.position_id')

            // ->where('status_hr', 1)
            ->where('positions.id', $pos_id)
            ->select('h_r_s.*')
            ->get();
            $secondhrs = Secondhr::join('forms', 'forms.id', '=', 'secondhrs.form_id')
            ->join('choice2s', 'choice2s.id', '=', 'forms.choice2_id')

            // ->where('status_hr', 1)
            ->where('choice2s.id', $pos_id)
            ->select('secondhrs.*')
            ->get();
        return view('lowresource.index', ['hrs' => $hrs,'secondhrs'=>$secondhrs]);
    }

    public function index2()
    {

        $hrs = HR::where('status_hr', 0)->get();




        return view('lowresource.lowresource', compact('hrs'));
    }
    public function index3()
    {

        $hrs = HR::where('status_hr', 1)->latest()->paginate(8);

        return view('lowresource.index', compact('hrs'));
    }




    public function createhr($prod_id)
    {
        // dd($prod_id);
        $form = Form::findOrFail($prod_id);

        $forms = experience::where('form_id', $form->id)->get();
        $edu = Education::where('form_id', $form->id)->get();


        if ($form->position->position_type_id == 1) {


            return view('resource.evaluate', ['id' => $prod_id, 'form' => $form, 'forms' => $forms, 'edu' => $edu]);
        } elseif ($form->position->position_type_id == 2) {


            return view('lowresource.lowEvaluation', ['id' => $prod_id, 'form' => $form, 'forms' => $forms, 'edu' => $edu]);
        } else {
            return back();
        }
    }
    public function store(Request $request)
    {


        $resource = new HR;


        $resource->performance = $request->Input('performance');
        $resource->presidentGrade = $request->Input('presidentGrade');
        $resource->user_id = auth()->user()->id;
        $resource->experience = $request->Input('experience');
        $resource->resultbased = $request->Input('resultbased');
        $resource->exam = $request->Input('exam');
        if (($resource->save() == true)) {
            // $resource->status_hr ->fill(1) ;
            // $resource->status_hr = 1;

        }
        $resource->save();







        if ($request->type == 'high') {
            return redirect('resource')->with('status', 'evaluation added successfully');
        } else if ($request->type == 'low') {
            return redirect('lowresource');
        }
    }
    public function storeRestore(Request $request, $prod_id)
    {

        $prod = Form::findOrFail($prod_id);



        $resource = new HR;


        $resource->performance = $request->performance;
        $resource->experience = $request->experience;
        $resource->resultbased = $request->resultbased;
        $resource->user_id = auth()->user()->id;
        $resource->presidentGrade = $request->presidentGrade;
        // $resource->remark=$request->remark;
        $resource->exam = $request->exam;
        $resource->remark = $request->remark;
        $resource->form_id = $prod->id;
        // dd($resource->save());
        if (($resource->save() == true)) {

            $prod->hrs = 1;
            // $prod->pos=1;
        }
        $resource->save();
        $prod->save();

        if ($request->type == 'high') {
            return redirect('posDetail/' . $resource->form->position_id)->with('status', 'evaluation added successfully');
        } else if ($request->type == 'low') {
            // return redirect('lowresource')->with('status', 'evaluation added successfully');;
            return redirect('posDetail/' . $resource->form->position_id)->with('status', 'evaluation added successfully');
        }
    }
    public function edit($id)
    {

        $hr = HR::find($id);
        $edu = Education::where('form_id', $hr->form->id)->get();

        $forms = experience::where('form_id', $hr->form->id)->get();
        if ($hr->form->position->position_type_id == 1) {
            return view('resource.edit', ['hr' => $hr, 'forms' => $forms, 'edu' => $edu]);
        }
        if ($hr->form->position->position_type_id == 2) {
            return view('lowresource.edit', ['hr' => $hr, 'forms' => $forms, 'edu' => $edu]);
        }
    }

    public function update(Request $request, $id)
    {
        $hr = HR::find($id);




        $hr->performance = $request->Input('performance');
        $hr->experience = $request->Input('experience');
        $hr->remark = $request->Input('remark');
        $hr->resultbased = $request->Input('resultbased');
        $hr->exam = $request->Input('exam');
        $hr->user_id = auth()->user()->id;

        $hr->update();
        if ($request->type == 'high') {
            return redirect('positionDetailhigh/' . $hr->form->position_id)->with('status', 'evaluation edited successfully');
        } else if ($request->type == 'low') {
            // return redirect('lowresource')->with('status', 'evaluation edited successfully');;
            return redirect('positionDetail/' . (int) $hr->form->position_id)->with('status', 'evaluation edited successfully');;
        }
    }
    public function update1(Request $request, $id)
    {
        $hr = HR::find($id);


        $hr->status_hr = 1;
        $hr->submit = auth()->user()->name;

        $hr->update();


        // return redirect('resource')->with('status', 'stock updated successfully');
        return redirect()->back()->with('status', 'stock updated successfully');
    }
    public function update2(Request $request, $id)
    {
        $hr = HR::find($id);


        $hr->status_hr = 1;
        $hr->submit = auth()->user()->name;

        $hr->update();




        return redirect()->back()->with('status', 'stock updated successfully');
    }

    public function pdf(Request $request)

    {
        // join('categories', 'categories.id', '=', 'positions.category_id') ->where('categories.catstatus', 'active')

        // $position = Position::select('position', 'id')
        //     ->join('categories', 'categories.id', '=', 'positions.category_id')
        //     ->where('categories.catstatus', '=', 'active')
        //     ->where('positions.job_category_id', $request->id)
        //     ->take(100)->get();

        $position = HR::find($request->id);



        return response()->json($position);
    }
}
