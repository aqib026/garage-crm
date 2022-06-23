<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
        <a href="{{URL('/')}}" class="site_title">
          <img src="{{asset('assets')}}/images/logo.png" alt="">
        </a>
      </div>

      <div class="clearfix"></div>

      <br />

      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <h3>General</h3>
          <ul class="nav side-menu">
          <li><a href="{{route('home')}}"><i class="fa fa-home"></i>Dashboard </a></li>
          <li><a href="{{route('manage.users')}}"><i class="fa fa-laptop"></i> Manage Users </a></li>
          </ul>
        </div>
  

      </div>
      <!-- /sidebar menu -->

    </div>
  </div>