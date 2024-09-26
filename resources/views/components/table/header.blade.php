<table class="min-w-full">
    <thead>
        <tr class="border-b-2"> 
            @foreach ($headers as $header)
                <th class="px-2 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"> {{ $header }} </th>
            @endforeach
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200"> {{ $slot }} </tbody>
</table>