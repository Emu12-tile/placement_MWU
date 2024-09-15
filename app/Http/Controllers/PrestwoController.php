<?php

namespace App\Http\Controllers;

use App\Models\choice2;
use App\Models\Prestwo;
use App\Models\Secondhr;
use App\Models\Education;
use App\Models\experience;
use Illuminate\Http\Request;

class PrestwoController extends Controller
{
    public function index()
    {


        $pres = Prestwo::paginate(10);



        return view('prestwo.index', compact('pres'));
    }
    public function index2()
    {


        $pres = Prestwo::paginate(10);



        return view('prestwo.result', compact('pres'));
    }
    public function pos()
    {
        $forms = choice2::join('forms', 'forms.choice2_id', '=', 'choice2s.id')
            ->join('categories', 'categories.id', '=', 'choice2s.category_id')
            ->where('categories.catstatus', 'active')
            ->where('choice2s.position_type_id', 1)
            ->distinct('choice2s.id')
            ->get(['choice2s.id', 'choice2s.position', 'choice2s.jobcat2_id', 'categories.category']);

        return view('prestwo.pos', compact('forms'));
    }
    public function posDetailpres($id)
    {


        $pos_id = (int) $id;

        $pres = Prestwo::join('secondhrs', 'secondhrs.id', '=', 'prestwos.secondhr_id')
            ->join('forms', 'forms.id', '=', 'secondhrs.form_id')
            ->join('choice2s', 'choice2s.id', '=', 'forms.choice2_id')

            // ->where('status', 1)
            ->where('choice2s.id', $pos_id)
            ->select('prestwos.*')
            ->get();



        return view('prestwo.result', compact('pres'));
    }
    public function createpresident($prod_id)
    {

        $form = Secondhr::findOrFail($prod_id);
        $edu = Education::where('form_id', $form->form_id)->get();

        $forms = experience::where('form_id', $form->form_id)->get();

        return view('prestwo.evaluate', ['id' => $prod_id, 'form' => $form, 'forms' => $forms, 'edu' => $edu]);
    }

    public function storeRestore(Request $request, $prod_id)
    {

        $prod = Secondhr::findOrFail($prod_id);

        // dd($prod);

        $resource = new Prestwo;


        $resource->submit = auth()->user()->name;
        $resource->presidentGrade = $request->presidentGrade;
        $resource->remark = $request->remark;
        $resource->secondhr_id = $prod->id;


        // $prod->save();
        if ($resource->save()) {
            $prod->status_president = 1;
        }
        $resource->save();
        $prod->save();



        return redirect('positionDetailhigh/' . $resource->secondhr->form->choice2_id)->with('status', 'evaluation added successfully');
    }
    public function edit($id)
    {


        $pres = Prestwo::find($id);
        $edu = Education::where('form_id', $pres->secondhr->form->id)->get();

        $forms = experience::where('form_id', $pres->secondhr->form->id)->get();


        return view('prestwo.edit', ['pres' => $pres, 'edu' => $edu, 'forms' => $forms]);
    }

    public function update(Request $request, $id)
    {
        $hr = Prestwo::find($id);

        $hr->submit = auth()->user()->name;



        $hr->presidentGrade = $request->Input('presidentGrade');
        $hr->remark = $request->Input('remark');


        $hr->update();

        return redirect('posDetailpres/' . $hr->secondhr->form->choice2_id)->with('status', ' updated successfully');
    }
    public function update1(Request $request, $id)
    {
        $hr = Prestwo::find($id);




        $hr->submittedBy = auth()->user()->name;
        $hr->status = 1;

        $hr->update();


        return redirect()->back()->with('status', 'stock updated successfully');
    }
}
