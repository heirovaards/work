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
                    <div class="title_right">
                        <form method="post" action="{{route('transaction.search')}}">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                {{csrf_field()}}
                                <div class="input-group">
                                    <select type="text" class="form-control" placeholder="Search for..." name="month">
                                        <option style="color:gray" value="null"> Month . . .</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Pebruari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                    <div class="input-group">
                                        <select type="text" class="form-control" placeholder="Search for..." name="limit">
                                            <option style="color:gray" value="null"> Limit . . .</option>
                                            <option value="3">3</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                        </select>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" disabled>&</button>
                                        </span>
                                    </div>
                                </div>
                        </form>
                    </div>
                    {{--search bar--}}
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @include('components._warnings')
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Sales Data <small>Bulan : {{$now}} </small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <th>Total Sales</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $data)
                                            <tr>
                                                <td>{{$data->product_id}}</td>
                                                <td>{{$data->product_name}}</td>
                                                <td>{{$data->total_sales}}</td>
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
