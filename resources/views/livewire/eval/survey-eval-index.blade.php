<div class="container-fluid px-6 mx-auto grid">

    @if(session('success'))
    <div class="flex justify-between w-full bg-green-100 rounded-md mt-4 p-4 shadow-xs">
        <span class="text-green-500 text-md">{{ session('success') }}</span>
        <button class="text-green-500" wire:click="removeflash">x</button>
    </div>
    @endif

    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        <x-nav-link href="{{ route('survey-index') }}" class="bg-blue-500 pt-2 py-2 px-2 ml-2 rounded text-white" wire:navigate>
            <svg width="30px" height="30px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="icomoon-ignore"></g>
                <path d="M14.389 7.956v4.374l1.056 0.010c7.335 0.071 11.466 3.333 12.543 9.944-4.029-4.661-8.675-4.663-12.532-4.664h-1.067v4.337l-9.884-7.001 9.884-7zM15.456 5.893l-12.795 9.063 12.795 9.063v-5.332c5.121 0.002 9.869 0.26 13.884 7.42 0-4.547-0.751-14.706-13.884-14.833v-5.381z" fill="#ffffff"></path>
            </svg>
        </x-nav-link>

        <span>{{ Str::of("Rapport d'évaluation")->headline() }}</span>
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
                <td class="flex gap-2 px-4 py-3">
                    <x-button type="button" wire:click="editEvaluation({{$eval->student_id}}, {{$eval->quarter}}, '{{$eval->academic_year}}')" class="bg-green-500 hover:bg-green-700" aria-label="Edit">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                            </path>
                        </svg>
                    </x-button>
                    <x-button type="button" wire:click="deleteEvaluation({{$eval->student_id}}, {{$eval->quarter}}, '{{$eval->academic_year}}')" wire:confirm="Etes-vous sûr de vouloir supprimer cette classe?" class="bg-red-500 hover:bg-red-700" aria-label="Delete">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </x-button>
                    <x-nav-link href="{{ route('evaluation-index', ['id' => $eval->student_id, 'q' => $eval->quarter, 'ay' => $eval->academic_year, 's' => $eval->survey_id]) }}" class="bg-blue-500 pt-2 py-2 px-4 rounded text-white" wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </x-nav-link>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>