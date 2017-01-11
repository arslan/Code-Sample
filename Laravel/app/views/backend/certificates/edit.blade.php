@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Certificate Update ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div id="content">
<div class="page-header">
	<h3>
		Certificate Update

		<div class="pull-right">
			<a href="{{ route('backend.certificates.index') }}" class="btn btn-small btn-inverse back"><i class="icon-circle-arrow-left icon-white"></i> Back</a>
		</div>
	</h3>
</div>
{{ Form::model($certificate, array('method' => 'PATCH', 'route' => array('backend.certificates.update', $certificate->id), 'class'=>'form-horizontal')) }}
	<!-- CSRF Token -->
	{{ Form::token() }}

	<!-- Tabs Content -->
	<div class="tab-content">
		<!-- General tab -->
		<div class="tab-pane active" id="tab-general">

		
			<div class="control-group {{ $errors->has('location_id') ? 'error' : '' }}">
				<label class="control-label" for="location_id">Location: </label>
				<div class="controls">
					{{ Form::select('location_id', $locations, $certificate->location_id, array('class'=>'input-xlarge')) }}				
					{{ $errors->first('location_id', '<span class="help-inline">:message</span>') }}
				</div>
			</div>
			<div class="control-group {{ $errors->has('course_id') ? 'error' : '' }}">
				<label class="control-label" for="course_id">Course: </label>
				<div class="controls">
					{{ Form::select('course_id', $courses, $certificate->course_id, array('class'=>'input-xlarge')) }}				
					{{ $errors->first('course_id', '<span class="help-inline">:message</span>') }}
				</div>
			</div>
			<div class="control-group {{ $errors->has('roster_id') ? 'error' : '' }}">
				<label class="control-label" for="roster_id">Roster Id: </label>
				<div class="controls">
					{{ Form::text('roster_id', $certificate->roster_id, array('class'=>'input-small')) }}				
					{{ $errors->first('roster_id', '<span class="help-inline">:message</span>') }}
				</div>
			</div>
			<div class="control-group {{ $errors->has('customer_id') ? 'error' : '' }}">
				<label class="control-label" for="customer_id">Customer: </label>
				<div class="controls">
					{{ Form::text('customer_id', $certificate->customer_id, array('class'=>'input-small')) }}  - {{ $certificate->customer->full_name }}
					{{ $errors->first('customer_id', '<span class="help-inline">:message</span>') }}
				</div>
			</div>
 			<div class="control-group {{ $errors->has('certificate_date') ? 'error' : '' }}">
				<label class="control-label" for="certificate_date">Certificate Date: </label>
				<div class="controls">
					{{ Form::text('certificate_date', $certificate->certificate_date, array('class'=>'input-medium', 'id'=>'certificate_date')) }}				
					{{ $errors->first('certificate_date', '<span class="help-inline">:message</span>') }}
				</div>
			</div>
			<div class="control-group {{ $errors->has('description') ? 'error' : '' }}">
				<label class="control-label" for="description">Description: </label>
				<div class="controls">
					{{ Form::text('description', $certificate->description, array('class'=>'input-xxlarge')) }}				
					{{ $errors->first('description', '<span class="help-inline">:message</span>') }}
				</div>
			</div>
			<div class="control-group {{ $errors->has('status_id') ? 'error' : '' }}">
				<label class="control-label" for="status_id">Status: </label>
				<div class="controls">
					{{ Form::select('status_id', $statuses, $certificate->status_id, array('class'=>'input-medium')) }}				
					{{ $errors->first('status_id', '<span class="help-inline">:message</span>') }}
				</div>
			</div>
			<div class="control-group {{ $errors->has('active') ? 'error' : '' }}">
				<label class="control-label" for="active">Active: </label>
				<div class="controls">
					<input type="hidden" name="active" value="0" /><input type="checkbox" name="active" value="1" {{ $certificate->active == '1' ? 'checked' : '' }} />				
					{{ $errors->first('active', '<span class="help-inline">:message</span>') }}
				</div>
			</div>

		</div>
	</div>
	
	<hr />
	
	<!-- Form Actions -->
	<div class="footer">
		<div class="control-group">
			<div class="controls">
				{{ Form::submit('Update', array('class' => 'btn btn-small btn-info')) }}
				{{ link_to_route('backend.certificates.index', 'Cancel', array(), array('class' => 'btn btn-small')) }}
				{{ Form::reset('Reset', array('class' => 'btn btn-small btn-danger')) }}
			</div>
		</div>
	</div>

{{ Form::close() }}
</div>	
<script src="/_scripts/src/app/require.config.js"></script>
<script data-main="/_scripts/src/app/bootstrapers/certificates.js" src="/_scripts/src/bower_modules/requirejs/require.js"></script>
@stop
