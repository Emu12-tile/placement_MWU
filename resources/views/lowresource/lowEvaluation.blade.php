@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    {{-- <div class="pull-right">
                    <a class="btn btn-dark" href="{{ url('choicesecond') }}"> Back</a>
                </div> --}}
                    <h5 class="hk-sec-title">የመመዘኛ መስፈርቶች ከቡድን መሪ በታች
                    </h5>
                    {{-- <p class="mb-40">A tiny editable jQuery Bootstrap spreadsheet. Just start typing to edit, or move around
                    with arrow keys or mouse clicks!</p> --}}

                    <div class="row">

                        <div class="col-sm">

                            {{-- <div class="row"> --}}
                            {{-- <div class="col-md-6"> --}}

                            <div class="table-wrap mb-20">
                                <div class="table-responsive">

                                    <table class="table table-active table-bordered mb-0">
                                        <thead class="thead-active">
                                            <tr>
                                                <th>ተ.ቁ</th>
                                                <th>የመመዘኛ መስፈርቶች</th>
                                                @role('hr')
                                                    <th>የ ማወዳደርያ ነጥብ(100%)</th>
                                                @endrole

                                            </tr>
                                        </thead>

                                        <tbody>

                                            @role('hr')
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td> ለትምህርት ዝግጅት የሚሰጥ ነጥብ</td>
                                                    <td>

                                                        <button class="btn bg-blue-dark-4 text-white" type="button"
                                                            data-toggle="collapse" data-target="#collapseExample"
                                                            aria-expanded="false" aria-controls="collapseExample">
                                                            40
                                                        </button>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>ለስራ ልምድ አገልግሎት የሚሰጥ ነጥብ </td>
                                                    <td><button class="btn bg-blue-dark-4 text-white" type="button"
                                                            data-toggle="collapse" data-target="#collapse2"
                                                            aria-expanded="false" aria-controls="collapseExample">
                                                            30
                                                        </button></td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>ለውጤት ተኮር ምዘና</td>
                                                    <td>30</td>

                                                </tr>
                                            @endrole

                                        </tbody>

                                    </table>

                                </div>
                            </div>

                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">

                                    <div class="table-wrap mb-20 ">
                                        <div class="table-responsive">
                                            <table class="table table-active table-bordered mb-0">
                                                <thead class="thead-active">
                                                    <tr>
                                                        <th>ተ.ቁ</th>

                                                        <th>የማወዳደሪያ መስፈርት</th>
                                                        <th>ቡድን መሪ በታች(40%)</th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>

                                                        <td> የስራ መደቡ የሚጠይቀው ዝቅተኛ ትምህርት
                                                            ዝግጅት የመጀመሪያ ዲግሪ ለሆኑ የስራ መደቦች</td>
                                                        <td>

                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">1.1</th>
                                                        <td> ፒ.ኤች.ዲ (ሶስተኛ ዲግሪ) የትምህርት ዝግጅት
                                                            ያለው</td>
                                                        <td>40</td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">1.2</th>
                                                        <td>ሁለተኛ ዲግሪ የትምህርት ዝግጅት ያለው</td>
                                                        <td>36</td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">1.3</th>
                                                        <td>የመጀመሪያ ዲግሪ የትምህርት ዝግጅት ያለው</td>
                                                        <td>32</td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>

                                                            የስራ መደቡ የሚጠይቀው ዝቅተኛ ትምህርት
                                                            ዝግጅት የኮሌጅ ዲፕሎማ ወይም ደረጃ ሶስት
                                                            ለሆኑ የስራ መደቦች
                                                    </tr>
                                                    </td>
                                                    <td></td>

                                                    <tr>
                                                        <th scope="row">2.1</th>
                                                        <td>የመጀመሪያ ዲግሪ የትምህርት ዝግጅት ያለው</td>
                                                        <td>40</td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2.2</th>
                                                        <td>ደረጃ 4 ወይም ደረጃ 5 የትምህርት ዝግጅት ያለው

                                                        </td>
                                                        <td>36</td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2.3</th>
                                                        <td> የኮሌጅ ዲፕሎማ ወይም ደረጃ ሶስት የትምህርት
                                                            ዝግጅት ያለው

                                                        </td>
                                                        <td>32</td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2.4</th>
                                                        <td> 10+2 ወይም ደረጃ 2 የትምህርት ዝግጅት ያለው

                                                        </td>
                                                        <td>28</td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2.5</th>
                                                        <td>10+1 ወይም ደረጃ 1 የትምህርት ዝግጅት ያለው

                                                        </td>
                                                        <td>24</td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2.6</th>
                                                        <td>በቀድሞ 12ኛ ወይም በአዲሱ 10ኛ ክፍል እና
                                                            በታች የትምህርት ዝግጅት ያለው

                                                        </td>
                                                        <td>20</td>

                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="collapse" id="collapse2">
                                <div class="card card-body">

                                    <div class="table-wrap mb-20 ">
                                        <div class="table-responsive">
                                            <table class="table table-active table-bordered mb-0">
                                                <thead class="thead-active">
                                                    <tr>
                                                        <th>ተ.ቁ</th>

                                                        <th>የማወዳደሪያ መስፈርት</th>
                                                        <th>ቡድን መሪ እና በታች(30%)</th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>

                                                        <td> አስር ዓመት እና በላይ አግባብነት ያለው የስራ
                                                            ልምድ ያለው </td>
                                                        <td>
                                                            30
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td> ሰባት ዓመት እና ከአስር ዓመት በታች አግባብነት
                                                            ያለው የስራ ልምድ ያለው </td>
                                                        <td>25</td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>አምስት ዓመት እና ከሰባት ዓመት በታች
                                                            አግባብነት ያለው የስራ ልምድ ያለው</td>
                                                        <td>20</td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">4</th>
                                                        <td>ከአምሰት አመት በታች አግባብነት ያለው የስራ
                                                            ልምድ ያለው</td>
                                                        <td>15</td>

                                                    </tr>

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="collapseExamplepres">
                                <div class="card card-body">

                                    <div class="table-wrap mb-20 ">
                                        <div class="table-responsive">
                                            <table class="table table-active table-bordered mb-0">
                                                <thead class="thead-active">
                                                    <tr>
                                                        <th>ተ.ቁ</th>

                                                        <th>የማወዳደሪያ መስፈርት</th>
                                                        <th>ነጥብ
                                                            ክብደት</th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>

                                                        <td>የመንግስትን ሀብት በቁጠባ መጠቀም፣ ታማኝነትና ቅንነት

                                                            መላበስ</td>
                                                        <td>
                                                            5
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>በወቅቱ ተገቢነት ያለው ውሳኔ መስጠት </td>
                                                        <td>5</td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>የሴክተሩን ፖሊሲ፣ ስትራቴጂና ፕሮግራሞችን ከተቋሙ ራእይና
                                                            ተልእኮ ጋር በማቀናጀት ለስኬት የራሱን ድርሻ ለመወጣት በቂግንዛቤ የያዘና ሌላውን
                                                            ለማስገንዘብ
                                                            የሚተጋ </td>
                                                        <td>5</td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">4</th>
                                                        <td>ተጨማሪ ተልእኮ ወስዶ የመፈፀምና በወቅቱ የማቅረብ ብቃት፣

                                                            ቁርጠኝነትና ከፍተኛ የተነሳሽነት ስሜት መኖር

                                                        </td>
                                                        <td>5</td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">5</th>
                                                        <td>የአመራር ብቃት ፣ የተግባቦት ብቃት ፣ የዕቅድ ዝግጅት ጥራት
                                                            ፣የሪፖርት ዝግጀት ጥራት፣፤ በውስጡ ያሉ ሰራተኞችን

                                                            የመምራት ብቃት፣ ሁልጊዜ ከሰራተኞች ጋር አብሮ የመስራት</td>
                                                        <td>5</td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">6</th>
                                                        <td> የኢንፎርሜሽን ኮሙኒኬሽን ቴከኖሎጂን በብቃት ለስራ ።

                                                            መጠቀም </td>
                                                        <td>5</td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">7</th>
                                                        <td> ለማህደር ጥራት የሚሰጥ ነጥብ</td>
                                                        <td>5</td>

                                                    </tr>

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- </div> --}}
                            {{-- </div> --}}

                            <form action="{{ route('addHrPost', $id) }}" method="POST" id="add_evaluation">
                                @csrf
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="table-wrap">
                                            <div class="table-responsive">
                                                <table class="table table-sm table-bordered mb-0">
                                                    <thead class="thead-active">
                                                        <tr>
                                                            <th rowspan="2">ሙሉ ስም</th>
                                                            <th rowspan="2">ጾታ</th>
                                                            <th rowspan="2">የሚወዳደሩበት የስራ መደብ</th>
                                                            <th colspan="4">አሁን ያሉበት የትምህርት ደረጃና የትምህርት ዝግጅት</th>
                                                            <th rowspan="2">የሁለት ተከታታይ የስራ አፈጻጸም አማካይ ውጤት</th>
                                                            <th rowspan="2">ተጨማሪ ይመልከቱ</th>
                                                        </tr>
                                                        <tr>
                                                            <th> የትምህርት ደረጃ </th>
                                                            <th>የትምህርት ዝግጅት</th>
                                                            <th> የትምህርት ዝግጅት (ሲኦሲ) </th>
                                                            <th> completion_date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td rowspan="{{ count($edu) + 1 }}">{{ $form->full_name }}</td>
                                                            <td rowspan="{{ count($edu) + 1 }}">{{ $form->sex }}</td>
                                                            <td rowspan="{{ count($edu) + 1 }}">
                                                                {{ $form->position->position }}</td>
                                                            @foreach ($edu as $index => $type)
                                                                @if ($index === 0)
                                                                    <td>{{ $type->level }}</td>
                                                                    <td>{{ $type->discipline }}</td>
                                                                    <td>{{ $type->academicPreparationCOC }}</td>
                                                                    <td>{{ $type->completion_date }}</td>
                                                                    <td rowspan="{{ count($edu) }}">
                                                                        {{ $form->resultOfrecentPerform }}</td>
                                                                    <td data-toggle="collapse" data-target="#more"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseExample"
                                                                        rowspan="{{ count($edu) }}">more <i
                                                                            class="ion ion-md-arrow-round-forward"></i>
                                                                    </td>
                                                                @else
                                                        <tr>
                                                            <td>{{ $type->level }}</td>
                                                            <td>{{ $type->discipline }}</td>
                                                            <td>{{ $type->academicPreparationCOC }}</td>
                                                            <td>{{ $type->completion_date }}</td>
                                                        </tr>
                                                        @endif
                                                        @endforeach
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="more">
                                    <div class="card card-body">

                                        <div class="table-wrap mb-20 ">
                                            <div class="table-responsive">
                                                <table class="table table-active table-bordered mb-0">
                                                    <thead class="thead-active">
                                                        <tr>


                                                            <th>አሁን ያሉበት የስራ ክፍል</th>

                                                            <th>አሁን ያሉበት የስራ መደብ</th>
                                                            <th>ብሔር</th>
                                                            <th>የትውልድ ዘመን</th>
                                                            <th>በዩኒቨርስቲዉ የቅጥር ዘመን
                                                                በኢትዮጵያ</th>

                                                            <th>ጠቅላላ አገልግሎት ዘመን(በዓመት)</th>
                                                            <th>አገልግሎት ከዲፕሎማ
                                                                በፊት(በዓመት)</th>
                                                            <th>አገልግሎት ከዲፕሎማ/ዲግሪ
                                                                በኋላ(በዓመት)</th>
                                                            <th>የዲስፕሊን ጉድለት</th>
                                                            <th>ተጨማሪ የሥራ ድርሻ</th>

                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr>

                                                            <td>{{ $form->jobcat }}</td>
                                                            <td>{{ $form->positionofnow }}</td>
                                                            <td>{{ $form->ethinicity }}</td>
                                                            <td>{{ $form->birth_date }}</td>
                                                            <td>{{ $form->UniversityHiringEra }}</td>
                                                            <td>{{ $form->servicPeriodAtUniversity }}</td>
                                                            {{-- <td>{{ $form->servicPeriodAtAnotherPlace }}</td> --}}
                                                            <td>{{ $form->serviceBeforeDiplo }}</td>
                                                            <td>{{ $form->serviceAfterDiplo }}</td>
                                                            <td>{{ $form->DisciplineFlaw }}</td>
                                                            <td>{{ $form->MoreRoles }}</td>
                                                        </tr>

                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-40">

                                    @role('hr')
                                        <div class="col-md-4">
                                            <div class="row form-group">
                                                <label for="performance">ለትምህርት ዝግጅት የሚሰጥ ነጥብ</label>
                                                <input type="float" value="{{ old('performance') }}"
                                                    class="form-control @error('performance') is-invalid @enderror"
                                                    id="performance" placeholder="ለትምህርት ዝግጅት" name="performance"
                                                    min="0" max="40">
                                                @error('performance')
                                                    <span class=" error invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="row form-group">
                                                <label for="experience">ለስራ ልምድ አገልግሎት የሚሰጥ ነጥብ</label>
                                                <input type="float" value="{{ old('experience') }}"
                                                    class="form-control @error('experience') is-invalid @enderror"
                                                    id="experience" placeholder="ለስራ ልምድ" name="experience" min="0"
                                                    max="30">
                                                @error('experience')
                                                    <span class=" error invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="row form-group">
                                                <label for="resultbased">ለውጤት ተኮር ምዘና </label>
                                                <input type="float"
                                                    value="{{ round($form->resultOfrecentPerform * 0.3, 2) }}"
                                                    class="form-control @error('resultbased') is-invalid @enderror"
                                                    id="resultbased" placeholder="ለውጤት ተኮር ምዘና " name="resultbased"
                                                    min="0" max="30">
                                                @error('resultbased')
                                                    <span class=" error invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="row form-group">
                                                <label for="exam">Remark</label>
                                                <textarea class="form-control @error('remark') is-invalid @enderror" id="remark" placeholder="remark"
                                                    value="{{ old('remark') }}" type="text" name="remark"></textarea>
                                                @error('remark')
                                                    <span class=" error invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="table-wrap mb-20 ">
                                                <div class="table-responsive" id="table-container">
                                                    <table class="table table-active table-bordered mb-0 addclass">
                                                        <thead class="thead-active">
                                                            <tr>
                                                                <th>ዓመት-ወር-ቀን</th>


                                                                <th>ብዜት</th>
                                                                <th>ዓመት-ወር-ቀን</th>
                                                                <th></th>


                                                            </tr>
                                                            <tr></tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach ($forms as $fo)
                                                                <tr data-id="{{ $fo->id }}">
                                                                    <td>



                                                                        <?php

                                                                        $fdate = Carbon::parse($fo->startingDate);

                                                                        $tdate = Carbon::parse($fo->endingDate);
                                                                        $experience = $fo->positionyouworked;
                                                                        // $days = $tdate->diffInDays($fdate);
                                                                        // $months = $tdate->diffInMonths($fdate);

                                                                        // $years = $tdate->diffInYears($fdate);

                                                                        $time = $tdate->diff($fdate);

                                                                        echo $time->y, '-', $time->m, '-', $time->d, ' (', $experience, ')';
                                                                        ?>


                                                                    </td>

                                                                    <td>
                                                                        <div class="col-md-8">

                                                                            <select
                                                                                class="form-control custom-select select  mt-15">
                                                                                <option >Select</option>
                                                                                <option value="0" selected>0</option>
                                                                                <option value="0.5">1/2</option>
                                                                                <option value="1">1</option>
                                                                            </select>

                                                                        </div>
                                                                    </td>
                                                                    <td id="add">0-0-0

                                                                    </td>

                                                                </tr>
                                                               
                                                            @endforeach


                                                            <tr data-id="{{ $fo->id + 1}}">
                                                                <td>

                                                                   From <input type="text" name="from" id="from" placeholder="yyyy-mm-dd"> <br>
                                                                   To &nbsp; &nbsp;&nbsp;&nbsp;<input type="text" name="to" id="to" placeholder="yyyy-mm-dd">


                                                                </td>

                                                                <td>
                                                                    <div class="col-md-10">

                                                                        <select
                                                                            class="form-control custom-select newselects select mt-15 selection">
                                                                            <option >Select</option>
                                                                            <option value="0" selected>0</option>
                                                                            <option value="0.5">1/2</option>
                                                                            <option value="1">1</option>
                                                                        </select>

                                                                    </div>
                                                                </td>
                                                                <td id="add">0-0-0</td>
                                                            </tr>


                                                            <tr data-id="{{ $fo->id + 2}}">
                                                                <td>

                                                                   From <input type="text"  value="" name="from2" id="from2" placeholder="yyyy-mm-dd"> <br>
                                                                   To &nbsp; &nbsp;&nbsp;&nbsp;<input type="text"  value="" name="to2" id="to2" placeholder="yyyy-mm-dd">


                                                                </td>

                                                                <td>
                                                                    <div class="col-md-10">

                                                                        <select
                                                                            class="form-control select newselects custom-select   mt-15 selection2">
                                                                            <option >Select</option>
                                                                            <option value="0" selected>0</option>
                                                                            <option value="0.5">1/2</option>
                                                                            <option value="1">1</option>
                                                                        </select>

                                                                    </div>
                                                                </td>
                                                                <td id="add">0-0-0</td>
                                                            </tr>



                                                            <tr>
                                                                <td colspan="2" class="text-center">ድምር</td>
                                                                {{-- <td></td> --}}
                                                                <td id="total-year">0-0-0</td>
                                                                <td id="yrs">- {{ preg_replace('/[^0-9]/', '', $form->position->experience) }}</td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @endrole
                                    <input type="hidden" name="type" value="low">



                                </div>
                                <div class="form-group row mb-0 pull-right">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn bg-blue-dark-4 text-white"
                                            id="add_btn">save</button>
                                    </div>
                                </div>


                            </form>


                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            var totalYear = 0;
            var totalMonth = 0;
            var totalDay = 0;

      

        // Get the current date
        var currentDate = new Date().toISOString().substr(0, 10);

        // Set the value of the input field
        document.getElementById("from").value = currentDate;
        document.getElementById("to").value = currentDate;
        document.getElementById("from2").value = currentDate;
        document.getElementById("to2").value = currentDate;

      
        

            $('.select').on('change', function() {
                // Reset the totals when a new value is selected
                totalYear = 0;
                totalMonth = 0;
                totalDay = 0;
                var selected_right_column = '';
                var counter = 0;
               
                // Iterate over each select element and calculate the sum
                $('.select').each(function() {
                    var selectedValue = parseFloat($(this).val());

                    var data = null;
                    var myData = null;
                    var row = null;
                    var startdate = null;
                    var enddate = null;

                    if($(this).hasClass('newselects'))
                    {
                         
                        if($(this).hasClass('selection'))
                        {
                            startdate = new Date($("#from").val());
                            enddate = new Date($("#to").val());
                        }
                       
                        else if($(this).hasClass('selection2'))
                        {
                            startdate = new Date($("#from2").val());
                            enddate = new Date($("#to2").val());
                        }

                    }
                    else 
                    {
                        // console.log("NO")
                     data = $(this).closest('tr').data('id');
                     myData = {!! json_encode($forms) !!};
                     row = myData.find(function(obj) {
                        return obj.id === data;
                    });
                     startdate = new Date(row.startingDate);
                     enddate = new Date(row.endingDate);

                    //  console.log(startdate);

                    }

                    
                 
                    const years = startdate.getFullYear();
                    const months = startdate.getMonth() + 1;
                    const days = startdate.getDate();
                    const years2 = enddate.getFullYear();
                    const months2 = enddate.getMonth() + 1;
                    const days2 = enddate.getDate();
                    let dayDifferenceb = (days2 - days);
                    let monthDifferenceb = (months2 - months);
                    let yearDifferenceb = (years2 - years);
                    if (dayDifferenceb < 0) {
                        dayDifferenceb += 30;
                        monthDifferenceb -= 1;

                    } else {
                        dayDifferenceb = (days2 - days);
                        monthDifferenceb = monthDifferenceb;

                    }
                    if (monthDifferenceb < 0) {
                        monthDifferenceb += 12;
                        yearDifferenceb -= 1;
                    } else {
                        monthDifferenceb = (months2 - months);
                        yearDifferenceb = yearDifferenceb;
                    }

                    let dayDifference = dayDifferenceb * selectedValue;
                    let monthDifference = monthDifferenceb * selectedValue;
                    let yearDifference = yearDifferenceb * selectedValue;

                    if (selectedValue == 0.5) {
                        if (yearDifferenceb % 2 != 0) {
                            yearDifference = parseInt(yearDifference);
                            // console.log(yearDifference);
                            // monthDifference+=6
                            monthDifference = 6 + (monthDifference);
                            //    console.log(monthDifference);
                            if (monthDifference >= 12) {
                                monthDifference = 0;
                                yearDifference = yearDifference + 1

                            }


                        } else {
                            yearDifference = parseInt(yearDifference);
                            monthDifference = monthDifference;

                        }
                        if (monthDifferenceb % 2 != 0) {
                            monthDifference = parseInt(monthDifference)
                            dayDifference = dayDifference + 15

                        } else {
                            monthDifference = parseInt(monthDifference)
                            dayDifference = dayDifference
                        }
                        if (dayDifferenceb % 2 != 0) {
                            dayDifference = parseInt(dayDifference);
                        }


                    }

                    if (dayDifference < 0) {
                        dayDifference += 30;
                        monthDifference -= 1;
                    }

                    if (monthDifference < 0) {
                        monthDifference += 12;
                        yearDifference -= 1;
                    }
                    
                    var all = yearDifference + '-' + monthDifference + '-' + dayDifference;


                    totalYear += yearDifference;
                    totalMonth += monthDifference;
                    totalDay += dayDifference;

                    if (totalDay > 30) {
                        totalMonth = totalMonth + 1;
                        totalDay = totalDay - 30;
                    }
                    if (totalMonth > 12) {
                        totalYear = totalYear + 1;
                        totalMonth = totalMonth - 12;
                    }

                    $(this).closest('tr').find('#add').text(all);
                    counter ++;
 
                    var firstColumnData = $(this).closest('tr').find('td:first-child').text().trim();
                    if (firstColumnData.startsWith("From")) {
                        
                        let from = $("#from").val();
                        let to = $("#to").val();
                        let from2 = $("#from2").val();
                        let to2 = $("#to2").val();
                        var from_to = from + ' to ' + to;
                        var from_to2 = from2 + ' to ' + to2;

                        if($(this).hasClass('selection'))
                        {
                            selected_right_column += counter+'. '+' ('+ from_to.trim() + ') '+ all+'\n';
                        }

                        else 
                        {
                            selected_right_column += counter+'. '+' ('+ from_to2.trim() + ') '+ all+'\n';
                        }
                       

                    }
                    else 
                    {
                        selected_right_column += counter+'. '+' '+ firstColumnData.trim() + ' '+ all+'\n';

                    }

                });

                totalYear = totalYear;
                totalMonth = totalMonth;
                totalDay = totalDay;

               var total = totalYear + '-' + totalMonth + '-' + totalDay;
                $('#total-year').text(total);

               
                selected_right_column += 'Sum: '+total+'\n';
                $('#remark').val(selected_right_column);
               

               
                let yrs = $("#yrs").text();
                let y = yrs.slice(1);
                let years = parseInt(y);
                let years_diff = totalYear - years;
                let experience_point = 0;

                if(years_diff <= 0)
                {
                    experience_point = 0;
                }
                else if(years_diff < 5)
                {
                    experience_point = 7.5;
                }
                else if(years_diff < 7)
                {
                    experience_point = 10;
                }
                else if(years_diff < 10)
                {
                    experience_point = 12.5;
                }
                else //>=10
                {
                    experience_point = 15;
                }

                $("#experience").val(experience_point);

                console.log(selected_right_column); 
            });


        });







