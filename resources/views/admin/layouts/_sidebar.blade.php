 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link  @if(Request::segment(2) == 'dashboard') @else collapsed @endif" href="{{url('admin/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'staff') @else collapsed @endif" href="{{url('admin/staff/list')}}">
          <i class="bi bi-grid"></i>
          <span>Staff</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('')}}">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

   
    </ul>

  </aside><!-- End Sidebar-->