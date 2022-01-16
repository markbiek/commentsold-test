@if (count($inventory) <= 0)
	<p>You don't have any of this product in your inventory.</p>
@else
	<table class="table-auto table-striped border-collapse mt-4">
		<thead>
			<tr class="text-left">
				<th>Product Name</th>
				<th>SKU</th>
				<th>Quantity</th>
				<th>Color</th>
				<th>Size</th>
				<th>Price</th>
				<th>Cost</th>
				@if (!isset($product))<th></th>@endif
			</tr>
		</thead>
		<tbody>
			@foreach ($inventory as $item)
				<tr>
					<td>{{ isset($item->product) ? $item->product->product_name : $item->product_name }}</td>
					<td>{{ $item->sku }}</td>
					<td>{{ $item->quantity }}</td>
					<td>{{ $item->color }}</td>
					<td>{{ $item->size }}</td>
					<td>{{ $item->price_cents }}</td>
					<td>{{ $item->cost_cents }}</td>
					@if (!isset($product))<td><a href="/inventory/{{ $item->product_id }}">(View Inventory)</a></td>@endif
				</tr>
			@endforeach
		</tbody>
	</table>
@endif