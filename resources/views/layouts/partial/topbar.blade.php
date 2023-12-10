<!-- Header -->
<header class="header white-bg fixed-top d-flex align-content-center flex-wrap">
    <!-- Logo -->
    <div class="logo">
        <a href="index.html" class="default-logo"><img src="{{asset('admin/img/logo.png')}}" alt=""></a>
        <a href="index.html" class="mobile-logo"><img src="{{asset('admin/img/mobile-logo.png')}}" alt=""></a>
    </div>
    <!-- End Logo -->

    <!-- Main Header -->
    <div class="main-header">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div class="col-3 col-lg-1 col-xl-4">
                    <!-- Header Left -->
                    <div class="main-header-left h-100 d-flex align-items-center">
                        <!-- Main Header User -->
                        <div class="main-header-user">
                            <a href="#" class="d-flex align-items-center" data-toggle="dropdown">
                                <div class="menu-icon">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>

                                <div class="user-profile d-xl-flex align-items-center d-none">
                                    <!-- User Avatar -->
                                    <div class="user-avatar">
                                        <img src="{{asset('admin/img/avatar/user.png')}}" alt="">
                                    </div>
                                    <!-- End User Avatar -->

                                    <!-- User Info -->
                                    {{--<div class="user-info">
                                        <h4 class="user-name">{{$user->name}}</h4>
                                        <p class="user-email">{{$user->email}}</p>
                                    </div>--}}
                                    <!-- End User Info -->
                                </div>
                            </a>
                            <div class="dropdown-menu">
                                <a href="#">My Profile</a>
                                <a href="#">Settings</a>

{{--
                                <button type="button" class="btn btn-primary">Logout</button>
--}}
                                <form method="GET" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="#"><button style="color: green" type="submit">Logout</button></a>
                                </form>

                            </div>
                        </div>
                        <!-- End Main Header User -->

                        <!-- Main Header Menu -->
                        <div class="main-header-menu d-block d-lg-none">
                            <div class="header-toogle-menu">
                                <!-- <i class="icofont-navigation-menu"></i> -->
                                <img src="{{asset('admin/img/menu.png')}}" alt="">
                            </div>
                        </div>
                        <!-- End Main Header Menu -->
                    </div>
                    <!-- End Header Left -->
                </div>
                <div class="col-9 col-lg-11 col-xl-8">
                    <!-- Header Right -->
                    <div class="main-header-right d-flex justify-content-end">
                        <ul class="nav">
                            <li class="d-none d-lg-flex">
                                <!-- Main Header Time -->
                                <div class="main-header-date-time text-right">
                                    <h3 class="time">
                                        <span id="hours">21</span>
                                        <span id="point">:</span>
                                        <span id="min">06</span>
                                    </h3>
                                    <span class="date"><span id="date">Tue, 12 October 2019</span></span>
                                </div>
                                <!-- End Main Header Time -->
                            </li>


                            <li class="order-2 order-sm-0">
                                <!-- Main Header Search -->
                                <div class="main-header-search">
                                    <form action="#" class="search-form">
                                        <div class="theme-input-group header-search">
                                            <input type="text" class="theme-input-style" placeholder="Search Here">

                                            <button type="submit"><img src="{{asset('admin/img/svg/search-icon.svg')}}" alt=""
                                                                       class="svg"></button>
                                        </div>
                                    </form>
                                </div>
                                <!-- End Main Header Search -->
                            </li>
                            <li>
                                <!-- Main Header Messages -->
                                <div class="main-header-message">
                                    <a href="#" class="header-icon" data-toggle="dropdown">
                                        <img src="{{asset('admin/img/svg/message-icon.svg')}}" alt="" class="svg">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- Dropdown Header -->
                                        <div class="dropdown-header d-flex align-items-center justify-content-between">
                                            <h5>3 Unread messages</h5>
                                            <a href="#" class="text-mute d-inline-block">Clear all</a>
                                        </div>
                                        <!-- End Dropdown Header -->

                                        <!-- Dropdown Body -->
                                        <div class="dropdown-body">
                                            <!-- Item Single -->
                                            <a href="#" class="item-single d-flex media align-items-center">
                                                <div class="figure">
                                                    <img src="{{asset('admin/img/avatar/m1.png')}}" alt="">
                                                    <span class="avatar-status bg-teal"></span>
                                                </div>
                                                <div class="content media-body">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <h6 class="name">Sender Name</h6>
                                                        <p class="time">2 min ago</p>
                                                    </div>
                                                    <p class="main-text">Donec dapibus mauris id odio ornare tempus. Duis sit amet accumsan justo.</p>
                                                </div>
                                            </a>
                                            <!-- End Item Single -->

                                        </div>
                                        <!-- End Dropdown Body -->
                                    </div>
                                </div>
                                <!-- End Main Header Messages -->
                            </li>
                            <li>
                                <!-- Main Header Notification -->
                                <div class="main-header-notification">
                                    <a href="#" class="header-icon notification-icon" data-toggle="dropdown">
                                        <span class="count" data-bg-img="img/count-bg.png">22</span>
                                        <img src="{{asset('admin/img/svg/notification-icon.svg')}}" alt="" class="svg">
                                    </a>
                                    <div class="dropdown-menu style--two dropdown-menu-right">
                                        <!-- Dropdown Header -->
                                        <div class="dropdown-header d-flex align-items-center justify-content-between">
                                            <h5>5 New notifications</h5>
                                            <a href="#" class="text-mute d-inline-block">Clear all</a>
                                        </div>
                                        <!-- End Dropdown Header -->

                                        <!-- Dropdown Body -->
                                        <div class="dropdown-body">
                                            <!-- Item Single -->
                                            <a href="#" class="item-single d-flex align-items-center">
                                                <div class="content">
                                                    <div class="mb-2">
                                                        <p class="time">2 min ago</p>
                                                    </div>
                                                    <p class="main-text">Donec dapibus mauris id odio ornare tempus amet.</p>
                                                </div>
                                            </a>
                                            <!-- End Item Single -->

                                            <!-- Item Single -->
                                            <a href="#" class="item-single d-flex align-items-center">
                                                <div class="content">
                                                    <div class="mb-2">
                                                        <p class="time">2 min ago</p>
                                                    </div>
                                                    <p class="main-text">Donec dapibus mauris id odio ornare tempus. Duis sit amet accumsan justo.</p>
                                                </div>
                                            </a>
                                            <!-- End Item Single -->

                                            <!-- Item Single -->
                                            <a href="#" class="item-single d-flex align-items-center">
                                                <div class="content">
                                                    <div class="mb-2">
                                                        <p class="time">2 min ago</p>
                                                    </div>
                                                    <p class="main-text">Donec dapibus mauris id odio ornare tempus. Duis sit amet accumsan justo.</p>
                                                </div>
                                            </a>
                                            <!-- End Item Single -->

                                            <!-- Item Single -->
                                            <a href="#" class="item-single d-flex align-items-center">
                                                <div class="content">
                                                    <div class="mb-2">
                                                        <p class="time">2 min ago</p>
                                                    </div>
                                                    <p class="main-text">Donec dapibus mauris id odio ornare tempus. Duis sit amet accumsan justo.</p>
                                                </div>
                                            </a>
                                            <!-- End Item Single -->
                                        </div>
                                        <!-- End Dropdown Body -->
                                    </div>
                                </div>
                                <!-- End Main Header Notification -->
                            </li>
                        </ul>
                    </div>
                    <!-- End Header Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Header -->
</header>
