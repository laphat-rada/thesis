@if (Auth::guest())
<!-- /.navbar-top-links -->

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li><a href="{{url('/newscreate')}}">Create News</a></li>
            <li><a href="{{url('/fundcreate')}}">Create Fund</a></li>
            <li><a href="{{url('/compain')}}">User Compain</a></li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->

@else

<label class='form-control-static font-x5' align='center'>Welcome  {{ Auth::user()->name }}</label>

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">      
        <ul class="navbar-default " id="side-menu">            
            <li><a href="{{url('/news1')}}">ผลตอบแทนกองทุนรวมประเภทต่างๆ ปี 2559</a></li>
            <li><a href="{{url('/news2')}}">ปี2559นักลงทุนไทยนิยมลงทุนกองทุนไหน</a></li>

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->

@endif