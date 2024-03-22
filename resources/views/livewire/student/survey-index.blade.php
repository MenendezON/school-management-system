<div class="container-fluid px-6 mx-auto grid">

    @if(session('success'))
    <div class="flex justify-between w-full bg-green-100 rounded-md mt-4 p-4 shadow-xs">
        <span class="text-green-500 text-md">{{ session('success') }}</span>
        <button class="text-green-500" wire:click="removeflash">x</button>
    </div>
    @endif

    <div class="flex">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Mes questionnaires
    </div>

    <div>
        <x-button wire:click="showCreateSurveyModal" class="mb-2">
            {{ __('Ajouter un questionaire') }}
        </x-button>
        <!-- Create survey modal -->
        <x-dialog-modal wire:model="createSurveyModal">
            <x-slot name="title">
                {{ __('Créer un questionnaire') }}
            </x-slot>

            <form>
                <x-slot name="content">
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Titre du questionnaire
                                </span>
                                <input type="text" id="title" wire:model.defer="title" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                @error('title')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1 mr-4 ml-4">
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
                                {{ __('Create') }}
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
                            <div class="flex item-center">Title</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Description</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Questions</div>
                        </th>
                        <th class="px-4 py-3">Créé</th>
                        <th class="px-4 py-3">Edité</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($surveys as $survey)
                    <tr class="text-gray-700 dark:text-gray-400" wire:key="{{$survey->id}}">
                        <td class="px-4 py-3">
                            <x-nav-link href="{{ route('survey-show', ['id' => $survey->id]) }}" wire:navigate>
                                {{ $survey->title }}
                            </x-nav-link>
                        </td>
                        <td class="px-4 py-3 text-sm">{{ $survey->description }}</td>
                        <td class="px-4 py-3 text-sm">{{ $survey->questions->count() }}</td>
                        <td class="px-4 py-3 text-sm">{{ $survey->created_at->diffForHumans() }}</td>
                        <td class="px-4 py-3 text-sm">{{ $survey->updated_at->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="w-full overflow-x-auto px-4 py-3">

        </div>
    </div>
</div>