<thead>
	<tr>
		<th></th>
		<th>Descripción</th>
		<th>Precio</th>
		<th>Cantidad</th>
		<th>Total</th>
		<th>Quitar</th>
							
	</tr>
</thead>
<tbody>
	@foreach(Auth::user()->carrito->lineasCarrito as $linea)
		<tr>
			<td>
				<img src="<?php echo asset('img/'.$linea->producto->foto); ?>" style="height:75px;width:75px;margin-top:10px;" class="imgthumbs">
			</td>
			<td>
				{{$linea->producto->nombre}} <br> Costal:{{$linea->producto->saco_kilos}}kg
			</td>
			<td >$
				<span class="precio">{{number_format($linea->producto->precio)}}</span>  MXN.
			</td>
			<td>
				<input type="number" value="{{$linea->cantidad}}" min="1" max="999" class="cantidad">
			</td>
			<td>
				<span class="span-subtotal">$ {{number_format($linea->subtotal())}}.00</span>
			</td>
			<td>
				<input class="ainput"type="hidden" name="_token" value="{{csrf_token()}}" id="tokenX">
				<button id="{{$linea->id}}"class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
			</td>

		</tr>
	@endforeach	
</tbody>