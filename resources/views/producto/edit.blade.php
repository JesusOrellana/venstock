@extends('layouts.app2')
@section('content')
<div class="form-prod">
    <form method="POST" action="{{ route('prod_update') }}" enctype="multipart/form-data" onSubmit="return validarForm()">
        @csrf
        @include("producto.form")
        <div class="form-group row">
            <div class="col-md-12 p-4">
                <input type="text" name = "id" id= "id" style="display:none" value = "{{$pr->id}}">
                <input type="submit" value="Actualizar" class = "btn btn-primary">
            </div>
        </div>
    </form>
</div>
@endsection