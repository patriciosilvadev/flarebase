@extends('tickets.ticketlayouts.ticketmaster')
@extends('themes.default1.agent.layout.sidebar')    

@section('pages')
    active
@stop
@section('add-pages')
    class="active"
@stop

@section('content')
{!! Form::open(array('action' => 'Agent\kb\PageController@store' , 'method' => 'post') )!!}


    <div class="box-body">
    <div class="row">
    
    <div class="col-md-9">
    <div class="box box-primary">
    <div class="box-header">  
        <h3 class="box-title">{!! Lang::get('knowledgebase::lang.addpages') !!}</h3>
    </div>
    <div class="box-body">  
    <div class="row">
        <div class="col-md-6 form-group {{ $errors->has('name') ? 'has-error' : '' }}">

            {!! Form::label('name',Lang::get('knowledgebase::lang.name')) !!}
            {!! $errors->first('name', '<spam class="help-block">:message</spam>') !!}
            {!! Form::text('name',null,['class' => 'form-control']) !!}

        </div>

        <div class="col-md-6 form-group {{ $errors->has('slug') ? 'has-error' : '' }}">

            {!! Form::label('slug',Lang::get('knowledgebase::lang.slug')) !!}
            {!! $errors->first('slug', '<spam class="help-block">:message</spam>') !!}
            {!! Form::text('slug',null,['class' => 'form-control']) !!}

        </div>
    </div>


                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    {!! Form::label('description',Lang::get('knowledgebase::lang.description')) !!}
                    {!! $errors->first('description', '<spam class="help-block">:message</spam>') !!}

                    <div class="form-group" style="background-color:white">
                    {!! Form::textarea('description',null,['class' => 'form-control color','size' => '110x15','id'=>'myNicEditor','placeholder'=>Lang::get('knowledgebase::lang.enter_the_description')]) !!}
                </div>
                </div>

            </div>
            </div>
        </div>

            <div class="col-md-3">
    <div class="box box-default">
    <div class="box-header with-border">
                  <h3 class="box-title">{{Lang::get('knowledgebase::lang.publish')}}</h3>
    </div>
                <div class="box-body">
                    <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">

                        {!! Form::label('status',Lang::get('knowledgebase::lang.status')) !!}
                        {!! $errors->first('status', '<spam class="help-block">:message</spam>') !!}
                        <div class="row">
                            <div class="col-xs-4">
                                {!! Form::radio('status','1',true) !!}{{Lang::get('knowledgebase::lang.published')}}
                            </div>
                            <div class="col-xs-3">
                                {!! Form::radio('status','0',null) !!}{{Lang::get('knowledgebase::lang.draft')}}
                            </div>
                        </div>
                    </div>


                    <div class="form-group {{ $errors->has('visibility') ? 'has-error' : '' }}">

                        {!! Form::label('visibility',Lang::get('knowledgebase::lang.visibility')) !!}
                        {!! $errors->first('visibility', '<spam class="help-block">:message</spam>') !!}
                        <div class="row">
                            <div class="col-xs-3">
                                {!! Form::radio('visibility','1',true) !!}{{Lang::get('knowledgebase::lang.public')}}
                                </div>
                                <div class="row">
                            <div class="col-xs-3">
                                {!! Form::radio('visibility','0',null) !!}{{Lang::get('knowledgebase::lang.private')}}
                                </div>
                    </div>

                </div>

            </div>
       </div>

        <div class="box-footer" style="background-color:#f5f5f5;">
        <div style="margin-left:140px;">

                {!! Form::submit(Lang::get('knowledgebase::lang.publish'),['class'=>'btn btn-primary'])!!}
        </div>

        </div>

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
