@extends('layouts.app')
@section('page_title' , $assignment->getTranslatedAttribute('title'))
@section('page_info' , __('Assignment'))
@section('content')
@include('includes.breadcrumb')
    <div class="ed_detail_head">
        <div class="container">
            <div class="row align-items-center">

              <!-- Row -->

                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="dashboard_container">
                                <div class="dashboard_container_header">
                                    <div class="dashboard_fl_1">
                                        <h4>{{$assignment->title}}</h4>
                                    </div>
                                </div>
                                <div class="dashboard_container_body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="thead-dark">
                                            <tr>
                                                
                                                <th scope="col">{{__('Name')}}</th>
                                                <th scope="col">{{__('Link')}}</th>
                                            
                                            </tr>
                                            </thead>
                                            <tbody>


                                            @forelse($resolves as $r)
                                    @foreach(json_decode( $r['file'] ) as  $f )
                                                <tr>
                                                    
                                                    <td>{{$r->user->name}}</td>
                                                    <td>                                                        
                                                        <a href="{{ Storage::disk('public')->url($f->download_link) }} "><span class="payment_status complete"> <i class="fa fa-check"></i> {{__('Open File')}} </span></a>
                                                    </td>

                                                </tr>
                                                @endforeach
                                                    @empty
                                                        no files Yet
                                                    @endforelse                                
                                                <



                                        

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>

            </div>
        </div>
    </div>

      
@endsection
