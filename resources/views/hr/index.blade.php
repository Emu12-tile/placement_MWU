@extends('layouts.admin')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @role('admin')
        <div class="container">

            <section class="hk-sec-wrapper mt-100">
                <div class="pull-right hk-sec-title">
                    {{-- <a href="{{ url('pos') }}" class="btn btn-dark mr-25"> back </a> --}}

                </div>
                <h5 class="hk-sec-title">የአመልካቾች ዝርዝር</h5>


                <div class="row" id="search_list">
                    <div class="col-sm">
                        <div class="table-wrap">
                            {{-- <div class="float-right mb-3">
                                <form action="{{ route('hr.index') }}" method="GET" class="form-inline">
                                    <div class="input-group">
                                        <input type="text" name="search" placeholder="በስም ይፈልጉ" class="form-control"
                                            value="{{ $searchValue }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}

                            <table id="datable_1" class="table table-hover  table-bordered w-100  pb-30">
                                <thead>
                                    <tr>
                                        <th>ተቁ</th>
                                        <th>ሙሉ ስም</th>
                                        @role('admin')
                                            <th>የስራ ክፍል/የስራ መደብ(1ኛ ምርጫ)</th>
                                            <th>የስራ ክፍል/የስራ መደብ(2ኛ ምርጫ)</th>

                                            <th> action</th>


                                            <th>Submit</th>
                                            <th>pdf</th>
                                        @endrole


                                        {{-- <th>የሚወዳደሩበት የስራ መደብ</th> --}}




                                        @role('hr')
                                            {{-- <th> አሁን ያሉበት የትምህርት ደረጃና የትምህርት ዝግጅት</th> --}}
                                            <th>Submittedby HR</th>


                                            <th>የሰው ኃይል ግምገማ</th>
                                        @endrole





                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $j = 0;
                                    ?>
                                    @foreach ($forms as $i => $form)
                                        @role('admin')
                                            @if ($form->isEditable == 0)
                                                <tr>
                                                    <td>{{ ++$j }}</td>
                                                    <td>



                                                        {{ $form->full_name }}



                                                    </td>



                                                    <td>{{ $form->job_category->job_category ?? 'to be selected' }}\
                                                        {{ $form->position->position ?? 'to be selected' }}</td>
                                                    <td>{{ $form->jobcat2->job_category ?? 'to be selected' }}\
                                                        {{ $form->choice2->position ?? 'to be selected' }}
                                                    </td>



                                                    <td><a class="btn  bg-blue-dark-4 text-white btn-sm" type="submit"
                                                            id="btn-evaluate" href="{{ route('hr.show', $form->id) }}">Edit</a>
                                                    </td>

                                                    <td> <button type="button" class="btn bg-green-dark-4 text-white btn-sm"
                                                            data-toggle="modal" data-target="#id1_{{ $i }}">
                                                            Submit
                                                        </button>


                                                        <div class="modal fade" id="id1_{{ $i }}" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Submission</h5>
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Are you sure do you want to submit
                                                                            {{ $form->full_name }}?

                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <form action="{{ route('hr.update', $form->id) }}"
                                                                            method="POST" enctype="multipart/form-data">
                                                                            @csrf

                                                                            @method('PUT')
                                                                            <button type="submit" class="btn btn-green">
                                                                                Yes</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><a class="btn  bg-red-dark-4 text-white btn-sm" type="submit"
                                                            id="btn-evaluate" href="{{ route('export_pdf', $form->id) }}">pdf</a>
                                                    </td>










                                                </tr>
                                            @endif
                                        @endrole
                                        @role('hr|user')
                                            @if ($form->isEditable == 1)
                                                <tr>
                                                    <td>{{ ++$j }}</td>
                                                    <td>

                                                        <button type="button" class="btn btn-primary " data-toggle="modal"
                                                            data-target="#id_{{ $i }}">
                                                            {{ $form->full_name }}</button>
                                                        <div class="modal fade" id="id_{{ $i }}" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLongTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                                                            የተወዳዳሪው ሙሉ መረጃ</h5>
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form>




                                                                            <div class="form-group row">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-2 col-form-label">ሙሉ ስም</label>


                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        value="{{ $form->full_name }}"
                                                                                        name="full_name"class="form-control"
                                                                                        id="inputname" placeholder=" firstName"
                                                                                        readonly>
                                                                                </div>

                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="inputname"
                                                                                    class="col-sm-2 col-form-label">ጾታ</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        value="{{ $form->sex }}"
                                                                                        name="sex"class="form-control "
                                                                                        id="inputEmail3" readonly>
                                                                                </div>
                                                                            </div>



                                                                            <div class="form-group row">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-2 col-form-label">ኢሜይል</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="email"
                                                                                        value="{{ $form->email }}"
                                                                                        name="email"class="form-control"
                                                                                        id="inputname" placeholder="email" readonly>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-2 col-form-label">ስልክ
                                                                                    ቁጥር</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        value="{{ $form->phone }}"
                                                                                        name="phone"class="form-control"
                                                                                        id="inputname" placeholder="phone"
                                                                                        readonly>
                                                                                </div>
                                                                            </div>



                                                                            <div class="form-group row">
                                                                                <label for="inputname"
                                                                                    class="col-sm-2 col-form-label">አሁን ያሉበት የስራ
                                                                                    መደብ</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        value="{{ $form->positionofnow }}"
                                                                                        name="positionofnow"class="form-control "
                                                                                        id="inputEmail3" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="inputname"
                                                                                    class="col-sm-2 col-form-label">ደረጃ</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        value="{{ $form->level }}"
                                                                                        name="level"class="form-control "
                                                                                        id="inputEmail3" readonly>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="fee"
                                                                                    class="col-sm-2 col-form-label">ደምወዝ</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        value="{{ $form->fee }}"
                                                                                        name="fee"class="form-control "
                                                                                        id="fee" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <h4 class="text-white text-center mt-50 mb-4"
                                                                                style=" background-color:rgb(17,40,77)">
                                                                                የትምህርት
                                                                                ደረጃና የትምህርት ዝግጅት በቅድመ ተከተል</h4>
                                                                            <div class="form-group  mb-100">

                                                                                <label for="inputname"></label>


                                                                                @foreach ($form->education as $fo)
                                                                                    <input type="text"
                                                                                        value="[{{ $fo->level }} , {{ $fo->discipline }}, {{ $fo->completion_date }}]"
                                                                                        name="education_level"class="form-control "
                                                                                        id="inputEmail3" readonly>
                                                                                @endforeach


                                                                            </div>
                                                                            <h4 class="text-white  text-center mt-3 mb-4 "
                                                                                style=" background-color:rgb(17,40,77)">
                                                                                የ
                                                                                መወዳደርያ የስራ ክፍልና የስራ መደብ</h4>
                                                                            <button
                                                                                class="text-white text-left mt-3 mb-4 mr-150 text-left"style=" background-color:rgb(17,40,77)">
                                                                                ምርጫ 1</button>
                                                                            <div class="form-group row">
                                                                                <label for="inputname"
                                                                                    class="col-sm-2 col-form-label">የስራ ክፍሉ</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        value="{{ $form->job_category->job_category }}"
                                                                                        name="job_category"class="form-control "
                                                                                        id="inputEmail3" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="position"
                                                                                    class="col-sm-2 col-form-label">የስራ መደብ</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        value="{{ $form->position }}"
                                                                                        name="position"class="form-control "
                                                                                        id="position" readonly>
                                                                                </div>
                                                                            </div>

                                                                            <button
                                                                                class="text-white text-left mt-3 mb-4 mr-150 text-left"
                                                                                style=" background-color:rgb(17,40,77)"> ምርጫ
                                                                                2</button>
                                                                            <div class="form-group row">
                                                                                <label for="inputname"
                                                                                    class="col-sm-2 col-form-label">የስራ ክፍሉ</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        value="{{ $form->jobcat2->job_category }}"
                                                                                        name="job_category"class="form-control "
                                                                                        id="job_category" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row mb-25">
                                                                                <label for="position"
                                                                                    class="col-sm-2 col-form-label">የስራ መደብ</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        value="{{ $form->choice2->position }}"
                                                                                        name="position"class="form-control "
                                                                                        id="position" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group  mt-100">
                                                                                <label for="UniversityHiringEra">በዩኒቨርስቲዉ የቅጥር ዘመን
                                                                                    በኢትዮጵያ
                                                                                </label>

                                                                                <input type="text"
                                                                                    value="{{ $form->UniversityHiringEra }}"
                                                                                    name="UniversityHiringEra"class="form-control "
                                                                                    id="UniversityHiringEra" readonly>

                                                                            </div>
                                                                            <div class="form-group  ">
                                                                                <label for="UniversityHiringEra">በዩኒቨርስቲዉ አገልግሎት
                                                                                    ዘመን
                                                                                    (በዓመት,የስራ
                                                                                    መደብ)
                                                                                </label>

                                                                                <input type="text"
                                                                                    value="{{ $form->servicPeriodAtUniversity }}"
                                                                                    name="servicPeriodAtUniversity"class="form-control "
                                                                                    id="servicPeriodAtUniversity" readonly>

                                                                            </div>
                                                                            <div class="form-group  ">
                                                                                <label for="UniversityHiringEra">በሌላ መስርያ ቤት አገልግሎት
                                                                                    ዘመን(በዓመት,የስራ
                                                                                    መደብ)
                                                                                </label>

                                                                                <input type="text"
                                                                                    value="{{ $form->servicPeriodAtAnotherPlace }}"
                                                                                    name="servicPeriodAtAnotherPlace"class="form-control "
                                                                                    id="servicPeriodAtAnotherPlace" readonly>

                                                                            </div>
                                                                            <div class="form-group  ">
                                                                                <label for="servicPeriodAtAnotherPlace">አገልግሎት
                                                                                    ከዲፕሎማ
                                                                                    በፊት(በዓመት,የስራ መደብ)
                                                                                </label>

                                                                                <input type="text"
                                                                                    value="{{ $form->serviceBeforeDiplo }}"
                                                                                    name="serviceBeforeDiplo"class="form-control "
                                                                                    id="serviceBeforeDiplo" readonly>

                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <label for="UniversityHiringEra"> አገልግሎት ከዲፕሎማ/ዲግሪ
                                                                                    በኋላ(በዓመት, የስራ መደብ)
                                                                                </label>

                                                                                <input type="text"
                                                                                    value="{{ $form->serviceAfterDiplo }}"
                                                                                    name="serviceAfterDiplo"class="form-control "
                                                                                    id="serviceAfterDiplo" readonly>

                                                                            </div>
                                                                            <div class="form-group  ">
                                                                                <label for="resultOfrecentPerform"> የሁለት ተከታታይ የቅርብ
                                                                                    ጊዜ
                                                                                    የሥራ
                                                                                    አፈጻፀም አማካይ
                                                                                    ውጤት(ከ100 በቁጥር)
                                                                                </label>

                                                                                <input type="text"
                                                                                    value="{{ $form->resultOfrecentPerform }}"
                                                                                    name="resultOfrecentPerform"class="form-control "
                                                                                    id="resultOfrecentPerform" readonly>

                                                                            </div>
                                                                            <div class="form-group  ">
                                                                                <label for="DisciplineFlaw"> የዲስፕሊን ጉድለት
                                                                                </label>

                                                                                <input type="text"
                                                                                    value="{{ $form->DisciplineFlaw }}"
                                                                                    name="DisciplineFlaw"class="form-control "
                                                                                    id="DisciplineFlaw" readonly>

                                                                            </div>
                                                                            <div class="form-group  ">
                                                                                <label for="MoreRoles">ተጨማሪ የሥራ ድርሻ
                                                                                </label>

                                                                                <input type="text"
                                                                                    value="{{ $form->MoreRoles }}"
                                                                                    name="MoreRoles"class="form-control "
                                                                                    id="MoreRoles" readonly>

                                                                            </div>




                                                                            <h4 class="text-white text-center mt-50 mb-4"
                                                                                style=" background-color:rgb(17,40,77)">
                                                                                የስራ
                                                                                ልምድ</h4>

                                                                            <div class="form-group ">
                                                                                <label for="inputEmail3"></label>


                                                                                @foreach ($form->experiences as $ex)
                                                                                    <input type="text"
                                                                                        value="[{{ $ex->startingDate }} እስከ {{ $ex->endingDate }} በ {{ $ex->positionyouworked }}], "
                                                                                        name="" class="form-control"
                                                                                        id="inputname" placeholder="" readonly>
                                                                                @endforeach


                                                                            </div>

                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>


                                                                    </div>



                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>



                                                    <td>{{ $form->submit }}</td>

                                                    <td> <a class="btn  btn-dark " type="submit" id="btn-evaluate"
                                                            href="{{ route('addHr', $form->id) }}">
                                                            evaluate</a>
                                                    </td>





                                                </tr>
                                            @endif
                                        @endrole
                                    @endforeach

                                </tbody>
                            </table>


                            {{-- {{ $forms->links() }} --}}
                        </div>
                    </div>
                </div>
            </section>





        </div>
    @endrole
    @role('hr')
        <div class="container">

            <section class="hk-sec-wrapper mt-100">
                <div class="pull-right hk-sec-title">
                    {{-- <a href="{{ url('pos') }}" class="btn btn-dark mr-25"> back </a> --}}

                </div>
                <h5 class="hk-sec-title">የአመልካቾች ዝርዝር</h5>


                <div class="row" id="search_list">
                    <div class="col-sm">
                        <div class="table-wrap">


                            <table id="datable_1" class="table table-hover  table-bordered w-100  pb-30">
                                <thead>
                                    <tr>
                                        <th>ተቁ</th>
                                        <th>ሙሉ ስም</th>



                                        {{-- <th>የሚወዳደሩበት የስራ መደብ</th> --}}





                                        <th>Submittedby HR</th>


                                        <th>የሰው ኃይል ግምገማ</th>






                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $j = 0;
                                    ?>
                                    @foreach ($forms as $i => $form)
                                        @if ($form->isEditable == 1)
                                            <tr>
                                                <td>{{ ++$j }}</td>
                                                <td>

                                                    <button type="button" class="btn btn-primary " data-toggle="modal"
                                                        data-target="#id_{{ $i }}">
                                                        {{ $form->full_name }}</button>
                                                    <div class="modal fade" id="id_{{ $i }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLongTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                        የተወዳዳሪው ሙሉ መረጃ</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form>




                                                                        <div class="form-group row">
                                                                            <label for="inputEmail3"
                                                                                class="col-sm-2 col-form-label">ሙሉ ስም</label>


                                                                            <div class="col-sm-10">
                                                                                <input type="text"
                                                                                    value="{{ $form->full_name }}"
                                                                                    name="full_name"class="form-control"
                                                                                    id="inputname" placeholder=" firstName"
                                                                                    readonly>
                                                                            </div>

                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="inputname"
                                                                                class="col-sm-2 col-form-label">ጾታ</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text"
                                                                                    value="{{ $form->sex }}"
                                                                                    name="sex"class="form-control "
                                                                                    id="inputEmail3" readonly>
                                                                            </div>
                                                                        </div>



                                                                        <div class="form-group row">
                                                                            <label for="inputEmail3"
                                                                                class="col-sm-2 col-form-label">ኢሜይል</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="email"
                                                                                    value="{{ $form->email }}"
                                                                                    name="email"class="form-control"
                                                                                    id="inputname" placeholder="email"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="inputEmail3"
                                                                                class="col-sm-2 col-form-label">ስልክ
                                                                                ቁጥር</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text"
                                                                                    value="{{ $form->phone }}"
                                                                                    name="phone"class="form-control"
                                                                                    id="inputname" placeholder="phone"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>



                                                                        <div class="form-group row">
                                                                            <label for="inputname"
                                                                                class="col-sm-2 col-form-label">አሁን ያሉበት የስራ
                                                                                መደብ</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text"
                                                                                    value="{{ $form->positionofnow }}"
                                                                                    name="positionofnow"class="form-control "
                                                                                    id="inputEmail3" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="inputname"
                                                                                class="col-sm-2 col-form-label">ደረጃ</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text"
                                                                                    value="{{ $form->level }}"
                                                                                    name="level"class="form-control "
                                                                                    id="inputEmail3" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="fee"
                                                                                class="col-sm-2 col-form-label">ደምወዝ</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text"
                                                                                    value="{{ $form->fee }}"
                                                                                    name="fee"class="form-control "
                                                                                    id="fee" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <h4 class="text-white text-center mt-50 mb-4"
                                                                            style=" background-color:rgb(17,40,77)">
                                                                            የትምህርት
                                                                            ደረጃና የትምህርት ዝግጅት በቅድመ ተከተል</h4>
                                                                        <div class="form-group  mb-100">

                                                                            <label for="inputname"></label>


                                                                            @foreach ($form->education as $fo)
                                                                                <input type="text"
                                                                                    value="[{{ $fo->level }} , {{ $fo->discipline }}, {{ $fo->completion_date }}]"
                                                                                    name="education_level"class="form-control "
                                                                                    id="inputEmail3" readonly>
                                                                            @endforeach


                                                                        </div>
                                                                        <h4 class="text-white  text-center mt-3 mb-4 "
                                                                            style=" background-color:rgb(17,40,77)">
                                                                            የ
                                                                            መወዳደርያ የስራ ክፍልና የስራ መደብ</h4>
                                                                        <button
                                                                            class="text-white text-left mt-3 mb-4 mr-150 text-left"style=" background-color:rgb(17,40,77)">
                                                                            ምርጫ 1</button>
                                                                        <div class="form-group row">
                                                                            <label for="inputname"
                                                                                class="col-sm-2 col-form-label">የስራ ክፍሉ</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text"
                                                                                    value="{{ $form->job_category->job_category }}"
                                                                                    name="job_category"class="form-control "
                                                                                    id="inputEmail3" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="position"
                                                                                class="col-sm-2 col-form-label">የስራ መደብ</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text"
                                                                                    value="{{ $form->position }}"
                                                                                    name="position"class="form-control "
                                                                                    id="position" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <button
                                                                            class="text-white text-left mt-3 mb-4 mr-150 text-left"
                                                                            style=" background-color:rgb(17,40,77)"> ምርጫ
                                                                            2</button>
                                                                        <div class="form-group row">
                                                                            <label for="inputname"
                                                                                class="col-sm-2 col-form-label">የስራ ክፍሉ</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text"
                                                                                    value="{{ $form->jobcat2->job_category }}"
                                                                                    name="job_category"class="form-control "
                                                                                    id="job_category" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row mb-25">
                                                                            <label for="position"
                                                                                class="col-sm-2 col-form-label">የስራ መደብ</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text"
                                                                                    value="{{ $form->choice2->position }}"
                                                                                    name="position"class="form-control "
                                                                                    id="position" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group  mt-100">
                                                                            <label for="UniversityHiringEra">በዩኒቨርስቲዉ የቅጥር ዘመን
                                                                                በኢትዮጵያ
                                                                            </label>

                                                                            <input type="text"
                                                                                value="{{ $form->UniversityHiringEra }}"
                                                                                name="UniversityHiringEra"class="form-control "
                                                                                id="UniversityHiringEra" readonly>

                                                                        </div>
                                                                        <div class="form-group  ">
                                                                            <label for="UniversityHiringEra">በዩኒቨርስቲዉ አገልግሎት
                                                                                ዘመን
                                                                                (በዓመት,የስራ
                                                                                መደብ)
                                                                            </label>

                                                                            <input type="text"
                                                                                value="{{ $form->servicPeriodAtUniversity }}"
                                                                                name="servicPeriodAtUniversity"class="form-control "
                                                                                id="servicPeriodAtUniversity" readonly>

                                                                        </div>
                                                                        <div class="form-group  ">
                                                                            <label for="UniversityHiringEra">በሌላ መስርያ ቤት አገልግሎት
                                                                                ዘመን(በዓመት,የስራ
                                                                                መደብ)
                                                                            </label>

                                                                            <input type="text"
                                                                                value="{{ $form->servicPeriodAtAnotherPlace }}"
                                                                                name="servicPeriodAtAnotherPlace"class="form-control "
                                                                                id="servicPeriodAtAnotherPlace" readonly>

                                                                        </div>
                                                                        <div class="form-group  ">
                                                                            <label for="servicPeriodAtAnotherPlace">አገልግሎት
                                                                                ከዲፕሎማ
                                                                                በፊት(በዓመት,የስራ መደብ)
                                                                            </label>

                                                                            <input type="text"
                                                                                value="{{ $form->serviceBeforeDiplo }}"
                                                                                name="serviceBeforeDiplo"class="form-control "
                                                                                id="serviceBeforeDiplo" readonly>

                                                                        </div>
                                                                        <div class="form-group ">
                                                                            <label for="UniversityHiringEra"> አገልግሎት ከዲፕሎማ/ዲግሪ
                                                                                በኋላ(በዓመት, የስራ መደብ)
                                                                            </label>

                                                                            <input type="text"
                                                                                value="{{ $form->serviceAfterDiplo }}"
                                                                                name="serviceAfterDiplo"class="form-control "
                                                                                id="serviceAfterDiplo" readonly>

                                                                        </div>
                                                                        <div class="form-group  ">
                                                                            <label for="resultOfrecentPerform"> የሁለት ተከታታይ የቅርብ
                                                                                ጊዜ
                                                                                የሥራ
                                                                                አፈጻፀም አማካይ
                                                                                ውጤት(ከ100 በቁጥር)
                                                                            </label>

                                                                            <input type="text"
                                                                                value="{{ $form->resultOfrecentPerform }}"
                                                                                name="resultOfrecentPerform"class="form-control "
                                                                                id="resultOfrecentPerform" readonly>

                                                                        </div>
                                                                        <div class="form-group  ">
                                                                            <label for="DisciplineFlaw"> የዲስፕሊን ጉድለት
                                                                            </label>

                                                                            <input type="text"
                                                                                value="{{ $form->DisciplineFlaw }}"
                                                                                name="DisciplineFlaw"class="form-control "
                                                                                id="DisciplineFlaw" readonly>

                                                                        </div>
                                                                        <div class="form-group  ">
                                                                            <label for="MoreRoles">ተጨማሪ የሥራ ድርሻ
                                                                            </label>

                                                                            <input type="text"
                                                                                value="{{ $form->MoreRoles }}"
                                                                                name="MoreRoles"class="form-control "
                                                                                id="MoreRoles" readonly>

                                                                        </div>




                                                                        <h4 class="text-white text-center mt-50 mb-4"
                                                                            style=" background-color:rgb(17,40,77)">
                                                                            የስራ
                                                                            ልምድ</h4>

                                                                        <div class="form-group ">
                                                                            <label for="inputEmail3"></label>


                                                                            @foreach ($form->experiences as $ex)
                                                                                <input type="text"
                                                                                    value="[{{ $ex->startingDate }} እስከ {{ $ex->endingDate }} በ {{ $ex->positionyouworked }}], "
                                                                                    name="" class="form-control"
                                                                                    id="inputname" placeholder="" readonly>
                                                                            @endforeach


                                                                        </div>

                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>


                                                                </div>



                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>



                                                <td>{{ $form->submit }}</td>

                                                <td> <a class="btn  btn-dark " type="submit" id="btn-evaluate"
                                                        href="{{ route('addHr', $form->id) }}">
                                                        evaluate</a>
                                                </td>





                                            </tr>
                                        @endif
                                    @endforeach

                                </tbody>
                            </table>



                        </div>
                    </div>
                </div>
            </section>





        </div>
    @endrole
    @role('user')
        <div class="container">

            <section class="hk-sec-wrapper mt-100">
                <div class="pull-right hk-sec-title">
                    {{-- <a href="{{ url('pos') }}" class="btn btn-dark mr-25"> back </a> --}}

                </div>
                <h5 class="hk-sec-title">የአመልካቾች ዝርዝር</h5>


                <div class="row" id="search_list">
                    <div class="col-sm">
                        <div class="table-wrap">


                            <table id="datable_2" class="table table-hover  table-bordered w-100  pb-30">
                                <thead>
                                    <tr>
                                        <th>ተቁ</th>
                                        <th>ሙሉ ስም</th>

                                        <th>የስራ ክፍል/የስራ መደብ(1ኛ ምርጫ)</th>
                                        <th>የስራ ክፍል/የስራ መደብ(2ኛ ምርጫ)</th>


                                        {{-- <th>የሚወዳደሩበት የስራ መደብ</th> --}}




                                        <th>Submittedby HR</th>


                                        <th>የሰው ኃይል ግምገማ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $j = 0;
                                    ?>
                                    @foreach ($forms as $i => $form)
                                        @if ($form->isEditable == 1)
                                            <tr>
                                                <td>{{ ++$j }}</td>
                                                <td>


                                                    {{ $form->full_name }}

                                                </td>


                                                <td>{{ $form->job_category->job_category ?? 'to be selected' }}\
                                                    {{ $form->position->position ?? 'to be selected' }}</td>
                                                <td>{{ $form->jobcat2->job_category ?? 'to be selected' }}\
                                                    {{ $form->choice2->position ?? 'to be selected' }}
                                                </td>



                                                <td>{{ $form->submit }}</td>

                                                <td> <a class="btn  btn-dark " type="submit" id="btn-evaluate"
                                                        href="{{ route('returnApplicant', $form->id) }}">
                                                        return</a>
                                                </td>





                                            </tr>
                                        @endif
                                    @endforeach

                                </tbody>
                            </table>



                        </div>
                    </div>
                </div>
            </section>





        </div>
    @endrole
@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"
        integrity="sha512-w3u9q/DeneCSwUDjhiMNibTRh/1i/gScBVp2imNVAMCt6cUHIw6xzhzcPFIaL3Q1EbI2l+nu17q2aLJJLo4ZYg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(".requestStat").on("click", function() {
            var element = $(this).closest("tr").find("#element-to-print")[0]
            html2pdf(element, {
                margin: 15,
                filename: 'Application form.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 3,
                    logging: true,
                    dpi: 192,
                    letterRendering: true
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'portrait',
                }


            });
        });
    </script>
@endsection
