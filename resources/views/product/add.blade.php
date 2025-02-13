<x-merchant.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Add Product') }}
        </h2>
    </x-slot>

    <div class="py-12 pl-4 pr-4 m-10">
        <div class="">
            <div class="block w-full overflow-x-auto  border ">
            <div class="flex w-full justify-center items-left">
<form method="POST" action="{{ route('merchant.create.product') }}">
        @csrf
         <div>
            <x-input-label for="category_name" :value="__('Select Category')" />
           
            <select name="category_id" class="block mt-1 w-full">
                  @if($categories)
			@foreach($categories as $cat)
 			<option value="{{$cat->id}}">{{$cat->name}}</option>
			@endforeach
		  @endif	
	    </select>
<x-input-error :messages="$errors->get('category_id')" class="mt-2" />
        </div>
       <div>
            <x-input-label for="store_name" :value="__('Select Store')" />
           
            <select name="store_id" class="block mt-1 w-full">
                  @if($stores)
			@foreach($stores as $store)
 			<option value="{{$store->id}}">{{$store->name}}</option>
			@endforeach
		  @endif	
	    </select>
<x-input-error :messages="$errors->get('store_id')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="name" :value="__('Product Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('store_name')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

     
<div class="inline-flex justify-center mt-4  w-full">
            <x-primary-button class="ms-3 block bg-red-500 text-white rounded">
                {{ __('Save') }}
            </x-primary-button>
</div>
        </div>
    </form>
</div>
</div>
        </div>
    </div>
</x-merchant.app>
