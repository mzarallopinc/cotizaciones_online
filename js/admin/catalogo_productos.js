$(function() {

})

function ver_subcategorias(hash) {
    var data = {
        hash: hash,
        case :3,
        path:
            'admin/ajax',
    }

    var resp = capsula(data)
    resp = JSON.parse(resp)
    var html = ''
    $.each(resp, function() {
        var data = {
            titulo: this.descripcion,
            total: this.total,
            categoria: this.categoria,
            subcategoria: this.subcategoria
        }
        html += tmp_subcategorias(data)
    })

    $(".path").hide()
    var path = tmp_path({
        nombre: hash,
        id: 'subcategorias'
    })
    $(".breadcrumbs").append(path)
    $("#subcategorias").html(html)
    $("#subcategorias").slideDown('fast')
}

function ver_productos(categoria, subcategoria) {
    var data = {
        categoria: categoria,
        subcategoria: subcategoria,
        case :4,
        path:
            'admin/ajax',
    }

    var resp = capsula(data)
    resp = JSON.parse(resp)
    var html = ''
    $.each(resp, function() {
        var data = {
            nombre: this.nombre,
            descripcion: this.descripcion,
            precio: this.precio,
            oferta: this.oferta
        }
        html += tmp_productos(data)
    })

    $(".path").hide()
    var path = tmp_path({
        nombre: 'Productos',
        id: 'productos'
    })
    $(".breadcrumbs").append(path)

    $("#productos").html(html)
    $("#productos").slideDown('fast')
}

function ver_carro() {
    $(".path").hide()
    $("#carro_productos").slideDown('fast')
}

function vaciar_carro(e) {
    //vuelve a inicio
    $(".path").hide()

    $("#categorias").slideDown('fast');
    ver_path(e)

}