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