@extends('template.webpage-admin')
@section('content')
<!-- ################################################################################################ -->        
<div id="page-wrapper">
    <div class="well ">
        <div class="panel-heading" >
            <h3 >รายงานปัญหาของ User</h3>
        </div>
        <div class="panel-body form-horizontal">
            {{ Form::open(array('url' => '/usercompain', 'method' => 'GET'))}}
            {{ csrf_field() }}
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr> 
                        <th class="center">ลำดับ</th>
                        <th class="center">วันที่ เวลา</th>
                        <th class="center">ชื่อผู้ใช้</th>                                             
                        <th class="center">ข้อความ</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 0 ; $i<$num;$i++)
                    <tr class=" gradeX">
                        <td>{{$i+1}}</td>
                        <td>{{$qry[$i]->time}}</td>
                        <td>{{$qry[$i]->name}}</td>
                        <td>{{$qry[$i]->text}}</td>


                    </tr>
                    @endfor

                </tbody>


                {{ Form::close() }}

        </div> 
    </div> 
</div> 
@stop