@extends('template.webpage-calculate')
@section('content')
<!--<div id="page-wrapper">
    <div class="well ">

        <h4>โปรดกรอกข้อมูลเพื่อใช้ในการวิเคราะห์</h4>
        {{ Form::open(array('url' => '/calculate', 'method' => 'GET'))}} 
        {{ csrf_field() }}
        <div class="panel-body">
            <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                <label for="salary" class="col-md-5 control-label">เงินเดือนปัจจุบัน</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="salary" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('salary'))
                    <span class="help-block">
                        <strong>{{ $errors->first('salary') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('salary_up') ? ' has-error' : '' }}">
                <label for="salary_up" class="col-md-5 control-label">อัตราการขึ้นเงินเดือนต่อปี (คิดเป็นเปอร์เซ็นต์)</label>

                <div class="col-md-6">
                    <input id="salary_up" type="text" class="form-control" name="salary_up" value="{{ old('salary_up') }}" required autofocus>

                    @if ($errors->has('salary_up'))
                    <span class="help-block">
                        <strong>{{ $errors->first('salary_up') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('salary_per_month') ? ' has-error' : '' }}">
                <label for="salary_per_monthp" class="col-md-5 control-label">เงินที่จะลงทุน (คิดเป็นเปอร์เซนต์ของเงินเดือน)</label>

                <div class="col-md-6">
                    <input id="salary_per_month" type="text" class="form-control" name="salary_per_month" value="{{ old('salary_per_month') }}" required autofocus>

                    @if ($errors->has('salary_per_month'))
                    <span class="help-block">
                        <strong>{{ $errors->first('salary_per_month') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('bonus_per_salary') ? ' has-error' : '' }}">
                <label for="bonus_per_salary" class="col-md-5 control-label">จำนวนโบนัสที่ต้องการลงทุน (คิดเป็นเดือนต่อปี)</label>

                <div class="col-md-6">
                    <input id="bonus_per_salary" type="text" class="form-control" name="bonus_per_salary" value="{{ old('bonus_per_salary') }}" required autofocus>

                    @if ($errors->has('bonus_per_salary'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bonus_per_salary') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('purpose_per_year') ? ' has-error' : '' }}">
                <label for="purpose_per_year" class="col-md-5 control-label">ผลกำไรที่คาดหวัง (คิดเป็นเปอร์เซ็นต์)</label>

                <div class="col-md-6">
                    <input id="purpose_per_year" type="text" class="form-control" name="purpose_per_year" value="{{ old('purpose_per_year') }}" required autofocus>

                    @if ($errors->has('purpose_per_year'))
                    <span class="help-block">
                        <strong>{{ $errors->first('purpose_per_year') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                <label for="age" class="col-md-5 control-label">อายุปัจจุบัน</label>

                <div class="col-md-6">
                    <input id="age" type="text" class="form-control" name="age" value="{{ old('age') }}" required autofocus>

                    @if ($errors->has('age'))
                    <span class="help-block">
                        <strong>{{ $errors->first('age') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            {{ Form::submit('Send',['class'=>'btn btn-success']) }}
            {{ Form::close() }} 

            <label></label>
            <label></label>


        </div>
    </div>

</div>-->
<div class="page-wrapper">
    <div class="well">
        <div class="panel-heading">
            <h4>โปรดกรอกข้อมูลเพื่อใช้ในการวิเคราะห์</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="GET" action="{{ url('/calculate') }}">
                {{ csrf_field() }}

                <div class="panel-body">
                    <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                        <label for="salary" class="col-md-5 control-label">เงินเดือนปัจจุบัน</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="salary" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('salary'))
                            <span class="help-block">
                                <strong>{{ $errors->first('salary') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('salary_up') ? ' has-error' : '' }}">
                        <label for="salary_up" class="col-md-5 control-label">อัตราการขึ้นเงินเดือนต่อปี (คิดเป็นเปอร์เซ็นต์)</label>

                        <div class="col-md-6">
                            <input id="salary_up" type="text" class="form-control" name="salary_up" value="{{ old('salary_up') }}" >

                            @if ($errors->has('salary_up'))
                            <span class="help-block">
                                <strong>{{ $errors->first('salary_up') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('salary_per_month') ? ' has-error' : '' }}">
                        <label for="salary_per_monthp" class="col-md-5 control-label">เงินที่จะลงทุน (คิดเป็นเปอร์เซนต์ของเงินเดือน)</label>

                        <div class="col-md-6">
                            <input id="salary_per_month" type="text" class="form-control" name="salary_per_month" value="{{ old('salary_per_month') }}" >

                            @if ($errors->has('salary_per_month'))
                            <span class="help-block">
                                <strong>{{ $errors->first('salary_per_month') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('bonus_per_salary') ? ' has-error' : '' }}">
                        <label for="bonus_per_salary" class="col-md-5 control-label">จำนวนโบนัสที่ต้องการลงทุน (คิดเป็นเดือนต่อปี)</label>

                        <div class="col-md-6">
                            <input id="bonus_per_salary" type="text" class="form-control" name="bonus_per_salary" value="{{ old('bonus_per_salary') }}" >

                            @if ($errors->has('bonus_per_salary'))
                            <span class="help-block">
                                <strong>{{ $errors->first('bonus_per_salary') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('purpose_per_year') ? ' has-error' : '' }}">
                        <label for="purpose_per_year" class="col-md-5 control-label">ผลกำไรที่คาดหวัง (คิดเป็นเปอร์เซ็นต์)</label>

                        <div class="col-md-6">
                            <input id="purpose_per_year" type="text" class="form-control" name="purpose_per_year" value="{{ old('purpose_per_year') }}" >

                            @if ($errors->has('purpose_per_year'))
                            <span class="help-block">
                                <strong>{{ $errors->first('purpose_per_year') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                        <label for="age" class="col-md-5 control-label">อายุปัจจุบัน</label>

                        <div class="col-md-6">
                            <input id="age" type="text" class="form-control" name="age" value="{{ old('age') }}" >

                            @if ($errors->has('age'))
                            <span class="help-block">
                                <strong>{{ $errors->first('age') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                ตกลง
                            </button>
                            <button type="reset"  class="btn btn-primary" >
                                ล้าง
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>



@stop

