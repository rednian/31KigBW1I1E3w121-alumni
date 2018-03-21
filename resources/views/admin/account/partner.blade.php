@extends('layouts.admin-master')
@section('style')
    <link href="{{asset('public/plugins/bootstrap-toggle/toggle-button.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="main-content">
        <div class="container" style="min-height: 500px;">
            <div class="row">
                @include('include.admin.account-sidebar')
                <div class="col-xs-10 s-pad">
                    <div class="admin-content bg-white">
                        <div class="head oh border-bot mb-10">
                            <h4 class="pull-left c-bright-green normal">Partners</h4>
                            <input type="text" placeholder="Search" class="border-light pull-right">
                        </div>
                        <section class="row">
                            <div class="col-xs-12">
                                <a href="#" class="btn btn-success btn-prime" data-toggle="modal" data-target="#partner-modal">Create Partner</a>
                            </div>
                        </section>

                        <div class="row" style="margin-top: 1%;">
                            <div class="col-md-12">
                                <ul class="inline-block">
                                    @foreach($partners as $partner)
                                        <li class="oh mb-24 mr-15 partner" style="max-width:300px;">

                                            <section class="pull-right clearfix" id="btn-group">
                                                <a id="btn-edit" href="{{route('partner.edit',$partner)}}" class="btn btn-default btn-xs hide"><span class="fa fa-pencil"></span></a>
                                                <a id="btn-delete" href="{{route('partner.destroy', $partner)}}" class="btn btn-default btn-xs hide"><span class="fa fa-trash-o"></span></a>
                                            </section>

                                            <img src="{{asset('public/storage/'.$partner->logo)}}" alt="" class="pull-left mr-15 img-thumbnail" style="max-width:90px;">

                                            <div style="padding-top:0px;" class="mb-15 oh">
                                                <h4>{{ucwords($partner->name)}}</h4>
                                                <h6 class="mt-3 c-sdark mb-5">{{ucwords($partner->address)}}</h6>
                                                <h5 class="mt-3 c-bright-green">Contact Information</h5>
                                                <h6 class="mt-3 c-sdark">{{$telephone_number = empty($partner->telephone_number) ? '' : 'Tell#: '. $partner->telephone_number}}</h6>
                                                <h6 class="mt-3 c-sdark">{{$mobile_number = empty($partner->mobile_number) ? '' : 'Cell#: '. $partner->mobile_number}}</h6>
                                                <h6 class="mt-3 c-sdark">{{$email = empty($partner->email) ? '' : 'Email: '. $partner->email}}</h6>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="text-center">
                                    {!! $partners->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="partner-modal" class="modal fade" role="dialog">
        <div class="modal-dialog  smx">
            <!-- Modal content-->
            <div class="modal-content box-edge">
                <div class="modal-body p-25 oh">
                    <form action="{{route('partner.store')}}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <legend>Create Partner</legend>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="title" class="control-label col-sm-3">Name <code>*</code></label>

                            <div class="col-sm-9">
                                <input type="text" name="name" value="{{old('name')}}" id="" class="form-control input-s-sm" autofocus/>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">
                            <label for="title" class="control-label col-sm-3">Logo <code>*</code></label>

                            <div class="col-sm-9">
                                <input type="file" name="logo" id="" class="form-control input-s-sm"/>
                                @if ($errors->has('logo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('logo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="title" class="control-label col-sm-3">Email <code>*</code></label>

                            <div class="col-sm-9">
                                <input type="email" name="email" value="{{old('email')}}" id="" class="form-control input-s-sm"/>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('telephone_number') ? ' has-error' : '' }}">
                            <label for="title" class="control-label col-sm-3">Telephone #</label>

                            <div class="col-sm-9">
                                <input type="text" name="telephone_number" value="{{old('telephone_number')}}" id="" class="form-control input-s-sm"/>
                                @if ($errors->has('telephone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telephone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('mobile_number') ? ' has-error' : '' }}">
                            <label for="title" class="control-label col-sm-3">Mobile #</label>

                            <div class="col-sm-9">
                                <input type="text" name="mobile_number" value="{{old('mobile_number')}}" id="" class="form-control input-s-sm"/>
                                @if ($errors->has('mobile_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="title" class="control-label col-sm-3">Address <code>*</code></label>

                            <div class="col-sm-9">
                                <textarea name="address" value="{{old('address')}}" id="" class="form-control" cols="30" rows="5">{{old('address')}}</textarea>
                                @if ($errors->has('address'))
                                    <span class="help-block"><strong>{{ $errors->first('address') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-success btn-prime box-edge pull-right">Save Partner</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>




@endsection
@section('script')
    <script src="{{asset('public/plugins/bootstrap-toggle/toggle-button.min.js')}}"></script>
    <script>
        $(document).ready(function () {

            @if($errors->any())
            $('div#partner-modal').modal('show');
            @endif

            $('li.partner').hover(
                function () {
                    var el = $(this).addClass("bg-gray").find('a');
                    el.removeClass('hide');
                },
                function () {
                    var el = $(this).removeClass("bg-gray").find('a');
                    el.addClass('hide');
                }
            );

        });
    </script>
@endsection