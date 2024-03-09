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

                <a href="{{ route('position.create') }}" class="mr-25" data-toggle="tooltip" data-original-title="ይጨምሩ">
                    <i class="icon-plus icon-4x"> </i> create </a>
            </div>
            <h5 class="hk-sec-title">በአስተዳዳሪው የተሞላ መረጃ </h5>

            <div class="row">
                <div class="col-sm">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="datable_1" class="table table-hover  table-bordered w-100  pb-30">
                                <thead>
                                    <tr>
                                        <th>ተ.ቁ</th>
                                        <th> የስራ መደብ </th>
                                        <th>የስራ ክፍል</th>
                                        <th>የትምህርት ደረጃ </th>
                                        <th>የትምህርት ዝግጅት </th>
                                        <th> ደረጃ </th>
                                        <th> የስራ ልምድ </th>
                                        <th> ብዛት</th>
                                        {{-- <th> የስራ መደብ ክፍል</th> --}}
                                        <th>ድርጊት</th>



                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $i => $admin)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $admin->position }}
                                            </td>
                                            <td>{{ $admin->job_category->job_category ?? '' }}
                                            </td>
                                            {{-- <td>{{ $admin->edu_level->education_level }}
                                            </td> --}}
                                            <td>{{ $admin->edu_level }}
                                            </td>
                                            <td>
                                                <button data-toggle="modal" class="btn bg-blue-dark-4 text-white"
                                                    data-target="#id_{{ $i }}">
                                                    {{ Illuminate\Support\Str::of($admin->education_type)->words(3) }}</button>
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
                                                                {{ $admin->education_type }}

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $admin->level }}
                                            </td>
                                            <td>{{ $admin->experience }}
                                            </td>
                                            <td>{{ $admin->quantity }}
                                            </td>

                                            {{-- <td>{{ $admin->position_type->position_type }}
                                            </td> --}}
                                            {{-- <td>{{ $admin->category->category }}</td> --}}

                                            <td>
                                                <form action="{{ route('position.destroy', $admin->id) }}" method="POST">
                                                    {{-- <a href="{{ route('admin.category.show',$college->id) }}" class="mr-25" data-toggle="tooltip" data-original-title="show"> <i class="icon-eye"></i> </a> --}}
                                                    <a href="{{ route('position.edit', $admin->id) }}"
                                                        data-toggle="tooltip" data-original-title="Edit"> <i
                                                            class="icon-pencil"></i> </a>

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger pd-10">
                                                        <a data-toggle="tooltip" data-original-title="delete"> <i
                                                                class=" icon-trash txt-danger"></i> </a>
                                                    </button>
                                                </form>

                                            </td>
                                            {{-- <td>{{ $admin->performance + $hr->experience + $hr->resultbased + $hr->exam }} --}}
                                            </td>



                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{-- {!! $admins->links() !!} --}}

                        </div>
                    </div>
                </div>
            </div>
        </section>





    </div>
@endsection
