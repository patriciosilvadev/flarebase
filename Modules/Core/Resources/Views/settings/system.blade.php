@extends('core::adminlayouts.adminmaster')

@section('Settings')
active
@stop

@section('settings-bar')
active
@stop

@section('system')
class="active"
@stop


@section('HeadInclude')
@stop
<!-- header -->
@section('PageHeader')

@stop
<!-- /header -->
<!-- breadcrumbs -->
@section('breadcrumbs')
<ol class="breadcrumb">

</ol>
@stop
<!-- /breadcrumbs -->
<!-- content -->
@section('content')

<!-- open a form -->

{!! Form::model($systems,['url' => 'postsystem/'.$systems->id, 'method' => 'PATCH' , 'id'=>'formID']) !!}

<div class="box box-primary">
    <div class="box-header">

        <h3 class="box-title">{{Lang::get('core::lang.system')}}</h3> {!! Form::submit('Save',['onclick'=>'sendForm()','class'=>'btn btn-primary pull-right'])!!}
<!-- <input type="submit" value="sumit" onclick="sendForm();"> -->
    </div>

    <!-- check whether success or not -->

    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissable">
        <i class="fa  fa-check-circle"></i>
        <b>Success!</b>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!!Session::get('success')!!}
    </div>
    @endif
    <!-- failure message -->
    @if(Session::has('fails'))
    <div class="alert alert-danger alert-dismissable">
        <i class="fa fa-ban"></i>
        <b>Fail!</b>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!!Session::get('fails')!!}
    </div>
    @endif


    <!-- Helpdesk Status:	radio  Online    Offline    -->

    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('status',Lang::get('core::lang.status')) !!}
                    <div class="row">
                        <div class="col-xs-3">
                            {!! Form::radio('status','1',true) !!} {{Lang::get('core::lang.online')}}
                        </div>
                        <div class="col-xs-3">
                            {!! Form::radio('status','0') !!} {{Lang::get('core::lang.offline')}}
                        </div>
                    </div>
                </div>
            </div>


            <!-- Helpdesk Name/Title: text Required   -->

            <div class="col-md-6">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    {!! Form::label('name',Lang::get('core::lang.name/title')) !!}
                    {!! $errors->first('name', '<spam class="help-block">:message</spam>') !!}
                    {!! Form::text('name',$systems->name,['class' => 'form-control']) !!}
                </div>
            </div>


            <!-- Helpdesk URL: 	 text   Required -->
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
                    {!! Form::label('url',Lang::get('core::lang.url')) !!}
                    {!! $errors->first('url', '<spam class="help-block">:message</spam>') !!}
                    {!! Form::text('url',$systems->url,['class' => 'form-control']) !!}
                </div>
            </div>

            <!-- Default Department:	Dropdown From  Department table: required  -->
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('department') ? 'has-error' : '' }}">

                    {!! Form::label('department',Lang::get('core::lang.default_department')) !!}
                    {!! $errors->first('department', '<spam class="help-block">:message</spam>') !!}
                    {!!Form::select('department', [''=>'Select a Department','Department'=>$departments->lists('name','id')],null,['class'=>'form-control']) !!}

                </div>
            </div>

            <!-- Default Time Zone:	Drop down: timezones table : Required -->
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('time_zone') ? 'has-error' : '' }}">
                    {!! Form::label('time_zone',Lang::get('core::lang.timezone')) !!}
                    {!! $errors->first('time_zone', '<spam class="help-block">:message</spam>') !!}
                    {!!Form::select('time_zone',[''=>'Select a Time Zone','Time Zones'=>$timezones->lists('name','id')],null,['class'=>'form-control']) !!}
                </div>
            </div>


            <!-- Date and Time Format: text: required: eg - 03/25/2015 7:14 am -->

            <div class="col-md-6">
                <div class="form-group {{ $errors->has('date_time_format') ? 'has-error' : '' }}">

                    {!! Form::label('date_time_format',Lang::get('core::lang.date_time')) !!}
                    {!! $errors->first('date_time_format', '<spam class="help-block">:message</spam>') !!}
                    {!! Form::select('date_time_format',[''=>'Select a date Time Format','Date Time Formats'=>$date_time->lists('format','id')],null,['class' => 'form-control']) !!}

                </div>
            </div>

        </div>

        <hr/>
        <h4>{!! Lang::get('core::lang.api_configurations') !!}</h4>

        <!-- Guest user page Content -->
        <div class="row">
            
            <div class="col-md-3">
                <div class="form-group {{ $errors->has('api_enable') ? 'has-error' : '' }}">
                    {!! Form::label('api',Lang::get('core::lang.api')) !!}
                    {!! $errors->first('api_enable', '<spam class="help-block">:message</spam>') !!}
                    <div class="row">
                        <div class="col-xs-5">
                            {!! Form::radio('api_enable','1',true) !!} {{Lang::get('core::lang.enable')}}
                        </div>
                        <div class="col-xs-5">
                            {!! Form::radio('api_enable','0') !!} {{Lang::get('core::lang.disable')}}
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group {{ $errors->has('api_key_mandatory') ? 'has-error' : '' }}">
                    {!! Form::label('api_key_mandatory',Lang::get('core::lang.api_key_mandatory')) !!}
                    {!! $errors->first('api_key_mandatory', '<spam class="help-block">:message</spam>') !!}
                    <div class="row">
                        <div class="col-xs-5">
                            {!! Form::radio('api_key_mandatory','1',true) !!} {{Lang::get('core::lang.enable')}}
                        </div>
                        <div class="col-xs-5">
                            {!! Form::radio('api_key_mandatory','0') !!} {{Lang::get('core::lang.disable')}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Date and Time Format: text: required: eg - 03/25/2015 7:14 am -->

            <div class="col-md-3">
                <div class="form-group {{ $errors->has('api_key') ? 'has-error' : '' }}">

                    {!! Form::label('api_key',Lang::get('core::lang.api_key')) !!}
                    {!! $errors->first('api_key', '<spam class="help-block">:message</spam>') !!}
                    {!! Form::text('api_key',$systems->api_key,['class' => 'form-control']) !!}

                </div>
            </div>

            <div class="col-md-3">
                <br/>
                <a class="btn btn-primary" id="generate"> <i class="fa fa-refresh"> </i> {!! Lang::get('core::lang.generate_key') !!}</a>
            </div>
        </div>
    </div>
    <a href="#" id="clickGenerate" data-toggle="modal" data-target="#generateModal"></a>	
    <div class="modal fade" id="generateModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">{!! Lang::get('core::lang.api_key') !!}</h4>
                </div>
                <div class="modal-body" id="messageBody">

                </div>
                <div class="modal-footer" id="messageBody">
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">{!! Lang::get('core::lang.close') !!}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script src="{{asset("lb-faveo/js/ajax-jquery.min.js")}}"></script>
    <script type="text/javascript">
    jQuery(document).ready(function () {
        // Close a ticket
        $('#generate').on('click', function (e) {
            $.ajax({
                type: "GET",
                url: "{!! url('generate-api-key') !!}",
                beforeSend: function () {
                    $("#generate").empty();
                    var message = "<i class='fa fa-refresh fa-spin'> </i>  <?php echo Lang::get('core::lang.generate_key'); ?>";
                    $('#generate').html(message);
                },
                success: function (response) {
                    // alert(response);

                    $("#messageBody").empty();
                    var message = "<div class='alert alert-default' style='margin-bottom: -5px;'>Copy and paste in the api to set a different Api key</div> <br/><b>Api key</b> : " + response;
                    $('#messageBody').html(message);

                    $('#clickGenerate').trigger("click");
                    $("#generate").empty();
                    var message = "<i class='fa fa-refresh'> </i>  <?php echo Lang::get('core::lang.generate_key'); ?>";
                    $('#generate').html(message);
                }
            })
            return false;
        });
    });
    </script>

    @stop
