<div class="row">
	<div class="small-3 columns">
	<?= @$menu; ?>
	</div>
  <div class="small-9 columns">

	<!-- PRODCUTOS -->
	<div id="categorias" class="row" data-equalizer>
				<!-- CLASIFICADOR DE LAS SECCIONES -->
					<h4>Nuevo producto</h4>
				<form id="nuevo_producto" name="nuevo_producto" action="<?= base_url() ?>admin/post/" method="post" target="caja_nuevo_producto"  enctype="multipart/form-data" >
					<table width="100%">
						<tr>
							<td>Nombre:</td>
							<td><input type="text" id="nombre" name="nombre"></td>
							<td>Cateogria:</td>
							<td><select name="categoria" id="categoria">
								<?php foreach($categorias as $cat): ?>
									<option value="<?= $cat['id'] ?>"><?= $cat['descripcion'] ?></option>
								<?php endforeach; ?>
							</select></td>
						</tr>
						<tr>
							<td>Sub-categoria:</td>
							<td><select name="subcategoria" id="subcategoria"></select></td>
							<td>Marca:</td>
							<td><select name="marca" id="marca">
								<?php foreach($marca as $mar): ?>
									<option value="<?= $mar['marca'] ?>"><?= $mar['marca'] ?></option>
								<?php endforeach; ?>
							</select></td>
						</tr>
						<tr>
							<td>Modelo</td>
							<td><input type="text" id="modelo" name="modelo"></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Fotos:</td>
							<td colspan="3"><input type="file" name="fotos[]" id="fotos[]" multiple></td>
						</tr>
						<tr>
							<td colspan="4" align="right">
								<button class="button success" onclick="nuevo_producto()">Crear producto</button>
							</td>
						</tr>
					</table>
				</form>
				<div id="caja_post">

				</div>
  </div>
</div>