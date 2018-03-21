@extends('layouts.admin-master')

@section('content')
    <div class="main-content">
        <div class="container" style="min-height: 500px;">
            <div class="row">
                @include('include.admin.account-sidebar')
                <div class="col-xs-10 s-pad">
                    <div class="admin-content bg-white">
                        <div class="head oh border-bot mb-10">

                            @include('include.message')
                            <h4 class="pull-left c-bright-green normal">Company</h4>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <a href="#" class="btn btn-success btn-prime" data-toggle="modal" data-target="#company-modal">Register Company</a>

                                <div class="modal fade" id="company-modal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Register Company</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form form-horizontal" method="post" action="{{route('company.store')}}">
                                                    {{csrf_field()}}
                                                    <div class="form-group  {{ $errors->has('company_name') ? ' has-error' : '' }}">
                                                        <label for="" class="control-label col-sm-4">Company Name <code>*</code></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="company_name" value="{{old('company_name')}}" class="form-control">
                                                            @if ($errors->has('company_name'))
                                                                <span class="help-block">
                                                                 <strong>{{ $errors->first('company_name') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                                        <label for="" class="control-label col-sm-4">Email <code>*</code></label>
                                                        <div class="col-sm-8">
                                                            <input type="email" name="email" value="{{old('email')}}" class="form-control">
                                                            @if ($errors->has('email'))
                                                                <span class="help-block">
                                                                 <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group {{ $errors->has('email_confirmation') ? ' has-error' : '' }}">
                                                        <label for="" class="control-label col-sm-4">Confirm Email <code>*</code></label>
                                                        <div class="col-sm-8">
                                                            <input type="email" name="email_confirmation" value="{{old('email_confirmation')}}" class="form-control">
                                                            @if ($errors->has('email_confirmation'))
                                                                <span class="help-block">
                                                                 <strong>{{ $errors->first('email_confirmation') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success btn-prime box-edge">Register Company</button>
                                            </div>
                                            </form>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                            </div>
                        </div>

                        <section class="row" style="margin-top: 1%">

                            <div class="col-md-12">

                                <ul class="inline-block">

                                    @foreach($companies as $company)
                                        <li class="oh mb-24 mr-15" style="max-width:300px;">
                                            <img src="{{asset('public/storage/'.$company->company_logo)}}" alt="" class="pull-left img-thumbnail mr-15" style="max-width:90px;">
                                            <div style="padding-top:0px;" class="mb-15 oh">
                                                <h4>{{ucwords($company->name)}}</h4>
                                                <h6 class="mt-3 c-sdark mb-5">{{ucwords($company->address)}}</h6>
                                                <h5 class="mt-3 c-bright-green">Contact Information</h5>
                                                <h6 class="mt-3 c-sdark">{{$tel = empty($contact->telephone_number) ? '' : 'Tel# : '.$contact->telephone_number}}</h6>
                                                <h6 class="mt-3 c-sdark">{{$cel = empty($contact->mobile_number) ? '' : 'Cell# : '.$contact->mobile_number}}</h6>
                                                <h6 class="mt-3 c-sdark">{{$email = empty($contact->email) ? '' : 'Email : '.$contact->email}}</h6>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script !src="">
        $(document).ready(function () {

            //open the modal if any field has an errors.
            @if($errors->any())
            $('div#company-modal').modal('show');
            @endif
        });
    </script>

@endsection