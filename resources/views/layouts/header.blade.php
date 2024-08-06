<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
 

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        {{request()->session()->get('userName')}}
        <i class="bi bi-person"></i>
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
        
      </div>
    </li>
  </ul>
</nav>
<!-- /.navbar -->