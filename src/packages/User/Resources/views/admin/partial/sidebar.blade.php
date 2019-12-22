<!-- Sidebar -->
<div class="sidebar">
    
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{asset('assets/img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{auth_user()->first_name}} {{auth_user()->last_name}}
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{route('admin.profile.update',auth_user()->id)}}">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li> --}}
                            {{-- <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item active">
                    <a href="{{route('admin.dashboard')}}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        <span class="badge badge-count">5</span>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>


                @if(auth_user()->type == 'admin')
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#settings">
                            <i class="fas fa-layer-group"></i>
                            <p>Settings</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="settings">
                            <ul class="nav nav-collapse">

                                @if(auth_user()->type == 'admin')
                                    <li>
                                        <a href="{{route("admin.user.index")}}">
                                            <span class="sub-item">User</span>
                                        </a>
                                    </li>
                                @endif                       
                            </ul>
                        </div>
                    </li>
                @endif


                @if(auth_user()->type == 'customer' || auth_user()->type == 'admin' || auth_user()->type == 'shipment')
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#managment">
                            <i class="fas fa-layer-group"></i>
                            <p>Managment</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="managment">
                            <ul class="nav nav-collapse">
                                @if(auth_user()->type == 'admin' || auth_user()->type == 'customer')
                                    <li>
                                        <a href="{{route("booking.index")}}">
                                            <span class="sub-item">Order</span>
                                        </a>
                                    </li>
                                @endif
                                @if(auth_user()->type == 'admin' || auth_user()->type == 'customer')
                                    <li>
                                        <a href="{{route("booking.draft.index")}}">
                                            <span class="sub-item">Draft Order</span>
                                        </a>
                                    </li>
                                @endif
                                @if(auth_user()->type == 'admin')
                                    <li>
                                        <a href="{{route("booking.admin.admin_booking_list")}}">
                                            <span class="sub-item">Admin Order</span>
                                        </a>
                                    </li>
                                @endif
                                @if(auth_user()->type == 'admin' || auth_user()->type == 'shipment')
                                    <li>
                                        <a href="{{route("shipment.index")}}">
                                            <span class="sub-item">Shipment</span>
                                        </a>
                                    </li>
                                @endif                        
                            </ul>
                        </div>
                    </li>
                @endif


                
                <li class="nav-item">
                    <a data-toggle="collapse" href="#report">
                        <i class="fas fa-layer-group"></i>
                        <p>Report</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="report">
                        <ul class="nav nav-collapse">
                            @if(auth_user()->type == 'admin' || auth_user()->type == 'customer')
                                <li>
                                    <a href="#">
                                        <span class="sub-item">Orders</span>
                                    </a>
                                </li>
                            @endif
                            @if(auth_user()->type == 'admin' || auth_user()->type == 'shipment')
                                <li>
                                    <a href="#">
                                        <span class="sub-item">Shipments</span>
                                    </a>
                                </li>
                            @endif
                            @if(auth_user()->type == 'admin')
                                <li>
                                    <a href="#">
                                        <span class="sub-item">Profit</span>
                                    </a>
                                </li>

                                

                                <li>
                                    <a href="#">
                                        <span class="sub-item">Expose</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>             
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->