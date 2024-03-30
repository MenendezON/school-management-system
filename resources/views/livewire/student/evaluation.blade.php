<div class="container-fluid px-6 mx-auto grid">

    @if(session('success'))
    <div class="flex justify-between w-full bg-green-100 rounded-md mt-4 p-4 shadow-xs">
        <span class="text-green-500 text-md">{{ session('success') }}</span>
        <button class="text-green-500" wire:click="removeflash">x</button>
    </div>
    @endif

    <div class="flex">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Rapport Psychoéducatif
        </h2>
    </div>

   

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table border="1">
                    <tr>
                        <th>Nom & prénom </th>
                        <th>:
                        @foreach($option as $op)
                            {{ $op->first_name }}
                            @break
                        @endforeach
                        </th>
                    </tr>
                    <tr>
                        <th>Age </th>
                        <th>:
                        @foreach($option as $op)
                            {{ \Carbon\Carbon::parse($op->date_of_birth)->diffForHumans() }}
                            @break
                        @endforeach
                        </th>
                    </tr>
                    <tr>
                        <th>Année scolaire </th>
                        <th>:
                        @foreach($option as $op)
                            {{ $op->academic_year }}
                            @break
                        @endforeach
                        </th>
                    </tr>

                    <tr>
                        <th>Trim/Date </th>
                        <th>:
                        @foreach($option as $op)
                            {{ Date('d-m-Y') }}
                            @break
                        @endforeach
                        </th>
                    </tr>
                </table>
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">
                                <div class="flex item-center">Question</div>
                            </th>
                            <th class="px-4 py-3">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($reports as $key => $rslt)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm font-semibold">{{ $key }}</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                @foreach($rslt as $val)
                                        {{ $val }}
                                    @endforeach
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>