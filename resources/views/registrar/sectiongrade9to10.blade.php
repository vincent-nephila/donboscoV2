<html>
    <head>
        <style type='text/css'>

           table tr td{
            font-size:11pt;
            padding-left: 10px;
           }
           body{
                font-family: calibri;
                margin-left: auto;
            }
        </style>    
        <style type="text/css" media="print">
                       body{
                font-family: calibri;
                margin-left: auto;
                margin-right: none;
            }
        </style>
        <link href="{{ asset('/css/print.css') }}" rel="stylesheet">
    </head>
    <body style="width:16.6cm">
        @foreach($collection as $info)
        <table class="parent" width="100%" style="padding:10px;margin-left: auto;margin-right: auto;margin-top: .8cm;margin-bottom: .8cm;">
            <thead>
            <tr>
                <td style="padding-left: 0px;">
                    <table class="head" width="100%" border="0" cellpadding="0" cellspacing="0" align="right">

                    <tr>
                        <td rowspan="4" style="text-align: right;padding-left: 0px;width: 35%" class="logo" width="55px">
                            <img src="{{asset('images/logo.png')}}"  style="display: inline-block;width:70px">
                        </td>
                        <td style="padding-left: 0px;">
                            <span style="font-size:11pt; font-weight: bold">Don Bosco Technical Institute</span>
                        </td>
                    </tr>
                    <tr><td style="font-size:9pt;padding-left: 0px;">Chino Roces Ave., Makati City </td></tr>
                    <tr><td style="font-size:9pt;padding-left: 0px;">PAASCU Accredited</td></tr>
                    <tr><td style="font-size:9pt;padding-left: 0px;">School Year {{$schoolyear->schoolyear}} - {{intval($schoolyear->schoolyear)+1}}</td></tr>
                    <tr><td style="font-size:4pt;padding-left: 0px;">&nbsp; </td></tr>
                    <tr><td><span style="font-size:5px"></td></tr>
                    <tr>
                        <td colspan="2">
                    <div style="text-align: center;font-size:9pt;"><b>STUDENT PROGRESS REPORT CARD</b></div>
                    <div style="text-align: center;font-size:9pt;"><b>GRADE SCHOOL DEPARTMENT</b></div>

                        </td>
                    </tr>
                    <tr><td style="font-size:3px"><br></td></tr>
                    </table>
                </td>
            </tr>
            </thead>
            <tr>
                <td style="padding-left: 0px;">
                    <table class="head" width="100%" border = '0' cellpacing="0" cellpadding = "0">
                        <tr>
                            <td width="13%" style="font-size:10pt;padding-left: 0px;">
                                <b>Name:</b>
                            </td>
                            <td width="52%" style="font-size:10pt;padding-left: 0px;">
                                {{$info['info']->lastname}}, {{$info['info']->firstname}} {{$info['info']->middlename}} {{$info['info']->extensionname}}
                            </td>
                            <td width="13%" style="font-size:10pt;padding-left: 0px;">
                                <b>Student No:</b>
                            </td>
                            <td width="23%" style="font-size:10pt;padding-left: 0px;">
                                {{$info['info']->idno}}
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size:10pt;padding-left: 0px;width:">
                                <b>Gr. and Sec:</b>
                            </td>
                            <td style="font-size:10pt;padding-left: 0px;">
                                {{$level}} - {{$section}}
                            </td>
                            <td style="font-size:10pt;padding-left: 0px;">
                                <b>Class No:</b>
                            </td>
                            <td style="font-size:10pt;padding-left: 0px;">
                                {{$info['info']->class_no}}
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size:10pt;padding-left: 0px;">
                                <b>Shop:</b>
                            </td>
                            <td style="font-size:10pt;padding-left: 0px;">
                                {{$shop}}
                            </td>
                            <td style="font-size:10pt;"  colspan="2">
                                
                            </td>
                        </tr>                        
                        <tr>
                            <td style="font-size:10pt;padding-left: 0px;">
                                <b>Adviser:</b>
                            </td>
                            <td style="font-size:10pt;padding-left: 0px;">
                                @if($teacher != null)
                                {{$teacher->adviser}}
                                @endif
                            </td>
                            <td style="font-size:10pt;padding-left: 0px;"  >
                                <b>LRN:</b>
                            </td>
                            <td style="font-size:10pt;padding-left: 0px;">
                                {{$info['info']->lrn}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding-left: 0px;">
                @if(sizeOf($info['aca'])!= 0)
                <table border = '1' cellspacing="0" cellpadding = "0" width="100%" class="reports">
                    <tr style="font-weight: bold;text-align:center;">
                        <td width="35%" style="padding: 15px 0 15px 0;">SUBJECTS</td>
                        <td width="10%">1</td>
                        <td width="10%">2</td>
                        <td width="10%">3</td>
                        <td width="10%">4</td>
                        <td width="12%">FINAL RATING</td>
                        <td width="13%">REMARKS</td>
                    </tr>
                    {{--*/$first=0/*--}}
                    {{--*/$second=0/*--}}
                    {{--*/$third=0/*--}}
                    {{--*/$fourth=0/*--}}
                    {{--*/$final=0/*--}}
                    {{--*/$count=0/*--}}
                    @foreach($info['aca'] as $key=>$academics)
                    <tr style="text-align: center;font-size: 8pt;">
                        <td style="text-align: left">
                            {{ucfirst(strtolower($academics->subjectname))}}
                        </td>
                        <td @if(round($academics->first_grading,2) <= 74)
                             style="color:red"
                            @endif
                            >
                            @if(round($academics->first_grading,2) == 0)
                            @else
                                {{round($academics->first_grading,2)}}
                            @endif
                            {{--*/$first = $first + round($academics->first_grading,2)/*--}}
                        </td>
                        <td @if(round($academics->second_grading,2) <= 74)
                             style="color:red"
                            @endif
                            >
                            @if(round($academics->second_grading,2) == 0)
                            @else
                                {{round($academics->second_grading,2)}}
                            @endif
                            {{--*/$second = $second + round($academics->second_grading,2)/*--}}
                        </td >
                        <td @if(round($academics->third_grading,2) <= 74)
                             style="color:red"
                            @endif
                            >
                            @if(round($academics->third_grading,2) == 0)
                            @else
                                {{round($academics->third_grading,2)}}
                            @endif
                            {{--*/$third = $third + round($academics->third_grading,2)/*--}}
                        </td>
                        <td @if(round($academics->third_grading,2) <= 74)
                             style="color:red"
                            @endif
                            >
                            @if(round($academics->third_grading,2) == 0)
                            @else
                                {{round($academics->fourth_grading,2)}}
                            @endif
                            {{--*/$fourth = $fourth + round($academics->fourth_grading,2)/*--}}
                        </td>
                        <td>
                            @if(!round($academics->final_grade,2) == 0)
                            
                            {{round($academics->final_grade,2)}}
                            @endif
                            {{--*/$final = $final + round($academics->final_grade,2)/*--}}
                        </td>
                        <td>
                            {{$academics->remarks}}
                            {{--*/$count ++/*--}}
                        </td>                         
                    </tr>
                    @endforeach
                    <tr style="text-align: center">
                        <td style="text-align: right;">
                            <b>GENERAL AVERAGE</b>
                        </td>
                        <td @if(round($first/$count,2) <= 74)
                             style="color:red"
                            @endif
                            >
                            @if(round($first/$count,2) == 0)
                            @else
                            {{round($first/$count,2)}}
                            @endif
                        </td>
                        <td @if(round($second/$count,2) <= 74)
                             style="color:red"
                            @endif
                            >
                            @if(round($second/$count,2) == 0)
                            @else
                            {{round($second/$count,2)}}
                            @endif
                        </td>
                        <td @if(round($third/$count,2) <= 74)
                             style="color:red"
                            @endif
                            >
                            @if(round($third/$count,2) == 0)
                            @else
                            {{round($third/$count,2)}}
                            @endif
                        </td>
                        <td @if(round($fourth/$count,2) <= 74)
                             style="color:red"
                            @endif
                            >
                            @if(round($fourth/$count,2) == 0)
                            @else
                            {{round($fourth/$count,2)}}
                            @endif
                        </td>
                        <td>
                            @if(!round($fourth/$count,2) == 0)
                            {{round($final/$count,2)}}
                            @endif
                        </td>

                        <td>
                        @if((round($final/$count,2)) != 0)
                        {{round($final/$count,2) >= 75 ? "Passed":"Failed"}}
                        @endif
                        </td>
                        
                    </tr>
                </table>
                @endif                    
                </td>
            </tr>
            <tr><td style="padding-left: 0px;"><span style="height:10pt"></td></tr>
            <tr>
                <td style="padding-left: 0px;">
                    @if(count($info['tech']) != 0)
                    <table border = '1' cellspacing="0" cellpadding = "0" width="100%" class="reports" style="font-size:12px;">
                        <tr style="font-weight: bold;font-size: 10pt;text-align:center;">
                            <td class="print-size" width="40%" style="padding: 2px 2px 2px 2px;">SUBJECTS</td>
                            <td class="print-size" width="10%">1</td>
                            <td class="print-size" width="10%">2</td>
                            <td class="print-size" width="10%">3</td>
                            <td class="print-size" width="10%">4</td>
                            <td class="print-size" width="10%">FINAL RATING</td>
                            <td class="print-size" width="10%">REMARKS</td>
                        </tr>
                        {{--*/$first=0/*--}}
                        {{--*/$second=0/*--}}
                        {{--*/$third=0/*--}}
                        {{--*/$fourth=0/*--}}
                        {{--*/$final=0/*--}}

                        @foreach($info['tech'] as $key=>$tech)
                        <?php $weight=$tech->weighted / 100;?>
                        <tr style="text-align: center">
                            <td style="text-align: left" class="print-size">
                                <div style="width:70%;display:inline-block;" width="70%">{{ucwords(strtolower($tech->subjectname))}}</div><span>({{$tech->weighted}}%)</span>
                            </td>
                            <td class="print-size">
                                @if(!round($first/$count,2) == 0)
                                {{round($tech->first_grading,2)}}
                                @endif
                                {{--*/$first = $first + round($tech->first_grading,2)*$weight/*--}}
                            </td>
                            <td class="print-size">
                                @if(!round($second/$count,2) == 0)
                                {{round($tech->second_grading,2)}}
                                @endif
                                {{--*/$second = $second + round($tech->second_grading,2)*$weight/*--}}
                            </td>
                            <td class="print-size">
                                @if(!round($third/$count,2) == 0)
                                {{round($tech->third_grading,2)}}
                                @endif
                                {{--*/$third = $third + round($tech->third_grading,2)*$weight/*--}}
                            </td>
                            <td class="print-size">
                                @if(!round($fourth/$count,2) == 0)
                                {{round($tech->fourth_grading,2)}}
                                @endif
                                {{--*/$fourth = $fourth + round($tech->fourth_grading,2)*$weight/*--}}
                            </td>
                            <td class="print-size">
                                @if(!round($final/$count,2) == 0)
                                {{round($tech->final_grade,2)}}
                                @endif
                                {{--*/$final = $final + round($tech->final_grade,2)*$weight/*--}}
                            </td>
                            <td class="print-size">
                                {{$tech->remarks}}
                            </td>                         
                        </tr>
                        @endforeach
                        <tr style="text-align: center">
                            <td class="print-size" style="text-align: right"><b>TECHNICAL AVERAGE</b></td>
                            <td class="print-size">@if(!round($first,2) == 0) {{round($first,2)}}@endif</td>
                            <td class="print-size">@if(!round($second,2) == 0) {{round($second,2)}}@endif</td>
                            <td class="print-size">@if(!round($third,2) == 0) {{round($third,2)}}@endif</td>
                            <td class="print-size">@if(!round($fourth,2) == 0) {{round($fourth,2)}}@endif</td>
                            <td class="print-size">@if(!round($final,2) == 0) {{round($final,2)}}@endif</td>
                            <td class="print-size">
                               @if(!round($final/$count,2) == 0) 
                            {{round($final/$count,2) >= 75 ? "Passed":"Failed"}} 
                            @endif
                            </td></tr>
                    </table>        
                    @endif                    
                </td>
            </tr>
            <tr><td><span style="height:10pt"></td></tr>
            <tr>
                <td style="padding-left: 0px;">
                    <table border = '1' cellspacing="0" cellpadding = "0" width="100%" style="text-align: center;font-size: 12px;background-color: rgba(201, 201, 201, 0.79);">
                        <tr style="font-weight:bold;">
                            <td width="36%" class="descriptors">
                                DESCRIPTOR
                            </td>
                            <td width="32%" class="scale">
                                GRADING SCALE
                            </td>            
                            <td width="32%" class="remarks">
                                REMARKS
                            </td>                        
                        </tr>
                        <tr>
                            <td>Outstanding</td><td>90 - 100</td><td>Passed</td>
                        </tr>
                        <tr>
                            <td>Very Satisfactory</td><td>85 - 89</td><td>Passed</td>
                        </tr>
                        <tr>
                            <td>Satisfactory</td><td>80 - 84</td><td>Passed</td>
                        </tr>
                        <tr>
                            <td>Fairly Satisfactory</td><td>75 - 79</td><td>Passed</td>
                        </tr>
                        <tr>
                            <td>Did Not Meet Expectations</td><td>Below 75</td><td>Failed</td>
                        </tr>
                    </table>                    
                </td>
            </tr>
            
        </table>
        <div class="page-break"></div>
        @endforeach
        
        







        @foreach($collection as $info)
        <h1>&nbsp;</h1>
        <table class="parent" width="100%" style="padding:10px;margin-left: auto;margin-right: auto;margin-top: .8cm;margin-bottom: .8cm;">
        <tr>
            <td colspan="2" style="padding-left: 0px;">
                <table border = '1' cellspacing="0" cellpadding = "0" width="100%" style="text-align: center;font-size: 11pt;">
                    <tr>
                        <td width="30%">CONDUCT CRITERIA</td>
                        <td width="10%">Points</td>
                        <td width="10%">1</td>
                        <td width="10%">2</td>
                        <td width="10%">3</td>
                        <td width="10%">4</td>
                        <td width="20%" rowspan="{{count($info['con'])}}"></td>
                    </tr>
                        {{--*/$first=0/*--}}
                        {{--*/$second=0/*--}}
                        {{--*/$third=0/*--}}
                        {{--*/$fourth=0/*--}}
                        {{--*/$counter = 0/*--}}
                        {{--*/$length = count($info['con'])/*--}}
                        @foreach($info['con'] as $key=>$conducts)
                        {{--*/$counter ++/*--}}                    
                    <tr>
                        <td style="text-align: left">{{$conducts->subjectname}}</td>
                        <td>{{$conducts->points}}</td>
                        <td>
                            @if(!round($conducts->first_grading,2)==0)
                            {{round($conducts->first_grading,2)}}
                            @endif
                            {{--*/$first = $first + round($conducts->first_grading,2)/*--}}
                        </td>
                        <td>
                            @if(!round($conducts->second_grading,2)==0)
                            {{round($conducts->second_grading,2)}}
                            @endif
                            {{--*/$second = $second + round($conducts->second_grading,2)/*--}}
                        </td>
                        <td>
                            @if(!round($conducts->third_grading,2)==0)
                            {{round($conducts->third_grading,2)}}
                            @endif
                            {{--*/$third = $third + round($conducts->third_grading,2)/*--}}
                        </td>
                        <td>
                            @if(!round($conducts->fourth_grading,2)==0)
                            {{round($conducts->fourth_grading,2)}}
                            @endif
                            {{--*/$fourth = $fourth + round($conducts->fourth_grading,2)/*--}}
                        </td>
                        @if($length == $counter)
                        <td>FINAL GRADE</td>
                        @endif
                        

                    </tr>
                        @endforeach                    
                        <tr>
                            <td>CONDUCT GRADE</td>
                            <td>100</td>
                            <td>@if(!$first == 0){{$first}}@endif</td>
                            <td>@if(!$second == 0){{$second}}@endif</td>
                            <td>@if(!$third == 0){{$third}}@endif</td>
                            <td>@if(!$fourth == 0){{$fourth}}@endif</td>
                            <td>@if(!$fourth == 0){{round(($first+$second+$third+$fourth)/4,0)}}@endif</td>
                            
                        </tr>
                </table>
                <br>
                <table border="1" cellspacing="0" cellpading="0" style="font-size:12px;text-align: center" width="100%">
                    <tr>
                        <td width="40%"><b>ATTENDANCE</b></td>
                        <td width="10%"><b>1</b></td>
                        <td width="10%"><b>2</b></td>
                        <td width="10%"><b>3</b></td>
                        <td width="10%"><b>4</b></td>
                        <td width="20%"><b>TOTAL</b></td>
                    </tr>
                    <tr>
                        <td>
                            Days of School
                        </td>
                        {{--*/$first=0/*--}}
                        {{--*/$second=0/*--}}
                        {{--*/$third=0/*--}}
                        {{--*/$fourth=0/*--}}
                            @foreach($info['att'] as $key=>$attend)
                            @if($attend->subjectcode != "DAYT")
                                {{--*/$first = $first + $attend->first_grading/*--}}
                                {{--*/$second = $second + $attend->second_grading/*--}}
                                {{--*/$third = $third + $attend->third_grading/*--}}
                                {{--*/$fourth = $fourth + $attend->fourth_grading/*--}}
                                @endif
                            @endforeach
                        <td>
                            @if($first != 0)
                            {{$first}}
                            @endif
                        </td>
                        <td>
                            @if($first != 0)
                            {{$second}}
                            @endif
                        </td>
                        <td>
                            @if($first != 0)
                            {{$third}}
                            @endif
                        </td>                                                    
                        <td>
                            @if($first != 0)
                            {{$fourth}}
                            @endif
                        </td>
                        <td>
                            {{$first+$second+$third+$fourth}}
                        </td>                                                   
                    </tr>
                    @foreach($info['att'] as $key=>$attend)
                    <tr>
                        <td>
                            {{ucfirst(strtolower($attend->subjectname))}}
                        </td>
                        <td>
                            @if($first != 0)
                            {{round($attend->first_grading,1)}}
                            @endif
                        </td>
                        <td>
                            @if($second != 0)
                            {{round($attend->second_grading,1)}}
                            @endif
                        </td>
                        <td>
                            @if($third != 0)
                            {{round($attend->third_grading,1)}}
                            @endif
                        </td>
                        <td>
                            @if($fourth != 0)
                            {{round($attend->fourth_grading,1)}}
                            @endif
                        </td>
                        <td>
                            {{round($attend->first_grading,1)+round($attend->second_grading,1)+round($attend->third_grading,1)+round($attend->fourth_grading,1)}}
                        </td>                                                    
                    </tr>
                    @endforeach
                </table>
                <br>
                <table width="100%">
                    <tr>
                        <td class="print-size"  width="49%">
                            <b>Certificate of eligibility for promotion</b>
                        </td>
                        <td class="print-size" >
                            <b>Cancellation of Eligibility to Transfer</b>
                        </td>                                                    
                    </tr>
                    <tr>
                        <td class="print-size" >
                            The student is eligible for transfer and
                        </td>
                        <td class="print-size" >
                            Admitted in:____________________________
                        </td>                                                    
                    </tr>
                    <tr>
                        <td class="print-size" >Admission to:___________________________</td>
                        <td class="print-size" >Grade:_________   Date:__________________</td>                                                    
                    </tr>
                    <tr>
                        <td class="print-size" >Date of Issue:__________________________</td>
                        <td></td>                                                    
                    </tr>
                    <tr>
                        <td colspan="2"><br><br><br></td>                                                    
                    </tr>
                                                                    <tr style="text-align: center">
                        <td class="print-size">________________________________</td>
                        <td class="print-size">________________________________</td>
                    </tr>
                    <tr style="text-align: center;">
                        <td class="print-size" >
                           @if($teacher != null)
                            {{$teacher->adviser}}
                           @endif
                        </td>
                        <td class="print-size" >Ms. Violeta F.Roxas</td>
                    </tr>
                    <tr style="text-align: center">
                        <td class="print-size" ><b>Class Adviser</b></td>
                        <td class="print-size" ><b>Grade School - Principal</b></td>
                    </tr>

                </table>
            </td>
        </tr>
        <tr>
            <td style="text-align: right;padding-left: 0px">{{$info['info']->idno}}</yd>
        </tr>
    </table>
    <br>

</td>
</tr>
</table>
                
            </td>
        </tr>
        <tr>
            <td>
                <br>
            </td>
</tr>            
        </table>
    <div class="page-break"></div>
    @endforeach
        
        
    </body>
</html>