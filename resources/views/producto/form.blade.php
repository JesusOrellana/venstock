<div class="form-group row">
    <label for="nombre" class="col-md-4 col-form-label text-md-right">Producto</label>
    <div class="col-md-6">
        <input id="nombre" type="text" class="form-control " name="nombre" autofocus placeholder="Nombre Producto" value = "{{ isset($pr->nombre)?$pr->nombre:'' }}" >
    </div>
</div>
<div class="form-group row">
    <label for="marca" class="col-md-4 col-form-label text-md-right">Marca</label>
    <div class="col-md-6">
        <input id="marca" type="text" class="form-control " name="marca" placeholder="Marca Producto" value = "{{ isset($pr->marca)?$pr->marca:'' }}" >
    </div>
</div>
<div class="form-group row">
    <label for="stock" class="col-md-4 col-form-label text-md-right">Stock:{{$stock}}</label>
    <div class="col-md-6">
        <input id="stock" type="text" class="form-control " name="stock" placeholder="N° de Productos" value = "{{ isset($stock )?$stock:'' }}" >
    </div>
</div>
<div class="form-group row">
    <label for="pre_compra" class="col-md-4 col-form-label text-md-right">Precio Compra</label>
    <div class="col-md-6">
        <input id="pre_compra" type="text" class="form-control " name="pre_compra" placeholder="Precio unitario de compra (Con IVA)" value = "{{ isset($pr->pre_compra)?$pr->pre_compra:'' }}" >
    </div>
</div>
<div class="form-group row">
    <label for="pre_venta" class="col-md-4 col-form-label text-md-right">Precio Venta</label>
    <div class="col-md-6">
        <input id="pre_venta" type="text" class="form-control " name="pre_venta" placeholder="Precio unitario de venta (Con IVA)" value="{{ isset($pr->pre_venta)?$pr->pre_venta:'' }}"> 
    </div>
</div>
<input type="text" value="{{$fecha}}" name="created_at" id="created_at" style="display:none">
<input type="text" name = "id_inven" id= "id_inven" style="display:none" value = "{{$id_inven[0]->id}}">
<input type="text" name = "stock_actual" id= "stock_actual" style="display:none" value = "0">