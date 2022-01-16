<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
					<h1>{{ $title }}</h1>

					@if (!isset($product))
						<p class="font-semibold p-2">You have {{ $user->inventory_total }} items in your inventory.</p>

						<form class="form mt-4 pb-8" method="GET" action="">
							@csrf
							<div class="form-group">
								<label for="max_quantity">Find inventory with quantity less than:</label>
								<input type="number" name="max_quantity" id="max_quantity" value="25" />
							</div>
							<input type="submit" name="submit" value="Go" />
						</form>
					@endif

					@include('components.inventory.list')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
