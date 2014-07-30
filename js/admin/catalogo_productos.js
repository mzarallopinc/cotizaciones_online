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
            oferta: this.oferta,
            id: this.id_producto
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
    window.location.reload()

}

function cotizar_producto(id) {
    var data = {
        path: 'admin/ajax',
        case :5,
        id:
            id
    }
    var resp = capsula(data)
    resp = JSON.parse(resp)
    var html = tmp_carro(resp)
    $("#contenido_carro").append(html)
    //contador
    $("#total_carro").text(total_productos_carro())
    calcular_carro()
}

function total_productos_carro() {
    var total = $(".productos")
    return parseInt(total.length)
}

function calcular_carro() {
    var productos = $(".productos")
    var unidades = $(".unidades")
    var pu = $(".precio_unidad")
    var pt = $(".precio_total")

    var total_vector = productos.length
    var suma_total = 0
        //recorrer valores
    for (var i = 0; i < total_vector; i++) {
        var id = productos[i].value
        var total_final_row = parseInt(unidades[i].value) * parseInt(pu[i].value)
        $("#unidades_" + id).val(unidades[i].value)
        $("#pu_" + id).val(pu[i].value)
        $("#pt_" + id).val(total_final_row)
        suma_total += total_final_row
    }

    //calculos total neto
    var neto = (suma_total / 1.19)
    neto = parseInt(neto.toFixed(0))
    $("#total_neto").text(neto)
    //calcular el iva
    var iva = (neto * 0.19)
    $("#total_iva").text(iva.toFixed(0))
    //calcular total final
    $("#total_final").text(suma_total)

}