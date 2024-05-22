<div class="container-fluid px-6 mx-auto grid">

    @if(session('success'))
    <div class="flex justify-between w-full bg-green-100 rounded-md mt-4 p-4 shadow-xs">
        <span class="text-green-500 text-md">{{ session('success') }}</span>
        <button class="text-green-500" wire:click="removeflash">x</button>
    </div>
    @endif

    <div class="flex gap-2 justify-between">

        <h2 class="flex my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        <x-nav-link href="{{ route('survey-eval-index', ['id' => $survey]) }}" class="bg-blue-500 pt-2 py-2 px-2 ml-2 rounded text-white" wire:navigate>
            <svg width="30px" height="30px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="icomoon-ignore">
                </g>
                <path d="M14.389 7.956v4.374l1.056 0.010c7.335 0.071 11.466 3.333 12.543 9.944-4.029-4.661-8.675-4.663-12.532-4.664h-1.067v4.337l-9.884-7.001 9.884-7zM15.456 5.893l-12.795 9.063 12.795 9.063v-5.332c5.121 0.002 9.869 0.26 13.884 7.42 0-4.547-0.751-14.706-13.884-14.833v-5.381z" fill="#ffffff">

                </path>
            </svg>
            </x-nav-link>
            
            <span>Rapport Psychoéducatif</span>
        </h2>
        <button wire:click="generatePdf" title="Télécharger">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
            </svg>
        </button>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table border="1">
                <tr>
                    <th style="width:200px; text-align:start;">Nom & prénom </th>
                    <td>: {{ ucwords($student->first_name) }} {{ strtoupper($student->last_name) }}</td>
                </tr>
                <tr>
                    <th style="width:200px; text-align:start;">Age </th>
                    <td>: {{ \Carbon\Carbon::parse($student->date_of_birth)->diffForHumans() }}</td>
                </tr>
            </table>
            <table class="w-full whitespace-no-wrap">
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