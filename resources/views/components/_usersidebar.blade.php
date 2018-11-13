<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li>
                <a href="#"><i class="fa fa-home" ></i> Dashboard </a>
            </li>

            <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('user.table')}}">All user</a></li>
                    @role('admin')
                        <li><a href="{{route('user.add')}}">New User</a></li>
                    @endrole
                </ul>
            </li>
            <li><a><i class="fa fa-area-chart"></i> Penjualan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('transaction.chart')}}">Sales Chart</a></li>
                    <li><a href="{{route('transaction.table')}}">Favorite Items</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-gear"></i> Roles <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('role.table')}}">All Roles</a></li>
                    @role('admin')
                        <li><a href="{{route('role.add')}}">New Roles</a></li>
                    @endrole
                </ul>
            </li>
            <li>
                <a href="{{route('logout')}}"><i class="fa fa-sign-out" ></i> Logout </a>
            </li>

        </ul>
    </div>

</div>
<!-- /sidebar menu -->