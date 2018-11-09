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
                        <img src="{{asset('images/img.jpg')}}" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>{{Auth::user()->name}}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->
                <br/>
                @include('components._usersidebar')
            </div>
        </div>

    @include('components._topnav')

    <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                {{--search bar--}}

                <div class="clearfix"></div>
                <div class="row">
                    @include('components._warnings')
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>View User</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />

                                @foreach($user as $user)
                                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('user.update')}}" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                                            </label>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback">
                                                <strong>{{ $errors->first('name') }}</strong>
                                              </span>
                                            @endif
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="name" value="{{$user->name}}" disabled >
                                                <input type="hidden" name="id" value="{{$user->id}}" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">E-Mail <span class="required">*</span>
                                            </label>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                              </span>
                                            @endif
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="email" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="email" value="{{$user->email}}" disabled >
                                            </div>
                                        </div>

                                        @foreach($user->roles as $role)
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Roles <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="email" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="email" value="{{$role->name}}" disabled >
                                                </div>
                                            </div>
                                        @endforeach



                                        <div class="ln_solid"></div>

                                    </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@extends('layouts._script')

