@extends('admin.layouts.template')
@section('content')
<div class="row">

    <div class="from-control"> 
    
    </div> 

    <div class="form-group" >
        <form action="math" method="post">   
            <label>salary</label>
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <input class="form-control" name="salary">

            <label>salary up per month</label>
            <input class="form-control" name="salary_up">

            <label>income per months (of salary)</label>
            <input class="form-control" name="salary_per_month">

            <label>bonus how month of salary</label>
            <input class="form-control" name="bonus_per_salary">

            <label>purpose persen</label>
            <input class="form-control" name="purpose_per_year">   
            
            <label>age</label>
            <input class="form-control" name="age"> 

            <button type="submit" class="btn btn-success">summit</button>
        </form>  
    </div>
    <!-- /.col-lg-12 -->
</div>
@stop
