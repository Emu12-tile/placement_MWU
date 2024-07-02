@extends('layouts.admin')

@section('content')
    {{-- TODO change this to componnent --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @role('hr')
        <div class="container">

            <section class="hk-sec-wrapper mt-100">
                <div class="pull-right hk-sec-title">


                </div>
                <h5 class="hk-sec-title">የተወዳዳሪዎች 1ኛ ምርጫ ከቡድን መሪ በላይ አጠቃላይ ውጤት </h5>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap ">
                            <div class="table-responsive">

                                <table id="datable_6" class="table table-hover table-bordered w-100  pb-30">

                                    <thead>
                                        <tr>
                                            {{-- <th></th> --}}
                                           
                                        </tr>
                                        <tr>
                                            <th>ተ.ቁ</th>

                                            <th>ሙሉ ስም</th>

                                            {{-- <th>ውጤት ሰጪ</th> --}}

                                            <th>ለትምህርት ዝግጅት </th>
                                            <th>ለስራ ልምድ አገልግሎት </th>
                                            <th>ለውጤት ተኮር ምዘና</th>

                                            <th>ለፈተና ውጤት</th>



                                            {{-- <th>አጠቃላይ ውጤት(100%)</th> --}}

                                            <th>አጠቃላይ ውጤት(65%)</th>
                                            <th>የተወዳደሩበት የሥራ ክፍልና የሥራ መደብ (1ኛ ምርጫ)</th>
                                            <th>Action</th>

                                            <th>Submit</th>
                                            <th>pdf</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <th colspan="11">{{ $hrs->first()->form->job_category->job_category ?? 'Job_category' }}/{{ $hrs->first()->form->position->position ?? 'Position' }}</th> --}}
                                        <?php
                                        $j = 0;
                                        ?>

                                        @foreach ($hrs as $i => $hr)
                                            @if ($hr->form->position->position_type_id == 1)
                                                @if ($hr->status_hr == 0)
                                                    <tr>
                                                        <td>{{ ++$j }}</td>
                                                        <td>{{ $hr->form->full_name }}<p> {{ $hr->form->email }}</p>

                                                        </td>

                                                        {{-- <td>{{ $hr->user->name }}</td> --}}
                                                        <td>{{ $hr->performance }}</td>
                                                        <td>{{ $hr->experience }}</td>
                                                        <td>{{ $hr->resultbased }}</td>
                                                        <td>{{ $hr->exam }}</td>




                                                        <td>
                                                            {{ $hr->performance + $hr->experience + $hr->resultbased + $hr->exam }}

                                                        </td>
                                                        <td>{{$hr->form->job_category->job_category}}/{{$hr->form->position->position}}</td>
                                                    

                                                        <td> <a href="{{ route('resource.edit', $hr->id) }}"
                                                                data-toggle="tooltip" data-original-title="Edit"> <i
                                                                    class="icon-pencil"></i></a>
                                                            </a>


                                                        </td>
                                                        <td>



                                                            <div class="row">
                                                                <div class="col-sm">
                                                                    <!-- Button trigger modal -->
                                                                    <button type="button"
                                                                        class="btn bg-green-dark-4 text-white btn-sm "
                                                                        id="userdisplay" data-toggle="modal"
                                                                        data-target="#id1_{{ $i }}">
                                                                        Submit
                                                                    </button>

                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="id1_{{ $i }}"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="exampleModalCenter" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered"
                                                                            role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title">Submission</h5>
                                                                                    <button type="button" class="close"
                                                                                        data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <p>Are you sure do you want to submit
                                                                                        {{ $hr->form->full_name }}?

                                                                                    </p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal">Close</button>
                                                                                    <form
                                                                                        action="{{ url('update-resource/' . $hr->id) }}"
                                                                                        method="POST"
                                                                                        enctype="multipart/form-data">
                                                                                        @csrf

                                                                                        @method('PUT')
                                                                                        <button type="submit"
                                                                                            class="btn btn-green">
                                                                                            Yes</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </td>
                                                        <td> <button type="button" class="btn btn-primary requestStat btn-sm "
                                                                data-toggle="modal" data-target="#id_{{ $i }}"><i
                                                                    class="ion ion-md-archive "></i>pdf
                                                            </button>

                                                            <div class="modal fade" id="id_{{ $i }}" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLongTitle"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <div id="element-to-print">

                                                                                <div class="bodypdf">


                                                                                    <h5 class="modal-title "
                                                                                        id="exampleModalLongTitle">
                                                                                        የተወዳዳሪው 1ኛ ምርጫ ከ ደረጃ በላይ አጠቃላይ ውጤት
                                                                                    </h5>
                                                                                    <div class="modal-body">
                                                                                        <table
                                                                                            class="table table-hover table-bordered w-100  pb-30">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th></th>
                                                                                                    <th></th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td>ሙሉ ስም</td>
                                                                                                    <td>{{ $hr->form->full_name }}


                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>የትምህርት ደረጃና ዝግጅት</td>
                                                                                                    <td>
                                                                                                        @foreach ($hr->form->education as $i => $type)
                                                                                                            ({{ $type->level }},
                                                                                                            {{ $type->discipline }})
                                                                                                            ,
                                                                                                        @endforeach
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        ያለዎት የስራ ልምድ
                                                                                                    </td>

                                                                                                    <td>
                                                                                                        @foreach ($hr->form->experiences as $i => $fo)
                                                                                                            <p> ከ{{ Carbon::parse($fo->startingDate)->day }}/{{ Carbon::parse($fo->startingDate)->month }}/{{ Carbon::parse($fo->startingDate)->year }}
                                                                                                                እስከ
                                                                                                                {{ Carbon::parse($fo->endingDate)->day }}/{{ Carbon::parse($fo->endingDate)->month }}/{{ Carbon::parse($fo->endingDate)->year }}
                                                                                                                በ
                                                                                                                {{ $fo->positionyouworked }},
                                                                                                            </p>

                                                                                                            {{-- <td>{{ $fo->positionyouworked }} --}}
                                                                                                        @endforeach
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>የሚወዳደሩበት የሥራ መደብ</td>
                                                                                                    <td>{{ $hr->form->position->position }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>ለትምህርት ዝግጅት የሚሰጥ
                                                                                                        ነጥብ(25%)
                                                                                                    </td>
                                                                                                    <td>{{ $hr->performance }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>ለስራ ልምድ አገልግሎት የሚሰጥ
                                                                                                        ነጥብ(15%)
                                                                                                    </td>
                                                                                                    <td> {{ $hr->experience }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>ለውጤት ተኮር ምዘና(10%)</td>
                                                                                                    <td>{{ $hr->resultbased }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>ለፈተና ውጤት(15%) </td>
                                                                                                    <td>{{ $hr->exam }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Remark</td>
                                                                                                    <td>{{ $hr->remark }}
                                                                                                    </td>
                                                                                                </tr>


                                                                                            </tbody>
                                                                                            <tfoot style="font-size: 20px;">
                                                                                                <tr>
                                                                                                    <td>አጠቃላይ ውጤት(65%)</td>
                                                                                                    <td>{{ $hr->performance + $hr->experience + $hr->resultbased + $hr->exam }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tfoot>
                                                                                        </table>
                                                                                        <p>ከኮሚቴ ውጤት ሰጪ :{{ $hr->user->name }}
                                                                                        </p>
                                                                                    </div>


                                                                                    <div class="footerpdf">

                                                                                        <p>This pdf generated by
                                                                                            {{ Auth::user()->name }} ©


                                                                                            <?php
                                                                                            $mytime = Carbon\Carbon::now()->tz('EAT');
                                                                                            echo $mytime->toDateTimeString();
                                                                                            ?>


                                                                                        </p>


                                                                                    </div>
                                                                                    <p class="mt-5 text-center">@copyright <a
                                                                                            href="#" class="text-dark"
                                                                                            target="_blank">AASTU(YEE
                                                                                            ) </a> © 2023</p>
                                                                                </div>

                                                                            </div>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>



                                                                        </div>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </td>







                                                    </tr>
                                                @endif
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>



                        </div>
                    </div>
                </div>

            </section>
        </div>

        <div class="container">

            <section class="hk-sec-wrapper mt-100">
                <div class="pull-right hk-sec-title">

                    {{-- <a href="{{ url('choicesecond') }}" class="btn btn-dark mr-25"> back </a> --}}
                </div>
                <h5 class="hk-sec-title">የተወዳዳሪዎች 2ኛ ምርጫ ከቡድን መሪ በላይ አጠቃላይ ውጤት </h5>

                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="datable_9" class="table table-hover table-bordered w-100 pb-30">
                                    <thead>
                                        
                                        <tr>

                                            <th>ተ.ቁ</th>

                                            <th>ሙሉ ስም</th>

                                            {{-- <th>ውጤት ሰጪ</th> --}}

                                            <th>ለትምህርት ዝግጅት </th>
                                            <th>ለስራ ልምድ አገልግሎት</th>
                                            <th>ለውጤት ተኮር ምዘና</th>

                                            <th>ለፈተና ውጤት</th>




                                            <th>አጠቃላይ ውጤት(65%)</th>
                                            <th>የተወዳደሩበት የሥራ ክፍልና የሥራ መደብ (2ኛ ምርጫ)</th>
                                            <th>Action</th>
                                            <th>submit</th>
                                            <th>pdf</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $j = 0;
                                        ?>
                                        @foreach ($secondhrs as $i => $hr)
                                            @if ($hr->form->choice2->position_type_id == 1)
                                                @if ($hr->status_hr == 0)
                                                    <tr>
                                                        <td>{{ ++$j }}</td>
                                                        <td>{{ $hr->form->full_name }} <p>{{ $hr->form->email }}
                                                            </p>
                                                        </td>

                                                        {{-- <td>{{ $hr->user->name }}</td> --}}
                                                        <td>{{ $hr->performance }}</td>
                                                        <td>{{ $hr->experience }}</td>
                                                        <td>{{ $hr->resultbased }}</td>
                                                        <td>{{ $hr->exam }}</td>



                                                        <td>
                                                            {{ $hr->performance + $hr->experience + $hr->resultbased + $hr->exam }}

                                                        </td>



                                                        <td>{{$hr->form->jobcat2->job_category}}/{{$hr->form->choice2->position}}</td>


                                                        <td> <a href="{{ route('secondhr.edit', $hr->id) }}"
                                                                data-toggle="tooltip" data-original-title="Edit"> <i
                                                                    class="icon-pencil"></i>

                                                            </a>


                                                        </td>
                                                        <td>

                                                            <div class="row">
                                                                <div class="col-sm">
                                                                    <!-- Button trigger modal -->
                                                                    <button type="button"
                                                                        class="btn bg-green-dark-4 text-white btn-sm"
                                                                        data-toggle="modal"
                                                                        data-target="#id1s_{{ $i }}">
                                                                        Submit
                                                                    </button>

                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="id1s_{{ $i }}"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="exampleModalCenter" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered"
                                                                            role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title">Submission</h5>
                                                                                    <button type="button" class="close"
                                                                                        data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <p>Are you sure do you want to submit
                                                                                        {{ $hr->form->full_name }}?

                                                                                    </p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal">Close</button>
                                                                                    <form
                                                                                        action="{{ url('update-secondhr/' . $hr->id) }}"
                                                                                        method="POST"
                                                                                        enctype="multipart/form-data">
                                                                                        @csrf

                                                                                        @method('PUT')
                                                                                        <button type="submit"
                                                                                            class="btn btn-green">
                                                                                            Yes</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </td>
                                                        <td>


                                                            <button type="button" class="btn btn-primary requestStat btn-sm "
                                                                data-toggle="modal" data-target="#ids_{{ $i }}"><i
                                                                    class="ion ion-md-archive "></i>pdf
                                                            </button>

                                                            <div class="modal fade" id="ids_{{ $i }}" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLongTitle"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <div id="element-to-print">

                                                                                <h5 class="modal-title "
                                                                                    id="exampleModalLongTitle">
                                                                                    የተወዳዳሪው 2ኛ ምርጫ ከደረጃ በላይ አጠቃላይ ውጤት
                                                                                </h5>
                                                                                <div class="modal-body">
                                                                                    <table
                                                                                        class="table table-hover table-bordered w-100  pb-30">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th></th>
                                                                                                <th></th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>ሙሉ ስም</td>
                                                                                                <td>{{ $hr->form->full_name }}

                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>የትምህርት ደረጃና ዝግጅት</td>
                                                                                                <td>
                                                                                                    @foreach ($hr->form->education as $i => $type)
                                                                                                        ({{ $type->level }},
                                                                                                        {{ $type->discipline }})
                                                                                                        ,
                                                                                                    @endforeach
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>
                                                                                                    ያለዎት የስራ ልምድ
                                                                                                </td>

                                                                                                <td>
                                                                                                    @foreach ($hr->form->experiences as $i => $fo)
                                                                                                        <p> ከ{{ Carbon::parse($fo->startingDate)->day }}/{{ Carbon::parse($fo->startingDate)->month }}/{{ Carbon::parse($fo->startingDate)->year }}
                                                                                                            እስከ
                                                                                                            {{ Carbon::parse($fo->endingDate)->day }}/{{ Carbon::parse($fo->endingDate)->month }}/{{ Carbon::parse($fo->endingDate)->year }}
                                                                                                            በ
                                                                                                            {{ $fo->positionyouworked }},
                                                                                                        </p>

                                                                                                        {{-- <td>{{ $fo->positionyouworked }} --}}
                                                                                                    @endforeach
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>የሚወዳደሩበት የሥራ መደብ</td>
                                                                                                <td>{{ $hr->form->choice2->position }}
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>

                                                                                                <td>ለትምህርት ዝግጅት የሚሰጥ ነጥብ(25%)
                                                                                                </td>
                                                                                                <td>{{ $hr->performance }}</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>ለስራ ልምድ አገልግሎት የሚሰጥ ነጥብ(15%)
                                                                                                </td>
                                                                                                <td> {{ $hr->experience }}</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>ለውጤት ተኮር ምዘና(10%)</td>
                                                                                                <td>{{ $hr->resultbased }}</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>ለፈተና ውጤት(15%) </td>
                                                                                                <td>{{ $hr->exam }}</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Remark</td>
                                                                                                <td>{{ $hr->remark }}</td>
                                                                                            </tr>

                                                                                        </tbody>
                                                                                        <tfoot style="font-size: 20px;">
                                                                                            <tr>
                                                                                                <td>አጠቃላይ ውጤት(65%)</td>
                                                                                                <td>{{ $hr->performance + $hr->experience + $hr->resultbased + $hr->exam }}
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tfoot>
                                                                                    </table>
                                                                                    <p>ከኮሚቴ ውጤት ሰጪ:{{ $hr->user->name }} </p>
                                                                                </div>

                                                                                <div class="footerpdf">
                                                                                    <p>This pdf generated by
                                                                                        {{ Auth::user()->name }} ©


                                                                                        <?php
                                                                                        $mytime = Carbon\Carbon::now()->tz('EAT');
                                                                                        echo $mytime->toDateTimeString();
                                                                                        ?>
                                                                                    </p>

                                                                                </div>
                                                                                <p class="mt-5 text-center">@copyright <a
                                                                                        href="#" class="text-dark"
                                                                                        target="_blank">AASTU(YEE
                                                                                        ) </a> © 2023</p>


                                                                            </div>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>



                                                                        </div>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </td>

                                                    </tr>
                                                @endif
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{-- {!! $hrs->links() !!} --}}


                        </div>
                    </div>
                </div>
            </section>





        </div>
    @endrole



    <div class="container">
        <section class="hk-sec-wrapper mt-100">
            @role('hr')
                <div class="pull-right hk-sec-title">

                    {{-- <a href="{{ url('positionhigh') }}" class=" btn btn-dark mr-25"> back </a> --}}
                </div>
            @endrole
            <h5 class="hk-sec-title">የተወዳዳሪዎች 1ኛ ምርጫ ከ ቡድን መሪ በላይ አጠቃላይ ውጤት </h5>
            <div class="row">
                <div class="col-sm">
                    <div class="table-wrap ">
                        <div class="table-responsive">
                            @role('hr')
                                <table id="datable_3" class="table table-hover table-bordered w-100  pb-30">
                                @endrole
                                @role('president')
                                    <table id="datable_1" class="table table-hover table-bordered w-100  pb-30">
                                    @endrole
                                    <thead>
                                        <tr>
                                            <th>ተ.ቁ</th>

                                            <th>ሙሉ ስም</th>
                                            @role('hr')
                                                <th>ውጤት ሰጪ ከኮሚቴ</th>

                                                <th>ለትምህርት ዝግጅት የሚሰጥ ነጥብ(25%)</th>
                                                <th>ለስራ ልምድ አገልግሎት የሚሰጥ ነጥብ(15%)</th>
                                                <th>ለውጤት ተኮር ምዘና(10%)</th>

                                                <th>ለፈተና ውጤት(15%)</th>

                                                <th>አጠቃላይ ውጤት(65%)</th>
                                                <th>Submittedby</th>
                                                <th>Remark</th>
                                            @endrole


                                            @role('president')
                                                <th>ውጤት ሰጪ ከኮሚቴ</th>

                                                <th>አጠቃላይ ውጤት(65%)</th>

                                                <th>presidential</th>
                                            @endrole

                                        </tr>
                                    </thead>

                                    @role('hr')
                                        <tbody>
                                            <?php
                                            $j = 0;
                                            ?>
                                            @foreach ($hrs as $i => $hr)
                                                @if ($hr->form->position->position_type_id == 1)
                                                    @if ($hr->status_hr == 1)
                                                        <tr>
                                                            <td>{{ ++$j }}</td>
                                                            <td>{{ $hr->form->full_name }} <p>{{ $hr->form->email }}</p>
                                                            </td>
                                                            {{-- @role('hr') --}}
                                                            <td>{{ $hr->user->name }}</td>
                                                            <td>{{ $hr->performance }}</td>
                                                            <td>{{ $hr->experience }}</td>
                                                            <td>{{ $hr->resultbased }}</td>
                                                            <td>{{ $hr->exam }}</td>
                                                            {{-- @endrole --}}


                                                            <td>
                                                                {{ $hr->performance + $hr->experience + $hr->resultbased + $hr->exam }}

                                                            </td>
                                                            <td id="current">{{ $hr->submit }}
                                                            </td>
                                                            <td>{{ $hr->remark }}</td>





                                                            @role('president')
                                                                @if ($hr->status_hr == 1)
                                                                    <td> <a class="btn  btn-dark " type="submit" id="btn-evaluate"
                                                                            href="{{ route('addpresident', $hr->id) }}">
                                                                            evaluate</a>
                                                                    </td>
                                                                @endif
                                                            @endrole

                                                        </tr>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tbody>
                                    @endrole
                                    @role('president')
                                        <tbody>
                                            <?php
                                            $j = 0;
                                            ?>
                                            @foreach ($hrs as $i => $hr)
                                                @if ($hr->form->position->position_type_id == 1)
                                                    @if ($hr->status_hr == 1 && $hr->status_president == 0)
                                                        <tr>
                                                            <td>{{ ++$j }}</td>
                                                            <td>
                                                                <button type="button" class="btn btn-primary "
                                                                    data-toggle="modal" data-target="#id_{{ $i }}">
                                                                    {{ $hr->form->full_name }}</button>
                                                                <div class="modal fade" id="id_{{ $i }}"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalLongTitle"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLongTitle">
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
                                                                                            class="col-sm-2 col-form-label">ሙሉ
                                                                                            ስም</label>


                                                                                        <div class="col-sm-10">
                                                                                            <input type="text"
                                                                                                value="{{ $hr->form->full_name }}"
                                                                                                name="full_name"class="form-control"
                                                                                                id="inputname"
                                                                                                placeholder=" firstName"
                                                                                                readonly>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <label for="inputname"
                                                                                            class="col-sm-2 col-form-label">ጾታ</label>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="text"
                                                                                                value="{{ $hr->form->sex }}"
                                                                                                name="sex"class="form-control "
                                                                                                id="inputEmail3" readonly>
                                                                                        </div>
                                                                                    </div>



                                                                                    <div class="form-group row">
                                                                                        <label for="inputEmail3"
                                                                                            class="col-sm-2 col-form-label">ኢሜይል</label>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="email"
                                                                                                value="{{ $hr->form->email }}"
                                                                                                name="email"class="form-control"
                                                                                                id="inputname"
                                                                                                placeholder="email" readonly>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="form-group row">
                                                                                        <label for="inputEmail3"
                                                                                            class="col-sm-2 col-form-label">ስልክ
                                                                                            ቁጥር</label>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="text"
                                                                                                value="{{ $hr->form->phone }}"
                                                                                                name="phone"class="form-control"
                                                                                                id="inputname"
                                                                                                placeholder="phone" readonly>
                                                                                        </div>
                                                                                    </div>



                                                                                    <div class="form-group row">
                                                                                        <label for="inputname"
                                                                                            class="col-sm-2 col-form-label">አሁን
                                                                                            ያሉበት የስራ
                                                                                            መደብ</label>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="text"
                                                                                                value="{{ $hr->form->positionofnow }}"
                                                                                                name="positionofnow"class="form-control "
                                                                                                id="inputEmail3" readonly>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <label for="inputname"
                                                                                            class="col-sm-2 col-form-label">ደረጃ</label>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="text"
                                                                                                value="{{ $hr->form->level }}"
                                                                                                name="level"class="form-control "
                                                                                                id="inputEmail3" readonly>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="form-group row">
                                                                                        <label for="fee"
                                                                                            class="col-sm-2 col-form-label">ደምወዝ</label>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="text"
                                                                                                value="{{ $hr->form->fee }}"
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


                                                                                        @foreach ($hr->form->education as $fo)
                                                                                            <input type="text"
                                                                                                value="[{{ $fo->certificate }} , {{ $fo->discipline1 }}]"
                                                                                                name="education_level"class="form-control "
                                                                                                id="inputEmail3" readonly>
                                                                                            <input type="text"
                                                                                                value="[{{ $fo->diploma }} , {{ $fo->discipline2 }}],"
                                                                                                name="education_level"class="form-control "
                                                                                                id="inputEmail3" readonly>
                                                                                            <input type="text"
                                                                                                value="[{{ $fo->bsc }} , {{ $fo->discipline3 }}],"
                                                                                                name="education_level"class="form-control "
                                                                                                id="inputEmail3" readonly>
                                                                                            <input type="text"
                                                                                                value="[{{ $fo->msc }} , {{ $fo->discipline2 }}],"
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
                                                                                            class="col-sm-2 col-form-label">የስራ
                                                                                            ክፍሉ</label>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="text"
                                                                                                value="{{ $hr->form->job_category->job_category }}"
                                                                                                name="job_category"class="form-control "
                                                                                                id="inputEmail3" readonly>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <label for="position"
                                                                                            class="col-sm-2 col-form-label">የስራ
                                                                                            መደብ</label>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="text"
                                                                                                value="{{ $hr->form->position->position }}"
                                                                                                name="position"class="form-control "
                                                                                                id="position" readonly>
                                                                                        </div>
                                                                                    </div>

                                                                                    <button
                                                                                        class="text-white text-left mt-3 mb-4 mr-150 text-left"
                                                                                        style=" background-color:rgb(17,40,77)">
                                                                                        ምርጫ
                                                                                        2</button>
                                                                                    <div class="form-group row">
                                                                                        <label for="inputname"
                                                                                            class="col-sm-2 col-form-label">የስራ
                                                                                            ክፍሉ</label>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="text"
                                                                                                value="{{ $hr->form->jobcat2->job_category }}"
                                                                                                name="job_category"class="form-control "
                                                                                                id="job_category" readonly>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row mb-25">
                                                                                        <label for="position"
                                                                                            class="col-sm-2 col-form-label">የስራ
                                                                                            መደብ</label>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="text"
                                                                                                value="{{ $hr->form->choice2->position }}"
                                                                                                name="position"class="form-control "
                                                                                                id="position" readonly>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group  mt-100">
                                                                                        <label
                                                                                            for="UniversityHiringEra">በዩኒቨርስቲዉ
                                                                                            የቅጥር ዘመን
                                                                                            በኢትዮጵያ
                                                                                        </label>

                                                                                        <input type="text"
                                                                                            value="{{ $hr->form->UniversityHiringEra }}"
                                                                                            name="UniversityHiringEra"class="form-control "
                                                                                            id="UniversityHiringEra" readonly>

                                                                                    </div>
                                                                                    <div class="form-group  ">
                                                                                        <label
                                                                                            for="UniversityHiringEra">በዩኒቨርስቲዉ
                                                                                            አገልግሎት
                                                                                            ዘመን
                                                                                            (በዓመት,የስራ
                                                                                            መደብ)
                                                                                        </label>

                                                                                        <input type="text"
                                                                                            value="{{ $hr->form->servicPeriodAtUniversity }}"
                                                                                            name="servicPeriodAtUniversity"class="form-control "
                                                                                            id="servicPeriodAtUniversity"
                                                                                            readonly>

                                                                                    </div>
                                                                                    <div class="form-group  ">
                                                                                        <label for="UniversityHiringEra">በሌላ
                                                                                            መስርያ ቤት አገልግሎት
                                                                                            ዘመን(በዓመት,የስራ
                                                                                            መደብ)
                                                                                        </label>

                                                                                        <input type="text"
                                                                                            value="{{ $hr->form->servicPeriodAtAnotherPlace }}"
                                                                                            name="servicPeriodAtAnotherPlace"class="form-control "
                                                                                            id="servicPeriodAtAnotherPlace"
                                                                                            readonly>

                                                                                    </div>
                                                                                    <div class="form-group  ">
                                                                                        <label
                                                                                            for="servicPeriodAtAnotherPlace">አገልግሎት
                                                                                            ከዲፕሎማ
                                                                                            በፊት(በዓመት,የስራ መደብ)
                                                                                        </label>

                                                                                        <input type="text"
                                                                                            value="{{ $hr->form->serviceBeforeDiplo }}"
                                                                                            name="serviceBeforeDiplo"class="form-control "
                                                                                            id="serviceBeforeDiplo" readonly>

                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <label for="UniversityHiringEra">
                                                                                            አገልግሎት ከዲፕሎማ/ዲግሪ
                                                                                            በኋላ(በዓመት, የስራ መደብ)
                                                                                        </label>

                                                                                        <input type="text"
                                                                                            value="{{ $hr->form->serviceAfterDiplo }}"
                                                                                            name="serviceAfterDiplo"class="form-control "
                                                                                            id="serviceAfterDiplo" readonly>

                                                                                    </div>
                                                                                    <div class="form-group  ">
                                                                                        <label for="resultOfrecentPerform">
                                                                                            የሁለት ተከታታይ የቅርብ
                                                                                            ጊዜ
                                                                                            የሥራ
                                                                                            አፈጻፀም አማካይ
                                                                                            ውጤት(ከ100 በቁጥር)
                                                                                        </label>

                                                                                        <input type="text"
                                                                                            value="{{ $hr->form->resultOfrecentPerform }}"
                                                                                            name="resultOfrecentPerform"class="form-control "
                                                                                            id="resultOfrecentPerform"
                                                                                            readonly>

                                                                                    </div>
                                                                                    <div class="form-group  ">
                                                                                        <label for="DisciplineFlaw"> የዲስፕሊን
                                                                                            ጉድለት
                                                                                        </label>

                                                                                        <input type="text"
                                                                                            value="{{ $hr->form->DisciplineFlaw }}"
                                                                                            name="DisciplineFlaw"class="form-control "
                                                                                            id="DisciplineFlaw" readonly>

                                                                                    </div>
                                                                                    <div class="form-group  ">
                                                                                        <label for="MoreRoles">ተጨማሪ የሥራ ድርሻ
                                                                                        </label>

                                                                                        <input type="text"
                                                                                            value="{{ $hr->form->MoreRoles }}"
                                                                                            name="MoreRoles"class="form-control "
                                                                                            id="MoreRoles" readonly>

                                                                                    </div>




                                                                                    <h4 class="text-white text-center mt-50 mb-4"
                                                                                        style=" background-color:rgb(17,40,77)">
                                                                                        የስራ
                                                                                        ልምድ</h4>

                                                                                    <div class="form-group ">
                                                                                        <label for="inputEmail3"></label>


                                                                                        @foreach ($hr->form->experiences as $ex)
                                                                                            <input type="text"
                                                                                                value="[{{ $ex->startingDate }} እስከ {{ $ex->endingDate }} በ {{ $ex->positionyouworked }}], "
                                                                                                name=""
                                                                                                class="form-control"
                                                                                                id="inputname" placeholder=""
                                                                                                readonly>
                                                                                        @endforeach


                                                                                    </div>

                                                                                </form>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close</button>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>{{ $hr->user->name }}</td>


                                                            <td>
                                                                {{ $hr->performance + $hr->experience + $hr->resultbased + $hr->exam }}

                                                            </td>






                                                            <td> <a class="btn  btn-dark " type="submit" id="btn-evaluate"
                                                                    href="{{ route('addpresident', $hr->id) }}">
                                                                    evaluate</a>
                                                            </td>


                                                        </tr>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tbody>
                                    @endrole
                                </table>
                        </div>



                    </div>
                </div>
            </div>

        </section>





    </div>
    <div class="container">
        <section class="hk-sec-wrapper mt-100">
            <div class="pull-right hk-sec-title">

                {{-- <a href="{{ url('choicesecond') }}" class=" btn btn-dark mr-25"> back </a> --}}
            </div>
            <h5 class="hk-sec-title">የተወዳዳሪዎች 2ኛ ምርጫ ከ ቡድን መሪ በላይ አጠቃላይ ውጤት </h5>
            <div class="row">
                <div class="col-sm">
                    <div class="table-wrap ">
                        <div class="table-responsive">
                            @role('hr')
                                <table id="datable_7" class="table table-hover table-bordered w-100  pb-30">
                                @endrole
                                @role('president')
                                    <table id="datable_8" class="table table-hover table-bordered w-100  pb-30">
                                    @endrole
                                    <thead>
                                        <tr>
                                            <th>ተ.ቁ</th>

                                            <th>ሙሉ ስም</th>
                                            @role('hr')
                                                <th>ውጤት ሰጪ ከኮሚቴ</th>

                                                <th>ለትምህርት ዝግጅት የሚሰጥ ነጥብ(25%)</th>
                                                <th>ለስራ ልምድ አገልግሎት የሚሰጥ ነጥብ(15%)</th>
                                                <th>ለውጤት ተኮር ምዘና(10%)</th>

                                                <th>ለፈተና ውጤት(15%)</th>

                                                <th>አጠቃላይ ውጤት(65%)</th>
                                                <th>Submitted by</th>
                                                <th>Remark</th>
                                            @endrole


                                            @role('president')
                                                <th>ውጤት ሰጪ ከኮሚቴ</th>

                                                <th>አጠቃላይ ውጤት(65%)</th>
                                                {{-- <th>Remark</th> --}}

                                                <th>presidential</th>
                                            @endrole

                                        </tr>
                                    </thead>

                                    @role('hr')
                                        <tbody>
                                            <?php
                                            $j = 0;
                                            ?>
                                            @foreach ($secondhrs as $i => $hr)
                                                @if ($hr->form->choice2->position_type_id == 1)
                                                    @if ($hr->status_hr == 1)
                                                        <tr>
                                                            <td>{{ ++$j }}</td>
                                                            <td>


                                                                {{ $hr->form->full_name }} <p>{{ $hr->form->email }}
                                                                </p>


                                                            </td>
                                                            {{-- @role('hr') --}}
                                                            <td>{{ $hr->user->name }}</td>
                                                            <td>{{ $hr->performance }}</td>
                                                            <td>{{ $hr->experience }}</td>
                                                            <td>{{ $hr->resultbased }}</td>
                                                            <td>{{ $hr->exam }}</td>

                                                            {{-- @endrole --}}


                                                            <td>
                                                                {{ $hr->performance + $hr->experience + $hr->resultbased + $hr->exam }}

                                                            </td>
                                                            <td>{{ $hr->submit }}</td>
                                                            <td>{{ $hr->remark }}</td>





                                                            @role('president')
                                                                @if ($hr->status_hr == 1)
                                                                    <td> <a class="btn  btn-dark " type="submit" id="btn-evaluate"
                                                                            href="{{ route('addpresident', $hr->id) }}">
                                                                            evaluate</a>
                                                                    </td>
                                                                @endif
                                                            @endrole

                                                        </tr>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tbody>
                                    @endrole
                                    @role('president')
                                        <tbody>
                                            <?php
                                            $j = 0;
                                            ?>
                                            @foreach ($secondhrs as $i => $hr)
                                                @if ($hr->form->choice2->position_type_id == 1)
                                                    @if ($hr->status_hr == 1 && $hr->status_president == 0)
                                                        <tr>
                                                            <td>{{ ++$j }}</td>
                                                            <td>
                                                                {{-- <form action="" method="POST"><a
                                                                        href="{{ route('hr.show', $hr->form->id) }}"
                                                                        class="mr-25" data-toggle="tooltip"
                                                                        data-original-title="show">{{ $hr->form->full_name }}
                                                                    </a>
                                                                </form> --}}
                                                                <button type="button" class="btn btn-primary "
                                                                    data-toggle="modal" data-target="#idp_{{ $i }}">
                                                                    {{ $hr->form->full_name }}</button>
                                                                <div class="modal fade" id="idp_{{ $i }}"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalLongTitle"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLongTitle">
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
                                                                                            class="col-sm-2 col-form-label">ሙሉ
                                                                                            ስም</label>


                                                                                        <div class="col-sm-10">
                                                                                            <input type="text"
                                                                                                value="{{ $hr->form->full_name }}"
                                                                                                name="full_name"class="form-control"
                                                                                                id="inputname"
                                                                                                placeholder=" firstName"
                                                                                                readonly>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <label for="inputname"
                                                                                            class="col-sm-2 col-form-label">ጾታ</label>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="text"
                                                                                                value="{{ $hr->form->sex }}"
                                                                                                name="sex"class="form-control "
                                                                                                id="inputEmail3" readonly>
                                                                                        </div>
                                                                                    </div>



                                                                                    <div class="form-group row">
                                                                                        <label for="inputEmail3"
                                                                                            class="col-sm-2 col-form-label">ኢሜይል</label>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="email"
                                                                                                value="{{ $hr->form->email }}"
                                                                                                name="email"class="form-control"
                                                                                                id="inputname"
                                                                                                placeholder="email" readonly>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="form-group row">
                                                                                        <label for="inputEmail3"
                                                                                            class="col-sm-2 col-form-label">ስልክ
                                                                                            ቁጥር</label>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="text"
                                                                                                value="{{ $hr->form->phone }}"
                                                                                                name="phone"class="form-control"
                                                                                                id="inputname"
                                                                                                placeholder="phone" readonly>
                                                                                        </div>
                                                                                    </div>



                                                                                    <div class="form-group row">
                                                                                        <label for="inputname"
                                                                                            class="col-sm-2 col-form-label">አሁን
                                                                                            ያሉበት የስራ
                                                                                            መደብ</label>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="text"
                                                                                                value="{{ $hr->form->positionofnow }}"
                                                                                                name="positionofnow"class="form-control "
                                                                                                id="inputEmail3" readonly>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <label for="inputname"
                                                                                            class="col-sm-2 col-form-label">ደረጃ</label>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="text"
                                                                                                value="{{ $hr->form->level }}"
                                                                                                name="level"class="form-control "
                                                                                                id="inputEmail3" readonly>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="form-group row">
                                                                                        <label for="fee"
                                                                                            class="col-sm-2 col-form-label">ደምወዝ</label>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="text"
                                                                                                value="{{ $hr->form->fee }}"
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


                                                                                        @foreach ($hr->form->education as $fo)
                                                                                            <input type="text"
                                                                                                value="[{{ $fo->certificate }} , {{ $fo->discipline1 }}]"
                                                                                                name="education_level"class="form-control "
                                                                                                id="inputEmail3" readonly>
                                                                                            <input type="text"
                                                                                                value="[{{ $fo->diploma }} , {{ $fo->discipline2 }}],"
                                                                                                name="education_level"class="form-control "
                                                                                                id="inputEmail3" readonly>
                                                                                            <input type="text"
                                                                                                value="[{{ $fo->bsc }} , {{ $fo->discipline3 }}],"
                                                                                                name="education_level"class="form-control "
                                                                                                id="inputEmail3" readonly>
                                                                                            <input type="text"
                                                                                                value="[{{ $fo->msc }} , {{ $fo->discipline2 }}],"
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
                                                                                            class="col-sm-2 col-form-label">የስራ
                                                                                            ክፍሉ</label>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="text"
                                                                                                value="{{ $hr->form->job_category->job_category }}"
                                                                                                name="job_category"class="form-control "
                                                                                                id="inputEmail3" readonly>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <label for="position"
                                                                                            class="col-sm-2 col-form-label">የስራ
                                                                                            መደብ</label>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="text"
                                                                                                value="{{ $hr->form->position->position }}"
                                                                                                name="position"class="form-control "
                                                                                                id="position" readonly>
                                                                                        </div>
                                                                                    </div>

                                                                                    <button
                                                                                        class="text-white text-left mt-3 mb-4 mr-150 text-left"
                                                                                        style=" background-color:rgb(17,40,77)">
                                                                                        ምርጫ
                                                                                        2</button>
                                                                                    <div class="form-group row">
                                                                                        <label for="inputname"
                                                                                            class="col-sm-2 col-form-label">የስራ
                                                                                            ክፍሉ</label>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="text"
                                                                                                value="{{ $hr->form->jobcat2->job_category }}"
                                                                                                name="job_category"class="form-control "
                                                                                                id="job_category" readonly>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row mb-25">
                                                                                        <label for="position"
                                                                                            class="col-sm-2 col-form-label">የስራ
                                                                                            መደብ</label>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="text"
                                                                                                value="{{ $hr->form->choice2->position }}"
                                                                                                name="position"class="form-control "
                                                                                                id="position" readonly>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group  mt-100">
                                                                                        <label
                                                                                            for="UniversityHiringEra">በዩኒቨርስቲዉ
                                                                                            የቅጥር ዘመን
                                                                                            በኢትዮጵያ
                                                                                        </label>

                                                                                        <input type="text"
                                                                                            value="{{ $hr->form->UniversityHiringEra }}"
                                                                                            name="UniversityHiringEra"class="form-control "
                                                                                            id="UniversityHiringEra" readonly>

                                                                                    </div>
                                                                                    <div class="form-group  ">
                                                                                        <label
                                                                                            for="UniversityHiringEra">በዩኒቨርስቲዉ
                                                                                            አገልግሎት
                                                                                            ዘመን
                                                                                            (በዓመት,የስራ
                                                                                            መደብ)
                                                                                        </label>

                                                                                        <input type="text"
                                                                                            value="{{ $hr->form->servicPeriodAtUniversity }}"
                                                                                            name="servicPeriodAtUniversity"class="form-control "
                                                                                            id="servicPeriodAtUniversity"
                                                                                            readonly>

                                                                                    </div>
                                                                                    <div class="form-group  ">
                                                                                        <label for="UniversityHiringEra">በሌላ
                                                                                            መስርያ ቤት አገልግሎት
                                                                                            ዘመን(በዓመት,የስራ
                                                                                            መደብ)
                                                                                        </label>

                                                                                        <input type="text"
                                                                                            value="{{ $hr->form->servicPeriodAtAnotherPlace }}"
                                                                                            name="servicPeriodAtAnotherPlace"class="form-control "
                                                                                            id="servicPeriodAtAnotherPlace"
                                                                                            readonly>

                                                                                    </div>
                                                                                    <div class="form-group  ">
                                                                                        <label
                                                                                            for="servicPeriodAtAnotherPlace">አገልግሎት
                                                                                            ከዲፕሎማ
                                                                                            በፊት(በዓመት,የስራ መደብ)
                                                                                        </label>

                                                                                        <input type="text"
                                                                                            value="{{ $hr->form->serviceBeforeDiplo }}"
                                                                                            name="serviceBeforeDiplo"class="form-control "
                                                                                            id="serviceBeforeDiplo" readonly>

                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <label for="UniversityHiringEra">
                                                                                            አገልግሎት ከዲፕሎማ/ዲግሪ
                                                                                            በኋላ(በዓመት, የስራ መደብ)
                                                                                        </label>

                                                                                        <input type="text"
                                                                                            value="{{ $hr->form->serviceAfterDiplo }}"
                                                                                            name="serviceAfterDiplo"class="form-control "
                                                                                            id="serviceAfterDiplo" readonly>

                                                                                    </div>
                                                                                    <div class="form-group  ">
                                                                                        <label for="resultOfrecentPerform">
                                                                                            የሁለት ተከታታይ የቅርብ
                                                                                            ጊዜ
                                                                                            የሥራ
                                                                                            አፈጻፀም አማካይ
                                                                                            ውጤት(ከ100 በቁጥር)
                                                                                        </label>

                                                                                        <input type="text"
                                                                                            value="{{ $hr->form->resultOfrecentPerform }}"
                                                                                            name="resultOfrecentPerform"class="form-control "
                                                                                            id="resultOfrecentPerform"
                                                                                            readonly>

                                                                                    </div>
                                                                                    <div class="form-group  ">
                                                                                        <label for="DisciplineFlaw"> የዲስፕሊን
                                                                                            ጉድለት
                                                                                        </label>

                                                                                        <input type="text"
                                                                                            value="{{ $hr->form->DisciplineFlaw }}"
                                                                                            name="DisciplineFlaw"class="form-control "
                                                                                            id="DisciplineFlaw" readonly>

                                                                                    </div>
                                                                                    <div class="form-group  ">
                                                                                        <label for="MoreRoles">ተጨማሪ የሥራ ድርሻ
                                                                                        </label>

                                                                                        <input type="text"
                                                                                            value="{{ $hr->form->MoreRoles }}"
                                                                                            name="MoreRoles"class="form-control "
                                                                                            id="MoreRoles" readonly>

                                                                                    </div>




                                                                                    <h4 class="text-white text-center mt-50 mb-4"
                                                                                        style=" background-color:rgb(17,40,77)">
                                                                                        የስራ
                                                                                        ልምድ</h4>

                                                                                    <div class="form-group ">
                                                                                        <label for="inputEmail3"></label>


                                                                                        @foreach ($hr->form->experiences as $ex)
                                                                                            <input type="text"
                                                                                                value="[{{ $ex->startingDate }} እስከ {{ $ex->endingDate }} በ {{ $ex->positionyouworked }}], "
                                                                                                name=""
                                                                                                class="form-control"
                                                                                                id="inputname" placeholder=""
                                                                                                readonly>
                                                                                        @endforeach


                                                                                    </div>

                                                                                </form>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close</button>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>{{ $hr->user->name }}</td>

                                                            {{-- <td>{{ $hr->form->choice2->position }}</td> --}}

                                                            {{-- <td>{{ $hr->form->jobcat2->job_category }}</td> --}}


                                                            {{-- <td>{{ $hr->performance }}</td>
                                                            <td>{{ $hr->experience }}</td>
                                                            <td>{{ $hr->resultbased }}</td>
                                                            <td>{{ $hr->exam }}</td> --}}
                                                            <td>
                                                                {{ $hr->performance + $hr->experience + $hr->resultbased + $hr->exam }}

                                                            </td>
                                                            {{-- <td>{{ $hr->remark }}</td> --}}






                                                            <td> <a class="btn  btn-dark " type="submit" id="btn-evaluate"
                                                                    href="{{ route('addpresidenttwo', $hr->id) }}">
                                                                    evaluate</a>
                                                            </td>


                                                        </tr>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tbody>
                                    @endrole
                                </table>
                        </div>



                    </div>
                </div>
            </div>

        </section>





    </div>
@endsection
@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"
        integrity="sha512-w3u9q/DeneCSwUDjhiMNibTRh/1i/gScBVp2imNVAMCt6cUHIw6xzhzcPFIaL3Q1EbI2l+nu17q2aLJJLo4ZYg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        $(".requestStat").on("click", function() {
            // var element = document.getElementById("element-to-print")
            var element = $(this).closest("tr").find("#element-to-print")[0]
            html2pdf(element, {
                margin: 9,
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
                    orientation: 'portrait'
                },

            });
            // html2pdf().from(element).set(opt).toPdf().get('pdf').then(function(pdf) {
            //     var totalPages = pdf.internal.getNumberOfPages();

            //     for (i = 1; i <= totalPages; i++) {
            //         pdf.setPage(i);
            //         pdf.setFontSize(10);
            //         pdf.setTextColor(150);
            //         pdf.text('Page ' + i + ' of ' + totalPages, pdf.internal.pageSize.getWidth() - 100, pdf
            //             .internal.pageSize.getHeight() - 30);
            //     }
            // }).save();
        });
    </script>
@endsection
