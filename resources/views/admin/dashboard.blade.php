<x-admin.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Merchant List') }}
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
                     Merchant Name
			</th>
                <th
                    class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                    Merchant Email</th>
                <th
                    class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">

          @if($merchant)
            @foreach($merchant as $muser)
            <tr class="text-gray-500">
                <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{$muser->name}}</th>
                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                   {{$muser->email}}
		</td>
                
            </tr>
            @endforeach
           @endif
        </tbody>
    </table>
</div>
        </div>
    </div>
</x-admin.app>
