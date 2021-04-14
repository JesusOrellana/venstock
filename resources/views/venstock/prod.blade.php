@extends('layouts.app2')

@section('content')

    <p>Tiene {{$cont}} productos registrados en el inventario {{$id_inven[0]->id}}</p>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
            </svg>

                Ingresar Producto 
            </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
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
                            <label for="stock" class="col-md-4 col-form-label text-md-right">Stock</label>
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
                        <input type="text" value="{{$fecha}}" name="created_at" id="created_at" style="display:none">
                        <input type="text" name = "stock_actual" id= "stock_actual" style="display:none" value = "0">
                        <input type="text" name = "id_inven" id= "id_inven" style="display:none" value = "{{$id_inven[0]->id}}">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="submit" value="Crear Producto" class = "btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
            </svg>
            Lista de Productos
        </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="tabla-prod">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Ingreso</th>
                            <th scope="col">Rebaje</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prod as $pr)
                                <tr class="table-active">
                                <td>{{$pr->nombre}}</td>
                                <td>{{$pr->marca}}</td>
                                <td>{{$pr->stock}}</td>
                                <td>{{$pr->stock_actual}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
@endsection
