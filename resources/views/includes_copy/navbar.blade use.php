   <div id="app">
       <div id="sidebar" class="active">
           <div class="sidebar-wrapper active">
               <div class="sidebar-header position-relative">
                   <div class="d-flex justify-content-between align-items-center">
                       <div class="logo">
                           <a class="navbar-brand m-0" href="#" target="_blank">
                               <img src="{{ asset('assets/images/logo/favicon.png') }}" class="navbar-brand-img h-50"
                                   alt="main_logo">
                               <h6 class="nav-link-text xs-1"> {{ Auth::user()->name }}</h6>
                           </a>

                       </div>
                       <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                           <div class="form-check form-switch fs-6">
                               <span class="nav-link-text xs-1">Dark Mode</span>
                           </div>
                           <div class="form-check form-switch fs-6">
                               <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                               <label class="form-check-label"></label>
                           </div>
                       </div>
                       <div class="sidebar-toggler  x">
                           <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                   class="bi bi-x bi-middle"></i></a>
                       </div>
                   </div>
               </div>
               <div class="sidebar-menu">
                   <ul class="menu">
                       <li class="sidebar-item active ">
                           <a href="index.html" class='sidebar-link'>
                               <i class="bi bi-grid-fill"></i>
                               <span>Dashboard</span>
                           </a>
                       </li>

                
                       @foreach (main_module(1) as $main_module)
                           <li class="sidebar-item  has-sub">
                               <a href="#" class='sidebar-link'>
                                   <i class="bi bi-collection-fill"></i>
                                   <span>{{ $main_module->description }}</span>
                               </a>
                               <ul class="submenu">
                                 
                                   @foreach (main_menu(1) as $main_menu)
                                       @if ($main_menu->upline == $main_module->name)
                                           <li class="sidebar-item  has-sub">
                                               <a href="#" class='sidebar-link'>
                                                   <i class="bi bi-stack"></i>
                                                   <span>{{ $main_menu->description }}</span>
                                               </a>
                                               <ul class="submenu ">
                                                   @foreach (main_submenu(1) as $main_submenu)
                                                       @if ($main_submenu->upline == $main_menu->name)
                                                           <li class="submenu-item ">
                                                                @if($main_submenu->xurl==null)
                                                                    <a href="{{ $main_submenu->xurl }}">{{ $main_submenu->description }}
                                                                @else
                                                                    <a href="{{ route($main_submenu->xurl) }}">{{ $main_submenu->description }}
                                                                @endif
                                                                <!--Tambah Route Biar kalau misal lagi di page add tidak error-->
                                                               </a>
                                                           </li>
                                                       @endif
                                                   @endforeach
                                               </ul>
                                           </li>
                                       @endif
                                   @endforeach
                               </ul>
                           </li>
                       @endforeach
                       <li class="sidebar-item active ">
                           <a href="index.html" class='sidebar-link'>
                               <i class="bi bi-grid-fill"></i>
                               <span>Settings</span>
                           </a>
                       </li>
                             <li class="sidebar-item ">
                           <a href="{{ route('user') }}"class='sidebar-link'>
                               <i class="bi bi-cash"></i>
                               <span>User</span>
                           </a>                          
                       </li>
                       </li>
                       <li class="sidebar-item ">
                           <a href="{{ route('module') }}"class='sidebar-link'>
                               <i class="bi bi-cash"></i>
                               <span>Module</span>
                           </a>                          
                       </li>
                       <li class="sidebar-item ">
                           <a href="{{ route('groupmodule') }}"class='sidebar-link'>
                               <i class="bi bi-cash"></i>
                               <span>Group Module</span>
                           </a>                          
                       </li>
                       <li class="sidebar-item ">
                           <a href="{{ route('branch') }}"class='sidebar-link'>
                               <i class="bi bi-cash"></i>
                               <span>Branch</span>
                           </a>                          
                       </li>

                       <li class="sidebar-item ">
                           <a href="{{ route('logout') }}"class='sidebar-link'
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                               <i class="bi bi-cash"></i>
                               <span>Log Out</span>
                           </a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                               @csrf
                           </form>
                       </li>

                   </ul>
               </div>
           </div>
       </div>

   </div>