$(window).load(function() {
    

            var totalYear = 0;
            var totalMonth = 0;
            var totalDay = 0;

      

        // Get the current date
        var currentDate = new Date().toISOString().substr(0, 10);

        // Set the value of the input field
        document.getElementById("from").value = currentDate;
        document.getElementById("to").value = currentDate;
        document.getElementById("from2").value = currentDate;
        document.getElementById("to2").value = currentDate;


                // Iterate over each select element and calculate the sum
                $('.select').each(function() {
                    var selectedValue = parseFloat($(this).val());

                    var data = null;
                    var myData = null;
                    var row = null;
                    var startdate = null;
                    var enddate = null;

                    if($(this).hasClass('newselects'))
                    {
                        // console.log("yes")
                         startdate = new Date($("#from2").val());
                         enddate = new Date($("#to2").val());
                    }
                    else 
                    {
                        // console.log("NO")
                     data = $(this).closest('tr').data('id');
                     myData = {!! json_encode($forms) !!};
                     row = myData.find(function(obj) {
                        return obj.id === data;
                    });
                     startdate = new Date(row.startingDate);
                     enddate = new Date(row.endingDate);
                    }

                    
                 
                    const years = startdate.getFullYear();
                    const months = startdate.getMonth() + 1;
                    const days = startdate.getDate();
                    const years2 = enddate.getFullYear();
                    const months2 = enddate.getMonth() + 1;
                    const days2 = enddate.getDate();
                    let dayDifferenceb = (days2 - days);
                    let monthDifferenceb = (months2 - months);
                    let yearDifferenceb = (years2 - years);
                    if (dayDifferenceb < 0) {
                        dayDifferenceb += 30;
                        monthDifferenceb -= 1;

                    } else {
                        dayDifferenceb = (days2 - days);
                        monthDifferenceb = monthDifferenceb;

                    }
                    if (monthDifferenceb < 0) {
                        monthDifferenceb += 12;
                        yearDifferenceb -= 1;
                    } else {
                        monthDifferenceb = (months2 - months);
                        yearDifferenceb = yearDifferenceb;
                    }

                    let dayDifference = dayDifferenceb * selectedValue;
                    let monthDifference = monthDifferenceb * selectedValue;
                    let yearDifference = yearDifferenceb * selectedValue;

                    if (selectedValue == 0.5) {
                        if (yearDifferenceb % 2 != 0) {
                            yearDifference = parseInt(yearDifference);
                            // console.log(yearDifference);
                            // monthDifference+=6
                            monthDifference = 6 + (monthDifference);
                            //    console.log(monthDifference);
                            if (monthDifference >= 12) {
                                monthDifference = 0;
                                yearDifference = yearDifference + 1

                            }


                        } else {
                            yearDifference = parseInt(yearDifference);
                            monthDifference = monthDifference;

                        }
                        if (monthDifferenceb % 2 != 0) {
                            monthDifference = parseInt(monthDifference)
                            dayDifference = dayDifference + 15

                        } else {
                            monthDifference = parseInt(monthDifference)
                            dayDifference = dayDifference
                        }
                        if (dayDifferenceb % 2 != 0) {
                            dayDifference = parseInt(dayDifference);
                        }


                    }

                    if (dayDifference < 0) {
                        dayDifference += 30;
                        monthDifference -= 1;
                    }

                    if (monthDifference < 0) {
                        monthDifference += 12;
                        yearDifference -= 1;
                    }
                    
                    var all = yearDifference + '-' + monthDifference + '-' + dayDifference;


                    totalYear += yearDifference;
                    totalMonth += monthDifference;
                    totalDay += dayDifference;

                    if (totalDay > 30) {
                        totalMonth = totalMonth + 1;
                        totalDay = totalDay - 30;
                    }
                    if (totalMonth > 12) {
                        totalYear = totalYear + 1;
                        totalMonth = totalMonth - 12;
                    }

                    $(this).closest('tr').find('#add').text(all);
                });

                totalYear = totalYear;
                totalMonth = totalMonth;
                totalDay = totalDay;

               var total = totalYear + '-' + totalMonth + '-' + totalDay;
                $('#total-year').text(total);
                $('#remark').val(total);
                
             


  });


</script>
@endsection
