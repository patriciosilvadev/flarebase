@extends('tickets.ticketlayouts.ticketmaster')
@section('Users')
class="active"
@stop

@section('user-bar')
active
@stop

@section('organizations')
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

{!! Form::model($orgs,['url'=>'organizations/'.$orgs->id,'method'=>'PATCH']) !!}

<div class="box box-primary">
    <div class="content-header">
        <h4>{{Lang::get('relations::lang.edit')}}	{!! Form::submit(Lang::get('relations::lang.save'),['class'=>'form-group btn btn-primary pull-right'])!!}</h4>
    </div>
    <div class="box-body">
        <!-- name : text : Required -->
        <div class="row">
            <div class="col-xs-4 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                {!! Form::label('name',Lang::get('relations::lang.name')) !!}
                {!! Form::text('name',null,['class' => 'form-control']) !!}
                {!! $errors->first('name', '<spam class="help-block">:message</spam>') !!}
            </div>
            <!-- phone : Text : -->
            <div class="col-xs-4 form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                {!! Form::label('phone',Lang::get('relations::lang.phone')) !!}
                {!! Form::text('phone',null,['class' => 'form-control']) !!}
                {!! $errors->first('phone', '<spam class="help-block">:message</spam>') !!}
            </div>
            <!--website : Text :  -->
            <div class="col-xs-4 form-group {{ $errors->has('website') ? 'has-error' : '' }}">
                {!! Form::label('website',Lang::get('relations::lang.website')) !!}
                {!! Form::text('website',null,['class' => 'form-control']) !!}
                {!! $errors->first('website', '<spam class="help-block">:message</spam>') !!}
            </div>
        </div>
        <!-- Internal Notes : Textarea -->
        <div class="row">
            <div class="col-xs-6 form-group">
                {!! Form::label('address',Lang::get('relations::lang.address')) !!}
                {!! Form::textarea('address',null,['class' => 'form-control']) !!}
            </div>
            <div class="col-xs-6 form-group">
                {!! Form::label('internal_notes',Lang::get('relations::lang.internal_notes')) !!}
                {!! Form::textarea('internal_notes',null,['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
        $(function () {
            $("textarea").wysihtml5();
        });
</script>

@stop