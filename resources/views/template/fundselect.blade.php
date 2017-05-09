@extends('template.webpage-fund')
@section('content')
<!-- ################################################################################################ -->
<div id="page-wrapper">
    <div class="well ">
        <div class="panel-heading" >
            <h3 >เปรียบเทียบกองทุน โปรดเลือกกองทุนทั้ง 5 ทองทุน</h3>
        </div>
        <div class="panel-body form-horizontal">

            {{ Form::open(array('url' => '/result', 'method' => 'GET'))}}
            {{ csrf_field() }}
            <div class="panel-body">
                <div class="form-group">
                    <label for="sel1"  class="col-md-4 control-label">ประสบการณ์ในการลงทุน</label>
                    <div class="col-md-7">
                        {{Form::select('exp', array('3' => 'ไม่มีประสบการณ์', '7' => 'น้อยกว่า 1 ปี', '8' => '1 - 5 ปี','9' => '5 ปีขี้นไป'), '7' ,['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="sel1" class="col-md-4 control-label">กองทุนลำดับที่ 1 </label>
                    <div class="col-md-7">
                        {{ Form::select('fund1', $fund, null, ['class'=>'form-control ']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="sel2" class="col-md-4 control-label">กองทุนลำดับที่ 2 </label>
                    <div class="col-md-7">
                        {{ Form::select('fund2', $fund, null, ['class'=>'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="sel3" class="col-md-4 control-label">กองทุนลำดับที่ 3</label>
                    <div class="col-md-7">
                        {{ Form::select('fund3', $fund, null, ['class'=>'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="sel4" class="col-md-4 control-label">กองทุนลำดับที่ 4</label>
                    <div class="col-md-7">
                        {{ Form::select('fund4', $fund, null, ['class'=>'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="sel5" class="col-md-4 control-label">กองทุนลำดับที่ 5</label>
                    <div class="col-md-7">
                        {{ Form::select('fund5', $fund, null, ['class'=>'form-control']) }} 
                    </div>
                </div>
                <div class="form-group">
                    <label for="sel5" class="col-md-4 control-label"></label>
                    <div class="col-md-7">
                        {{ Form::submit('Send',['class'=>'btn btn-success']) }}
                    </div>
                </div>
                {{ Form::close() }}

            </div>
        </div>
    </div>
</div>


@stop


