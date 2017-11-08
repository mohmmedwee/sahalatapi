@extends('common.layouts.main')

@section('title', trans('general.edit_config'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('project.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('general.edit_config') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('general.edit_config') }}</a></li>
                        <li class="active">{{ trans('edit_config::edit_config.edit_configCreate') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" method="get" action="" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('general.search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>









            <div class="row">


                <div class="col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">{{ trans('edit_config::edit_config.edit_config') }}</h3>
                        <p class="text-muted m-b-40">{{ trans('edit_config::edit_config.addedit_config') }}</p>
                        <!-- Nav tabs -->

                        @include ('common/partials/messages')
                        <ul class="nav nav-tabs" role="tablist">


                            <li role="presentation" class="active">
                                <a href="#idetail" aria-controls="detail" role="tab" data-toggle="tab" aria-expanded="true"><span><i class="ti-home"></i>{{trans('general.basic')}}</span></a>
                            </li>



                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">


                            <div role="tabpanel" class="tab-pane active" id="idetail">

                                {!! Form::model($request,['url' => '/admin/edit_config', 'class' => 'form-horizontal']) !!}





                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">{{ trans('edit_config::edit_config.addedit_config') }}</span>
                                    </div>

                                    <div class="panel-body">



                                                                                
                                        <div class="row">
                                            <div class="form-group {{ $errors->has('max_guest_order') ? 'has-error' : ''}}  col-xs-6">
                                                {!! Form::label('max_guest_order', trans('edit_config::edit_config.max_guest_order'), ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-8">
                                                    {!! Form::text('max_guest_order', config('module.max_guest_order'), ['class' => 'form-control']) !!}
                                                    {!! $errors->first('max_guest_order', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>


                                            <div class="form-group {{ $errors->has('max_reach_notification_phone') ? 'has-error' : ''}}  col-xs-6">
                                                {!! Form::label('max_reach_notification_phone', trans('edit_config::edit_config.max_reach_notification_phone'), ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-8">
                                                    {!! Form::text('max_reach_notification_phone', config('module.max_reach_notification_phone'), ['class' => 'form-control']) !!}
                                                    {!! $errors->first('max_reach_notification_phone', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>

                                            </div>

                                        <div class="row">



                                            <div class="form-group {{ $errors->has('max_reach_notification_email') ? 'has-error' : ''}}  col-xs-6">
                                                {!! Form::label('max_reach_notification_email', trans('edit_config::edit_config.max_reach_notification_email'), ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-8">
                                                    {!! Form::text('max_reach_notification_email', config('module.max_reach_notification_email'), ['class' => 'form-control']) !!}
                                                    {!! $errors->first('max_reach_notification_email', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>

                                                                                
                                        







                                        <div class="form-group">
                                            <div class="col-sm-offset-9 col-sm-3">
                                                {!! Form::submit('Edit', ['class' => 'btn btn-primary form-control']) !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                {!! Form::close() !!}

                            </div>

                        </div>
                    </div>
                </div>

            </div>







        </div>
    </div>
@endsection