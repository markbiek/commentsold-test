@if (!$deleted)
	<tr>
		@if ($toggleEdit)
			<td>
				<button wire:click="save">💾️</button>
				<button wire:click="toggleEdit">✖️</button>
			</td>
			<td><input wire:model="productName" type="text" value="{{ $product->product_name }}" /></td>
			<td><input wire:model="productStyle" type="text" value="{{ $product->style }}" /></td>
			<td><input wire:model="productBrand" type="text" value="{{ $product->brand }}" /></td>
			<td>${{ number_format($product->potential_revenue_cents / 100, 2) }}
		@else
			<td>
				<button wire:click="toggleEdit">✎</button>
				<button wire:click="deleteProduct">⌦</button>
			</td>
			<td>{{ $product->product_name }}</td>
			<td>{{ $product->style }}</td>
			<td>{{ $product->brand }}</td>
			<td>${{ number_format($product->potential_revenue_cents / 100, 2) }}
			<td><a href="/inventory/{{ $product->id }}">(View Inventory)</a></td>
		@endif
	</tr>
@else
	{{-- This is needed because a livewire component has to have something to render --}}
	<tr></tr>
@endif