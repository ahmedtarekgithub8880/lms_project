@extends('layouts.app')

@section('content')

    <div class="row" style="padding: 20px">
        <div class="col-lg-3 col-md-3">
                @include('includes.studentnav')
        </div>
        <div class="col-md-9">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href="#">{{ __('My Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="#">{{ __('My profile') }}</a>
                        </li>
                    </ol>
                    <br>
                    <div class="box_general padding_bottom">
                        <div class="header_box version_2">
                            <h3><i class="fa fa-user"></i>{{ __('Profile details') }}</h3>
                        </div>


                        <form STYLE="TEXT-ALIGN: @if(app()->getLocale() == 'en') LEFT @else RIGHT @endif ;" class="ed_contact_form ed_toppadder40" method="POST"
                            action="{{ route('users.update', $user) }}" enctype="multipart/form-data">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            @csrf

                            <div class="row">
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label>{{ __('Your photo') }}</label>

                                        <input type="file" class="dropzone  @error('avatar') is-invalid @enderror "
                                            name="avatar" value="{{ $user_data[0]->avatar }}">
                                    </div>
                                </div>
                                <div class="col-md-8 add_top_30">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name"
                                                    class="control-label  col-form-label ">{{ __('Full Name') }}</label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                    name="name" value="{{ $user_data[0]->name }}" required
                                                    autocomplete="name" autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row-->
                                    <div class="row">
                                        <div class="col-md-12">


                                            <div class="form-group">
                                                <label for="Telephone"
                                                    class="control-label  col-form-label ">{{ __('Phone number') }}</label>

                                                <input type="text"
                                                    class="form-control @error('Telephone') is-invalid @enderror"
                                                    name="telephone" value="{{ $user_data[0]->telephone }}" required
                                                    autocomplete="telephone">
                                                @error('telephone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                        </div>
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label for="email"
                                                    class="control-label  col-form-label ">{{ __('Email') }}</label>

                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ $user_data[0]->email }}" required autocomplete="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row-->
                                    <!-- /row-->
                                    <input type="submit" value="{{ __('Save') }}" class="btn add-items">
                                </div>
                            </div>
                        </form>
                    </div>



                    <!-- /box_general-->
                    <div class="row">


                        <div class="col-md-12">

                            <form STYLE="TEXT-ALIGN: @if(app()->getLocale() == 'en') LEFT @else RIGHT @endif ;" class="ed_contact_form ed_toppadder40" method="POST"
                                action="{{ route('users.update_password', $user) }}" enctype="multipart/form-data">


                                @csrf
                                <div class="box_general padding_bottom">
                                    <div class="header_box version_2">
                                        <h3><i class="fa fa-lock"></i> &nbsp;{{ __('Change password') }}</h3>
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('New password') }}</label>
                                        <input class="form-control" type="password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('Confirm new password') }}</label>
                                        <input class="form-control" type="password" name="password_confirmation">
                                    </div>

                                    <input type="submit" value="{{ __('Save') }}" class="btn add-items">

                                </div>
                            </form>
                        </div>
                        <br>
                    </div>
                    <!-- /row-->
                </div>
                <!-- /.container-fluid-->
            </div>
        </div>
    </div>

@endsection
