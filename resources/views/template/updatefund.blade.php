@extends('template.webpage-admin')
@section('content')
<!-- ################################################################################################ -->        
<div id="page-wrapper">
    <div class="well ">
        <div class="panel-body form-horizontal">
        <div class="panel-heading" >
            <h3 >แก้ไขกองทุน</h3>
        </div>
        @if($check)
        {{ Form::open(array('url' => '/edit', 'method' => 'GET'))}}
        {{ csrf_field() }}
        <div class="form-group">
            <label for="sel5" class="col-md-4 control-label">เลือกกองทุน</label>
            <div class="col-md-6">
                {{ Form::select('fund', $fund, null, ['class'=>'form-control']) }} 
            </div>
            <div class="col-md-1 ">
                <button type="submit" class="btn btn-primary">
                    ตกลง
                </button>                             

            </div>
        </div>

        {{ Form::close() }}
        @else
        {{ Form::open(array('url' => '/update', 'method' => 'GET'))}}
        <div class="form-group">

            <div class="col-md-6">
                {{ Form::hidden('id', $fund->idfund, array('required','class' => 'form-control')) }}

            </div>
        </div>
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">รหัสกองทุน</label>

            <div class="col-md-6">
                <input id="type" type="text" class="form-control" name="ref" value="{{ old('name_album') }}" placeholder="{{$fund->idfund}}" >

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
                <input id="type" type="text" class="form-control" name="name" value="{{ old('name_album') }}" placeholder="{{$fund->namefund}}" >

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
                <input id="type" type="text" class="form-control" name="name_short" value="{{ old('name_album') }}" placeholder="{{$fund->shortfd}}" >

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
                <input id="type" type="text" class="form-control" name="risk" value="{{ old('name_album') }}" placeholder="{{$fund->risk}}" >

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
                <input id="type" type="text" class="form-control" name="pay" value="{{ old('name_album') }}"placeholder="{{$fund->payment}}" >

                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">URL:หนังสือชี้ชวนฉบับย่อ</label>

            <div class="col-md-6">
                <input id="type" type="text" class="form-control" name="url" value="{{ old('name_album') }}" placeholder="{{$fund->link}}" >

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


@endif
@stop