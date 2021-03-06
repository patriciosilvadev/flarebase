@extends('tickets.ticketlayouts.ticketmaster')
@extends('themes.default1.agent.layout.sidebar')    
@section('article')
    active
@stop
@section('all-article')
    class="active"
@stop
@section('content')
{!! Form::model($article,['url' => 'article/'.$article->id , 'method' => 'PATCH'] )!!}
<div class="row">
		<div class="box-body" >
		@if(Session::has('success'))
    <div class="alert alert-success alert-dismissable">
        <i class="fa  fa-check-circle"></i>
        <b>Success</b>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{Session::get('success')}}
    </div>
    @endif
    <!-- failure message -->
    @if(Session::has('fails'))
    <div class="alert alert-danger alert-dismissable">
        <i class="fa fa-ban"></i>
        <b>Fail!</b>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{Session::get('fails')}}
    </div>
    @endif
			<div class="col-md-9">
<div class="box box-primary box-body">
			<div class="row">
				<div class="col-md-6 form-group {{ $errors->has('name') ? 'has-error' : '' }}" >
					{!! Form::label('name',Lang::get('knowledgebase::lang.name')) !!}
					{!! $errors->first('name', '<spam class="help-block">:message</spam>') !!}
					{!! Form::text('name',null,['class' => 'form-control']) !!}
				</div>
				<div class="col-md-6 form-group {{ $errors->has('slug') ? 'has-error' : '' }}" >
					{!! Form::label('slug',Lang::get('knowledgebase::lang.slug')) !!}
					{!! $errors->first('slug', '<spam class="help-block">:message</spam>') !!}
					{!! Form::text('slug',null,['class' => 'form-control']) !!}
				</div>
			</div>

				<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
				{!! Form::label('description',Lang::get('knowledgebase::lang.description')) !!}
				{!! $errors->first('description', '<spam class="help-block">:message</spam>') !!}
				<div class="form-group" style="background-color:white">
				{!! Form::textarea('description',null,['class' => 'form-control','size' => '128x20','id'=>'myNicEditor','placeholder'=>'Enter the description']) !!}
				</div>
				</div>
			</div>
</div>
		</div>

	<ul style="list-style-type:none;">
	<li>
	<div class="col-md-3">
	<div class="box box-default">
	<div class="box-header with-border">
              <h3 class="box-title">{{Lang::get('knowledgebase::lang.publish')}}</h3>
	</div>
				<div class="box-body">
					<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">

						{!! Form::label('type',Lang::get('knowledgebase::lang.status')) !!}
						{!! $errors->first('type', '<spam class="help-block">:message</spam>') !!}
						<div class="row">
							<div class="col-xs-4">
								{!! Form::radio('type','1',true) !!}{{Lang::get('knowledgebase::lang.published')}}
							</div>
							<div class="col-xs-3">
								{!! Form::radio('type','0',null) !!}{{Lang::get('knowledgebase::lang.draft')}}
							</div>
						</div>
					</div>


					<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">

						{!! Form::label('status',Lang::get('knowledgebase::lang.visibility')) !!}
						{!! $errors->first('status', '<spam class="help-block">:message</spam>') !!}
						<div class="row">
							<div class="col-xs-3">
								{!! Form::radio('status','1',true) !!}{{Lang::get('knowledgebase::lang.public')}}
								</div>
								<div class="row">
							<div class="col-xs-3">
								{!! Form::radio('status','0',null) !!}{{Lang::get('knowledgebase::lang.private')}}
								</div>
					</div>

				</div>

			</div>
		</div>
		{!! Form::close() !!}
		<div class="box-footer" style="background-color:#f5f5f5;">
		<div style="margin-left:140px;">

				{!! Form::submit(Lang::get('knowledgebase::lang.publish'),['class'=>'btn btn-block btn-primary btn-sm'])!!}
		</div>

		</div>

		</li>
<li>
<div class="col-md-3">
	<div class="box box-default">
				<div class="box-header with-border">
                  <h3 class="box-title">{{Lang::get('knowledgebase::lang.category')}}</h3>
                </div>
			<div class="box-body" style="height:190px; overflow-y:auto;">

				<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
		{{-- {!! Form::label('category_id','Category') !!} --}}
				{!! $errors->first('category_id', '<spam class="help-block">:message</spam>') !!}
			@while (list($key, $val) = each($category))
			<div class="row">
						<div class="form-group">
							<div class="col-md-1">
			<input type="radio" name="category_id[]" value="<?php echo $val;?>" <?php if (in_array($val, $assign)) {
	echo ('checked');
}
?> ></div>
							<div class="col-md-10">
								<?php echo $key;?>
							</div>
						</div>
					</div>
					@endwhile

				</div>
		</div>

		<div class="box-footer" style="background-color:#f5f5f5;">

				<span class="btn btn-info btn-sm" data-toggle="modal" data-target="#j">{!! Lang::get('knowledgebase::lang.addcategory') !!}</span>
				<div class="modal" id="j">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        {!! Form::open(['method'=>'post','action'=>'Agent\kb\CategoryController@store']) !!}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">{{Lang::get('knowledgebase::lang.addcategory')}}</h4>
                            </div>
                            <div class="modal-body">
                               	@include('themes.default1.agent.kb.category.form')
                            </div>
                            <div class="modal-footer">
                              	<div class="form-group">
                                    {!! Form::submit(Lang::get('knowledgebase::lang.add'))!!}
                                </div>
                            	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">{!! Lang::get('knowledgebase::lang.close') !!}</button>
                            </div>
                        {!! Form::close() !!}
                      	</div>
                     </div>
                    </div>

		</div>
	</div>
</div>

</li>
</ul>

<script type="text/javascript">
	  	$(function () {
            $("textarea").wysihtml5();
        });
</script>


{{-- {!! Form::close() !!} --}}
@stop
<!-- /content -->