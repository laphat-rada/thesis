@extends('template.webpage-admin')
@section('content')
<!-- ################################################################################################ -->        
<div id="page-wrapper">
    <div class="well ">
        <div class="panel-heading" >
            <h3 >เพิ่มข่าว</h3>
        </div>
        <div class="panel-body form-horizontal">
            {{ Form::open(array('url' => '/createnews', 'method' => 'GET'))}}
            {{ csrf_field() }}


            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">หัวข้อข่าว</label>

                <div class="col-md-6">
                    <input id="type" type="text" class="form-control" name="name_topic" value="{{ old('name_album') }}" required autofocus>

                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>



            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">เนื้อหาข่าว</label>

                <div class="col-md-6">
                    <textarea id="name" type="tex" class="form-control" name="des_news" cols="50" rows="10" required autofocus></textarea>

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