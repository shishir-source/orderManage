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
                            Hizrian
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
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


                <li class="nav-item">
                    <a data-toggle="collapse" href="#managment">
                        <i class="fas fa-layer-group"></i>
                        <p>Managment</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="managment">
                        <ul class="nav nav-collapse">
                            {{-- <li>
                                <a href="{{route("booking.create")}}">
                                    <span class="sub-item">Create Booking</span>
                                </a>
                            </li> --}}
                            <li>
                                <a href="{{route("booking.index")}}">
                                    <span class="sub-item">Booking</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{route("booking.admin.admin_booking_list")}}">
                                    <span class="sub-item">Admin Booking</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{route("shipment.index")}}">
                                    <span class="sub-item">Shipment</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li class="nav-item">
                    <a data-toggle="collapse" href="#report">
                        <i class="fas fa-layer-group"></i>
                        <p>Report</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="report">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="#">
                                    <span class="sub-item">Orders</span>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <span class="sub-item">Profit</span>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <span class="sub-item">Shipments</span>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <span class="sub-item">Expose</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->