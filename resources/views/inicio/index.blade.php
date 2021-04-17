@extends('layouts.app')

@section('content')
<div class="sec-center">
    <div class="titulo">
        <h2>
            <strong>
                Gestiona el stock de tus ventas de manera simple y eficaz.
            </strong> 
        </h2>
    </div>
    <div class="text-des">
        <div class="d-izq">
            <p>Prueba una manera más facil de llevar el control de tu inventario de
            productos y obten estadisticas de rebaje diarias, semanales y mensuales.
            Todo esto con una plataforma a tu dispocisión 24/7.
            </p>
        </div>
    </div>
    <div class="funciones" id="servicios">
        <div class="f-center">
            <div class="f-detalle">
                <div class="d-logo">
                    <div class="dl-icono">
                        <i class="fas fa-book"></i>
                    </div>
                </div>
                <div class="d-texto">
                    <p>Gestiona el stock de tu negocio
                        de manera digital, ingresa productos y
                        su cantida de existencia para llevar un 
                        registro de tu catalogo.
                    </p>
                </div>
            </div>
            <div class="f-detalle">
                <div class="d-logo">
                    <div class="dl-icono">
                    <i class="fas fa-calculator"></i>
                    </div>
                </div>
                <div class="d-texto">
                    <p>Haz el rebaje de tus ventas del día 
                        descontado la cantidad de productos 
                        que ya no se encuentran en tu inventario.
                    </p>
                </div>
            </div>
            <div class="f-detalle">
                <div class="d-logo">
                    <div class="dl-icono">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                </div>
                <div class="d-texto">
                    <p>Obten estadisticas de los productos 
                    más vendidos por tu negocio, como tambien, de los
                    insumos menos demandados por tu clientela.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection