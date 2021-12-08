<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown mt-3">
                                <div class="user-pic"><img src="{{asset('assets/admin/assets/images/users/1.jpg')}}" alt="users" class="rounded-circle" width="40" /></div>
                                <div class="user-content hide-menu ml-2">
                                    <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="mb-0 user-name font-medium">{{Auth::user()->username}} <i class="fa fa-angle-down"></i></h5>
                                        <span class="op-5 user-email">{{Auth::user()->email}}</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user mr-1 ml-1"></i> My Profile</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet mr-1 ml-1"></i> My Balance</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email mr-1 ml-1"></i> Inbox</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings mr-1 ml-1"></i> Account Setting</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Apps</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-inbox-arrow-down"></i><span class="hide-menu">Dashboard </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{route('admin.index')}}" class="sidebar-link"><i class="mdi mdi-email"></i><span class="hide-menu"> Data DU/DI </span></a></li>
                                <li class="sidebar-item"><a href="{{url('/admin/data/data-siswa')}}" class="sidebar-link"><i class="mdi mdi-email-alert"></i><span class="hide-menu"> Data Siswa </span></a></li>
                                <li class="sidebar-item"><a href="{{url('admin/data/data-jurusan')}}" class="sidebar-link"><i class="mdi mdi-email-secure"></i><span class="hide-menu"> Data Jurusan </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-bookmark-plus-outline"></i><span class="hide-menu">Ticket </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="ticket-list.html" class="sidebar-link"><i class="mdi mdi-book-multiple"></i><span class="hide-menu"> Ticket List </span></a></li>
                                <li class="sidebar-item"><a href="ticket-detail.html" class="sidebar-link"><i class="mdi mdi-book-plus"></i><span class="hide-menu"> Ticket Detail </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-gradient"></i><span class="hide-menu">Extra </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="app-chats.html" class="sidebar-link"><i class="mdi mdi-comment-processing-outline"></i><span class="hide-menu"> Chats Apps </span></a></li>
                                <li class="sidebar-item"><a href="app-calendar.html" class="sidebar-link"><i class="mdi mdi-calendar"></i><span class="hide-menu"> Calender </span></a></li>
                                <li class="sidebar-item"><a href="app-taskboard.html" class="sidebar-link"><i class="mdi mdi-bulletin-board"></i><span class="hide-menu"> Taskboard </span></a></li>
                            </ul>
                        </li>
                        
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Extra</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/') }}" aria-expanded="false"><i class="mdi mdi-content-paste"></i><span class="hide-menu">Go Back To Home</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="authentication-login1.html" aria-expanded="false"><i class="mdi mdi-directions"></i><span class="hide-menu">Log Out</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>