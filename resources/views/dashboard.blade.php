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
