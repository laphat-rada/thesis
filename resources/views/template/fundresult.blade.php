@extends('template.webpage-fund')
@section('content')
<!-- ################################################################################################ -->

<div><input type="hidden" name="_token" value="<?php echo csrf_token() ?>"> </div>
<div class="col-lg-12">
<!--    <div class="panel panel-default">
        <div class="panel-heading">
            ตารางผลการวิเคราะห์คะแนน
        </div>
         /.panel-heading 
        <div class="panel-body">
            <div class="table-responsive table-bordered">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ชื่อกองทุน</th>
                            <th>ความเสี่ยง</th>
                            <th>ค่าธรรมเนียม</th>                           
                            <th>ผลการดำเนินงานย้อนหลัง</th>
                            <th>ความผันผวนของผลการดำเนินงาน</th>


                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>{{ $f1 }}</td><td>{{ $s_risk1}}</td><td> {{ $s_pay1 }}</td><td> {{ $s_nav1}}</td><td> {{ $s_vary1}}</td>
                        </tr><tr>
                            <td>{{ $f2 }}</td><td>{{ $s_risk2}}</td><td> {{ $s_pay2 }}</td><td> {{ $s_nav2}}</td><td> {{ $s_vary2}}</td>
                        </tr><tr>
                            <td>{{ $f3}}</td><td>{{ $s_risk3 }}</td><td> {{ $s_pay3 }}</td><td> {{ $s_nav3}} </td><td>{{ $s_vary3}}</td>
                        </tr><tr>
                            <td>{{ $f4}}</td><td>{{ $s_risk4}}</td><td> {{ $s_pay4 }}</td><td> {{ $s_nav4}}</td><td> {{ $s_vary4}}</td>
                        </tr><tr>
                            <td>{{ $f5 }}</td><td> {{ $s_risk5}} </td><td>{{ $s_pay5 }} </td><td>{{ $s_nav5}}</td><td> {{ $s_vary5}}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
             /.table-responsive 
        </div>
         /.panel-body 
    </div>-->
    <!-- /.panel -->

<!--<div id="page-wrapper">

    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                กราฟแสดงผล
            </div>

             /.panel-heading 
            <div class="panel-body">
                <p>Morris.js is a jQuery based charting plugin created by Olly Smith. In SB Admin, we are using the most recent version of Morris.js which includes the resize function, which makes the charts fully responsive. The documentation for Morris.js is available on their website, <a target="_blank" href="http://morrisjs.github.io/morris.js/">http://morrisjs.github.io/morris.js/</a>.</p>
                <a target="_blank" class="btn btn-default btn-lg btn-block" href="http://morrisjs.github.io/morris.js/">View Morris.js Documentation</a>
            </div>
             /.panel-body 
            <div class="panel-body">
                <div id="morris-area-chart"></div>
            </div>
        </div>

    </div>
     /.col-lg-6 

     /.row 
</div>-->
<!-- /#page-wrapper -->


<!-- /.col-lg-6 -->
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            ตารางผลการเปรียบเทียบทั้ง 5 กองทุน
            
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            {{ Form::open(array('url' => '/result', 'method' => 'GET'))}}
            <div class="table-responsive">
                 <label class="caption"> </label>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อกองทุน</th>
                            <th>ผลตอบแทนย้อนหลัง</th>
                            <th>ค่าธรรมเนียม</th>
                            <th>ระดับความเสี่ยง</th>
                            <th>คะแนน</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @for( $i = 4; $i >= 0; $i--) 
                        <tr><th> {{ 5-$i }} </th>
                            <td> {{ $namesort[$i] }}</td> 
                            <td> {{ $qryshow[$i] }} </td>
                            <td> {{ $qrypay[$i] }} </td>
                            <td> {{ $qryrisk[$i] }} </td>
                            <td> {{ $sumarysort[$i] }} </td>                            
                        </tr>
                        @endfor

                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
           

            {{ Form::close() }}
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>

</div>


@stop


