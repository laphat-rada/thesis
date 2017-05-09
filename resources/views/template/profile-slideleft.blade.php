<!-- main body -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
@if (Auth::guest())
<!-- /.navbar-top-links -->

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

            
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>

                <!-- /.nav-second-level -->
            </li>
            
            <li>
                <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Comment</a>
            </li>


            <li class="active">
                <a href="#"><i class="fa fa-files-o fa-fw"></i> Quiz&Answer<span class="fa arrow"></span></a>

                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->

@else

<label class='form-control-static font-x5' align='center'>Welcome  {{ Auth::user()->name }}</label>
            
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
       
        <ul class="nav" id="side-menu">
            
            <li>
                <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> EditProfile</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>

                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="tables.html"><i class="fa fa-table fa-fw"></i> Save</a>
            </li>
            <li>
                <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Comment</a>
            </li>


            <li class="active">
                <a href="#"><i class="fa fa-files-o fa-fw"></i> Quiz&Answer<span class="fa arrow"></span></a>

                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->

@endif
<!-- ################################################################################################ -->

