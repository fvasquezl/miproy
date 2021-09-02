<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Products extends Component
{
    public $name;
    public $code;
    public $binProducts = [];
    public $allProducts = [];



    /**
     * rules
     *
     * @return void
     */
    public function rules()
    {
        $rules =  [
            'name' => ['required', 'unique:bins', 'min:5'],
            'code' => ['required', 'min:2'],
        ];

        return $rules;
    }


    public function mount()
    {
        $this->allProducts = Product::all();
        $this->binProducts = [
            ['product_id' => '', 'quantity' => 1]
        ];
    }

    public function addProduct()
    {
        $this->binProducts[] = ['product_id' => '', 'quantity' => 1];
    }

    public function removeProduct($index)
    {
        unset($this->binProducts[$index]);
        $this->binProducts = array_values($this->binProducts);
    }


    /**
     * the create function
     *
     * @return void
     */
    public function store()
    {
        $this->validate();
        // User::create($this->modelData());
        // $this->modalFormVisible = false;
        // $this->resetVars();
        // $this->emit('alert', 'The user was create successfully');
    }


    public function render()
    {
        return view('livewire.products');
    }
}
