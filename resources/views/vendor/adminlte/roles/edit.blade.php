@extends('adminlte::page')

@section('title', 'Hak Akses Pengguna')

@section('content_header')
<h1 class="m-0 text-dark">Hak Akses Pengguna</h1>
@stop
@section('content')
<div class="card">
	<div class="card-header">
		<h2 class="card-title fw-bold fs-4">Tambah Hak Akses</h2>
		<div class="card-tools">
			<a class="btn btn-sm btn-primary" href="{{ route('admin.roles.index') }}">
				<i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
			</a>
		</div>
	</div>
	<div class="card-body">
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif

		<form action="{{ route('admin.roles.update', $role->id) }}" method="post">
			@csrf
			@method('patch')

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Name:</strong>
						<input type="text" name="name" value="{{ $role->name }}" class="form-control" placeholder="Name">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Permission:</strong>
					</div>
				</div>

				@php
				//print_r($permission->pluck('name'); //,'id')); //->toArray());
				$multiLevelArray = createMultiLevelArray($permission->pluck('name','id')->toArray());
				@endphp
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<button type="button" id="open-all" class="btn btn-primary">Buka Semua</button>
								<button type="button" id="close-all" class="btn btn-secondary">Tutup Semua</button>
							</div>
						</div>
						<div class="col-md-12">
							<div id="accordion" role="tablist" aria-multiselectable="true">
								{!! renderAccordion($multiLevelArray, $parentId = 'accordion', $level = 0, $parentKey = '', $rolePermissions) !!}
							</div>
						</div>
					</div>
				</div>
				<!-- @foreach ($permission as $value)
				<div class="col-xs-12 col-sm-4 col-md-3">
					<label><input type="checkbox" name="permission[]" value="{{ $value->name }}" class="name">{{
						$value->name }}</label>
				</div>
				@endforeach -->
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-save" aria-hidden="true"></i> Simpan
				</button>
			</div>
		</form>
	</div>
</div>
@endsection

@section('css')
<style>
	.btn.btn-link.collapsed > .fa-chevron-down:before{
		/* content: "\f055"; */
		content: "\f054";
	}
</style>
@endsection

@section('js')

<script>
	$(document).ready(function(){
		$('#open-all').on('click', function () {
			$('.collapse').addClass('show');
			//$('.collapse').collapse('show');
			$('#accordion .btn.btn-link.collapsed').removeClass("collapsed");
		});
		
		$('#close-all').on('click', function () {
			//$('.collapse').collapse('hide');
			$('.collapse').removeClass('show');
			$('#accordion .btn.btn-link').addClass("collapsed");
		});

		$('input.name').on("change",function(){
			$(this).closest('.card').find("input.name").prop("checked",$(this).is(":checked"));
		})
	})
</script>
@endsection