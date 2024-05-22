<div class="container-fluid px-6 mx-auto grid">

    @if(session('success'))
    <div class="flex justify-between w-full bg-green-100 rounded-md mt-4 p-4 shadow-xs">
        <span class="text-green-500 text-md">{{ session('success') }}</span>
        <button class="text-green-500" wire:click="removeflash">x</button>
    </div>
    @endif

    <h2 class="my-2 text-2xl text-center font-semibold text-gray-700 dark:text-gray-200">
        {{ Str::of("Rapport d'évaluation")->headline() }}
    </h2>
    <div>

        <x-nav-link href="{{ route('survey-eval-create', ['id' => $surveyid]) }}" class="bg-blue-500 pt-2 py-2 px-2 rounded text-white" wire:navigate>
            Nouvelle évaluation
        </x-nav-link>
    </div>
    <table class="w-full whitespace-no-wrap">
        <thead>
            <tr class="text-gray-700 dark:text-gray-400" wire:key="">
                <th class="px-4 py-3 text-sm text-start">Nom complet</th>
                <th class="px-4 py-3 text-sm text-start">Grille</th>
                <th class="px-4 py-3 text-sm text-start">Année scolaire</th>
                <th class="px-4 py-3 text-sm text-start">Période</th>
                <th class="px-4 py-3 text-sm text-start">Date d'évaluation</th>
                <th class="px-4 py-3 text-sm text-start">&nbsp;</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach($evaluations as $eval)
            <tr class="text-gray-700 dark:text-gray-400" wire:key="">
                <td class="px-4 py-3 text-sm">{{\App\Models\Student::find($eval->student_id)->first_name}} {{\App\Models\Student::find($eval->student_id)->last_name}}</td>
                <td class="px-4 py-3 text-sm">{{ $eval->title }}</td>
                <td class="px-4 py-3 text-sm">{{ $eval->academic_year }}</td>
                <td class="px-4 py-3">
                    {{ $eval->quarter }}{{ $eval->quarter=='1'?'er':'ème' }} {{ _("trimestre") }}
                </td>
                <td class="px-4 py-3 text-sm">{{ $eval->created_at->diffForHumans() }}</td>
                <td class="px-4 py-3">
                    <x-button type="button" wire:click="deleteEvaluation({{$eval->student_id}}, {{$eval->quarter}}, '{{$eval->academic_year}}')" wire:confirm="Etes-vous sûr de vouloir supprimer cette classe?" class="bg-red-500 hover:bg-red-700" aria-label="Delete">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </x-button>
                    <x-nav-link href="{{ route('evaluation-index', ['id' => $eval->student_id, 'q' => $eval->quarter, 'ay' => $eval->academic_year, 's' => $eval->survey_id]) }}" class="bg-blue-500 pt-2 py-2 px-2 rounded text-white" wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 15v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4M17 9l-5 5-5-5M12 12.8V2.5" />
                        </svg>
                    </x-nav-link>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>