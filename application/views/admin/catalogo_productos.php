

<div class="row">
	<div class="small-3 columns">
	<!-- cotizador -->
	<div id="carro_cotizacion" class="label">
		<h5><i class="fa fa-shopping-cart"></i> Carro de productos</h5>
		<div id="total_carro">
			0
		</div>
		<div>
			<button class="btn-carro" onclick="ver_carro()">Ver Carro</button>
			
		</div>
	</div>
	</div>
  <div class="small-9 columns">
	<ul class="breadcrumbs"> <li><a href="javascript:;" data-id="categorias" onclick="ver_path(event)">categorias</a></li> </ul>
	<!-- PRODCUTOS -->
	<?php echo $categoria; ?>
	<div id="categorias" class="row path" data-equalizer>
		<?php 
				foreach($categorias as $cat){
		?>
					<a class="caja_categorias" href="javascript:;" onclick="ver_subcategorias('<?= @$cat['hash'] ?>')" data-equalizer-watch>
						<div class="titulo"><?= @$cat['descripcion'] ?></div> 
						<div class="img"><img src="<?= base_url().'img/catalogo/'.@$cat['imagen'] ?>" alt="<?= $cat['descripcion'] ?>"></div>
						<div class="total"><span title="Prodcutos"><?= @$cat['total_categoria'] ?>  Prod.</span></div>
					</a>

		<?php
				}
			?>
	</div>
	<div id="subcategorias" style="display:none" class="row path" data-equalizer></div>
	<div id="productos" style="display:none" class="row path" data-equalizer></div>
	<div id="carro_productos" style="display:none" class="row path" data-equalizer>
		<h4>Detalle de productos asociados:</h4>
			<table class="table" width="100%" align="center">
				<thead>
				<tr>
					<th width="5%">Código</th>
					<th width="35%">Descripción</th>
					<th width="20%">Unidades</th>
					<th width="20%">Precio Unidad</th>
					<th width="20%">Precio Total</th>
					<th></th>
				</tr>
				</thead>
				<tfoot>
					<tr>
					<td colspan="4" align="right" width="80%">Subtotal (Neto)</td>
					<td width="20%" colspan="2">
						<i class="fa fa-dollar fa-1x"></i>
					</td>
					</tr>
					<tr>
					<td colspan="4" align="right" width="80%">Impuesto (IVA)</td>
					<td width="20%" colspan="2">
						<i class="fa fa-dollar fa-1x"></i>
					</td>
					</tr>
					<tr>
					<td colspan="4" width="80%">Total</td>
					<td width="20%" colspan="2">
						<i class="fa fa-dollar fa-1x"></i>
					</td>
					</tr>
				</tfoot>
				<tbody>
				<tr>
					<td></td>
					<td></td>
					<td>
						<div class="row">
							<div class="large-8">
								<input type="text" class="unidades" value="0" >
							</div>
						</div>
					</td>
					<td>
						<div class="row">
							<div class="large-8">
								<input type="text" class="precio_unidad " value="0" >
							</div>
						</div>
					</td>
					<td>
						<div class="row">
							<div class="large-8">
								<input type="text" class="precio_total " value="0" >
							</div>
						</div>
					</td>
					<td>
						<button class="btn-eliminar" title="Eliminar este producto"><i class="fa fa-trash-o fa-2x"></i></button>

					</td>
				</tr>
				</tbody>
			</table>
			<button title="Generar cotización"><i class="fa fa-check-square fa-2x"></i></button>
			<button data-id="categorias" onclick="vaciar_carro(event)" title="Cancelar cotización"><i class="fa fa-trash-o fa-2x"></i></button>
	</div>

  </div>
</div>