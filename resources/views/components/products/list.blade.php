<table class="table-auto table-striped border-collapse mt-4">
	<thead>
		<tr class="text-left">
			<th></th>
			<th>Name</th>
			<th>Style</th>
			<th>Brand</th>
			<th>Potential Revenue</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach ($products as $product)
			<livewire:edit-product-row :product="$product" />
		@endforeach
	</tbody>
</table>