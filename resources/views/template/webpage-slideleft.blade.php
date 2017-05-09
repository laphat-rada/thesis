@if (Auth::guest())
<!-- /.navbar-top-links -->

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

           <li><a href="{{url('/news1')}}">ผลตอบแทนกองทุนรวมประเภทต่างๆ ปี 2559</a></li>
          <li><a href="{{url('/news2')}}">ปี2559นักลงทุนไทยนิยมลงทุนกองทุนไหน</a>
            
          </li>
          <li><a href="{{url('/news3')}}">ใครๆก็บอกว่าตัวเองเป็น Active Fund</a>
            
          </li>
          <li><a href="{{url('/news4')}}">เป้าหมายทางการลงทุนประจำปี 2017</a></li>
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
          <li><a href="{{url('/news2')}}">ปี2559นักลงทุนไทยนิยมลงทุนกองทุนไหน</a>
            
          </li>
          <li><a href="{{url('/news3')}}">ใครๆก็บอกว่าตัวเองเป็น Active Fund</a>
            
          </li>
          <li><a href="{{url('/news4')}}">เป้าหมายทางการลงทุนประจำปี 2017</a></li>


        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->

@endif