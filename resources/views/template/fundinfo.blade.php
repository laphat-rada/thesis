@extends('template.webpage-fundinfo')
@section('content')
<div id="page-wrapper">
    <div class="well ">

        <div class="panel-heading" >
            <h3 >รายละเอียดกองทุน</h3>
        </div>
        <div class="panel-body form-horizontal">
            {{ Form::open(array('url' => '/showbank', 'method' => 'GET'))}}
            {{ csrf_field() }}
            <div class="panel-body">
                <div class="form-group">
                    <label for="bank1"  class="col-md-4 control-label">โปรดเลือกธนาคารที่สนใจ</label>
                    <div class="col-md-7">
                        {{Form::select('bnk', array('1' => 'ธนาคารกสิกร',
                        '2' => 'ธนาคารกรุงเทพ',
                        '3' => 'ธนาคารกรุงศรีอยุธยา',
                        '4' => 'ธนาคารกรุงไทย',
                        '5' => 'ธนาคารไทยพาณิชย์',
                        '6' => 'ธนาคารยูโอบี',
                        '7' => 'ธนาคารทีเอ็มบี',
                        '8' => 'ธนาคารธนชาติ'), '1' ,['class'=>'form-control'])}}
                    </div>
                </div>

                <div class="form-group">
                    <label for="sel5" class="col-md-4 control-label"></label>
                    <div class="col-md-7">
                        {{ Form::submit('Send',['class'=>'btn btn-default']) }}
                    </div>
                </div>
                {{ Form::close() }}
            </div>
            @if($show)
            <h4>{{$namebank}}</h4>
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr> 
                        <th class="center">ชื่อกองทุน(เต็ม)</th>
                        <th class="center">ชื่อกองทุน(ย่อ)</th>
                        <th class="center">ความเสี่ยง</th>
                        <th class="center">หนังสือชี้ชวนสำคัญ</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 0 ; $i<$num;$i++)
                    <tr class=" gradeX">
                        <td>{{$qry[$i]->namefund}}</td>
                        <td>{{$qry[$i]->shortfd}}</td>
                        <td>{{$qry[$i]->risk}}</td>
                        <td><a class="fa fa-files-o fa-fw " href="{{$qry[$i]->link}}" target="_blank"></a></td>
                    </tr>
                    @endfor
                </tbody>
                @endif
        </div>

        @stop
        <!--        <div class="form-group col-sm-6" >
                    <label for="selbank">โปรดเลือกธนาคารที่สนใจ </label>
                    <select class="form-control" id="sel1">
                        <option value="1" selected="">Kasikorn Bank</option>
                        <option value="2">Bualuang Bank</option>
                        <option value="3">Krungsri Bank</option>
                        <option value="4">Krungthai Bank</option>
                        <option value="5">Siam Commercial Bank</option>
                        <option value="6">United Overseas Bank</option>
                        <option value="7">TMB Bank</option>
                        <option value="8">Tanachart Bank</option>
                    </select>
                </div>
                <a class="btn btn-default btn-block " target="_blank" href="https://datatables.net/">ตกลง</a>-->