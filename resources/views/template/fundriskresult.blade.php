@extends('template.webpage-fund')
@section('content')
<!-- ################################################################################################ -->

<div><input type="hidden" name="_token" value="<?php echo csrf_token() ?>"> </div>
<div class="col-lg-12">

<div class="col-lg-12">
    <div class="control-label">{{$save}}</div>
    <div class="panel panel-default">
        <div class="panel-heading">
            ตารางผลการวิเคราะห์
        </div>
        
        <!-- /.panel-heading -->
        <div class="panel-body">
            {{ Form::open(array('url' => '/resultrisk', 'method' => 'GET'))}}
            
            <div>ท่านได้คะแนนจากแบบประเมิน  {{$score}} คะแนน</div><div> {{$type[1]}} </div><br>
            <div class="table-responsive">
                <label class="caption">ประเภทกองทุนที่เหมาะสม : {{$type[3]}} </label>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ลำดับที่</th> 
                            <th>ชื่อกองทุน</th>
                            <th>ชื่อย่อ</th>
                            <th>ค่าธรรมเนียม</th> 
                            <th>ผลการดำเนินงานย้อนหลัง</th> 
                            <th>คะแนน</th> 
                        </tr>
                    </thead>
                    <tbody>
                    @for($i = $num-1 ; $i>$num-5;$i--)
                    
                    <tr class=" gradeX">
                        <th>{{$num-$i}}</th>
                        <td>{{$namesort[$i]->namefund}}</td>
                        <td>{{$namesort[$i]->shortfd}}</td>
                        <td>{{$namesort[$i]->payment}}</td>
                        <td>{{$nav[$i]}}</td>
                        <td>{{$sumarysort[$i]}}</td>                       
                        <td><a class="fa fa-files-o fa-fw " href="{{$namesort[$i]->link}}" target="_blank"></a></td>
                    </tr>
                    @endfor
                </tbody>
                
                </table>
            </div>
            <!-- /.table-responsive -->
           
            <div><i><u>คำเตือน</u></i> การลงทุนในหน่วยลงทุนมิใช่การฝากเงินและมีความเสี่ยงของการลงทุน ผู้ลงทุนอาจได้รับเงินลงทุนคืนมากกว่าหรือน้อยกว่าเงินลงทุนเริ่มแรกก็ได้และอาจไม่ได้รับชำระเงินค่าขายคืนหน่วยลงทุนภายในระยะเวลาที่กำหนด หรืออาจไม่สามารถขายคืนหน่วยลงทุนได้ตามที่ได้มีคำสั่งไว้

ทำความเข้าใจลักษณะสินค้า เงื่อนไขผลตอบแทน และความเสี่ยงก่อนตัดสินใจลงทุน ผู้ลงทุนควรศึกษาข้อมูลเกี่ยวกับสิทธิประโยชน์ทางภาษีที่ระบุไว้ในคู่มือการลงทุนในกองทุนรวมดังกล่าวด้วย

ผลการดำเนินงานในอดีต/ ผลการเปรียบเทียบ ผลการดำเนินงานที่เกี่ยวข้องกับผลิตภัณฑ์ในตลาดทุน มิได้เป็นสิ่งยืนยันถึงผลการดำเนินงานในอนาคต</div>
            {{ Form::close() }}
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>

</div>
@stop


