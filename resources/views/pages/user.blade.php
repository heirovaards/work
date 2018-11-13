@include('layouts._head')

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>{{Auth::user()->name}}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->
                <br />
                @include('components._usersidebar')
            </div>
        </div>

        @include('components._topnav')

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Users </h3>
                    </div>
                    {{--search bar--}}
                    {{--<div class="title_right">--}}
                        {{--<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">--}}
                            {{--<div class="input-group">--}}
                                {{--<input type="text" class="form-control" placeholder="Search for...">--}}
                                {{--<span class="input-group-btn">--}}
                              {{--<button class="btn btn-default" type="button">Go!</button>--}}
                            {{--</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--search bar--}}
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @include('components._warnings')
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Default Example <small>Users</small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user as $userdata)
                                            <tr>
                                                <td>{{$userdata->id}}</td>
                                                <td>{{$userdata->name}}</td>
                                                <td>{{$userdata->email}}</td>
                                                @foreach($userdata->roles as $roles)
                                                    <td>{{$roles->name}}</td>
                                                @endforeach
                                                <td>
                                                    <form method="post" action="{{route('user.view',$userdata)}}"  style ='float: left; padding: 0px;'>
                                                        {{csrf_field()}}
                                                        <button  type="btn" class="btn btn-success btn-xs" >View</button>
                                                    </form>
                                                    <form method="post" action="{{route('user.edit',$userdata)}}"  style ='float: left; padding: 0px;'>
                                                        {{csrf_field()}}
                                                        <button  type="btn" class="btn btn-xs btn-success" >Edit</button>
                                                    </form>
                                                    <form method="post" action="{{route('user.delete',$userdata)}}" onsubmit="return confirm('Are you sure?')">
                                                        {{csrf_field()}}
                                                        <button  type="btn" class="btn btn-xs btn-danger" >Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

@include('layouts._script')
@include('layouts._datatable')

<script>
    $('#datatable').dataTable( {
        "columnDefs": [
            { "orderable": false, "targets": 4 }
        ]
    } );
</script>
