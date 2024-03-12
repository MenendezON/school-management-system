<div class="container-fluid px-6 mx-auto grid">

    @if(session('success'))
    <div class="flex justify-between w-full bg-green-100 rounded-md mt-4 p-4 shadow-xs">
        <span class="text-green-500 text-md">{{ session('success') }}</span>
        <button class="text-green-500" wire:click="removeflash">x</button>
    </div>
    @endif

    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Liste de cours
        </h2>

        <!-- Cards -->
        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-8 xl:grid-cols-16">
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    <h2 class="my-6 mb-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">{{ $classroom->name }}</h2>
                    <h3>Type: {{ $classroom->type }}</h3>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Total: {{ $classroom->count() }} élève(s)
                    </p>
                    </p>
                </div>
            </div>
        </div>

    <div class="flex mt-6">
        <h2 class="my-2 mr-3 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Cours
        </h2>
        <x-button wire:click="showSubjectModal" class="mb-2">
            {{ __('Ajouter un nouveau') }}
        </x-button>
    </div>
    <div>
        <!-- Create tutor modal -->
        <x-dialog-modal wire:model="createSubjectModal">
            <x-slot name="title">
                {{ __('Créer un cours') }}
            </x-slot>

            <form>
                <x-slot name="content">
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Categorie de cours
                                </span>
                                <select wire:model="category" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                    <option>Sélectionner une valeur...</option>
                                    @foreach(\App\Enums\SubjectType::cases() as $subject)
                                    <option value="{{ $subject->value }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-3/4 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Titre du cours
                                </span>
                                <input type="text" wire:model="label" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                @error('label')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="w-full md:w-1/4 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Note
                                </span>
                                <input type="number" wire:model="value" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                @error('value')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Enseignant
                                </span>
                                <select wire:model="teacher_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                    <option>Sélectionner une valeur...</option>
                                    @foreach (\App\Models\Teacher::all() as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->first_name }} {{ $teacher->last_name }} ({{ $teacher->speciality }})</option>
                                    @endforeach
                                </select>
                                @error('teacher_id')
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
                                {{ __('Créer') }}
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
                            <div class="flex item-center">Categorie</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Cour</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Note</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Enseignant</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Créé</div>
                        </th>
                        <th class="px-4 py-3">Edité</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($classroom->subjects as $subject)
                    <tr class="text-gray-700 dark:text-gray-400" wire:key="{{$subject->id}}">
                        <td class="px-4 py-3 text-sm">{{ $subject->category }}</td>
                        <td class="px-4 py-3 text-sm">{{ $subject->label }}</td>
                        <td class="px-4 py-3 text-sm">{{ $subject->value }}</td>
                        <td class="px-4 py-3 text-sm">{{ $subject->teacher->first_name }} {{ $subject->teacher->last_name}}</td>
                        <td class="px-4 py-3 text-sm">{{ $subject->created_at->diffForHumans() }}</td>
                        <td class="px-4 py-3 text-sm">{{ $subject->updated_at->diffForHumans() }}</td>
                        <td>
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                            <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <div class="w-64">
                                        <x-dropdown-link href="{{ route('subject-index', ['id' => $classroom->id]) }}">{{ __('Editer le cours') }}</x-dropdown-link>
                                        <x-dropdown-link href="{{ route('subject-index', ['id' => $classroom->id]) }}">{{ __('Supprimer le cours') }}</x-dropdown-link>
                                    </div>
                                </x-slot>
                            </x-dropdown>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="w-full overflow-x-auto px-4 py-3">&nbsp;</div>
        </div>
    </div>

    

</div>
