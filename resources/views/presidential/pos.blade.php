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
            <h5 class="hk-sec-title">ከቡድን መሪ በላይ ተወዳዳሪዎች 1ኛ ምርጫ በስራ አስፈጻሚ የስራ መደብ ስር</h5>


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
                                                        href="{{ route('posDetailpres', $form->id) }}" class="mr-25"
                                                        data-toggle="tooltip"
                                                        data-original-title="show">{{ $form->job_category->job_category }}\{{ $form->position }}
                                                    </a>
                                                </form>
                                            </td>









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
            <h5 class="hk-sec-title">ከቡድን መሪ በላይ ተወዳዳሪዎች 1ኛ ምርጫ በቡድን መሪ የስራ መደብ ስር</h5>


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
                                                        href="{{ route('posDetailpres', $form->id) }}" class="mr-25"
                                                        data-toggle="tooltip"
                                                        data-original-title="show">{{ $form->job_category->job_category }}\{{ $form->position }}
                                                    </a>
                                                </form>
                                            </td>









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
@endsection
