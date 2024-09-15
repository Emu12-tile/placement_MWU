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
                <!-- You can add content here if needed -->
            </div>
            <h5 class="hk-sec-title">ከቡድን መሪ በላይ ተወዳዳሪዎች </h5>

            <div class="row" id="search_list">
                <div class="col-sm">
                    <div class="table-wrap">
                        <table id="datable_3" class="table table-hover table-bordered w-100 pb-30">
                            <thead>
                                <tr>
                                    <th>ተቁ</th>
                                    <th>ሙሉ ስም</th>
                                    <th>የስራ ክፍል</th>
                                    <th>የስራ መደብ</th>
                                    <th>ምርጫ</th>
                                    <th>ለትምህርት ዝግጅት የሚሰጥ ነጥብ (25%)</th>
                                    <th>ለስራ ልምድ አገልግሎት የሚሰጥ ነጥብ (15%)</th>
                                    <th>ለውጤት ተኮር ምዘና (10%)</th>
                                    <th>የፈተና ውጤት (15%) </th>
                                    <th>president ውጤት (35%) </th>
                                    <th>aff. action</th>
                                    <th>አጠቃላይ ውጤት(100%)</th>

                                    <th>Decision</th>
                                    <th>Remark</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count = 1; @endphp
                                @foreach ($groupedData as $position_id => $group)
                                    @foreach ($group as $data)
                                        <tr>
                                            <td>{{ $count++ }}</td>

                                            <td>
                                                @if ($data->source == 'first_choice')
                                                    @if ($data->hr && $data->hr->form)
                                                        {{ $data->hr->form->full_name }}
                                                    @else
                                                        N/A
                                                    @endif
                                                @elseif($data->source == 'second_choice')
                                                    @if ($data->secondhr && $data->secondhr->form)
                                                        {{ $data->secondhr->form->full_name }}
                                                    @else
                                                        N/A
                                                    @endif
                                                @endif
                                            </td>

                                            <td>
                                                @if ($data->source == 'first_choice')
                                                    @if ($data->hr && $data->hr->form && $data->hr->form->job_category)
                                                        {{ $data->hr->form->job_category->job_category }}
                                                    @else
                                                        N/A
                                                    @endif
                                                @elseif($data->source == 'second_choice')
                                                    @if ($data->secondhr && $data->secondhr->form && $data->secondhr->form->jobcat2)
                                                        {{ $data->secondhr->form->jobcat2->job_category }}
                                                    @else
                                                        N/A
                                                    @endif
                                                @endif
                                            </td>

                                            <td>
                                                @if ($data->source == 'first_choice')
                                                    @if ($data->hr && $data->hr->form && $data->hr->form->position)
                                                        {{ $data->hr->form->position->position }}
                                                    @else
                                                        N/A
                                                    @endif
                                                @elseif($data->source == 'second_choice')
                                                    @if ($data->secondhr && $data->secondhr->form && $data->secondhr->form->choice2)
                                                        {{ $data->secondhr->form->choice2->position }}
                                                    @else
                                                        N/A
                                                    @endif
                                                @endif
                                            </td>

                                            <td>
                                                @if ($data->source == 'first_choice')
                                                    1ኛ ምርጫ
                                                @elseif($data->source == 'second_choice')
                                                    2ኛ ምርጫ
                                                @endif
                                            </td>

                                            <td>
                                                @if ($data->source == 'first_choice')
                                                    @if ($data->hr)
                                                        {{ $data->hr->performance }}
                                                    @else
                                                        N/A
                                                    @endif
                                                @elseif($data->source == 'second_choice')
                                                    @if ($data->secondhr)
                                                        {{ $data->secondhr->performance }}
                                                    @else
                                                        N/A
                                                    @endif
                                                @endif
                                            </td>

                                            <td>
                                                @if ($data->source == 'first_choice')
                                                    @if ($data->hr)
                                                        {{ $data->hr->experience }}
                                                    @else
                                                        N/A
                                                    @endif
                                                @elseif($data->source == 'second_choice')
                                                    @if ($data->secondhr)
                                                        {{ $data->secondhr->experience }}
                                                    @else
                                                        N/A
                                                    @endif
                                                @endif
                                            </td>

                                            <td>
                                                @if ($data->source == 'first_choice')
                                                    @if ($data->hr)
                                                        {{ $data->hr->resultbased }}
                                                    @else
                                                        N/A
                                                    @endif
                                                @elseif($data->source == 'second_choice')
                                                    @if ($data->secondhr)
                                                        {{ $data->secondhr->resultbased }}
                                                    @else
                                                        N/A
                                                    @endif
                                                @endif
                                            </td>

                                            <td>
                                                @if ($data->source == 'first_choice')
                                                    @if ($data->hr)
                                                        {{ $data->hr->exam }}
                                                    @else
                                                        N/A
                                                    @endif
                                                @elseif($data->source == 'second_choice')
                                                    @if ($data->secondhr)
                                                        {{ $data->secondhr->exam }}
                                                    @else
                                                        N/A
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if ($data->source == 'first_choice')
                                                    {{-- @if ($data->hr) --}}
                                                    {{ $data->presidentGrade }}
                                                    {{-- @else
                                                    N/A
                                                @endif --}}
                                                @elseif($data->source == 'second_choice')
                                                    {{-- @if ($data->secondhr) --}}
                                                    {{ $data->presidentGrade }}
                                                    {{-- @else
                                                    N/A
                                                @endif --}}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($data->source == 'first_choice')
                                                    @if ($data->hr->form->sex == 'ሴት' || $data->hr->form->sex == 'ሴ')
                                                        {{-- Calculate total and apply 3% increase --}}
                                                        @php
                                                            $total =
                                                                $data->hr->performance +
                                                                $data->hr->experience +
                                                                $data->hr->exam +
                                                                $data->hr->resultbased +
                                                                $data->presidentGrade;
                                                            $withIncrease = $total * 0.03; // Add 3%
                                                        @endphp
                                                        {{ $withIncrease }}
                                                    @else
                                                        N/A
                                                    @endif
                                                @elseif($data->source == 'second_choice')
                                                    {{-- Add decision logic here --}}
                                                    @if ($data->secondhr->form->sex == 'ሴት' || $data->secondhr->form->sex == 'ሴ')
                                                        {{-- Calculate total and apply 3% increase --}}

                                                        @php
                                                            $total =
                                                                $data->secondhr->performance +
                                                                $data->secondhr->experience +
                                                                $data->secondhr->exam +
                                                                $data->secondhr->resultbased +
                                                                $data->presidentGrade;
                                                            $withIncrease = $total * 0.03; // Add 3%
                                                        @endphp
                                                        {{ $withIncrease }}
                                                    @else
                                                        N/A
                                                    @endif
                                                @endif
                                            </td>

                                            <td>
                                                @if ($data->source == 'first_choice')
                                                    @if ($data->hr)
                                                        @if ($data->hr->form->sex == 'ሴት' || $data->hr->form->sex == 'ሴ')
                                                            {{-- Calculate total and apply 3% increase --}}
                                                            @php
                                                                $total =
                                                                    $data->hr->performance +
                                                                    $data->hr->experience +
                                                                    $data->hr->exam +
                                                                    $data->hr->resultbased +
                                                                    $data->presidentGrade;
                                                                $withIncrease = $total * 1.03; // Add 3%
                                                            @endphp
                                                            {{ $withIncrease }}
                                                        @else
                                                            {{ $data->hr->performance + $data->hr->experience + $data->hr->resultbased + $data->hr->exam + $data->presidentGrade }}
                                                        @endif
                                                    @else
                                                        N/A
                                                    @endif
                                                @elseif($data->source == 'second_choice')
                                                    @if ($data->secondhr)
                                                        @if ($data->secondhr->form->sex == 'ሴት' || $data->secondhr->form->sex == 'ሴ')
                                                            {{-- Calculate total and apply 3% increase --}}

                                                            @php
                                                                $total =
                                                                    $data->secondhr->performance +
                                                                    $data->secondhr->experience +
                                                                    $data->secondhr->exam +
                                                                    $data->secondhr->resultbased +
                                                                    $data->presidentGrade;
                                                                $withIncrease = $total * 1.03; // Add 3%
                                                            @endphp
                                                            {{ $withIncrease }}
                                                        @else
                                                            {{ $data->secondhr->performance + $data->secondhr->experience + $data->secondhr->resultbased + $data->secondhr->exam + $data->presidentGrade }}
                                                        @endif
                                                    @endif
                                                @else
                                                    N/A
                                                @endif

                                            </td>

                                            <td>
                                                @if ($data->source == 'first_choice')
                                                    {{-- Add decision logic here --}}
                                                @elseif($data->source == 'second_choice')
                                                    {{-- Add decision logic here --}}
                                                @endif
                                            </td>



                                            <td>
                                                @if ($data->source == 'first_choice')
                                                    @if ($data->hr)
                                                        {{ $data->hr->remark }}
                                                    @else
                                                        N/A
                                                    @endif
                                                @elseif($data->source == 'second_choice')
                                                    @if ($data->secondhr)
                                                        {{ $data->secondhr->remark }}
                                                    @else
                                                        N/A
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
