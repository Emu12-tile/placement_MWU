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

                    <a href="{{ url('pos') }}" class=" btn btn-dark mr-25"> back </a>
                </div>
                <h5 class="hk-sec-title">የተወዳዳሪዎች 1ኛ ምርጫ ከቡድን መሪ በላይ አጠቃላይ ውጤት </h5>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap ">
                            <div class="table-responsive">
                                <table id="datable_1" class="table table-hover table-bordered w-100  pb-30">
                                    <thead>
                                        <tr>
                                            <th>ተ.ቁ</th>

                                            <th>ሙሉ ስም</th>

                                            <th>ውጤት ሰጪ</th>

                                            <th>ለትምህርት ዝግጅት የሚሰጥ ነጥብ</th>
                                            <th>ለስራ ልምድ አገልግሎት የሚሰጥ ነጥብ</th>
                                            <th>ለውጤት ተኮር ምዘና</th>

                                            <th>ለፈተና ውጤት</th>



                                            {{-- <th>አጠቃላይ ውጤት(100%)</th> --}}

                                            <th>አጠቃላይ ውጤት(65%)</th>
                                            <th>Action</th>

                                            <th>Submission</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $j = 0;
                                        ?>
                                        @foreach ($hrs as $i => $hr)
                                            @if ($hr->form->position->position_type_id == 1)
                                                <tr>
                                                    <td>{{ ++$j }}</td>
                                                    <td>{{ $hr->form->full_name }}
                                                    </td>

                                                    <td>{{ $hr->user->name }}</td>
                                                    <td>{{ $hr->performance }}</td>
                                                    <td>{{ $hr->experience }}</td>
                                                    <td>{{ $hr->resultbased }}</td>
                                                    <td>{{ $hr->exam }}</td>




                                                    <td>
                                                        {{ $hr->performance + $hr->experience + $hr->resultbased + $hr->exam }}

                                                    </td>

                                                    <td> <a class="btn  bg-blue-dark-4 text-white " type="submit"
                                                            id="btn-evaluate" href="{{ route('resource.edit', $hr->id) }}">
                                                            Edit</a>


                                                    </td>
                                                    <td>
                                                        <form action="{{ url('update-resource/' . $hr->id) }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf

                                                            @method('PUT')
                                                            <button class="btn  bg-green-dark-4 text-white "
                                                                value="{{ $hr->id }}" type="submit" id="btn_evaluate">
                                                                Submit</button>
                                                        </form>

                                                    </td>







                                                </tr>
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
                {{-- <div class="pull-right hk-sec-title">
    
                    <a href="{{ url('choicesecond') }}" class="btn btn-dark mr-25"> back </a>
                </div> --}}
                <h5 class="hk-sec-title">የተወዳዳሪዎች 2ኛ ምርጫ ከቡድን መሪ በላይ አጠቃላይ ውጤት </h5>
    
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="datable_1" class="table table-hover table-bordered w-100 pb-30">
                                    <thead>
                                        <tr>
                                            <th>ተ.ቁ</th>
    
                                            <th>ሙሉ ስም</th>
    
                                            <th>ውጤት ሰጪ</th>
    
                                            <th>ለትምህርት ዝግጅት የሚሰጥ ነጥብ</th>
                                            <th>ለስራ ልምድ አገልግሎት የሚሰጥ ነጥብ</th>
                                            <th>ለውጤት ተኮር ምዘና</th>
    
                                            <th>ለፈተና ውጤት</th>
    
    
    
    
                                            <th>አጠቃላይ ውጤት(65%)</th>
                                            <th>Action</th>
                                            <th>Submission</th>
    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $j = 0;
                                        ?>
                                        @foreach ($hrs as $i => $hr)
                                            @if ($hr->form->choice2->position_type_id == 1)
                                                <tr>
                                                    <td>{{ ++$j }}</td>
                                                    <td>{{ $hr->form->full_name }}
                                                    </td>
    
                                                    <td>{{ $hr->user->name }}</td>
                                                    <td>{{ $hr->performance }}</td>
                                                    <td>{{ $hr->experience }}</td>
                                                    <td>{{ $hr->resultbased }}</td>
                                                    <td>{{ $hr->exam }}</td>
    
    
    
                                                    <td>
                                                        {{ $hr->performance + $hr->experience + $hr->resultbased + $hr->exam }}
    
                                                    </td>
    
    
    
    
    
                                                    <td> <a class="btn  bg-blue-dark-4 text-white " type="submit"
                                                            id="btn-evaluate" href="{{ route('secondhr.edit', $hr->id) }}">
                                                            Edit</a>
    
    
                                                    </td>
                                                    <td>
                                                        {{-- <form action="{{ url('update-secondhr/' . $hr->id) }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
    
                                                            @method('PUT')
                                                            <button class="btn  bg-green-dark-4 text-white "
                                                                value="{{ $hr->id }}" type="submit" id="btn_evaluate">
                                                                Submit</button>
                                                        </form> --}}
    
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
    
                                                </tr>
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

@endsection
