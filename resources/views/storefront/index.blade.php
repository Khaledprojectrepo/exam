<x-front.app :title="$shop_name">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12 pl-4 pr-4 m-10">
        <div class="grid grid-cols-4 gap-4">
               @foreach($categories as $cat)
 		 <div>
			<a href="{{ route('front.product',['shop'=>$shop,'category'=>$cat->id]) }}" class="block w-full ps-3 pe-4 py-2 border-l-4 border-indigo-400 dark:border-indigo-600 text-start 
			text-base font-medium text-indigo-700 dark:text-white bg-red-500 dark:bg-red focus:outline-none focus:text-indigo-800 
			dark:focus:text-indigo-200 focus:bg-indigo-100 dark:focus:bg-indigo-900 focus:border-indigo-700 dark:focus:border-indigo-300 
			transition duration-150 ease-in-out">{{ $cat->name }}
       			 </a>
    		</div>
	       @endforeach
               
 
	</div>
    </div>
</x-front.app>
