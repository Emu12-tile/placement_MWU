<!DOCTYPE html>
<html lang="en">

<head>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



    <title>Document</title>
    <style>
        /* @font-face {
            font-family: 'noto sans ethiopic', sans-serif;
            font-style: normal;
            font-weight: normal;

            src: url('https://fonts.googleapis.com/css2?family=Noto+Sans+Ethiopic&display=swap.ttf') format('truetype');
        } */
        /* @font-face {
            font-family: 'Noto Sans Ethiopic';
            font-style: normal;
            font-weight: 400;
            font-stretch: 100%;
            src: url(https://fonts.gstatic.com/s/notosansethiopic/v42/7cHPv50vjIepfJVOZZgcpQ5B9FBTH9KGNfhSTgtoow1KVnIvyBoMSzUMacb-T35OK5D1yGbuaQ.woff2) format('woff2');
            unicode-range: U+1200-1399, U+2D80-2DDE, U+AB01-AB2E;
        } */


        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(2) {
            /* background-color: #6d6a6a; */
        }

        /* #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        } */

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            /* background-color: #5f5656; */
            color: rgb(29, 28, 28);
        }
    </style>
</head>

<body>

    <div id="element-to-print">
        {{-- @foreach ($formList as $i => $form) --}}
        <h1 style="font-family: Noto Sans Ethiopic, sans-serif; text-align:center ">መደ ወላቡ ዩኒቨርሲቲ </h1>
        <h3 style="text-align:center">የአስተዳደር ሠራተኞች ፕሮፋይል</h3>
        <p>1/ የሠራተኛው ሙሉ ስም:-{{ $form->firstName }} {{ $form->middleName }} {{ $form->lastName }} </p>
        <p>2/ አሁን ያሉበት የስራ ክፍል፦{{ $form->jobcat }} &emsp; አሁን ያሉበት የስራ መደብ መጠርያ:-{{ $form->positionofnow }} &emsp;
            ደረጃ:-{{ $form->level }}</p>
        <p>3/ ብሔር:-{{ $form->ethinicity }} &emsp; የትውልድ ዘመን:-{{ $form->birth_date }}
        </p>
        <p>4/ የተማሩት የት/ት ዝግጅትና የት/ት ደረጃ:-
        </p>
        <table id="customers" class="mb-15">
            <thead>
                <tr>

                    <th>የትምህርት ደረጃ</th>
                    <th>የትምህርት ዝግጅት(በተቋም)</th>
                    <th>የትምህርት ዝግጅት((ሲኦሲ))</th>
                    <th>የጨረሱበት ዓመት</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($form->education as $i => $fo)
                    <tr>
                        <td> {{ $fo->level ?? '' }}</td>
                        <td> {{ $fo->discipline ?? '' }}</td>
                        <td> {{ $fo->academicPreparationCOC ?? '' }}</td>
                        <td>{{ $fo->completion_date ?? '' }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>5/ በዩኒቨርስቲዉ የቅጥር
            ዘመን በኢትዮጵያ አቆጣጠር:-
            {{ $form->UniversityHiringEra }}

        </p>
        <p>6/ ጠቅላላ አገልግሎት ዘመን (በዓመት):-{{ $form->servicPeriodAtUniversity }} </p>
        {{-- <p>7/ በሌላ መስርያ ቤት አገልግሎት ዘመን:-{{ $form->servicPeriodAtAnotherPlace }} </p> --}}
        <h5>7/ የሚወዳደሩበት የስራ ክፍልና የስራ መደብ</h5>
        <p> ምርጫ 1</p>

        <p> የስራ ክፍል :-{{ $form->job_category->job_category ?? '' }}</p>
        <p> የስራ መደብ፣ {{ $form->position->position ?? '' }}</p>
        <p>
            ምርጫ 2</p>
        <p> የስራ ክፍል:- {{ $form->jobcat2->job_category ?? '' }} </p>
        <p> የስራ መደብ:- {{ $form->choice2->position ?? '' }}</p>
        {{-- / <div class="html2pdf__page-break"></div> --}}
        <p>8/ ጠቅላላ የስራ ልምድ ብዛትና የስራው አይነት</p>

        <table id="customers">
            <thead>
                <tr>
                    <th rowspan="2">ተ.ቁ</th>
                    <th rowspan="2">የአገልግሎት ዘመን ከ---እስከ---ዓ.ም</th>
                    <th rowspan="2">የሥራ ዓይነት</th>

                    <th colspan="3"> የአገልግሎት ጊዜ</th>
                    <th rowspan="2">ምርመራ</th>


                </tr>
                <tr>

                    <th>ዓመት</td>
                    <th>ወር</td>
                    <th>ቀን</td>
                </tr>

            </thead>
            <tbody>
                @foreach ($forms as $i => $fo)
                    <tr>
                        <td>{{ ++$i }}</td>
                        {{-- <td>{{ date('m/d/y', strtotime($form->startingDate)) }}-{{ date('m/d/y', strtotime($form->endingDate)) }} --}}
                        <td>
                            {{-- {{ Carbon::createFromFormat( $fo->startingDate)->format('d/m/y') }}-{{ $fo->endingDate }} --}}
                            {{-- {{   Carbon::createFromFormat('m/d/Y', $fo->startingDate)->format('d-m-Y')}} --}}
                            {{-- {{ Carbon::createFromFormat('d/m/Y', $fo->startingDate) }} --}}


                            ከ{{ Carbon::parse($fo->startingDate)->day }}/{{ Carbon::parse($fo->startingDate)->month }}/{{ Carbon::parse($fo->startingDate)->year }}
                            እስከ
                            {{ Carbon::parse($fo->endingDate)->day }}/{{ Carbon::parse($fo->endingDate)->month }}/{{ Carbon::parse($fo->endingDate)->year }}
                        </td>
                        </td>
                        <td>{{ $fo->positionyouworked }}</td>
                        <td>
                            <?php
                            
                            $fdate = Carbon::parse($fo->startingDate);
                            
                            $tdate = Carbon::parse($fo->endingDate);
                            
                            // $years = $tdate - $fdate;
                            
                            // echo abs($years);
                            //
                            
                            $days = $tdate->diffInDays($fdate);
                            $months = $tdate->diffInMonths($fdate);
                            
                            $years = $tdate->diffInYears($fdate);
                            // dd($fdate->diffForHumans($tdate));
                            // dd($years,$months,$days);
                            
                            $time = $tdate->diff($fdate);
                            echo $time->y;
                            //   {{$time->y}} year, {{$time->m}} months, {{$time->d}} days
                            // dd($time->y);
                            ?>
                        </td>
                        <td>
                            <?php
                            
                            $fdate = Carbon::parse($fo->startingDate);
                            
                            $tdate = Carbon::parse($fo->endingDate);
                            
                            // $months = $tdate - $fdate;
                            
                            //   echo abs($months);
                            $time = $tdate->diff($fdate);
                            echo $time->m;
                            ?>
                        </td>
                        <td>
                            <?php
                            
                            // $fdate = Carbon::parse($fo->startingDate);
                            
                            // $tdate = Carbon::parse($fo->endingDate);
                            $time = $tdate->diff($fdate);
                            // $days = $tdate - $fdate;
                            echo $time->d;
                            // echo abs($days);
                            ?>
                        </td>
                        <td></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="html2pdf__page-break"></div> --}}
        <p>9/ አገልግሎት ከዲፕሎማ/ዲግሪ በፊት:- {{ $form->serviceBeforeDiplo }} ፣ አገልግሎት ከዲፕሎማ/ዲግሪ በኋላ
            {{ $form->serviceAfterDiplo }}</p>
        <p>10/ የሁለት ተከታታይ የቅርብ ጊዜ የሥራ አፈጻፀም አማካይ ውጤት:-{{ $form->resultOfrecentPerform }}</p>
        <p>11/ የዲስፕሊን ጉድለት:-{{ $form->DisciplineFlaw }} {{ $form->DisciplineFlawDate }}</p>
        <p>12/ የሰራተኛው አዎንታዊ ድጋፍ ተጠቃሚነት:-
            {{ $form->employer_support }}
        </p>
        <p>13/ ሰራተኛው ያለበት ሁኔታ:-{{ $form->employee_situation }}</p>
        <p>14/ ተጨማሪ የሥራ ድርሻ:-@foreach ($morerole as $i => $fo)
                {{ $fo->more_role ?? '' }},
            @endforeach
        </p>
        <p>ቅጹን የሞላው ሰራተኛ ስም &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;
            ፊርማ&mdash;&mdash;&mdash;&mdash; ቀን&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;</p>
        <p>ስለትክክለኛነቱ ያረጋገጠው የሰዉ ሀብት ባለሙያ {{ Auth()->user()->name }}

            ፊርማ&mdash;&mdash;&mdash;&mdash;&mdash;
            ቀን&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;
        </p>

    </div>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"
    integrity="sha512-w3u9q/DeneCSwUDjhiMNibTRh/1i/gScBVp2imNVAMCt6cUHIw6xzhzcPFIaL3Q1EbI2l+nu17q2aLJJLo4ZYg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    var element = document.getElementById("element-to-print")


    html2pdf(element, {
        margin: 15,
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
    })
    setTimeout(function() {
        window.location.href = "{{ url('/hr') }}";
    }, 5000);
</script>

</html>
