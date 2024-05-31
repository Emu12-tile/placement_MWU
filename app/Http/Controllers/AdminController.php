<?php

namespace App\Http\Controllers;

use App\Models\HR;
use App\Models\Form;
use App\Models\Admin;
use App\Models\choice2;
use App\Models\Position;
use App\Models\President;
use App\Models\Prestwo;
use App\Models\Secondhr;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function index()
    {

        // $forms = Form::where('isEditable', 1)->get();
        $forms = Form::where('isEditable', 1)->select('job_category_id', 'position_id', 'jobcat2_id', 'choice2_id', 'firstName', 'middleName', 'lastName', 'sex', 'positionofnow', 'level', 'fee')->get();

        return view('hr.table', compact('forms'));
    }
    public function posall()
    {
        $forms = Position::join('categories', 'categories.id', '=', 'positions.category_id')
            ->where('categories.catstatus', 'active')
            ->where('positions.position_type_id', 1)
            ->distinct('positions.id')
            ->get(['positions.id', 'positions.position', 'positions.job_category_id', 'categories.category']);
        // dd($forms);
        return view('homepage.allresult', compact('forms'));
    }
    public function posall2()
    {
      
        $form3 = Form::join('positions', 'positions.id', '=', 'forms.position_id')
            ->join('choice2s', 'choice2s.id', 'forms.choice2_id')
            ->where('choice2s.position_type_id', 1)
            ->where('positions.position_type_id', 1)
            ->where('forms.position_id', 'forms.choice2_id')->get();
        dd($form3);
        // $data = $forms->concat($form2);
        $positions = Position::join('forms', 'forms.position_id', '=', 'positions.id')
            ->join('categories', 'categories.id', '=', 'positions.category_id')
            ->where('categories.catstatus', 'active')
            ->where('positions.position_type_id', 1)
            ->where(function ($query) {
                $query->where('forms.position_id', '<>', null)
                    ->orWhere('forms.choice2_id', '<>', null);
            })
            ->distinct('positions.id')
            ->get(['positions.id', 'positions.position', 'positions.job_category_id', 'categories.category']);

        // $data = [];
        $data = new Collection();

        // foreach ($positions as $position) {
        //     $firstChoiceForms = Form::where('position_id', $position->id)
        //         ->whereNotNull('position_id')
        //         ->pluck('id')
        //         ->toArray();

        //     $secondChoiceForms = Form::where('choice2_id', $position->id)
        //         ->whereNotNull('choice2_id')
        //         ->pluck('id')
        //         ->toArray();

        //     $data[] = [
        //         'position' => $position->position,
        //         'firstChoice' => $firstChoiceForms,
        //         'secondChoice' => $secondChoiceForms,
        //     ];
        // }

        foreach ($positions as $position) {
            $firstChoiceForms = DB::table('forms')
                ->where('position_id', $position->id)
                ->whereNotNull('position_id')
                ->get();

            $secondChoiceForms = DB::table('forms')
                ->where('choice2_id', $position->id)
                ->whereNotNull('choice2_id')
                ->get();

            $data->push([
                'position' => $position->position,
                'firstChoice' => $firstChoiceForms,
                'secondChoice' => $secondChoiceForms,
            ]);
        }

        return response()->json($data);
        // return view('homepage.allresult', compact('data'));
    }
    public function detailall($id)
    {


        $pos_id = (int) $id;

        $hrs = President::join('h_r_s', 'h_r_s.id', '=', 'presidents.h_r__id')->join('forms', 'forms.id', '=', 'h_r_s.form_id')
            ->join('positions', 'positions.id', '=', 'forms.position_id')


            ->where('positions.id', $pos_id)
            // ->where('choice2s.id', $pos_id)
            ->select('presidents.*')

            ->get();
        $secondhrs = Prestwo::join('secondhrs', 'secondhrs.id', '=', 'prestwos.secondhr_id')->join('forms', 'forms.id', '=', 'secondhrs.form_id')
            // ->join('positions', 'positions.id', '=', 'forms.position_id')
            ->join('choice2s', 'choice2s.id', '=', 'forms.choice2_id')


            ->where('choice2s.id', $pos_id)
            // ->where('choice2s.id', $pos_id)
            ->select('prestwos.*')

            ->get();


        // dd($hrs, $secondhrs);

        return view('homepage.detailall', compact('hrs', 'secondhrs'));
    }
}
