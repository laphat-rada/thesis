@extends('admin.layouts.template')
@section('content')
<div><input type="hidden" name="_token" value="<?php echo csrf_token() ?>"> </div>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Bordered Table
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive table-bordered">
                <table class="table">
                    <thead>
                        <tr>
                            <th>salary</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @for ($i = 1; $i <= $age_math+1 ; $i++)
                        
                        <tr>
                            <td>{{ $i}} </td>
                            <td>{{ $age + ($i-1)  }}</td>
                            <td>{{ $salary_month_up[$i] }}</td>
                            <td>{{ $salary_sum[$i] }}</td> 
                            <td>{{ $bonus_sum[$i] }}</td> 
                            <td>{{$month1_year[$i]}}</td> 
                            <td>{{$income[$i]}}</td>
                            <td>{{$benefit[$i]}}</td>
                            <td>{{$month12_year[$i]}}</td>
                        </tr>
                        @endfor 

                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-6 -->
</div>

@stop