@extends('layouts.default')

@section('content')

	@include('common.errors')
	<!-- Форма новой задачи -->
	<form action="{{ route('tasks.add') }}" method="POST" class="form-horizontal">
	{{ csrf_field() }}
		<div class="form-group">
			<label for="task" class="col-sm-3 control-label">{{trans('validation.tasks_one')}}</label>
			<div class="col-sm-6">
				<input type="text" name="name" id="task" class="form-control">
			</div>
		</div>
		<!-- Кнопка добавления задачи -->
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-6">
				<button type="submit" class="btn btn-default">
					<i class="fa fa-plus"></i> {{trans('validation.tasks_addTask')}}
				</button>
			</div>
		</div>
	</form>
@endsection