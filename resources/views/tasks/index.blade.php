@extends('layouts.default')

@section('content')
	<form action="{{ route('tasks.create') }}"
	      method="POST"
	      class="form-horizontal">
		{{-- csrf_field() Если отправка происходит методом GET, то csrf_field() не обязателен --}}
		{{ csrf_field() }}
        {{ method_field('GET') }}
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-6">
				<button type="submit"
				        class="btn btn-default">
					<i class="fa fa-plus"></i>{{trans('validation.tasks_newTasks')}}
				</button>
			</div>
		</div>
	</form>
	<!-- Текущие задачи -->
	@if (count($tasks) > 0)
		<div class="panel panel-default">
			<div class="panel-heading">
				{{trans('validation.tasks_newTasks')}}
			</div>

			<div class="panel-body">
				<table class="table table-striped task-table">
					<thead>
						<tr>
							<th>{{trans('validation.tasks_name')}}</th>
							<th>{{trans('validation.tasks_ection')}}</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($tasks as $task)
							<tr>
								<!-- Имя задачи -->
								<td class="table-text">
									<div>{{ $task->name }}</div>
								</td>
								<td>
									<form action="{{ route('tasks.delete', $task->id) }}" method="POST">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}

										<button type="submit" class="btn btn-danger">
											<i class="fa fa-btn fa-trash"></i>{{trans('validation.tasks_delete')}}</button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	@endif
@endsection