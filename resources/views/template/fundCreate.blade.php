@extends('template.webpage-admin')
@section('content')
<!-- ################################################################################################ -->        
<div id="page-wrapper">
    <div class="well ">
        <div class="panel-heading" >
            <h3 >เพิ่มกองทุน</h3>
        </div>

        <div class="panel-body form-horizontal">
            {{ Form::open(array('url' => '/createfund', 'method' => 'GET'))}}
            {{ csrf_field() }}
            <div class="panel-body">
                <div class="form-group">
                    <label for="bank1"  class="col-md-4 control-label">โปรดเลือกธนาคาร</label>
                    <div class="col-md-7">
                        {{Form::select('idbank', array('1' => 'ธนาคารกสิกร',
                        '2' => 'ธนาคารกรุงเทพ',
                        '3' => 'ธนาคารกรุงศรีอยุธยา',
                        '4' => 'ธนาคารกรุงไทย',
                        '5' => 'ธนาคารไทยพาณิชย์',
                        '6' => 'ธนาคารยูโอบี',
                        '7' => 'ธนาคารทีเอ็มบี',
                        '8' => 'ธนาคารธนชาติ'), '1' ,['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">รหัสกองทุน</label>

                    <div class="col-md-6">
                        <input id="type" type="text" class="form-control" name="ref" value="{{ old('name_album') }}" required autofocus>

                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">ชื่อเต็ม</label>

                    <div class="col-md-6">
                        <input id="type" type="text" class="form-control" name="name" value="{{ old('name_album') }}" required autofocus>

                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">ชื่อย่อ</label>

                    <div class="col-md-6">
                        <input id="type" type="text" class="form-control" name="name_short" value="{{ old('name_album') }}" required autofocus>

                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">ความเสี่ยง</label>

                    <div class="col-md-6">
                        <input id="type" type="text" class="form-control" name="risk" value="{{ old('name_album') }}" required autofocus>

                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">ค่าธรรมเนียม</label>

                    <div class="col-md-6">
                        <input id="type" type="text" class="form-control" name="pay" value="{{ old('name_album') }}" required autofocus>

                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Url หนังสือชี้ชวนฉบับย่อ</label>

                    <div class="col-md-6">
                        <input id="type" type="text" class="form-control" name="url" value="{{ old('name_album') }}" required autofocus>

                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            OK
                        </button>                             

                    </div>
                </div>

                {{ Form::close() }}
            </div>
        </div> 
    </div>
</div> 

@stop