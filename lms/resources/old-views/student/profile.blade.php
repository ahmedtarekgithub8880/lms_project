@extends('layouts.app2')

@section('content')











    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Add listing</li>
            </ol>
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-user"></i>Profile details</h2>
                </div>


                <form STYLE="TEXT-ALIGN: LEFT;" class="ed_contact_form ed_toppadder40" method="POST" action="{{ route('users.update',$user) }}"  enctype="multipart/form-data">

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
                            <label>Your photo</label>


                            <input type="file"  class="dropzone  @error('avatar') is-invalid @enderror " name="avatar" value="{{ $user_data[0]->avatar }}"  style="background: url('{{ isset($user_data[0]->provider_id) ? $user_data[0]->avatar : Storage::disk('public')->url($user_data[0]->avatar) }}');background-size: 100% 100%; width: 100%;" >
                        </div>
                    </div>
                    <div class="col-md-8 add_top_30">
                        <div class="row">
                            <div class="col-md-12">



                                <div class="form-group">

                                    <label  for="name" class="control-label  col-form-label ">{{ __('Name') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user_data[0]->name }}" required autocomplete="name" autofocus>
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
                                    <label for="Telephone" class="control-label  col-form-label ">{{ __('Telephone') }}</label>

                                    <input type="text" class="form-control @error('Telephone') is-invalid @enderror" name="telephone" value="{{ $user_data[0]->telephone }}" required autocomplete="telephone">
                                    @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                    @enderror
                                </div>


                            </div>
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="email" class="control-label  col-form-label ">{{ __('E-Mail Address') }}</label>

                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user_data[0]->email }}" required autocomplete="email">
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
                            <input type="submit" value="Save" class="btn_1 medium">

                    </div>
                </div>


                </form>
            </div>



            <!-- /box_general-->
            <div class="row">


                <div class="col-md-12">

                    <form STYLE="TEXT-ALIGN: LEFT;" class="ed_contact_form ed_toppadder40" method="POST" action="{{ route('users.update_password',$user) }}"  enctype="multipart/form-data">


                        @csrf
                    <div class="box_general padding_bottom">
                        <div class="header_box version_2">
                            <h2><i class="fa fa-lock"></i>Change password</h2>
                        </div>
                        <div class="form-group">
                            <label>New password</label>
                            <input class="form-control" type="password" name="password">
                        </div>
                        <div class="form-group">
                            <label>Confirm new password</label>
                            <input class="form-control" type="password" name="password_confirmation">
                        </div>


                        <input type="submit" value="Save" class="btn_1 medium">

                    </div>



                    </form>



                </div>




            </div>
            <!-- /row-->
        </div>
        <!-- /.container-fluid-->
    </div>












@endsection
