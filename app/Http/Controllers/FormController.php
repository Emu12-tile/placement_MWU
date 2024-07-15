<?php

namespace App\Http\Controllers;

use App\Models\HR;
use Carbon\Carbon;
use App\Models\Form;
use App\Models\Admin;
use App\Models\Level;

use App\Models\choice2;
use App\Models\Secondhr;

use App\Models\jobcat2;
use App\Models\EduLevel;
use App\Models\Position;
use App\Models\Education;
use App\Models\experience;
use App\Models\JobCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spipu\Html2Pdf\Html2Pdf;
use App\Models\EducationType;
use App\Models\EmployerSupport;
use App\Models\Morerole;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class FormController extends Controller
{


    // public function index()
    // {
    //     $forms = null;
    //     $searchValue = request()->input('search');

    //     if ($searchValue) {
    //         $searchWords = explode(' ', $searchValue);

    //         $forms = Form::where('hrs', null)
    //             ->where(function ($query) use ($searchWords) {
    //                 foreach ($searchWords as $word) {
    //                     $query->where(function ($innerQuery) use ($word) {
    //                         $innerQuery->where('firstName', 'like', '%' . $word . '%')
    //                             ->orWhere('middleName', 'like', '%' . $word . '%')
    //                             ->orWhere('lastName', 'like', '%' . $word . '%');
    //                     });
    //                 }
    //             })
    //             ->select('firstName', 'middleName', 'lastName', 'id', 'job_category_id', 'jobcat2_id', 'position_id', 'choice2_id',  'isEditable')
    //             ->paginate(10);
    //     } else {
    //         $searchValue = null;
    //         // Only fetch all data when there's no search value
    //         $forms = Form::where('hrs', null)
    //             ->select('firstName', 'middleName', 'lastName', 'id', 'job_category_id', 'jobcat2_id', 'position_id', 'choice2_id',  'isEditable')
    //             ->paginate(10);
    //     }

    //     return view('hr.index', [
    //         'forms' => $forms,
    //         'searchValue' => $searchValue,
    //     ]);
    // }
    public function index()
    {
        $forms = Form::where('hrs', null)->select('firstName', 'middleName', 'lastName', 'id', 'job_category_id', 'jobcat2_id', 'position_id', 'choice2_id', 'isEditable', 'submit')->get();
        return view('hr.index', ['forms' => $forms]);
    }
    public function form()
    {

        $forms = Form::all()->where('hrs', null);


        return view('hr.form', compact('forms'));
    }

    public function posDetail($id)
    {


        $pos_id = (int) $id;

        $forms = Form::join('positions', 'positions.id', '=', 'forms.position_id')
            ->join('categories', 'categories.id', '=', 'positions.category_id')
            ->where('categories.catstatus', 'active')
            ->where('hrs', null)
            ->where('positions.id', $pos_id)
            ->select('forms.*', 'positions.position')
            ->get();
            $forms2 = Form::join(
                'choice2s',
                'choice2s.id',
                '=',
                'forms.choice2_id'
            )
                ->join(
                    'categories',
                    'categories.id',
                    '=',
                    'choice2s.category_id'
                )
                ->where('categories.catstatus', 'active')
                ->where('secondhrs', null)
                ->where('choice2s.id', $pos_id)
                ->select('forms.*')
                ->get();
    

        return view('hr.index', compact('forms','forms2'));
    }
    public function pos()
    {
        $forms = Position::
            // join('forms', 'forms.position_id', '=', 'positions.id')
            join('categories', 'categories.id', '=', 'positions.category_id')
            ->where('categories.catstatus', 'active')
            // ->where('forms.hrs',NULL)
            ->distinct('positions.id')
            ->get(['positions.id', 'positions.position', 'positions.job_category_id','categories.category']);


        // $form->category->category=='general'

        return view('hr.pos', compact('forms'));
    }
    public function posDetail2($id)
    {
        $pos_id = (int) $id;
        $forms = Form::join(
            'choice2s',
            'choice2s.id',
            '=',
            'forms.choice2_id'
        )
            ->join(
                'categories',
                'categories.id',
                '=',
                'choice2s.category_id'
            )
            ->where('categories.catstatus', 'active')
            ->where('secondhrs', null)
            ->where('choice2s.id', $pos_id)
            ->select('forms.*')
            ->get();


        return view('secondchoice.secondchoice', compact('forms'));
    }
    public function pos2()
    {
        $positions=Position:: join('categories', 'categories.id', '=', 'positions.category_id')
        ->where('categories.catstatus', 'active')
        
        ->where('positions.position_type_id', 1)
        ->distinct('positions.id')
        ->get();
        $hrs = HR::join('forms', 'forms.id', '=', 'h_r_s.form_id')
            ->join('positions', 'positions.id', '=', 'forms.position_id')

            ->select('h_r_s.*','forms.position_id as position_id')
            ->addSelect(DB::raw("'first_choice' as source"))
            ->where('positions.position_type_id', 1)
            ->get();
            $secondhrs = Secondhr::join('forms', 'forms.id', '=', 'secondhrs.form_id')
            ->join('choice2s', 'choice2s.id', '=', 'forms.choice2_id')
            

            ->select('secondhrs.*','forms.choice2_id as position_id')
            ->addSelect(DB::raw("'second_choice' as source"))
            ->where('choice2s.position_type_id', 1)

            ->get();
            
            $combinedData = $hrs->concat($secondhrs);
            // dd($combinedData);
            $groupedData = $combinedData->groupBy('position_id');

          
        return view('secondchoice.pos', compact('groupedData','positions'));
    }


    public function create()
    {
        $level = Level::all();
        $form = Form::all();
        $edu_level = EduLevel::all();
        $job_category = JobCategory::all();
        $position = Position::join('categories', 'categories.id', '=', 'positions.category_id')
            ->where('categories.catstatus', 'active')->get();
        $jobcat2 = jobcat2::all();
        $edutype = EducationType::all();
        return view('try', compact('level', 'edu_level', 'job_category', 'position', 'jobcat2', 'edutype', 'form'));
    }
    public function createforms()
    {
        $forms = Form::where('hrs', null)->select('firstName', 'middleName', 'lastName', 'id', 'job_category_id', 'jobcat2_id', 'position_id', 'choice2_id', 'isEditable')->get();
        //   dd($forms);

        return view('hr.index', ['forms' => $forms]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'middleName' => 'required',
            'lastName' => 'required',
            'sex' => 'required',
            'email' => ['required', 'string', 'email', 'max:255',  'regex:/(.*)@mwu.edu.et/i'],
            'phone' => 'required|numeric|digits:10',
            'fee' => 'required',
            'position_id' => 'required',
            'job_category_id' => 'required',
            'jobcat2_id' => 'required',
            'level_id' => 'required',
            'position_id' => 'required',
            'choice2_id' => 'required',
            'positionofnow' => 'required',
            'choice2_id' => 'required',
            // 'addMoreFields.*.level' => 'required',
            // 'addMoreFields.*.discpline' => 'required',
            // 'addMoreFields.*.level' => 'required',
            // 'addMoreFields.*.completion_date' => 'required',

            'addMoreInputFields.*.startingDate' => 'date|nullable',
            'addMoreInputFields.*.endingDate' => 'date|after:starting_date|nullable',
            'addMoreInputFields.*.positionyouworked' => 'nullable',
            'UniversityHiringEra' => 'required',
            'servicPeriodAtUniversity' => 'required',
            'servicPeriodAtAnotherPlace' => 'required',
            'serviceBeforeDiplo' => 'required',
            'serviceAfterDiplo' => 'required',
            'resultOfrecentPerform' => 'required', 'regex:/^(?:d*.d{1,2}|d+)$/', 'min:1', 'max:100',
            'DisciplineFlaw' => 'required',
            'MoreRoles' => 'required',

        ]);

        $previousforms = Form::select('categories.id')
            ->join('positions', 'positions.id', '=', 'forms.position_id')
            ->join('categories', 'categories.id', '=', 'positions.category_id')

            ->where('email', $request->email)

            ->get();


        $category = Position::select('categories.id')->join('categories', 'category_id', 'categories.id')->where('positions.id', $request->position_id)->first();

        foreach ($previousforms as $form) {
            if ($form->id == $category->id) {
                return  redirect()->back()->withErrors(['custom_email_error' => ' በዚህ ስራ መደብ መወዳደር አይችሉም'])->withInput();
            }
        }
        $form =
            Form::create(
                [
                    'firstName' => $request->firstName,
                    'middleName' => $request->middleName,
                    'lastName' => $request->lastName,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'level_id' => $request->level_id,
                    'position_id' => $request->position_id,
                    'choice2_id' => $request->choice2_id,
                    'job_category_id' => $request->job_category_id,
                    'jobcat2_id' => $request->jobcat2_id,
                    'positionofnow' => $request->positionofnow,
                    // 'firstdergee' => $request->firstdergee,
                    'sex' => $request->sex,
                    'fee' => $request->fee,
                    "UniversityHiringEra" => $request->UniversityHiringEra,
                    "servicPeriodAtUniversity" => $request->servicPeriodAtUniversity,
                    "servicPeriodAtAnotherPlace" => $request->servicPeriodAtAnotherPlace,
                    "serviceBeforeDiplo" => $request->serviceBeforeDiplo,
                    "serviceAfterDiplo" => $request->serviceAfterDiplo,
                    "resultOfrecentPerform" => $request->resultOfrecentPerform,
                    "DisciplineFlaw" => $request->DisciplineFlaw,
                    "MoreRoles" => $request->MoreRoles,
                ]
            );


        foreach ($request->addMoreFields as $key => $val) {

            Education::create([

                "form_id" => $form->id,
                "discipline" => $val["discipline"],
                "level" => $val["level"],
                "completion_date" => $val["completion_date"],

            ]);
        }
        foreach ($request->addMoreInputFields as $key => $value) {
            experience::create([
                "form_id" => $form->id,
                "positionyouworked" => $value["positionyouworked"],
                "startingDate" => $value["startingDate"],
                "endingDate" => $value["endingDate"],
            ]);
        }


        return redirect('/submitted/' . $form->id);
    }

    public function show($id)
    {

        $form = Form::find($id); //
        // $fo = Form::all();


        $job_category = JobCategory::all();

        $position = Position::join('categories', 'categories.id', '=', 'positions.category_id')
            ->where('categories.catstatus', 'active')->get();

        $choice2 = choice2::join('categories', 'categories.id', '=', 'choice2s.jobcat2_id')
            ->where('categories.catstatus', 'active')->get();
        $jobcat2 = jobcat2::all();
        $edu = Education::where('form_id', $form->id)->get();
        $exper = experience::where('form_id', $form->id)->get();
        $forms = Form::select("*", DB::raw("CONCAT(forms.firstName,' ',forms.middleName,' ',forms.lastName) as full_name"))
            ->get();
        if ($form->isEditable == 0) {
            return view('hr.show', ['form' => $form, 'job_category' => $job_category, 'choice2' => $choice2, 'position' => $position, 'jobcat2' => $jobcat2, 'forms' => $forms,  'edu' => $edu, 'exper' => $exper]);
        } else {
            abort(404, 'Sorry, the page you are looking for could not be found.');
            // return ('doesnot exist');
        }
    }
    public function formedit($id)
    {
        $form = Form::find($id)->where('hrs', null);
        return view('hr.editEducation', ['form' => $form]);
    }
    public function updateform(Request $request, $id)
    {
        $form = Form::find($id);
        $request->validate([

            'addMoreInputFields.*.startingDate' => 'date|nullable',
            'addMoreInputFields.*.endingDate' => 'date|after:starting_date|nullable',
        ]);
        $form->choice2_id = $request->choice2_id;
        $form->position_id = $request->position_id;
        $form->job_category_id = $request->job_category_id;
        $form->jobcat2_id = $request->jobcat2_id;
        $form->firstName = $request->Input('firstName');
        $form->middleName = $request->Input('middleName');
        $form->lastName = $request->Input('lastName');
        $form->resultOfrecentPerform = $request->Input('resultOfrecentPerform');
        $form->DisciplineFlaw = $request->Input('DisciplineFlaw');
        $form->DisciplineFlawDate = $request->Input('DisciplineFlawDate');
        $form->level = $request->Input('level');
        $form->UniversityHiringEra = $request->Input('UniversityHiringEra');
        $form->servicPeriodAtUniversity = $request->Input('servicPeriodAtUniversity');
        $form->employer_support = $request->Input('employer_support');
        $form->serviceBeforeDiplo = $request->Input('serviceBeforeDiplo');
        $form->serviceAfterDiplo = $request->Input('serviceAfterDiplo');
        $form->employee_situation = $request->Input('employee_situation');
        $form->sex = $request->Input('sex');
        $form->email = $request->Input('email');
        $form->phone = $request->Input('phone');
        $form->positionofnow = $request->Input('positionofnow');
        $form->jobcat = $request->Input('jobcat');
        foreach ($request->MoreFields as $key => $value) {
            if (
                isset($value['level']) &&
                isset(
                    $value['discipline']
                ) &&
                isset(
                    $value['academicPreparationCOC']
                )
                &&
                isset($value['completion_date'])
            ) {
                Education::create([
                    'form_id' => $form->id,
                    'level' => $value['level'],
                    'discipline' => $value['discipline'],
                    'academicPreparationCOC' => $value['academicPreparationCOC'],
                    'completion_date' => $value['completion_date'],
                ]);
            }
        }


        $field = $request->input('addMoreFields');
        foreach ($form->education as $education) {
            foreach ($field as $key => $value) {
                if ($value['id'] == $education->id) {
                    $education = Education::findOrFail($education->id);
                    $education->level = $value['level'];
                    $education->discipline = $value['discipline'];
                    $education->academicPreparationCOC = $value['academicPreparationCOC'];
                    $education->completion_date = $value['completion_date'];
                    // dd($experience);
                    $education->update();
                }
            }
        }
        $inputFields = $request->input('addMoreInputFields');
        // dd($inputFields);
        foreach ($request->addFields as $key => $value) {
            // Check if the required fields have values
            if (
                isset($value['positionyouworked']) &&
                isset($value['startingDate']) &&
                isset($value['endingDate'])
            ) {
                Experience::create([
                    'form_id' => $form->id,
                    'positionyouworked' => $value['positionyouworked'],
                    'startingDate' => $value['startingDate'],
                    'endingDate' => $value['endingDate'],
                ]);
            }
        }

        foreach ($form->experiences as $experience) {
            foreach ($inputFields as $key => $value) {
                if ($value['id'] == $experience->id) {
                    $experience = Experience::findOrFail($experience->id);
                    $experience->positionyouworked = $value['positionyouworked'];
                    $experience->startingDate = $value['startingDate'];
                    $experience->endingDate = $value['endingDate'];
                    $experience->update();
                }
            }
        }
        // more roles

        foreach ($request->addMoreroleFields as $key => $value) {
            // Check if the required fields have values
            if (
                isset($value['more_role'])
            ) {
                Morerole::create([
                    'form_id' => $form->id,
                    'more_role' => $value['more_role'],
                ]);
            }
        }

        $inputMoreroleFields = $request->input('addMoreInputRoles');
        foreach ($form->moreroles as $morerole) {
            if (!empty($inputMoreroleFields)) {
                foreach ($inputMoreroleFields as $key => $value) {
                    if ($value['id'] == $morerole->id) {
                        $morerole = Morerole::findOrFail($morerole->id);
                        $morerole->more_role = $value['more_role'];
                        $morerole->update();
                    }
                }
            }
        }



        $form->update();
        return redirect('hr');
    }
    public function position(Request $request)
    {

        $position = Position::select('position', 'positions.id')
            ->join('categories', 'categories.id', '=', 'positions.category_id')
            ->where('categories.catstatus', '=', 'active')
            ->where('positions.job_category_id', $request->id)
            ->take(100)->get();


        return response()->json($position);
    }
    public function position2(Request $request)
    {

        $position2 = choice2::select('position', 'choice2s.id')
            ->join('categories', 'categories.id', '=', 'choice2s.category_id')
            ->where('categories.catstatus', '=', 'active')
            ->where('choice2s.jobcat2_id', $request->id)
            ->take(100)->get();

        return response()->json($position2);
    }

    public function selection(Request $request)
    {

        $selected = Position::all()->where("id", $request->id)->first();


        return response()->json($selected);
    }
    public function selection2(Request $request)
    {
        $selected = choice2::all()->where("id", $request->id)->first();


        return response()->json($selected);
    }

    public function update(Request $request, $id)
    {
        $hr = Form::find($id);


        //  dd($hr);


        $hr->isEditable = 1;
        $hr->submit = auth()->user()->name;

        $hr->update();
        // dd($hr);

        return back()->with('status', 'approved  successfully');
    }
    public function returnApplicant(Request $request, $id)
    {
        $hr = Form::find($id);
        $hr->isEditable = 0;
        // $hr->submit = auth()->user()->name;

        $hr->update();


        // return redirect('resource')->with('status', 'stock updated successfully');
        return redirect()->back()->with('status', ' updated successfully');
    }






    public function destroy($id)
    {
        $form = Form::find($id);


        $form->delete();
        return back()->with('status', '  deleted successfully');
    }
}
