<tr>
	@if ($toggleEdit)
		<td>
			<button wire:click="save">💾️</button>
			<button wire:click="toggleEdit">✖️</button>
		</td>
		<td><input wire:model="productName" type="text" value="{{ $product->product_name }}" /></td>
		<td><input wire:model="productStyle" type="text" value="{{ $product->style }}" /></td>
		<td><input wire:model="productBrand" type="text" value="{{ $product->brand }}" /></td>
	@else
		<td><button wire:click="toggleEdit">✎</button></td>
		<td>{{ $product->product_name }}</td>
		<td>{{ $product->style }}</td>
		<td>{{ $product->brand }}</td>
	@endif
</tr>