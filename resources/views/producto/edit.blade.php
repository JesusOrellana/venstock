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
@section('script')
    <script src="{{asset('js/prod.js')}}"></script>
    @if($prod_exi == "m1")
    <script>
        toastr.success("Se ha Actualizado el producto con éxito","¡EXITO!",{
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        });
    </script>
    @elseif($prod_exi == "m2")
    <script>
        toastr.error("lo sentimos algo ha salido mal en la actualización del producto","¡ERROR!",{
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        });
    </script>
    @endif
@endsection