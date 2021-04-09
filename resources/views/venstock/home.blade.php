@extends('layouts.app2')

@section('content')
    @if($cont == 0)
    <div class="men-bi">
        <p>¡Bienvenido {{auth()->user()->name}}! nos alegra que puedas utilizar nuestro sistema y que puedas sacarle el mayor
            veneficio posible, para comenzar debes crear un inventario de productos y empezar a gestionar el stock de tu negocio de 
            manera digital.
        </p>
        <form action="{{route('invent_create')}}" method="post" enctype="multipart/form-data" onSubmit="return validarForm()">
            @csrf
            <input type="text" name = "id_user" id ="id_user" value ="{{auth()->user()->id}}" style="display:none">
            <input type="submit" value="Crear Inventario" class = "btn btn-success"> 
        </form>
    </div>
    @else
       <div class="prod">
            @foreach($prod as $pr)
                <div class="prod-uni">
                    <button type="button" data-toggle="modal" data-target="#exampleModal-{{$pr->id}}">
                        <div class="p-nombre">{{$pr->nombre}}</div>
                        <div class="cant-ini">vendido: {{$pr->stock_actual}}</div>
                        <div class="cant-ini">Stock base: {{$pr->stock}}</div>
                        <div class="pre_venta">Precio:${{$pr->pre_venta}}</div>
                    </button>
                </div>
                <div>hola</div>
                            <!-- Modal -->
                <div class="modal fade" id="exampleModal-{{$pr->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{$pr->nombre}}/{{$pr->marca}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @if(($pr->stock - $pr->stock_actual)==0)
                                <div class="form-group">
                                    <label class="col-12 bg-warning">¡No cuenta con stock disponible para hacer Rebaje
                                        a este producto!
                                    </label>
                                </div>
                            @else
                                <form action = "{{ route('prod_rebaje')}}" method ="post" >
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="col-12">¿cuantos productos desea rebajar?</label>
                                            <input type="text" name="id" id = "id" value="{{$pr->id}}" style="display:none">
                                            <select class="form-select col-6" aria-label="Default select example" name ="stock_actual" id ="stock_actual">

                                                @for($i = 1; $i <= ($pr->stock - $pr->stock_actual) ;$i++)
                                                <option id ="stock_actual" name ="stock_actual" value="{{$i}}" height="1px">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Hacer Rebaje</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
       </div>
    @endif
<div>Rama secundaria</div>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam unde officiis sed corporis nostrum soluta. Veniam a cum repellat, ut eveniet doloribus cumque maiores et totam quas atque. Excepturi, tempora.</p>
@endsection
