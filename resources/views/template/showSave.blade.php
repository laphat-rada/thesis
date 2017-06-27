@extends('template.webpage-fundinfo')
@section('content')
<div class="panel-body">
    <h4>บันทึกการทำรายการของคุณ {{ Auth::user()->name }}</h4>
    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr> <th class="center">ครั้งที่</th>
                <th class="center">วันที่ทำรายการ</th>
                <th class="center">กองทุนลำดับที่ 1</th>
                <th class="center">กองทุนลำดับที่ 2</th>
                <th class="center">กองทุนลำดับที่ 3</th>
                <th class="center">กองทุนลำดับที่ 4</th>
                <th class="center">กองทุนลำดับที่ 5</th>
                
                
            </tr>
        </thead>
        <tbody>
            @for($i = 0 ; $i<$num;$i++)
            <tr class=" gradeX">
                <th>{{$i+1}}</th>
                <td>{{$qry[$i]->time}}</td>
                <td>{{$qry[$i]->No_1}}</td>
                <td>{{$qry[$i]->No_2}}</td>
                <td>{{$qry[$i]->No_3}}</td>
                <td>{{$qry[$i]->No_4}}</td>
                <td>{{$qry[$i]->No_5}}</td>              
            </tr>
            @endfor
            

        </tbody>
    </table>
    <!-- /.table-responsive -->

</div>
@stop