@extends('layouts.app2')

@section('content')

    <p>Tiene {{$cont}} productos registrados en el inventario {{$id_inven[0]->id}}</p>

    <div class="form-prod" >
        <form method="POST" action="{{ route('prod_create') }}" enctype="multipart/form-data" onSubmit="return validarForm()">
            @csrf
            <div class="form-group row">
                <label for="nombre" class="col-md-4 col-form-label text-md-right">Producto</label>
                <div class="col-md-6">
                    <input id="nombre" type="text" class="form-control " name="nombre" autofocus placeholder="Nombre Producto">
                </div>
            </div>
            <div class="form-group row">
                <label for="marca" class="col-md-4 col-form-label text-md-right">Marca</label>
                <div class="col-md-6">
                    <input id="marca" type="text" class="form-control " name="marca" placeholder="Marca Producto">
                </div>
            </div>
            <div class="form-group row">
                <label for="stock" class="col-md-4 col-form-label text-md-right">Cantidad</label>
                <div class="col-md-6">
                    <input id="stock" type="text" class="form-control " name="stock" placeholder="N° de Productos">
                </div>
            </div>
            <div class="form-group row">
                <label for="pre_compra" class="col-md-4 col-form-label text-md-right">Precio Compra</label>
                <div class="col-md-6">
                    <input id="pre_compra" type="text" class="form-control " name="pre_compra" placeholder="Precio unitario de compra (Con IVA)">
                </div>
            </div>
            <div class="form-group row">
                <label for="pre_venta" class="col-md-4 col-form-label text-md-right">Precio Venta</label>
                <div class="col-md-6">
                    <input id="pre_venta" type="text" class="form-control " name="pre_venta" placeholder="Precio unitario de venta (Con IVA)" value="">
                </div>
            </div>
            <input type="text" name = "stock_actual" id= "stock_actual" style="display:none" value = "0">
            <input type="text" name = "id_inven" id= "id_inven" style="display:none" value = "{{$id_inven[0]->id}}">
            <div class="form-group row">
                <div class="col-md-6">
                    <input type="submit" value="Crear Producto" class = "btn btn-primary">
                </div>
            </div>
        </form>
    </div>

    <div class="tabla-prod">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Marca</th>
            <th scope="col">Stock</th>
            <th scope="col">Consumo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prod as $pr)
                <tr>
                <td>{{$pr->nombre}}</td>
                <td>{{$pr->marca}}</td>
                <td>{{$pr->stock}}</td>
                <td>{{$pr->stock_actual}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <!-- Button trigger modal -->
@endsection
