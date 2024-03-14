<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.png') }}"/>
    <style>
        #count {
            /*display: flex;*/
            position: relative;
            left: 70%;
            background-color: olive;
            color: white;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            /*justify-content: center;*/
            /*align-items: center;*/
        }

        .custom-body {
            background-color: #4a5568;
        }

        .card-item {
            width: 15%;
            background-color: #1a9be9;
            border-radius: 20px;
            text-align: center;
            padding: 20px;
        }

        .card-item > p {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <a class="sidebar-brand brand-logo" href="{{ route('index') }}"><img
                    src="{{ asset('admin/assets/images/logo.svg') }}" alt="logo"/></a>
            <a class="sidebar-brand brand-logo-mini" href="{{ route('index') }}"><img
                    src="{{ asset('admin/assets/images/logo-mini.svg') }}" alt="logo"/></a>
        </div>
        <ul class="nav">
            <li class="nav-item profile">
                <div class="profile-desc">
                    <div class="profile-pic">
                        <div class="count-indicator">
                            <img class="img-xs rounded-circle "
                                 src="{{ asset('admin/assets/images/faces/face15.jpg') }}" alt="">
                            {{--                            <span class="count bg-success"></span>--}}
                        </div>
                        <div class="profile-name">
                            <h5 class="mb-0 font-weight-normal">{{ \Illuminate\Support\Facades\Auth::user()->name }}</h5>
                            <span>
                              {{--      {{ \Spatie\Permission\Models\Role::find(\Illuminate\Support\Facades\DB::table('model_has_roles')-> --}}
                                {{--     where('model_id', \Illuminate\Support\Facades\Auth::id())->first()->role_id)->name }} --}}
                            </span>
                        </div>
                    </div>
                    <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i
                            class="mdi mdi-dots-vertical"></i></a>
                    <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                         aria-labelledby="profile-dropdown">
                        <a href="{{ route('users.edit', ['user' => \Illuminate\Support\Facades\Auth::user()->id]) }}"
                           class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-settings text-primary"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-onepassword  text-info"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('users.show', ['user' => \Illuminate\Support\Facades\Auth::user()->id]) }}"
                           class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-calendar-today text-success"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                            </div>
                        </a>
                    </div>
                </div>
            </li>
            <li class="nav-item nav-category">
                <span class="nav-link">Navigation</span>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('home') }}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            @can('role-list')
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('templates') }}">
                          <span class="menu-icon">
                              <i class="bi bi-person-circle"></i>
            {{--                <i class="mdi mdi-speedometer"></i>--}}
                          </span>
                        <span class="menu-title">Templates</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('users.index') }}">
              <span class="menu-icon">
                  <i class="bi bi-person-circle"></i>
{{--                <i class="mdi mdi-speedometer"></i>--}}
              </span>
                        <span class="menu-title">Users</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('roles.index') }}">
              <span class="menu-icon">
                  <i class="bi bi-dpad-fill"></i>
{{--                <i class="mdi mdi-speedometer"></i>--}}
              </span>
                        <span class="menu-title">Roles</span>
                    </a>
                </li>
            @endcan
            @can('post-list')
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('posts.index') }}">
              <span class="menu-icon">
                  <i class="bi bi-file-earmark-post-fill"></i>
{{--                <i class="mdi mdi-speedometer"></i>--}}
              </span>
                        <span class="menu-title">Posts</span>
                    </a>
                </li>
            @endcan
            @can('category-list')
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('categories.index') }}">
              <span class="menu-icon">
{{--                <i class="mdi mdi-speedometer"></i>--}}
                  <i class="bi bi-tags-fill"></i>
              </span>
                        <span class="menu-title">Categories</span>
                    </a>
                </li>
            @endcan
            @can('video-list')
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('videos.index') }}">
              <span class="menu-icon">
                  <i class="bi bi-camera-video-fill"></i>
{{--                <i class="mdi mdi-speedometer"></i>--}}
              </span>
                        <span class="menu-title">Videos</span>
                    </a>
                </li>
            @endcan
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('messages.index') }}">
                  <span class="menu-icon">
                    <i class="mdi mdi-email"></i>
                  </span>
                    <span class="menu-title">Messages
                            <span id="count">@yield('message')</span>
                    </span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid page-body-wrapper custom-body">
        <div class="p-5 mt-5 w-100">
            @yield('content')
        </div>
        <nav class="navbar p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                <a class="navbar-brand brand-logo-mini" href="index.html"><img
                        src="../../../public/admin/assets/images/logo-mini.svg" alt="logo"/></a>
            </div>
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav w-100">
                    <li class="nav-item w-100">
                        @yield('search')
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown border-left">
                        <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-email"></i>
                            @yield('message_status')
                        </a>
                        {{--                        @if($count > 0)--}}
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                             aria-labelledby="messageDropdown">
                            <h6 class="p-3 mb-0">Messages</h6>
                            @yield('message_item')
                            <div class="dropdown-divider"></div>
                            <p class="p-3 mb-0 text-center">@yield('message') new messages</p>
                        </div>
                        {{--                        @endif--}}
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                            <div class="navbar-profile">
                                <img class="img-xs rounded-circle"
                                     src="{{ asset('admin/assets/images/faces/face15.jpg') }}" alt="">
                                <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ \Illuminate\Support\Facades\Auth::user()->name }}</p>
                                <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                             aria-labelledby="profileDropdown">
                            <h6 class="p-3 mb-0">Profile</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-success"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Settings</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-logout text-danger"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Log out
                                    </p>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                            <div class="dropdown-divider"></div>
                            <p class="p-3 mb-0 text-center">Advanced settings</p>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                    <span class="mdi mdi-format-line-spacing"></span>
                </button>
            </div>
        </nav>
    </div>


    <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/assets/js/misc.js') }}"></script>
    <script src="{{ asset('admin/assets/js/settings.js') }}"></script>
    <script src="{{ asset('admin/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->
</body>
</html>
