@extends('adminlte::page')

@section('plugins.Bootstrap4DualListbox', true)
@section('plugins.BootstrapColorpicker', true)
@section('plugins.BootstrapSlider', true)
@section('plugins.BootstrapSwitch', true)
@section('plugins.BsCustomFileInput', true)
@section('plugins.ChartJs', true)
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)
@section('plugins.Daterangepicker', true)
@section('plugins.EkkoLightbox', true)
@section('plugins.Fastclick', true)
@section('plugins.Filterizr', true)
@section('plugins.FlagIconCss', true)
@section('plugins.Flot', true)
@section('plugins.Fullcalendar', true)
@section('plugins.IcheckBootstrap', true)
@section('plugins.Inputmask', true)
@section('plugins.IonRangslider', true)
@section('plugins.JqueryKnob', true)
@section('plugins.JqueryMapael', true)
@section('plugins.JqueryUi', true)
@section('plugins.JqueryValidation', true)
@section('plugins.Jqvmap', true)
@section('plugins.Jsgrid', true)
@section('plugins.PaceProgress', true)
@section('plugins.Select2', true)
@section('plugins.Sparklines', true)
{{-- @section('plugins.Summernote', true) --}}
{{-- @section('plugins.TempusdominusBootstrap4', true) --}}
@section('plugins.Sweetalert2', true)
@section('plugins.Toastr', true)


@section('title', 'Data Pengguna')

@section('content_header')
    <h1 class="m-0 text-dark">Data Pengguna</h1>
@stop
@section('content')
    <div class="card col-md-6">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data Pengguna</h2>
            <div class="card-tools">
                @can('admin.users.index')
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.users.index') }}">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
                    </a>
                @endcan
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


            <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" value="{{ $user->name }}" name="name" class="form-control"
                                placeholder="Name">
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                                placeholder="Email">
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <strong>Password:</strong>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <strong>Confirm Password:</strong>
                            <input type="password" name="confirm-password" class="form-control"
                                placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <strong>Role:</strong>
                            <select class="form-control multiple custom-select2" multiple name="roles[]" style="height: 200px">
                                @foreach ($roles as $role)
                                    <option value="{{ $role }}" @selected(in_array($role,$user->roles->pluck('name')->toArray()))>{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <strong>Unit:</strong>
                            <select class="form-control multiple custom-select2" multiple name="units[]" style="height: 200px">
								<option value="0">Semua Kota</option>
                                @foreach (App\Models\KabupatenKotaModel::where('province_id',63)->get() as $unit)
									@php
										$curr_unit = $user->unit->pluck('id')->toArray();
									@endphp
                                    <option value="{{ $unit->id }}" @selected(is_array($curr_unit) and in_array($unit->id,$curr_unit))>{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <div class="col-sm-12 mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection


@section('css')
<style>
	.select2-container--default .select2-selection--multiple .select2-selection__choice{
		color: #000;
	}
</style>
@endsection

@section('js')
<script>
	var storage_url = "{{ asset(Storage::url('xxx'))}}";

	$(document).ready(function(){
		$('.custom-select2').select2({
			tags: true
		});
		
	})
</script>
@endsection