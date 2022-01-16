<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
					<h1>Products</h1>

					<h2>Add New Product</h2>
					<form class="mt-4 pb-8" method="POST" action="{{ route('add_product') }}">
						@csrf
						<div class="form-group">
							<label for="product_name">Name:</label>
							<input type="text" name="product_name" id="product_name" value="" />
							@error('product_name')
								<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<label for="style">Style:</label>
							<input type="text" name="style" id="style" value="" />
							@error('product_style')
								<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<label for="brand">Brand:</label>
							<input type="text" name="brand" id="brand" value="" />
							@error('brand')
								<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<label for="url">Url:</label>
							<input type="text" name="url" id="url" value="" />
							@error('url')
								<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<label for="product_type">Product Type:</label>
							<input type="text" name="product_type" id="product_type" value="" />
							@error('product_type')
								<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<label for="shipping_price">Shipping Price:</label>
							<input type="text" name="shipping_price" id="shipping_price" value="" />
							@error('shipping_price')
								<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>

						<input type="submit" name="submit" value="Save" />
					</form>

					<table class="table-auto table-striped border-collapse mt-4">
						<thead>
							<tr class="text-left">
								<th></th>
								<th>Name</th>
								<th>Style</th>
								<th>Brand</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($products as $product)
								<livewire:edit-product-row :product="$product" />
							@endforeach
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
