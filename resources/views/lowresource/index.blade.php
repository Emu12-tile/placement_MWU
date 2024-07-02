@extends('layouts.admin')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container">

        <section class="hk-sec-wrapper mt-100">
            <div class="pull-right hk-sec-title">

                {{-- <a href="{{ url('positionresult') }}" class="btn btn-dark mr-25"> back </a> --}}
            </div>
            <h5 class="hk-sec-title">የተወዳዳሪዎች 1ኛ ምርጫ ከቡድን መሪ በታች አጠቃላይ ውጤት </h5>

            <div class="row">
                <div class="col-sm">
                    <div class="table-wrap">

                        <table id="datable_6" class="table table-hover table-bordered w-100  pb-30">
                            <thead>
                                <tr>
                                    <th>ተ.ቁ</th>
                                    <th>ሙሉ ስም</th>
                                    {{-- <th>ኮሚቴ ውጤት ሰጪ</th> --}}

                                    <th>ለትምህርት ዝግጅት የሚሰጥ ነጥብ</th>
                                    <th>ለስራ ልምድ አገልግሎት የሚሰጥ ነጥብ</th>
                                    <th>ለውጤት ተኮር ምዘና</th>

                                    <th>አጠቃላይ ውጤት(100%)</th>
                                    <th>Action</th>
                                    <th>Submit</th>
                                    <th> pdf</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $j = 0;
                                ?>
                                @foreach ($hrs as $i => $hr)
                                    @if ($hr->form->position->position_type_id == 2)
                                        @if ($hr->status_hr == 0)
                                            <tr>
                                                <td>{{ ++$j }}</td>
                                                <td>{{ $hr->form->full_name }} <p>{{ $hr->form->email }}</p>
                                                </td>
                                                {{-- <td>{{ $hr->user->name }}</td> --}}
                                                <td>{{ $hr->performance }}</td>
                                                <td>{{ $hr->experience }}</td>
                                                <td>{{ $hr->resultbased }}</td>

                                                <td>{{ $hr->performance + $hr->experience + $hr->resultbased }}
                                                </td>
                                                <td> <a href="{{ route('resource.edit', $hr->id) }}" data-toggle="tooltip"
                                                        data-original-title="Edit"> <i class="icon-pencil"></i>
                                                    </a>


                                                </td>
                                                <td>

                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <!-- Button trigger modal -->
                                                            <button type="button"
                                                                class="btn bg-green-dark-4 text-white btn-sm"
                                                                data-toggle="modal" data-target="#id1_{{ $i }}">
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
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Close</button>
                                                                            <form
                                                                                action="{{ url('update-lowresource/' . $hr->id) }}"
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


                                                    <button type="button" class="btn btn-primary requestStat  btn-sm "
                                                        data-toggle="modal" data-target="#id_{{ $i }}"><i
                                                            class="ion ion-md-archive "></i>pdf
                                                    </button>

                                                    <div class="modal fade" id="id_{{ $i }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLongTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg " role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <div id="element-to-print">

                                                                        <h5 class="modal-title " id="exampleModalLongTitle">
                                                                            የተወዳዳሪው 1ኛ ምርጫ ከደረጃ በታች አጠቃላይ ውጤት
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
                                                                                        <td>{{ $hr->form->full_name }}</td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td> ያለዎት የትምርት ዝግጅት</td>
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
                                                                                        <td>ለትምህርት ዝግጅት የሚሰጥ ነጥብ(40%)</td>
                                                                                        <td>{{ $hr->performance }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>ለስራ ልምድ አገልግሎት የሚሰጥ ነጥብ(30%)
                                                                                        </td>
                                                                                        <td> {{ $hr->experience }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>ለውጤት ተኮር ምዘና(30%)</td>
                                                                                        <td>{{ $hr->resultbased }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Remark</td>
                                                                                        <td>{{ $hr->remark }}</td>
                                                                                    </tr>

                                                                                </tbody>
                                                                                <tfoot style="font-size: 20px;">
                                                                                    <tr>
                                                                                        <td>አጠቃላይ ውጤት(100%)</td>
                                                                                        <td>{{ $hr->performance + $hr->experience + $hr->resultbased }}
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

                                                                        </div>
                                                                        <p class="mt-5 text-center">@copyright <a
                                                                                href="#" class="text-dark"
                                                                                target="_blank">AASTU</a> © 2023</p>
                                                                        </p>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                        </div>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>



                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach

                        </table>
                        {{-- {!! $hrs->links() !!} --}}

        </section>





    </div>
    <div class="container">

        <section class="hk-sec-wrapper mt-100">
            <div class="pull-right hk-sec-title">


            </div>
            <h5 class="hk-sec-title">የተወዳዳሪዎች 1ኛ ምርጫ ከቡድን መሪ በታች አጠቃላይ ውጤት </h5>

            <div class="row">
                <div class="col-sm">
                    <div class="table-wrap">

                        <table id="datable_3" class="table table-hover table-bordered w-100  pb-30">
                            <thead>
                                <tr>
                                    <th>ተ.ቁ</th>
                                    <th>ሙሉ ስም</th>
                                    <th>ውጤት ሰጪ</th>

                                    <th>ለትምህርት ዝግጅት የሚሰጥ ነጥብ</th>
                                    <th>ለስራ ልምድ አገልግሎት የሚሰጥ ነጥብ</th>
                                    <th>ለውጤት ተኮር ምዘና</th>

                                    <th>አጠቃላይ ውጤት(100%)</th>
                                    <th>Submitted by</th>
                                    <th>Remark</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $j = 0;
                                ?>
                                @foreach ($secondhrs as $i => $hr)
                                    @if ($hr->form->position->position_type_id == 2)
                                        @if ($hr->status_hr == 1)
                                            <tr>
                                                <td>{{ ++$j }}</td>
                                                <td>{{ $hr->form->full_name }} <p>{{ $hr->form->email }}</p>
                                                </td>
                                                <td>{{ $hr->user->name }}</td>
                                                <td>{{ $hr->performance }}</td>
                                                <td>{{ $hr->experience }}</td>
                                                <td>{{ $hr->resultbased }}</td>

                                                <td>{{ $hr->performance + $hr->experience + $hr->resultbased }}
                                                </td>
                                                <td>{{ $hr->submit }}</td>
                                                <td>{{ $hr->remark }}</td>





                                            </tr>
                                        @endif
                                    @endif
                                @endforeach

                        </table>
                        {{-- {!! $hrs->links() !!} --}}
                    </div>
                </div>
            </div>
        </section>





    </div>
    <div class="container">

        <section class="hk-sec-wrapper mt-100">
            <div class="pull-right hk-sec-title">

                {{-- <a href="{{ url('choicelow') }}" class="btn btn-dark mr-25"> back </a> --}}
            </div>
            <h5 class="hk-sec-title">የተወዳዳሪዎች 2ኛ ምርጫ ከ ቡድን መሪ በታች አጠቃላይ ውጤት </h5>

            <div class="row">
                <div class="col-sm">
                    <div class="table-wrap">

                        <table id="datable_9" class="table table-hover table-bordered w-100  pb-30">
                            <thead>
                                <tr>
                                    <th>ተ.ቁ</th>
                                    <th>ሙሉ ስም</th>
                                    {{-- <th>ውጤት ሰጪ</th> --}}

                                    <th>ለትምህርት ዝግጅት የሚሰጥ ነጥብ</th>
                                    <th>ለስራ ልምድ አገልግሎት የሚሰጥ ነጥብ</th>
                                    <th>ለውጤት ተኮር ምዘና</th>

                                    <th>አጠቃላይ ውጤት(100%)</th>
                                    <th>Action</th>
                                    <th>Submit</th>
                                    <th>pdf</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $j = 0;
                                ?>
                                @foreach ($secondhrs as $i => $hr)
                                    @if ($hr->form->choice2->position_type_id == 2)
                                        @if ($hr->status_hr == 0)
                                            <tr>
                                                <td>{{ ++$j }}</td>
                                                <td>{{ $hr->form->full_name }}<p>({{ $hr->form->email }})</p>
                                                </td>
                                                {{-- <td>{{ $hr->user->name }}</td> --}}
                                                <td>{{ $hr->performance }}</td>
                                                <td>{{ $hr->experience }}</td>
                                                <td>{{ $hr->resultbased }}</td>

                                                <td>{{ $hr->performance + $hr->experience + $hr->resultbased }}
                                                </td>
                                                <td> <a href="{{ route('secondhr.edit', $hr->id) }}" data-toggle="tooltip"
                                                        data-original-title="Edit"> <i class="icon-pencil"></i>
                                                    </a>


                                                </td>
                                                <td>


                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <!-- Button trigger modal -->
                                                            <button type="button"
                                                                class="btn bg-green-dark-4 text-white btn-sm"
                                                                data-toggle="modal" data-target="#id1s_{{ $i }}">
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
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Close</button>
                                                                            <form
                                                                                action="{{ url('update-lowsecondhr/' . $hr->id) }}"
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


                                                    <a href="" type="button"
                                                        class="btn btn-primary requestStat btn-sm" data-toggle="modal"
                                                        data-target="#id2_{{ $i }}"><i
                                                            class="ion ion-md-archive "></i>pdf
                                                    </a>

                                                    <div class="modal fade" id="id2_{{ $i }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLongTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <div id="element-to-print">

                                                                        <h5 class="modal-title " id="exampleModalLongTitle">
                                                                            የተወዳዳሪው 2ኛ ምርጫ ከ ደረጃ በታች አጠቃላይ ውጤት
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
                                                                                        <td>{{ $hr->form->full_name }}</td>
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
                                                                                            @endforeach
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>የሚወዳደሩበት የሥራ መደብ</td>
                                                                                        <td>{{ $hr->form->choice2->position }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>ለትምህርት ዝግጅት የሚሰጥ ነጥብ(40%)</td>
                                                                                        <td>{{ $hr->performance }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>ለስራ ልምድ አገልግሎት የሚሰጥ ነጥብ(30%)
                                                                                        </td>
                                                                                        <td> {{ $hr->experience }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>ለውጤት ተኮር ምዘና(30%)</td>
                                                                                        <td>{{ $hr->resultbased }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Remark</td>
                                                                                        <td>{{ $hr->remark }}</td>
                                                                                    </tr>

                                                                                </tbody>
                                                                                <tfoot style="font-size: 20px;">
                                                                                    <tr>
                                                                                        <td>አጠቃላይ ውጤት(100%)</td>
                                                                                        <td>{{ $hr->performance + $hr->experience + $hr->resultbased }}
                                                                                        </td>
                                                                                    </tr>
                                                                                </tfoot>
                                                                            </table>
                                                                            <p>ከኮሚቴ ውጤት ሰጪ :{{ $hr->user->name }}</p>
                                                                        </div>
                                                                        <div class="footerpdf">
                                                                            <p>This pdf generated by
                                                                                {{ Auth::user()->name }} ©


                                                                                <?php
                                                                                $mytime = Carbon\Carbon::now()->tz('EAT');
                                                                                echo $mytime->toDateTimeString();
                                                                                ?>

                                                                        </div>
                                                                        <p class="mt-5 text-center">@copyright <a
                                                                                href="#" class="text-dark"
                                                                                target="_blank">AASTU(YEE)</a> © 2023</p>
                                                                        </p>






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

                        </table>

                    </div>
                </div>
            </div>
        </section>





    </div>
    <div class="container">

        <section class="hk-sec-wrapper mt-100">
            <div class="pull-right hk-sec-title">


            </div>
            <h5 class="hk-sec-title">የተወዳዳሪዎች 2ኛ ምርጫ ከ ቡድን መሪ በታች አጠቃላይ ውጤት(100%) </h5>

            <div class="row">
                <div class="col-sm">
                    <div class="table-wrap">

                        <table id="datable_7" class="table table-hover table-bordered w-100  pb-30">
                            <thead>
                                <tr>
                                    <th>ተ.ቁ</th>
                                    <th>ሙሉ ስም</th>
                                    <th>ውጤት ሰጪ</th>

                                    <th>ለትምህርት ዝግጅት የሚሰጥ ነጥብ(40%)</th>
                                    <th>ለስራ ልምድ አገልግሎት የሚሰጥ ነጥብ(30%)</th>
                                    <th>ለውጤት ተኮር ምዘና(30%)</th>


                                    <th>አጠቃላይ ውጤት(100%)</th>
                                    <th>Submitted by</th>
                                    <th>Remark</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $j = 0;
                                ?>
                                @foreach ($secondhrs as $i => $hr)
                                    @if ($hr->form->choice2->position_type_id == 2)
                                        @if ($hr->status_hr == 1)
                                            <tr>
                                                <td>{{ ++$j }}</td>
                                                <td>{{ $hr->form->full_name }}<p>({{ $hr->form->email }})</p>
                                                </td>
                                                <td>{{ $hr->user->name }}</td>
                                                <td>{{ $hr->performance }}</td>
                                                <td>{{ $hr->experience }}</td>
                                                <td>{{ $hr->resultbased }}</td>


                                                <td>{{ $hr->performance + $hr->experience + $hr->resultbased }}
                                                </td>
                                                <td>{{ $hr->submit }}</td>
                                                <td>{{ $hr->remark }}</td>





                                            </tr>
                                        @endif
                                    @endif
                                @endforeach

                        </table>
                        {{-- {!! $hrs->links() !!} --}}
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
                }
                // headerfooter: {
                //     height: '28mm',
                //     contents: {
                //         default: '<div class="html2pdf__page__header"></div>',
                //         first: '<div class="html2pdf__page__header"></div>',
                //         last: '<div class="html2pdf__page__header"></div>',
                //         after: '<div class="html2pdf__page__footer">wii</div>',
                //     }
                // }
            });
        });
    </script>
@endsection
