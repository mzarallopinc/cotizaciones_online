var server = 'http://' + window.location.host + '/mesko/admin_mvc/'

function capsula(obj) {

    var procesar = $.ajax({
        url: server + obj.path,
        type: 'post',
        dataType: 'json',
        async: false,
        data: obj,
    })

    return procesar.responseText

}
//function global
function ver_path(e) {
    var id = e.target.dataset.id

    if (id === 'categorias') {
        $(".breadcrumbs").html('<li><a href="javascript:;" data-id="categorias" onclick="ver_path(event)">categorias</a></li>')
        $(".path").hide()
        $('#' + id).slideDown('fast')
    } else {

        $(".path").hide()
        $('#' + id).slideDown('fast')
    }
}

//tmp administracion catalogo
function tmp_subcategorias(obj) {
    var html = '<a class="caja_categorias" href="javascript:;" data-equalizer-watch onclick="ver_productos(' + obj.categoria + ', ' + obj.subcategoria + ')">'
    html += '<div class="titulo">' + obj.titulo + '</div>'
    html += '<div class="img"><img src="' + server + 'img/catalogo/guitarras.jpg" alt=""></div>'
    html += '<div class="total">' + obj.total + '</div>'
    html += '</a>'
    return html
}

function tmp_productos(obj) {
    var html = '<a class="caja_categorias" href="javascript:;" data-equalizer-watch onclick="ver_productos(' + obj.id + ')">'
    html += '<div class="titulo">' + obj.nombre + '</div>'
    html += '<div class="img"><img src="' + server + 'img/catalogo/guitarras.jpg" alt=""></div>'
    //<div class="total"><span title="Prodcutos"><?= @$cat['total_categoria'] ?>  Prod.</span></div>
    html += '<div class="total"><span title="Prodcutos">$ ' + obj.precio + ' </span></div>'

    html += '<div class="boton"><input type="button" value="Cotizar" onclick="cotizar_producto(' + obj.id + ')"/> <input type="button" value="editar" onclick="editar:prodcucto(' + obj.id + ')"/></div>'
    html += '</a>'
    return html
}

function tmp_path(obj) {
    var html = '<li id=""><a href="javascript:;" data-id="' + obj.id + '" onclick="ver_path(event)">' + obj.nombre + '</a></li>'
    return html
}

function tmp_carro(obj) {
    var html = '<tr id="producto_' + obj.id_producto + '">'
    html += '<td>' + obj.id_producto + '<input type="hidden" class="productos" value="' + obj.id_producto + '" /></td>'
    html += '<td>' + obj.nombre + '<br><b>' + obj.marca + '</b></td>'
    html += '<td>'
    html += '<div class="row">'
    html += '<div class="large-4">'
    html += '<input type="text" class="unidades" id="unidades_' + obj.id_producto + '" value="1" onblur="calcular_carro()" >'
    html += '</div>'
    html += '</div>'
    html += '</td>'
    html += '<td>'
    html += '<div class="row">'
    html += '<div class="large-8">'
    html += '<input type="text" class="precio_unidad" id="pu_' + obj.id_producto + '" value="' + obj.precio + '" onblur="calcular_carro()" >'
    html += '</div>'
    html += '</div>'
    html += '</td>'
    html += '<td>'
    html += '<div class="row">'
    html += '<div class="large-8">'
    html += '<input type="text" class="precio_total " id="pt_' + obj.id_producto + '" value="' + obj.precio + '" onblur="calcular_carro()" >'
    html += '</div>'
    html += '</div>'
    html += '</td>'
    html += '<td>'
    html += '<button class="btn-eliminar" title="Eliminar este producto" onclik="eliminar_producto_carro(' + obj.id_producto + ')"><i class="fa fa-trash-o fa-2x"></i></button>'
    html += '</td>'
    html += '</tr>'

    return html
}