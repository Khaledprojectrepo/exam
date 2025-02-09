<x-merchant.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Store List') }}
        </h2>
    </x-slot>

    <div class="py-12 pl-4 pr-4 m-10">
        <div class="">
            <div class="block w-full overflow-x-auto  border ">
    <table class="items-center w-full bg-transparent border-collapse">
        <thead>
            <tr>
                <th
                    class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                     Store Name
			</th>
              
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">

          @if($stores)
            @foreach($stores as $store)
            <tr class="text-gray-500">
                
                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                   {{$store->name}}
		</td>
                
            </tr>
            @endforeach
           @endif
        </tbody>
    </table>
</div>
        </div>
    </div>
</x-merchant.app>
