<div class="py-10 flex items-center justify-center">

    <div class="bg-white rounded-lg shadow-2xl w-1/2">
        <form wire:submit.prevent="store">
            <header class="bg-trueGray-300 rounded-t-lg py-3 px-8 flex justify-between items-center">
                <div class="text-xl font-extrabold flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span class="ml-2"> Bin Management</span>

                </div>
                <Button class="bg-purple-600 hover:bg-purple-700 ocus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-5 text-blue-50 rounded-lg py-2 px-4 flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="ml-2">Create Product</span>

                </Button>
            </header>

            <div class="p-8">
                <x-jet-validation-errors class="mb-4" />

                <div class="block">
                    <x-jet-label for="name" value="{{ __('Bin Name') }}" />
                    <x-jet-input id="name" class="block mb-3 w-full" type="text" name="name" :value="old('name')" placeholder="Enter BIN Name..." required autofocus />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <div class="block">
                    <x-jet-label for="code" value="{{ __('Bin Code') }}" />
                    <x-jet-input id="code" class="block mb-3 w-full" type="text" name="code" :value="old('code')" placeholder="Enter BIN Code..." required autofocus />
                    <x-jet-input-error for="code" class="mt-2" />
                </div>

                <table class="min-w-full mt-6">
                    <thead class="bg-sky-300">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-trueGray-600 uppercase tracking-wider rounded-tl">Product</th>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-trueGray-600 uppercase tracking-wider">Quantity</th>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-trueGray-600 uppercase tracking-wider rounded-tr">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($binProducts as $index => $binProduct)
                        <tr>
                            <td width='60%'>
                                <select name="binProducts[{{$index}}][product_id]" wire:model="binProducts.{{$index}}.product_id" class=" w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                    <option value="">-- choose product --</option>
                                    @foreach ($allProducts as $product)
                                    <option value="{{ $product->id }}">
                                        {{ $product->name }} (${{ number_format($product->price, 2) }})
                                    </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <x-jet-input type="number" min="1" name="binProducts[{{$index}}][quantity]" wire:model="binProducts.{{$index}}.quantity" class="block w-full" />
                            </td>
                            <td>

                                <a href="#" wire:click.prevent="removeProduct({{$index}})" class="text-blue-500 flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    <span class="ml-1">Delete</span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <x-jet-button wire:click.prevent="addProduct" class="mt-5">
                    {{ __('+ Add Another Product') }}
                </x-jet-button>

            </div>
            <footer class="bg-trueGray-300 rounded-b-lg text-right py-3 px-8 text-sm text-gray-700">
                <x-jet-button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                    </svg> <span class="ml-1">{{ __('Create Bin') }}</span>
                </x-jet-button>
            </footer>
        </form>
    </div>
</div>
