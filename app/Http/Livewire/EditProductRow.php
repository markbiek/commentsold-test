<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditProductRow extends Component {
	public $deleted;
	public $toggleEdit;
	public $productName;
	public $productStyle;
	public $productBrand;
	public $productUrl;
	public $productType;
	public $productShippingPrice;

	public $product;

	public function mount() {
		$this->productName = $this->product->product_name;
		$this->productStyle = $this->product->style;
		$this->productBrand = $this->product->brand;
		$this->productUrl = $this->product->url;
		$this->productType = $this->product->product_type;
		$this->productShippingPrice = $this->product->shipping_price;
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
		$this->product->url = $this->productUrl;
		$this->product->product_type = $this->productType;
		$this->product->shipping_price = $this->productShippingPrice;
		$this->product->save();

		$this->toggleEdit();
	}

	public function deleteProduct() {
		$this->deleted = true;
		$this->product->delete();
	}
}
