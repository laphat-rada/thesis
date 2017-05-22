<!DOCTYPE html>
<!--
Template Name: Etours
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
    <head>
        <title>New</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        @include('template.webpage-stylesheet')
        @yield('stylesheet')
    </head>
    <body id="top">
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <div class="wrapper row0">
            <div id="topbar" class="hoc clear"> 
                <!-- ################################################################################################ -->

                <div class="fl_right">
                    @if (Auth::guest())
                    <ul class="nospace inline pushright">
                        <li><i class="fa fa-user"></i> <a href="{{ url('/register') }}">ลงทะเบียน</a></li>
                        <li><i class="fa fa-sign-in"></i> <a href="{{ url('/login') }}">ลงชื่อเข้าใช้</a></li>
                    </ul>
                    @elseif(Auth::user()->name == 'cath')
                    <ul class="nospace inline pushright" >
                        <li><i class="fa fa-user"></i> การจัดการ</li>
                        <li><a href="{{url('/newscreate')}}">เพิ่มข่าว</a></li>
                            <li><a href="{{url('/fundcreate')}}">เพิ่มกองทุน</a></li>
                            <li><a href="{{url('/fundedit')}}">แก้ไขกองทุน</a></li>
                            <li><a href="{{url('/usercompain')}}">รายงานปัญหา</a></li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                    ลงชื่อออก
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        
                    </ul>
                    @else                        
                    <ul class="nospace inline pushright">
                        <li><i class="fa fa-user"></i> <a href="{{ url('/showSave') }}">ประวัติการทำรายการ</a></li>
                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                ลงชื่อออก
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>

                    @endif
                </div>
                <!-- ################################################################################################ -->
            </div>
        </div>
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <!-- Top Background Image Wrapper -->
        <div class="bgded overlay" style="background-image:url(http://www.aqa-capital.com/wp-content/uploads/2015/12/header-wide-_-fundmanagement.jpg);"> 
            <!-- ################################################################################################ -->

            @include('template.webpage-header')

        </div>
        
        <div class="wrapper row3">
            <main class="hoc container clear"> 
                <!-- main body -->
                <!-- ################################################################################################ -->
                
                <!-- ################################################################################################ -->
                <!-- ################################################################################################ -->
                
                    <!-- ################################################################################################ -->

                    @yield('content')
                    <!-- ################################################################################################ -->
                
                <!-- ################################################################################################ -->
                <!-- / main body -->
                <div class="clear"></div>
            </main>
        </div>

        <!-- /.row -->

        <!-- /.container-fluid -->


        <!-- JAVASCRIPTS -->
        @include('template.webpage-scripts')
        @yield('scripts')
    </body>
</html>
