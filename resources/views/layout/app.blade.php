<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="website novar">
    <title>{{config('app.name')}} | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- using online links -->
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('asset/css/all.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('asset/css/scroller.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="{{asset('asset/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/sidebar-themes.css')}}">
    <link rel="shortcut icon" type="image/png" href="{{asset('asset/img/user.jpeg')}}" />
    <link rel="stylesheet" href="{{asset('asset/css/toastr/build/toastr.min.css')}}">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="{{asset('asset/css/toastr/build/toastr.min.js')}}"></script>
</head>

<body>

    <div class="page-wrapper default-theme sidebar-bg bg1 toggled">

        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <!-- sidebar-brand  -->
                <div class="sidebar-item sidebar-brand">
                    <a href="#">Literasi SMAN 2 Kuta Selatan</a>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-item sidebar-header d-flex flex-nowrap">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="{{asset('asset/img/user.jpeg')}}"
                            alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">
                            <strong>{{ Auth::user()->name }}</strong>
                        </span>
                        <span class="user-role">Admin</span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </div>
                <!-- sidebar-search  -->
                {{-- <div class="sidebar-item sidebar-search">
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control search-menu" placeholder="Search...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- sidebar-menu  -->
                <div class=" sidebar-item sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>Menu</span>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="/dashboard">
                                <i class="fa fa-file"></i>
                                <span class="menu-text">Dashboard</span>
                                
                            </a>
                            
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-file"></i>
                                <span class="menu-text">Literasi</span>
                                
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa fa-pen"></i> Add Literasi
                                            
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-table"></i> Daftar Literasi
                                            
                                        </a>
                                    </li>
                                  
                                   
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span class="menu-text">Siswa</span>
                                
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa fa-pen"></i> Add Siswa
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-users"></i> Daftar Siswa
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="far fa-user"></i>
                                <span class="menu-text">Guru</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa fa-pen"></i> Add Guru
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-users"></i> Daftar Guru
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="far fa-table"></i>
                                <span class="menu-text">Kelas</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa fa-pen"></i> Add Kelas
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-table"></i> Daftar Kelas
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        
                       
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-footer  -->
           
        </nav>
        
        <!-- page-content  -->
        <main class="page-content pt-2">
            
            <div class="header" id="scroll">


                <div class="menu-pin">
                    <div class="form-group col-md-12">
                        <a id="toggle-sidebar" class="btn btn-secondary rounded-0" href="#">
                            <span><i class="fa fa-bars"></i></span>
                        </a>
                       
    
                    </div>
                </div>
                <div class="menu-logout">
                    
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->role }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#"><i class="fa fa-cog"></i> Setting Profile</a>
                              <a class="dropdown-item" href="#"><i class="fa fa-key"></i> Change Password</a>
                              <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                               <i class="fa fa-sign-out-alt"></i> Log Out
                           </a>

                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                               @csrf
                           </form>
                            </div>
                          </div>
                        
                        
                      </div>

                </div>

                
                
            </div>
           
            @yield('content')
        
        </main>
        <!-- page-content" -->
    </div>


    <!-- using online scripts -->

    <script src="{{asset('asset/js/popper.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap.js')}}">
    </script>
    <script src="{{asset('asset/js/scroller.js')}}"></script>




    <script src="{{asset('asset/js/main.js')}}"></script>

</body>

</html>
