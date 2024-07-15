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
                <h5 class="hk-sec-title">ከቡድን መሪ በላይ ተወዳዳሪዎች  </h5>


                <div class="row" id="search_list">
                    <div class="col-sm">
                        <div class="table-wrap">

                            <table id="datable_1" class="table table-hover table-bordered w-100 pb-30">
                                <thead>
                                   
                                    <tr>
                                        <th>ተቁ</th>
                                        <th>ሙሉ ስም</th>
                                        <th>የስራ ክፍል</th>
                                        <th>የስራ መደብ</th>
                                        <th>ምርጫ</th>
                                        <th>ለትምህርት ዝግጅት የሚሰጥ ነጥብ (40%)</th>
                                        <th>ለስራ ልምድ አገልግሎት የሚሰጥ ነጥብ (30%)</th>
                                        <th>ለውጤት ተኮር ምዘና (30%)</th>
                                        {{-- <th>የፈተና ውጤት (15%) </th> --}}
                                        <th>አጠቃላይ ውጤት(100%)</th>
                                        <th>Decision</th>
                                        <th>Remark</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count = 1; @endphp
                                    @foreach($groupedData as $position_id => $group)
                                    
                                        @foreach($group as $data)
                                        {{-- @if($data->form->position->position_type_id==2) --}}
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ $data->form->full_name }}</td>
                                                <td> @if($data->source == 'first_choice')
                                                    {{$data->form->job_category->job_category}}
                                                    @elseif($data->source == 'second_choice')
                                                    {{ $data->form->jobcat2->job_category }} 
                                                     @endif
                                                </td>

                                              
                                                <td> @if($data->source == 'first_choice')
                                                    {{$data->form->position->position}}
                                                    @elseif($data->source == 'second_choice')
                                                    {{ $data->form->choice2->position }} 
                                                     @endif
                                                </td>
                                                <td>
                                                    @if($data->source == 'first_choice')
                                                    1ኛ ምርጫ
                                                    @elseif($data->source == 'second_choice')
                                                    2ኛ ምርጫ
                                                    @endif
                                                </td>
                                                <td> @if($data->source == 'first_choice')
                                                    {{$data->performance}}
                                                    @elseif($data->source == 'second_choice')
                                                    {{ $data->performance }} 
                                                     @endif
                                                </td>
                                                <td> @if($data->source == 'first_choice')
                                                    {{$data->experience}}
                                                    @elseif($data->source == 'second_choice')
                                                    {{ $data->experience }} 
                                                     @endif
                                                </td>
                                                <td> @if($data->source == 'first_choice')
                                                    {{$data->resultbased}}
                                                    @elseif($data->source == 'second_choice')
                                                    {{ $data->resultbased }} 
                                                     @endif
                                                </td>
                                                {{-- <td> @if($data->source == 'first_choice')
                                                    {{$data->exam	}}
                                                    @elseif($data->source == 'second_choice')
                                                    {{ $data->exam	 }} 
                                                     @endif
                                                </td> --}}
                                                <td> @if($data->source == 'first_choice')
                                                    {{$data->performance+$data->experience+$data->resultbased}}
                                                    @elseif($data->source == 'second_choice')
                                                    {{$data->performance+$data->experience+$data->resultbased}} 
                                                     @endif
                                                </td>
                                                <td> @if($data->source == 'first_choice')
                                                    {{ ($data->performance == NULL||$data->performance == 0||$data->experience == 0 || $data->experience == NULL) ? 'Failed' : 'Passed' }}
                                                    @elseif($data->source == 'second_choice')
                                                    {{ ($data->performance == NULL||$data->performance == 0||$data->experience == 0 ||  $data->experience == NULL) ? 'Failed' : 'Passed' }}
                                                     @endif
                                                </td>
                                                <td> @if($data->source == 'first_choice')
                                                    {{$data->remark	}}
                                                    @elseif($data->source == 'second_choice')
                                                    {{ $data->remark	 }} 
                                                     @endif
                                                </td>

                                            </tr>
                                            {{-- @endif --}}
                                        @endforeach
                                    @endforeach
                                </tbody>
                            
                                
                                
                        
                    </table>



                        </div>
                    </div>
                </div>
            </section>





        </div>
    @endrole
    @role('president')
        <div class="container">

            <section class="hk-sec-wrapper mt-100">
                <div class="pull-right hk-sec-title">


                </div>
                <h5 class="hk-sec-title">ከቡድን መሪ በላይ ተወዳዳሪዎች 2ኛ ምርጫ </h5>


                <div class="row" id="search_list">
                    <div class="col-sm">
                        <div class="table-wrap">

                            <table id="datable_3" class="table table-hover  table-bordered w-100  pb-30">
                                <thead>
                                    <tr>
                                        <th>ተቁ</th>




                                        <th>የሚወዳደሩበት የስራ መደብ</th>







                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $j = 0;
                                    ?>

                                    @foreach ($forms as $i => $form)
                                        {{-- @if ($form->category == 'Executive') --}}
                                            <tr>
                                                <td>{{ ++$j }}</td>
                                                <td>
                                                    <form action="" method="POST"><a
                                                            href="{{ route('posDetailtwo', $form->id) }}" class="mr-25"
                                                            data-toggle="tooltip"
                                                            data-original-title="show">{{ $form->jobcat2->job_category }}\{{ $form->position }}
                                                        </a>
                                                    </form>
                                                </td>



                                            </tr>
                                        {{-- @endif --}}
                                    @endforeach

                                </tbody>
                            </table>



                        </div>
                    </div>
                </div>
            </section>





        </div>
        {{-- <div class="container">

            <section class="hk-sec-wrapper mt-100">
                <div class="pull-right hk-sec-title">


                </div>
                <h5 class="hk-sec-title">ከቡድን መሪ በላይ ተወዳዳሪዎች 2ኛ ምርጫ በቡድን መሪ የስራ መደብ ስር</h5>


                <div class="row" id="search_list">
                    <div class="col-sm">
                        <div class="table-wrap">

                            <table id="datable_6" class="table table-hover  table-bordered w-100  pb-30">
                                <thead>
                                    <tr>
                                        <th>ተቁ</th>




                                        <th>የሚወዳደሩበት የስራ መደብ</th>







                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $j = 0;
                                    ?>
                                    @foreach ($forms as $i => $form)
                                        @if ($form->category != 'Executive')
                                            <tr>
                                                <td>{{ ++$j }}</td>
                                                <td>
                                                    <form action="" method="POST"><a
                                                            href="{{ route('posDetailtwo', $form->id) }}" class="mr-25"
                                                            data-toggle="tooltip"
                                                            data-original-title="show">{{ $form->jobcat2->job_category }}\{{ $form->position }}
                                                        </a>
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
            </section>





        </div> --}}
    @endrole
@endsection
