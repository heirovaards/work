@include('partials._head')

<body class="login">
<div class="login">
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">

        {{--Register Form--}}
        <div id="register" class="form login_form">
            <section class="login_content">
                <form method="POST" action="{{ route('post.register') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h1>Create Account</h1>

                    <div class="form-group">
                        <select class="form-control" name="role">
                            <option>Register As</option>
                            <option value="user">Volunteer</option>
                            <option value="organization">Organization</option>
                        </select>
                    </div>

                    {{-- Name --}}
                    <div>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                          </span>
                        @endif
                        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" id="name" name="name" required value="{{old('name')}}"  />
                    </div>

                    {{-- username --}}
                    <div>
                        @if ($errors->has('username'))
                            <span class="invalid-feedback">
                            <strong>{{ $errors->first('username') }}</strong>
                          </span>
                        @endif
                        <input type="text" class="form-control{{ $errors->has('Username') ? ' is-invalid' : '' }}" placeholder="Username" id="username" name="username" value="{{old('username')}}" required />
                    </div>

                    {{-- Email --}}
                    <div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                          </span>
                        @endif
                        <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-Mail" id="email" name="email" value="{{old('email')}}"  required />
                    </div>

                    {{-- Password --}}
                    <div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                          </span>
                        @endif
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" id="password" name="password"  required />
                    </div>

                    {{-- Confirm Password --}}
                    <div>
                        @if ($errors->has('password_confirmation'))
                            <span class="invalid-feedback">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                          </span>
                        @endif
                        <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation" required />
                    </div>


                    <div>
                        <button class="btn btn-default submit" type="submit">Submit</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Already a member ?
                            <a href="{!! url('/login') !!}" class="to_register"> Log in </a>
                        </p>
                        <div class="clearfix"></div>
                        <br />

                        {{--<div>--}}
                            {{--<p>© 2018 All Rights Reserved. Indonesia Drug Campaign</p>--}}
                        {{--</div>--}}
                    </div>
                </form>
            </section>
        </div>
        {{--Register form end--}}


    </div>
</div>

@extends('partials._script')
