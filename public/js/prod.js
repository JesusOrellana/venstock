function deleteProd(id,nombre)
{
    console.log("hola")
    $('.nom-delete').html("¿Seguro desea eliminar el Producto: " + nombre+"?");
    $('#prod-delete').prop('href','/producto/'+id+'/delete' );
}


function validarForm()
{
    nombre = document.getElementById("nombre").value;
    marca = document.getElementById("marca").value;
    stock = document.getElementById("stock").value;
    pre_compra = document.getElementById("pre_compra").value;
    pre_venta = document.getElementById("pre_venta").value;
    var exr = new RegExp("^[0-9,$]");
    if(nombre == "")
    {
        mensajeError("debe ingresar un nombre de producto");
        document.getElementById("nombre").focus();
        return false;
    }
    else if(marca == "")
    {
        mensajeError("debe ingresar una marca de producto");
        document.getElementById("marca").focus();
        return false;
    }
    else if(stock == "")
    {
        mensajeError("debe ingresar el stock de producto");
        document.getElementById("stock").focus();
        return false;
    }
    else if(!exr.test(stock))
    {
        mensajeError("solo puede ingresar numeros en el stock");
        document.getElementById("stock").focus();
        return false;
    }
    else if(pre_compra == "")
    {
        mensajeError("debe ingresar el precio de compra");
        document.getElementById("pre_compra").focus();
        return false;
    }
    else if(!exr.test(pre_compra))
    {
        mensajeError("solo puede ingresar numeros en el precio de compra");
        document.getElementById("pre_compra").focus();
        return false;
    }
    else if(pre_venta == "")
    {
        mensajeError("debe ingresar el precio de venta");
        document.getElementById("pre_venta").focus();
        return false;
    }
    else if(!exr.test(pre_venta))
    {
        mensajeError("solo puede ingresar numeros en en el precio de venta");
        document.getElementById("pre_venta").focus();
        return false;
    }
}

function mensajeError(mensaje)
{
    toastr.error(mensaje,"¡ERROR!",{
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
}
