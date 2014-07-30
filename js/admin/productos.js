$(function() {
    //carga de contenedor para subir fotos
    $("#caja_post").append('<iframe id="caja_nuevo_producto" style="display:none" name="caja_nuevo_producto" src="' + server + 'admin/post/" frameborder="0"></iframe>')
})

function nuevo_producto() {

    $("#nuevo_producto").submit()
}

function ver_producto(id) {
    //limpiar_carga_producto()
    var datos = {
        id: id,
        path: 'admin/ajax',
        case :2
    }
    var resp = capsula(datos)
    resp = JSON.parse(resp)
    console.log(resp)
    //limpiar_carga_producto()

}

function limpiar_carga_producto() {
    $("#caja_nuevo_producto").remove()
}