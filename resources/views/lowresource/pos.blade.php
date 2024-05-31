@extends('layouts.admin')

@section('content')
    {{-- TODO change this to componnent --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container">

        <section class="hk-sec-wrapper mt-100">
            <div class="pull-right hk-sec-title">


            </div>
            <h5 class="hk-sec-title">የአመልካቾች ዝርዝር</h5>


            <div class="row" id="search_list">
                <div class="col-sm">
                    <div class="table-wrap">

                        <table id="datable_1" class="table table-hover  table-bordered w-100  pb-30">
                            <thead>
                                <tr>
                                    <th>ተቁ</th>




                                    <th>የሚወዳደሩበት የስራ መደብ</th>







                                </tr>
                            </thead>
                            <tbody>
                        
                                @foreach ($forms as $i => $form )
                                
                                @if($form->position_type_id==2)
                                
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>
                                            <form action="" method="POST"><a
                                                    href="{{ route('positionDetail', $form->id) }}" class="mr-25"
                                                    data-toggle="tooltip"
                                                    data-original-title="show">{{ $form->job_category->job_category }}\{{ $form->position }}
                                                </a>
                                            </form>
                                        
                                        </td>
                                    </tr>
                                  @endif  
                                @endforeach
                                {{-- @foreach ($form as $i => $fo)
                                @if($fo->position_type_id==2)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>
                                            <form action="" method="POST"><a
                                                    href="{{ route('positionDetail', $fo->id) }}" class="mr-25"
                                                    data-toggle="tooltip"
                                                    data-original-title="show">{{ $fo->jobcat2->job_category }}\{{ $fo->position }}
                                                </a>
                                            </form>
                                        
                                        </td>
                                    </tr>
                                  @endif  
                                @endforeach --}}

                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </section>





    </div>
    
@endsection
