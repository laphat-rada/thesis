@extends('template.webpage-fundinfo')
@section('content')
@if (Auth::guest())
<div id="page-wrapper">
    <div class="well ">
        <div id="comments">
            <h6>กรุณาลงชื่อเข้าใช้ เพื่อแสดงความคิดเห็น </h6>
            <ul>
                @for($i = 0 ; $i<$num;$i++)
                <li>
                    <article>
                        <header>
                            <address>
                                By <a href="#">{{$qry[$i]->name}}</a>
                            </address>
                            <time datetime="2045-04-06T08:15+00:00">{{$qry[$i]->time}}</time>
                        </header>
                        <div class="comcont">
                            <p>{{$qry[$i]->text}}</p>
                    </article>
                </li>
                @endfor
            </ul>
            
        </div>
    </div>
</div>
@else
<div id="page-wrapper">
    <div class="well ">
        <div id="comments">
            <h3>ความคิดเห็นของผู้ใช้งาน</h3>
            <ul>
                @for($i = 0 ; $i<$num;$i++)
                <li>
                    <article>
                        <header>
                            <address>
                                By <a href="#">{{$qry[$i]->name}}</a>
                            </address>
                            <time datetime="2045-04-06T08:15+00:00">{{$qry[$i]->time}}</time>
                        </header>
                        <div class="comcont">
                            <p>{{$qry[$i]->text}}</p>
                    </article>
                </li>
                @endfor
            </ul>
            
            
            {{ Form::open(array('url' => '/comment', 'method' => 'GET'))}}
            {{ csrf_field() }}
            <div class="panel-body">
                <div class="block clear">
                    <label for="comment">แสดงความคิดเห็น</label>
                    <textarea name="comment" id="comment" cols="25" rows="10"></textarea>
                </div>
                <div class="form-group">                   
                        {{ Form::submit('ตกลง',['class'=>'btn btn-primary']) }}
                        {{ Form::reset('รีเซ็ต',['class'=>'btn btn-primary']) }}            
                </div>
            </div>           
                {{ Form::close() }}
        </div>
    </div>
</div>
@endif
@stop

<!--                <div class="form-group one_third first">
                    <label for="name" >ชื่อ</label>
                    <input id="name" type="text" class="form-control" size="22"  name="name" required autofocus>
                </div>
                <div class="form-group one_third">
                    <label for="email" >อีเมล์</label>
                    <input id="email" type="text" class="form-control" size="22"  name="email" required>
                </div>
                <div class="form-group one_third">
                    <label for="website" >เว็บไซต์</label>
                    <input id="website" type="text" class="form-control" size="22"  name="website" required>
                </div>-->