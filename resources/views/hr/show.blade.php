@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">

                <section class="hk-sec-wrapper mt-100">



                    <h3 class="hk-sec-title text-white text-center color-wrap  "
                        style=" background-color:rgb(17,40,77); padding:10px;">መደ ወላቡ ዩኒቨርሲቲ የሰራተኞች የስራ
                        ድልድል ማወዳደርያ ቅፅ</h3>
                    <div class="row">
                        <div class="col-sm">
                            <form action="{{ route('addposition', $form->id) }}"method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="firstName"> የመጀምርያ ስም *</label>
                                        <input class="form-control" id="firstName" placeholder=" ስም"
                                            value="{{ $form->firstName }}" type="text" name="firstName">

                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="middleName"> የአባት ስም*</label>
                                        <input class="form-control" id="middleName" placeholder=" ስም"
                                            value="{{ $form->middleName }}" type="text" name="middleName">

                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="lastName"> የአያት ስም *</label>
                                        <input class="form-control" id="lastName" placeholder=" ስም"
                                            value="{{ $form->lastName }}" type="text" name="lastName">

                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="sex">ጾታ *</label>
                                        <input type="text" value="{{ $form->sex }}"
                                            name="sex"class="form-control " id="inputEmail3">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="control-label mb-10" for="email">ኢሜይል (የመደ ወላቡን ኢሜይል ብቻ
                                            ይጠቀሙ) *</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-envelope-open"></i></span>
                                            </div>
                                            <input type="email" value="{{ $form->email }}"
                                                name="email"class="form-control" id="inputname" placeholder="email">



                                        </div>

                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="control-label mb-10">ስልክ
                                            ቁጥር</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                            </div>
                                            <input type="text" value="{{ $form->phone }}"
                                                name="phone"class="form-control" id="inputname" placeholder="phone">
                                        </div>


                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="ethinicity"> ብሔር</label>
                                        <input type="text" value="{{ $form->ethinicity }}" name="ethinicity"
                                            class="form-control " id="inputEmail3">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="birth_date">የትውልድ ዘመን </label>
                                        <input type="text" value="{{ $form->birth_date }}" name="birth_date"
                                            class="form-control " id="inputEmail3">
                                    </div>
                                    {{-- value="{{ $form->level ?? '' }}" --}}
                                    <div class="col-md-4 form-group">
                                        <label for="jobcat">አሁን ያሉበት የስራ ክፍል </label>
                                        <input type="text" value="{{ $form->jobcat }}"
                                            name="jobcat"class="form-control " id="jobcat">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="positionofnow">አሁን ያሉበት የስራ መደብ</label>
                                        <input type="text" value="{{ $form->positionofnow }}"
                                            name="positionofnow"class="form-control " id="inputEmail3">
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="level_id"> አሁን ያሉበት ደረጃ </label>
                                        <input type="text" value="{{ $form->level ?? '' }}" name="level"
                                            class="form-control " id="inputEmail3">
                                    </div>
                                </div>
                                <h3 class="text-white text-center mt-3 mb-4  "
                                    style=" background-color:rgb(17,40,77); margin:center">
                                    ያለዎት የትምህርት ዝግጅትና የትምህርት ደረጃ
                                </h3>

                                @foreach ($form->education ?? [] as $i => $fo)
                                    <div class="row">
                                        <input type="hidden" value="{{ $fo->id }} "
                                            name="addMoreFields[{{ $i }}][id]"class="form-control "
                                            id="inputEmail3">
                                        <div class="col-md-3 form-group">
                                            <label for="level">የትምህርት ደረጃ</label>
                                            <input type="text" value="{{ $fo->level }} "
                                                name="addMoreFields[{{ $i }}][level]"class="form-control "
                                                id="inputEmail3">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label for="discipline">የትምህርት ዝግጅት</label>
                                            <input type="text" value="{{ $fo->discipline }}"
                                                name="addMoreFields[{{ $i }}][discipline]"class="form-control "
                                                id="inputEmail3">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="academicPreparationCOC">የትምህርት ዝግጅት (ሲኦሲ)</label>
                                            <input type="text" value="{{ $fo->academicPreparationCOC }}"
                                                name="addMoreFields[{{ $i }}][academicPreparationCOC]"class="form-control "
                                                id="inputEmail3">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="completion_date">completion_date</label>
                                            <input type="text" value="{{ $fo->completion_date }}"
                                                name="addMoreFields[{{ $i }}][completion_date]"class="form-control "
                                                id="inputEmail3">
                                        </div>

                                    </div>
                                @endforeach
                                <div id="myformone">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class=" educ row">
                                                <div class="col-md-3 form-group">
                                                    <label for="level">የትምህርት ደረጃ</label>
                                                    <input type="text" value="{{ old('level') }} "
                                                        name="MoreFields[0][level]"class="form-control " id="inputEmail3"
                                                        placeholder="level">
                                                </div>

                                                <div class="col-md-3 form-group">
                                                    <label for="discipline">የትምህርት ዝግጅት</label>
                                                    <input type="text" value="{{ old('discipline') }}"
                                                        name="MoreFields[0][discipline]"class="form-control "
                                                        id="inputEmail3" placeholder="discipline">
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="academicPreparationCOC">የትምህርት ዝግጅት (ሲኦሲ)</label>
                                                    <input type="text" value="{{ old('academicPreparationCOC') }}"
                                                        name="MoreFields[0][academicPreparationCOC]"class="form-control "
                                                        id="inputEmail3" placeholder="academicPreparationCOC">
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <label for="completion_date">Completion date</label>
                                                    <input type="text" value="{{ old('completion_date') }}"
                                                        name="MoreFields[0][completion_date]"class="form-control "
                                                        id="inputEmail3" placeholder="completion_date">
                                                </div>

                                                <div>
                                                    <a href="javascript:void(0)"
                                                        class="btn color-wrap text-white bg-blue-dark-4  addrowone mt-40 "
                                                        style=" border-radius:50%">+</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-white text-center me
                                        mt-3 mb-4 "
                                    style=" background-color:rgb(17,40,77); margin:center">
                                    አገልግሎት
                                </h3>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="UniversityHiringEra"> የቅጥር ዘመን በኢትዮጵያ
                                            አቆጣጠር</label>
                                        <input type="text" value="{{ $form->UniversityHiringEra }}"
                                            name="UniversityHiringEra"class="form-control " id="UniversityHiringEra">

                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="servicPeriodAtUniversity">ጠቅላላ አገልግሎት ዘመን (በዓመት)</label>
                                        <input type="text" value="{{ $form->servicPeriodAtUniversity }}"
                                            name="servicPeriodAtUniversity"class="form-control "
                                            id="servicPeriodAtUniversity">
                                    </div>

                                    {{-- <div class="col-md-6 form-group">
                                        <label for="servicPeriodAtAnotherPlace">በሌላ መስርያ ቤት አገልግሎት ዘመን(በዓመት,የስራ
                                            መደብ)</label>
                                        <input type="text" value="{{ $form->servicPeriodAtAnotherPlace }}"
                                            name="servicPeriodAtAnotherPlace"class="form-control "
                                            id="servicPeriodAtAnotherPlace">
                                    </div> --}}
                                    <div class="col-md-6 form-group">
                                        <label for="serviceBeforeDiplo"> አገልግሎት ከዲፕሎማ በፊት(በዓመት)</label>
                                        <input type="text" value="{{ $form->serviceBeforeDiplo }}"
                                            name="serviceBeforeDiplo"class="form-control " id="serviceBeforeDiplo">

                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="serviceAfterDiplo"> አገልግሎት ከዲፕሎማ/ዲግሪ በኋላ(በዓመት)</label>
                                        <input type="text" value="{{ $form->serviceAfterDiplo }}"
                                            name="serviceAfterDiplo"class="form-control " id="serviceAfterDiplo">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="resultOfrecentPerform" class=""> የሁለት ተከታታይ የቅርብ ጊዜ የሥራ
                                            አፈጻፀም አማካይ
                                            ውጤት(ከ100 በቁጥር)</label>
                                        <input type="text" value="{{ $form->resultOfrecentPerform }}"
                                            name="resultOfrecentPerform"class="form-control " id="resultOfrecentPerform">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="employee_situation"> ሰራተኛው ያለበት ሁኔታ </label>
                                        <input type="text" value="{{ $form->employee_situation }}"
                                            name="employee_situation"class="form-control " id="employee_situation">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="DisciplineFlaw">የዲሲፕሊን ጉድለት</label>
                                        <input type="text" value="{{ $form->DisciplineFlaw }}"
                                            name="DisciplineFlaw"class="form-control " id="DisciplineFlaw">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="DisciplineFlawDate">ቀን (የዲስፕሊን ጉድለት ካለ )</label>
                                        <input type="text" value="{{ $form->DisciplineFlawDate }}"
                                            name="DisciplineFlawDate"class="form-control " id="DisciplineFlawDate">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="employer_support">የሰራተኛው አዎንታዊ ድጋፍ ተጠቃሚነት</label>
                                        <input type="text" value="{{ $form->employer_support }}"
                                            name="employer_support"class="form-control " id="employer_support">
                                    </div>

                                </div>

                                @foreach ($form->moreroles ?? [] as $i => $fo)
                                    <div class="row ">
                                        <input type="hidden" value="{{ $fo->id }} "
                                            name="addMoreInputRoles[{{ $i }}][id]"class="form-control "
                                            id="inputEmail3">
                                        <div class="col-md-4 form-group">
                                            <label for="more_role">ተጨማሪ የሥራ ድርሻ</label>
                                            <input type="text" value="{{ $fo->more_role }}"
                                                name="addMoreInputRoles[{{ $i }}][more_role]"class="form-control "
                                                id="inputEmail3">
                                            @error('more_role')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>
                                @endforeach
                                <div id="myformMore">
                                    <div class="row">
                                        <div class="col-sm">

                                            <div class=" formMore row">

                                                <div class="col-md-6">

                                                    <label for="more_role">ተጨማሪ የሥራ ድርሻ</label>
                                                    <input type="text" name="addMoreroleFields[0][more_role]"
                                                        value="{{ old('more_role') }}"
                                                        class="form-control  @error('more_role') is-invalid @enderror"
                                                        id="more_role" placeholder="ተጨማሪ የሥራ ድርሻ">
                                                    @error('more_role')
                                                        <span class=" error invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>

                                                <div>
                                                    <a href="javascript:void(0)"
                                                        class="btn color-wrap text-white bg-blue-dark-4  addRowMoreRole mt-40 "
                                                        style=" border-radius:50%">+</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>

                                <h3 class="text-white text-center mt-3 mb-4   "
                                    style=" background-color:rgb(17,40,77); margin:center nav">የስራ ልምድ(በኢትዮጵያ አቆጣጠር
                                    ብቻ)</h3>

                                @foreach ($form->experiences ?? [] as $i => $fo)
                                    <div class="row ">
                                        <input type="hidden" value="{{ $fo->id }} "
                                            name="addMoreInputFields[{{ $i }}][id]"class="form-control "
                                            id="inputEmail3">
                                        <div class="col-md-4 form-group">
                                            <label for="startingDate">የጀመሩበት ዓመት(ወር/ቀን/ዓመት)</label>
                                            <input type="date" value="{{ $fo->startingDate }}"
                                                name="addMoreInputFields[{{ $i }}][startingDate]"class="form-control "
                                                id="inputEmail3">
                                            @error('startingDate')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                        </div>

                                        <div class="col-md-4 form-group">
                                            <label for="endingDate">ያበቃበት ዓመት(ወር/ቀን/ዓመት)</label>
                                            <input type="date" value="{{ $fo->endingDate }}"
                                                name="addMoreInputFields[{{ $i }}][endingDate]"class="form-control "
                                                id="inputEmail3">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="positionyouworked">የስራ መደብ</label>
                                            <input type="text" value="{{ $fo->positionyouworked }}"
                                                name="addMoreInputFields[{{ $i }}][positionyouworked]"class="form-control "
                                                id="inputEmail3">
                                        </div>

                                    </div>
                                @endforeach
                                <div id="myform">
                                    <div class="row">
                                        <div class="col-sm">

                                            <div class=" formgr row">

                                                <div class="col-md-3">

                                                    <label for="startingDate">የጀመሩበት ዓመት(ወር/ቀን/ዓመት)</label>
                                                    <input type="date" name="addFields[0][startingDate]"
                                                        value="{{ old('startingDate') }}"
                                                        class="form-control  @error('startingDate') is-invalid @enderror"
                                                        id="startingDate" placeholder=" ">
                                                    @error('startingDate')
                                                        <span class=" error invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                                <div class="col-md-3">
                                                    <label for="endingDate">ያበቃበት ቀን(ወር/ቀን/ዓመት) </label>
                                                    <input type="date" min="startingDate"
                                                        name="addFields[0][endingDate]" value="{{ old('endingDate') }}"
                                                        class="form-control  @error('endingDate') is-invalid @enderror"
                                                        id="endingDate" placeholder=" endingDate">
                                                    @error('endingDate')
                                                        <span class=" error invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="positionyouworked">የስራ መደብ </label>
                                                    <input type="text" name="addFields[0][positionyouworked]"
                                                        value="{{ old('positionyouworked') }}"
                                                        class="form-control  @error('positionyouworked') is-invalid @enderror"
                                                        id="positionyouworked" placeholder="የሰሩበት የስራ መደብ">
                                                    @error('positionyouworked')
                                                        <span class=" error invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div>
                                                    <a href="javascript:void(0)"
                                                        class="btn color-wrap text-white bg-blue-dark-4  addRow mt-40 "
                                                        style=" border-radius:50%">+</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                                <h3 class="text-white text-center mt-3 mb-4 navigation "
                                    style=" background-color:rgb(17,40,77); margin:center"> የሚወዳደሩበት የስራ ክፍልና
                                    የስራ
                                    መደብ
                                </h3>
                                <button class="text-white text-left mt-3 mb-4 mr-150"
                                    style=" background-color:rgb(17,40,77)">
                                    ምርጫ 1</button>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for=""> የስራ ክፍሉ</label>
                                        <select class="form-control custom-select d-block w-100 dynamic"
                                            name="job_category_id" id="job_category_id">
                                            <option value="">Choose</option>
                                            @foreach ($job_category as $col)
                                                <option value="{{ $col->id }}"
                                                    {{ $form->job_category_id == $col->id ? 'selected' : '' }}>
                                                    {{ $col->job_category }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-6 form-group">

                                        <label for="position_id"> የስራ መደብ</label>
                                        <select class="form-control custom-select d-block w-100  positionofone"
                                            id="position_id" name="position_id">
                                            <option value="0" disabled="true" selected="true">
                                                position
                                            </option>
                                        </select>
                                        <div id="detailsd" class=" font-20 ">


                                        </div>
                                        <div id="details" class=" ml-25 ">


                                        </div>
                                        <div id="details2" class=" ml-25 ">


                                        </div>
                                        <div id="details4" class=" ml-25 "></div>

                                        <div id="details3" class=" ml-25 ">


                                        </div>

                                    </div>


                                </div>
                                <button class="text-white text-left mt-3 mb-4" style=" background-color:rgb(17,40,77)">
                                    ምርጫ 2</button>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for=""> የስራ ክፍሉ</label>

                                        <select class="form-control custom-select d-block w-100  dynamic2"
                                            name="jobcat2_id" id="jobcat2_id">
                                            <option value="">Choose </option>
                                            @foreach ($jobcat2 as $col)
                                                <option value="{{ $col->id }}"
                                                    {{ $form->jobcat2_id == $col->id ? 'selected' : '' }}>
                                                    {{ $col->job_category }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 form-group">

                                        <label for="choice2_id"> የስራ መደብ</label>
                                        <select class="form-control custom-select d-block w-100  positionofone"
                                            id="choice2_id" name="choice2_id">
                                            <option value="0" disabled="true" selected="true">
                                                position
                                            </option>

                                        </select>
                                        <div id="detaild" class=" font-20 "></div>
                                        <div id="detail" class=" ml-25 ">


                                        </div>
                                        <div id="detail2" class=" ml-25 ">


                                        </div>
                                        <div id="detail4" class=" ml-25 "></div>

                                        <div id="detail3" class=" ml-25 ">


                                        </div>

                                    </div>




                                </div>
                                <button type="submit" class="btn bg-blue-dark-3 text-white float-right ">Save
                                </button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <script>
        $(document).ready(function() {

            var i = 0
            var j = 0
            var m = 0
            var b = 0
            $(".addRow").click(function(e) {
                ++i;
                e.preventDefault();
                $("#myform").append(`
                        <div class="row" >
                                    <div class="col-sm">

                                            <div class=" formgr row">

                                                <div class="col-md-3">
                                       <label for="startingDate"></label>

                                                    <input type="date" name="addFields[${i}][startingDate]" value="{{ old('startingDate') }}"
                                                        class="form-control  @error('startingDate') is-invalid @enderror"
                                                        id="startingDate" placeholder=" ">
                                                    @error('startingDate')
                                                        <span class=" error invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                                <div class="col-md-3">
                                                  <label for="endingDate"></label>
                                                    <input type="date" name="addFields[${i}][endingDate]" value="{{ old('endingDate') }}}"
                                                        class="form-control  @error('endingDate') is-invalid @enderror"
                                                        id="endingDate" placeholder=" endingDate">
                                                    @error('endingDate')
                                                        <span class=" error invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="positionyouworked"></label>

                                                    <input type="text" name="addFields[${i}][positionyouworked]" value="{{ old('positionyouworked') }}"
                                                        class="form-control  @error('positionyouworked') is-invalid @enderror"
                                                        id="positionyouworked" placeholder="የሰሩበት የስራ መደብ">
                                                    @error('positionyouworked')
                                                        <span class=" error invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                                <div>

                                                    <a href="javascript:void(0)" class="btn btn-danger  removeRow mt-20 "
                                                        style=" border-radius:50%">-</a>
                                                </div>
                                            </div>

                                        </div>
                                </div>





                    `);
            });

            $(document).on('click', '.removeRow', function(e) {

                e.preventDefault();

                let row_item = $(this).parents('.formgr');
                $(row_item).remove();
            });
            $(".addrowone").click(function(e) {
                ++j;
                e.preventDefault();
                $("#myformone").append(`
                <div class="row">
                    <div class="col-sm">
                       <div class=" educ row">
                            <div class="col-md-3 form-group">
                                <label for="level">የትምህርት ደረጃ</label>
                                <input type="text" value="{{ old('level') }} " placeholder="level"
                                name="MoreFields[${j}][level]"class="form-control "
                                id="inputEmail3" >
                            </div>

                            <div class="col-md-3 form-group">
                                <label for="discipline">የትምህርት ዝግጅት</label>
                                <input type="text" value="{{ old('discipline') }}"
                                name="MoreFields[${j}][discipline]"class="form-control "
                                id="inputEmail3" placeholder="discipline">
                            </div>
                              <div class="col-md-3 form-group">
                                <label for="academicPreparationCOC">የትምህርት ዝግጅት (ሲኦሲ)</label>
                                <input type="text" value="{{ old('academicPreparationCOC') }}"
                                name="MoreFields[${j}][academicPreparationCOC]"class="form-control "
                                id="inputEmail3" placeholder="academicPreparationCOC">
                            </div>
                              <div class="col-md-2 form-group">
                                <label for="completion_date">Completion date</label>
                                <input type="text" value="{{ old('completion_date') }}"
                                name="MoreFields[${j}][completion_date]"class="form-control "
                                id="inputEmail3" placeholder="completion_date">
                            </div>

                            <div>

                                <a href="javascript:void(0)" class="btn btn-danger  removerowone mt-20 "
                                style=" border-radius:50%">-</a>
                            </div>

                        </div>
                    </div>
                </div>



                    `);
            });

            $(document).on('click', '.removerowone', function(e) {
                // console.log('hi')
                e.preventDefault();
                // $this.parents('')
                let row_item = $(this).parents('.educ');
                $(row_item).remove();
            });
            $(".addRowMoreRole").click(function(e) {
                ++m;
                e.preventDefault();
                $("#myformMore").append(`
                <div class="row">
                    <div class="col-sm">
                       <div class=" formMore row">
                            <div class="col-md-6 form-group">
                                <label for="more_role"></label>
                                <input type="text" value="{{ old('more_role') }} " placeholder="more_role"
                                name="addMoreroleFields[${m}][more_role]"class="form-control "
                                id="inputEmail3" >
                            </div>
                            <div>

                                <a href="javascript:void(0)" class="btn btn-danger  removeMorerole mt-20 "
                                style=" border-radius:50%">-</a>
                            </div>

                        </div>
                    </div>
                </div>



                    `);
            });

            $(document).on('click', '.removeMorerole', function(e) {
                // console.log('hi')
                e.preventDefault();
                // $this.parents('')
                let row_item = $(this).parents('.formMore');
                $(row_item).remove();
            });
            $(".addRowEmployee").click(function(e) {
                ++b;
                e.preventDefault();
                $("#myformEmployee").append(`
                <div class="row">
                    <div class="col-sm">
                       <div class=" formEmployee row">
                            <div class="col-md-6 form-group">
                                <label for="employer_support"></label>
                                <input type="text" value="{{ old('employer_support') }} " placeholder="employer_support"
                                name="addEmployeeFields[${b}][employer_support]"class="form-control "
                                id="inputEmail3" >
                            </div>
                            <div>

                                <a href="javascript:void(0)" class="btn btn-danger  removeEmployee mt-20 "
                                style=" border-radius:50%">-</a>
                            </div>

                        </div>
                    </div>
                </div>



                    `);
            });

            $(document).on('click', '.removeEmployee', function(e) {
                // console.log('hi')
                e.preventDefault();
                // $this.parents('')
                let row_item = $(this).parents('.formEmployee');
                $(row_item).remove();
            });

            $(document).on('change', '.dynamic', function() {

                var cat_id = $(this).val();
                console.log(cat_id);
                var div = $(this).parent();


                var op = " ";

                $.ajax({
                    type: "GET",
                    url: "try/job",
                    data: {
                        "id": cat_id
                    },
                    success: function(data) {

                        op += '<option value="0" selected disabled>select</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].position +
                                '</option>';
                        }

                        $('select[name="position_id"]').html(" ");
                        $('select[name="position_id"]').append(op);
                    },
                    error: function() {

                    }
                });
            });
            $(document).on('change', '#position_id', function() {
                var selected = $(this).val();
                var a = $(this).parent();
                var di = " ";
                var div = " ";
                div21 = " ";
                var div2 = " ";
                var div3 = " ";

                $.ajax({
                    url: "try/selection",
                    type: "GET",
                    data: {
                        "id": selected
                    },
                    dataType: "json",

                    success: function(data) {

                        di += " <b>ስራዉ የሚፈልገው ዝቅተኛ መስፈርት </b>  "
                        $('#detailsd').html(" ");
                        $('#detailsd').append(di);

                        div += " <b> የስራ ልምድ (በ አመት):</b> " + data.experience
                        $('#details').html(" ");
                        $('#details').append(div);

                        div2 += "<b> የትምህርት ደረጃ:</b> " + data.edu_level

                        $('#details2').html(" ");
                        $('#details2').append(div2);
                        div21 += "<b> የትምህርት ዝግጅት:</b> " + data.education_type

                        $('#details4').html(" ");
                        $('#details4').append(div21);
                        div3 += "<b> ደረጃ:</b> " + data.level

                        $('#details3').html(" ");
                        $('#details3').append(div3);


                    },
                    error: function() {

                    }

                });




            });
            $(document).on('change', '.dynamic2', function() {


                var categ_id = $(this).val();

                console.log(categ_id);
                var div = $(this).parent();


                var op = " ";

                $.ajax({
                    type: "GET",
                    url: "try/categ2",
                    data: {
                        "id": categ_id
                    },
                    success: function(data) {

                        op += '<option value="0" selected disabled>select</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].position +
                                '</option>';
                        }

                        $('select[name="choice2_id"]').html(" ");
                        $('select[name="choice2_id"]').append(op);
                    },
                    error: function() {

                    }
                });
            });
            $(document).on('change', '#choice2_id', function() {
                var selected = $(this).val();
                var a = $(this).parent();
                var di = " ";
                var div = " ";
                var div21 = " ";
                var div2 = " ";
                var div3 = " ";

                $.ajax({
                    url: "try/selection2",
                    type: "GET",
                    data: {
                        "id": selected
                    },
                    dataType: "json",

                    success: function(data) {

                        di += " <b>ስራዉ የሚፈልገው ዝቅተኛ መስፈርት </b>  "
                        $('#detaild').html(" ");
                        $('#detaild').append(di);

                        div += "<b> የስራ ልምድ(በ አመት):</b> " + data.experience
                        $('#detail').html(" ");
                        $('#detail').append(div);

                        div2 += "<b> የትምህርት ደረጃ:</b> " + data.edu_level

                        $('#detail2').html(" ");
                        $('#detail2').append(div2);
                        div21 += "<b> የትምህርት ዝግጅት:</b> " + data.education_type

                        $('#detail4').html(" ");
                        $('#detail4').append(div21);
                        div3 += "<b> ደረጃ:</b> " + data.level

                        $('#detail3').html(" ");
                        $('#detail3').append(div3);


                    },
                    error: function() {

                    }

                });




            });






        })
    </script>
@endsection
