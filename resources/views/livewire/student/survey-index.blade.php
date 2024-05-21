<div class="container-fluid px-6 mx-auto grid">

    @if(session('success'))
    <div class="flex justify-between w-full bg-green-100 rounded-md mt-4 p-4 shadow-xs">
        <span class="text-green-500 text-md">{{ session('success') }}</span>
        <button class="text-green-500" wire:click="removeflash">x</button>
    </div>
    @endif

    <div class="flex">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Mes grilles
        </h2>
    </div>

    <!-- Modal for create a new question -->
    <div>
        <x-button wire:click="showCreateSurveyModal" class="mb-2">
            {{ __('Ajouter une grille') }}
        </x-button>
        <!-- Create survey modal -->
        <x-dialog-modal wire:model="createSurveyModal">
            <x-slot name="title">
                {{ __('Créer un questionnaire') }}
            </x-slot>

            <form>
                <x-slot name="content">
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1/1 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Titre de la grille
                                </span>
                                <input type="text" id="title" wire:model.defer="title" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                @error('title')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1/1 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Description
                                </span>
                                <textarea wire:model.defer="description" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"></textarea>
                                @error('description')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                </x-slot>
                <x-slot name="footer">
                    <div class="px-2 my-2">
                        <div class="w-full md:w-2/3 mr-4 ml-4">
                            <x-button wire:click="create">
                                {{ __('Valider') }}
                            </x-button>
                        </div>
                    </div>
                </x-slot>
            </form>
        </x-dialog-modal>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">
                            <div class="flex item-center">Grille</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Description</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Questions</div>
                        </th>
                        <th class="px-4 py-3">Création</th>
                        <th class="px-4 py-3">Modification</th>
                        <td>&nbsp;</td>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($surveys as $survey)
                    <tr class="text-gray-700 dark:text-gray-400" wire:key="{{$survey->id}}">
                        <td class="px-4 py-3">
                            <x-nav-link href="{{ route('survey-show', ['idsurvey' => $survey->id]) }}" wire:navigate>
                                {{ $survey->title }}
                            </x-nav-link>
                        </td>
                        <td class="px-4 py-3 text-sm">{{ $survey->description }}</td>
                        <td class="px-4 py-3 text-sm">{{ $survey->questions->count() }}</td>
                        <td class="px-4 py-3 text-sm">{{ $survey->created_at->diffForHumans() }}</td>
                        <td class="px-4 py-3 text-sm">{{ $survey->updated_at->diffForHumans() }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <x-button type="button" wire:click="$dispatch('edit-survey', {id: {{$survey->id}}})" class="bg-green-500 hover:bg-green-700" aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </x-button>
                                <x-button type="button" wire:click="deleteSurvey({{$survey->id}})" wire:confirm="Etes-vous sûr de vouloir supprimer cette grille?" class="bg-red-500 hover:bg-red-700" aria-label="Delete">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </x-button>
                                <x-nav-link href="{{ route('survey-eval-index', ['id' => $survey->id]) }}" class="bg-blue-500 pt-2 py-2 px-2 rounded text-white" wire:navigate>
                                    Evaluation
                                </x-nav-link>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="w-full overflow-x-auto px-4 py-3">

        </div>
    </div>
</div>