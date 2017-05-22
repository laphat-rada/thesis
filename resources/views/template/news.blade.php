@extends('template.webpage-news')
@section('content')
<!-- ################################################################################################ -->
<div id="page-wrapper">
    <div class="well ">

        <div class="panel-heading" >
            <h1>{{$new->topic_name}}</h1>
        </div>
        <div class="panel-body form-horizontal">
            
            <img class="imgl borderedbox inspace-3" src="{{$new->Description}}" alt="">
        </div>
    </div>
</div>




<!-- /.col-lg-12 -->

@stop

