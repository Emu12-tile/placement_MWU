@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">

                    <div class="pull-right">
                        <a class="btn btn-dark" href="{{ url('pos2') }}"> Back</a>
                    </div>



                    <h5 class="hk-sec-title"> የመመዘኛ መስፈርቶች ከቡድን መሪ በላይ
                    </h5>
                    {{-- <p class="mb-40">A tiny editable jQuery Bootstrap spreadsheet. Just start typing to edit, or move around
                    with arrow keys or mouse clicks!</p> --}}

                    <div class="row">

                        <div class="col-sm">

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="table-wrap mb-20">
                                        <div class="table-responsive">

                                            <table class="table table-active table-bordered mb-0">
                                                <thead class="thead-active">
                                                    <tr>
                                                        <th>ተ.ቁ</th>
                                                        <th>የመመዘኛ መስፈርቶች</th>
                                                        @role('hr')
                                                            <th>የ ማወዳደርያ ነጥብ(65%)</th>
                                                        @endrole
                                                        @role('president')
                                                            <th>የ ማወዳደርያ ነጥብ(35%)</th>
                                                        @endrole

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @role('president')
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td> በበላይ አመራር ለአመራርነት ክህሎት የሚሠጥ ነጥብ </td>
                                                            <td>

                                                                <button class="btn btn-primary" type="button"
                                                                    data-toggle="collapse" data-target="#collapseExamplepres"
                                                                    aria-expanded="false" aria-controls="collapseExample">
                                                                    35
                                                                </button>
                                                            </td>

                                                        </tr>
                                                    @endrole
                                                    @role('hr')
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td> ለትምህርት ዝግጅት የሚሰጥ ነጥብ</td>
                                                            <td>
                                                                {{-- <button class="btn btn-primary hide" onclick="tableToggle()">
                                                            25
                                                        </button> --}}
                                                                <button class="btn bg-blue-dark-4 text=-white text-white"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#collapseExample" aria-expanded="false"
                                                                    aria-controls="collapseExample">
                                                                    25
                                                                </button>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>ለስራ ልምድ አገልግሎት የሚሰጥ ነጥብ</td>
                                                            <td><button class="btn bg-blue-dark-4 text=-white text-white"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#collapse2" aria-expanded="false"
                                                                    aria-controls="collapseExample">
                                                                    15
                                                                </button></td>

                                                        </tr>
                                                        <tr>
                                                            <th scope="row">3</th>
                                                            <td>ለውጤት ተኮር ምዘና</td>
                                                            <td>10</td>

                                                        </tr>
                                                        <tr>
                                                            <th scope="row">4</th>
                                                            <td>ለፈተና ውጤት (የጽሁፍ፣ የቃል)</td>
                                                            <td>15</td>

                                                        </tr>
                                                    @endrole

                                                </tbody>

                                            </table>

                                        </div>
                                    </div>


                                </div>






                                <div class="col-md-6 ">
                                    <div class="collapse" id="collapseExample">
                                        <div class="card card-body">

                                            <div class="table-wrap mb-20 ">
                                                <div class="table-responsive">
                                                    <table class="table table-active table-bordered mb-0">
                                                        <thead class="thead-active">
                                                            <tr>
                                                                <th>ተ.ቁ</th>

                                                                <th>የማወዳደሪያ መስፈርት</th>
                                                                <th>ቡድን መሪ እና በላይ(25%)</th>

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
                                                                <td>25</td>

                                                            </tr>
                                                            <tr>
                                                                <th scope="row">3</th>
                                                                <td>ሁለተኛ ዲግሪ የትምህርት ዝግጅት ያለው</td>
                                                                <td>23</td>

                                                            </tr>
                                                            <tr>
                                                                <th scope="row">4</th>
                                                                <td>የመጀመሪያ ዲግሪ የትምህርት ዝግጅት ያለው</td>
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
                                                                <th>ቡድን መሪ እና በላይ(15%)</th>

                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>

                                                                <td> አስር ዓመት እና በላይ አግባብነት ያለው የስራ
                                                                    ልምድ ያለው </td>
                                                                <td>
                                                                    15
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <th scope="row">2</th>
                                                                <td> ሰባት ዓመት እና ከአስር ዓመት በታች አግባብነት
                                                                    ያለው የስራ ልምድ ያለው </td>
                                                                <td>12.5</td>

                                                            </tr>
                                                            <tr>
                                                                <th scope="row">3</th>
                                                                <td>አምስት ዓመት እና ከሰባት ዓመት በታች
                                                                    አግባብነት ያለው የስራ ልምድ ያለው</td>
                                                                <td>10</td>

                                                            </tr>
                                                            <tr>
                                                                <th scope="row">4</th>
                                                                <td>ከአምሰት አመት በታች አግባብነት ያለው የስራ
                                                                    ልምድ ያለው</td>
                                                                <td>7.5</td>

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














                                </div>
                            </div>

                            <form action="{{ route('addHrPost1', $id) }}" method="POST" id="add_evaluation">
                                @csrf

                                <div class="row">
                                    {{-- <div class="col-md-6"> --}}


                                    <div class="col-sm">
                                        <div class="table-wrap">
                                            <div class="table-responsive">
                                               
                                                {{-- {!! $hrs->links() !!} --}}
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
                                                                {{ $form->choice2->position }}</td>
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
                                    {{-- </div> --}}
                                </div>
                                <div class="collapse" id="more">
                                    <div class="card card-body">

                                        <div class="table-wrap mb-20 ">
                                            <div class="table-responsive">
                                                <table class="table table-active table-bordered mb-0">
                                                    <thead class="thead-active">
                                                        <tr>
                                                            {{-- <th> የስራ ልምድዎ </th> --}}
                                                            <th>አሁን ያሉበት የስራ ክፍል</th>

                                                            <th>አሁን ያሉበት የስራ መደብ</th>
                                                            <th>ብሔር</th>
                                                            <th>የትውልድ ዘመን</th>
                                                            <th>በዩኒቨርስቲዉ የቅጥር ዘመን
                                                                በኢትዮጵያ</th>
                                                            <th>ጠቅላላ አገልግሎት ዘመን (በዓመት)</th>
                                                           
                                                            <th>አገልግሎት ከዲፕሎማ
                                                                በፊት(በዓመት,የስራ መደብ)</th>
                                                            <th>አገልግሎት ከዲፕሎማ/ዲግሪ
                                                                በኋላ(በዓመት, የስራ መደብ)</th>
                                                            <th>የዲስፕሊን ጉድለት </th>
                                                            <th>የሰራተኛው አዎንታዊ ድጋፍ ተጠቃሚነት</th>
                                                            <th>ሰራተኛው ያለበት ሁኔታ </th>
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
                                                            <td>{{ $form->DisciplineFlaw }},{{$form->DisciplineFlawDate}}</td>
                                                            <td>{{$form->employer_support}}
                                                             </td>
                                                            <td>{{ $form->employee_situation }}</td>
                                                            <td>  @foreach($form->moreroles as $fo){{ $fo->more_role }}
                                                                @endforeach
                                                             </td>
                                                        </tr>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-40">
                                    @role('president')
                                        <div class="col-md-6 form-group">
                                            <label for="presidentGrade">ለትምህርት ዝግጅት የሚሰጥ ነጥብ</label>
                                            <input class="form-control @error('presidentGrade') is-invalid @enderror"
                                                id="presidentGrade" placeholder="ለትምህርት ዝግጅት የሚሰጥ ነጥብ ከ (35%)"
                                                value="{{ old('presidentGrade') }}" type="float" name="presidentGrade"
                                                min="0" max="35">
                                            @error('presidentGrade')
                                                <span class=" error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @endrole
                                    @role('hr')
                                        <div class="col-md-4">
                                            <div class="row form-group">
                                                <label for="performance">ለትምህርት ዝግጅት የሚሰጥ ነጥብ</label>
                                                <input class="form-control @error('performance') is-invalid @enderror"
                                                    id="performance" placeholder="ለትምህርት ዝግጅት"
                                                    value="{{ old('performance') }}" type="float" name="performance"
                                                    min="0" max="25">
                                                @error('performance')
                                                    <span class=" error invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="row form-group">
                                                <label for="experience">ለስራ ልምድ አገልግሎት የሚሰጥ ነጥብ</label>
                                                <input class="form-control @error('experience') is-invalid @enderror"
                                                    id="experience" placeholder="ለስራ ልምድ" value="{{ old('experience') }}"
                                                    type="float" name="experience" min="0" max="15">
                                                @error('experience')
                                                    <span class=" error invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="row form-group">
                                                <label for="resultbased">ለውጤት ተኮር ምዘና </label>
                                                <input class="form-control @error('resultbased') is-invalid @enderror"
                                                    id="resultbased" placeholder="ለውጤት ተኮር"
                                                    value="{{ round($form->resultOfrecentPerform * 0.1, 2) }}" type="float"
                                                    name="resultbased" min="0" max="10">
                                                @error('resultbased')
                                                    <span class=" error invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="row form-group">
                                                <label for="exam">ለፈተና ውጤት</label>
                                                <input class="form-control @error('exam') is-invalid @enderror" id="exam"
                                                    placeholder="ለፈተና ውጤት" value="{{ old('exam') }}" type="float"
                                                    name="exam" min="0" max="15">
                                                @error('exam')
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
                                                                        $days = $tdate->diffInDays($fdate);
                                                                        $months = $tdate->diffInMonths($fdate);

                                                                        $years = $tdate->diffInYears($fdate);

                                                                        $time = $tdate->diff($fdate);

                                                                        echo $time->y, '-', $time->m, '-', $time->d, ' (', $experience, ')';
                                                                        ?>


                                                                    </td>

                                                                    <td>
                                                                        <div class="col-md-10">

                                                                            <select
                                                                                class="form-control custom-select select  mt-15">
                                                                                <option selected>Select</option>
                                                                                <option value="0">0</option>
                                                                                <option value="0.5">1/2</option>
                                                                                <option value="1">1</option>
                                                                            </select>

                                                                        </div>
                                                                    </td>
                                                                    <td id="add">

                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                            <tr>
                                                                <td colspan="2" class="text-center">ድምር</td>

                                                                <td id="total-year"></td>
                                                                <td>- {{ preg_replace('/[^0-9]/', '', $form->choice2->experience) }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @endrole
                                    <input type="hidden" name="type" value="first">






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
    {{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script> --}}
    {{-- <script>
        $(document).ready(function() {
            var totalYear = 0;
            var totalMonth = 0;
            var totalDay = 0;

            $('.select').on('change', function() {
                // Reset the totals when a new value is selected
                totalYear = 0;
                totalMonth = 0;
                totalDay = 0;

                // Iterate over each select element and calculate the sum
                $('.select').each(function() {
                    var selectedValue = parseFloat($(this).val());

                    var data = $(this).closest('tr').data('id');
                    var myData = {!! json_encode($forms) !!};

                    var row = myData.find(function(obj) {
                        return obj.id === data;
                    });

                    var startdate = new Date(row.startingDate);
                    var enddate = new Date(row.endingDate);
                    var date = new Date(row.startingDate);
                    // console.log(startdate);
                    // var unix = Math.floor(date.getTime() / 1000);
                    const years = startdate.getFullYear();
                    const months = startdate.getMonth() + 1;
                    const days = startdate.getDate();
                    const years2 = enddate.getFullYear();
                    const months2 = enddate.getMonth() + 1;
                    const days2 = enddate.getDate();
                    let dayDifferenceb = (days2 - days);
                    let monthDifferenceb = (months2 - months);
                    let yearDifferenceb = (years2 - years);


                    let dayDifference = (days2 - days) * selectedValue;
                    let monthDifference = (months2 - months) * selectedValue;
                    let yearDifference = (years2 - years) * selectedValue;

                    if (selectedValue == 0.5) {
                        if (yearDifferenceb % 2 != 0) {
                            yearDifference = parseInt(yearDifference);
                            console.log(yearDifference);
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
                    console.log(yearDifference);
                    console.log(monthDifference);
                    console.log(dayDifference);






                    if (dayDifference < 0) {
                        dayDifference += 30;
                        monthDifference -= 1;
                    }

                    if (monthDifference < 0) {
                        monthDifference += 12;
                        yearDifference -= 1;
                    }
                    // console.log(dayDifference);
                    // console.log(monthDifference);
                    // console.log(yearDifference);
                    var all = yearDifference + '-' + monthDifference + '-' + dayDifference;








                    // var evaluate = enddate - startdate;

                    // var diffInDays = Math.floor(evaluate / (1000 * 60 * 60 * 24));
                    // var multiply = diffInDays * selectedValue;

                    // var year = parseInt(multiply / 365)
                    // var diff = multiply % 365;

                    // var month = parseInt(diff / 30)
                    // var diffday = parseInt(diff - (month * 30))

                    // var all = year + '-' + month + '-' + diffday;

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

                var total = totalYear + '-' + totalMonth + '-' + totalDay;
                $('#total-year').text(total);
            });
        });
    </script> --}}
    <script>
        $(document).ready(function() {
            var totalYear = 0;
            var totalMonth = 0;
            var totalDay = 0;

            $('.select').on('change', function() {
                // Reset the totals when a new value is selected
                totalYear = 0;
                totalMonth = 0;
                totalDay = 0;

                // Iterate over each select element and calculate the sum
                $('.select').each(function() {
                    var selectedValue = parseFloat($(this).val());

                    var data = $(this).closest('tr').data('id');
                    var myData = {!! json_encode($forms) !!};

                    var row = myData.find(function(obj) {
                        return obj.id === data;
                    });

                    var startdate = new Date(row.startingDate);
                    var enddate = new Date(row.endingDate);
                    // var date = new Date(row.startingDate);
                    // console.log(startdate);
                    // var unix = Math.floor(date.getTime() / 1000);
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
                            console.log(yearDifference);
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
                    console.log(yearDifference);
                    console.log(monthDifference);
                    console.log(dayDifference);






                    if (dayDifference < 0) {
                        dayDifference += 30;
                        monthDifference -= 1;
                    }

                    if (monthDifference < 0) {
                        monthDifference += 12;
                        yearDifference -= 1;
                    }
                    // console.log(dayDifference);
                    // console.log(monthDifference);
                    // console.log(yearDifference);
                    var all = yearDifference + '-' + monthDifference + '-' + dayDifference;








                    // var evaluate = enddate - startdate;

                    // var diffInDays = Math.floor(evaluate / (1000 * 60 * 60 * 24));
                    // var multiply = diffInDays * selectedValue;

                    // var year = parseInt(multiply / 365)
                    // var diff = multiply % 365;

                    // var month = parseInt(diff / 30)
                    // var diffday = parseInt(diff - (month * 30))

                    // var all = year + '-' + month + '-' + diffday;

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

                var total = totalYear + '-' + totalMonth + '-' + totalDay;
                $('#total-year').text(total);
            });
        });
    </script>
@endsection
