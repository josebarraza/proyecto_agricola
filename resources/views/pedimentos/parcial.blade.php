<thead>
			<tr>
				<th># Venta</th>
				<th>Cliente</th>
				<th>Destino de entrega</th>
				<th>Total de la venta</th>
				<th>No. Pedimento</th>
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>
		@foreach($ventas as $venta)
			<tr>
				<td>{{$venta->id}}</td>
				<td>
				{{$venta->cliente->nombre}} 
				{{$venta->cliente->apellido_pat}} 
				{{$venta->cliente->apellido_mat}}
				</td>
				<td>
					{{$venta->address->ciudad->ciudad}} {{$venta->address->ciudad->estado->estado}} {{$venta->address->ciudad->estado->pais->pais}}
				</td>
				<td>
					{{number_format($venta->totalVenta())}} MXN.
				</td>
				<td>
					<input id="{{$venta->id}}" type="text" class="form-control">
				</td>
				<td>
					<button class="btn btn-warning"id="{{$venta->id}}">Obtener pedimento</button>
					<a id="{{$venta->id}}" style="display:none;"class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span></a>
					<input type="hidden" name="_token" value="{{csrf_token()}}" id="Token">
				</td>
				
			</tr>
		@endforeach
		</tbody>
	</table>