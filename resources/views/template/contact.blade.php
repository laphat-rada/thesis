@extends('template.webpage-fundinfo')
@section('content')
@if (Auth::guest())
<div id="page-wrapper">
    <div class="well ">
        <div id="comments">
            <h6>ผู้จัดทำเว็บไซต์ </h6>
            <ul>

                <li>
                    <article>
                        <header>

                            <p>นางสาวนารดา นาคเลื่อน </p>
                            <p>ติดต่อได้ที่ 090-898-2098  Email : cath@hotmail.com</p>
                    </article>
                </li>
                <li>
                    <article>
                        <header>

                            <p>นางสาวลภัสรดา  วิเศษศรี </p>
                            <p>ติดต่อได้ที่ 098-233-2132  Email : tichaws@gmail.com</p>
                    </article>
                </li>

            </ul>

        </div>
    </div>
</div>
@else
<div id="page-wrapper">
    <div class="well ">
        <div id="comments">
            <h6>ผู้จัดทำเว็บไซต์ </h6>
            <ul>

                <li>
                    <article>
                        <header>

                            <p>นางสาวนารดา นาคเลื่อน </p>
                            <p>ติดต่อได้ที่ 090-898-2098  Email : cath@hotmail.com</p>
                    </article>
                </li>
                <li>
                    <article>
                        <header>

                            <p>นางสาวลภัสรดา  วิเศษศรี </p>
                            <p>ติดต่อได้ที่ 098-233-2132  Email : tichaws@gmail.com</p>
                    </article>
                </li>

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