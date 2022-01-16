<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditProductRow extends Component {
	public $toggleEdit;
	public $productName;
	public $productStyle;
	public $productBrand;

	public $product;

	public function mount() {
		$this->productName = $this->product->product_name;
		$this->productStyle = $this->product->style;
		$this->productBrand = $this->product->brand;
	}

	public function render() {
		return view('livewire.edit-product-row');
	}

	public function toggleEdit() {
		$this->toggleEdit = !$this->toggleEdit;
	}

	public function save() {
		$this->product->product_name = $this->productName;
		$this->product->style = $this->productStyle;
		$this->product->brand = $this->productBrand;
		$this->product->save();

		$this->toggleEdit();
	}
}
