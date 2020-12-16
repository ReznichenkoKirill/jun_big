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
					<i class="fa fa-plus"></i>Новая задача
				</button>
			</div>
		</div>
	</form>
@endsection