function deleteProd(id,nombre)
{
    console.log("hola")
    $('.nom-delete').html("¿Seguro desea eliminar el Producto: " + nombre+"?");
    $('#prod-delete').prop('href','/producto/'+id+'/delete' );
}


