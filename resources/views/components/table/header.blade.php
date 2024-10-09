<table class="min-w-full mb-12">
    <thead>
        <tr class="border-b-2 ">
            <th class="px-2 py-3 bg-gray-800 text-left text-xs leading-4 font-medium text-white uppercase tracking-wider sticky top-0">NO</th>
            @foreach ($headers as $header)
                <th class="px-2 py-3 bg-gray-800 text-left text-xs leading-4 font-medium text-white uppercase tracking-wider sticky top-0"> {{ $header }} </th>
            @endforeach
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200 "> {{ $slot }} </tbody>
</table>