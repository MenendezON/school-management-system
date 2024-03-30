<div class="container-fluid px-6 mx-auto grid">

    @if(session('success'))
    <div class="flex justify-between w-full bg-green-100 rounded-md mt-4 p-4 shadow-xs">
        <span class="text-green-500 text-md">{{ session('success') }}</span>
        <button class="text-green-500" wire:click="removeflash">x</button>
    </div>
    @endif

    <div class="flex">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Salle de classe
        </h2>
    </div>

    <div>
        <x-button wire:click="showCreateClassroomModal" class="mb-2">
            {{ __('Ajouter une classe') }}
        </x-button>
        <!-- Create classroom modal -->
        <x-dialog-modal wire:model="createClassroomModal">
            <x-slot name="title">
                {{ __('Créer une classe') }}
            </x-slot>

            <form>
                <x-slot name="content">
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Type de classe
                                </span>
                                <select wire:model="type" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                    <option>Sélectionner une valeur...</option>
                                    @foreach(\App\Enums\ClassroomType::cases() as $type)
                                    <option value="{{ $type->value }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Nom de la classe
                                </span>
                                <input wire:model="name" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                @error('name')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Capacité de la classe
                                </span>
                                <input wire:model="capacity" type="number" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                @error('capacity')
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
                            <div class="flex item-center">Type</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Nom de la classe</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Capacité</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Nombre de cours</div>
                        </th>
                        <th class="px-4 py-3">Créé</th>
                        <th class="px-4 py-3">Edité</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($classrooms as $classroom)
                    <tr class="text-gray-700 dark:text-gray-400" wire:key="{{$classroom->id}}">
                        <td class="px-4 py-3 text-sm">{{ $classroom->type }}</td>
                        <td class="px-4 py-3">
                            <x-nav-link href="{{ route('classroom-show', ['id' => $classroom->id]) }}" wire:navigate>
                                {{ $classroom->name }}
                            </x-nav-link>
                        </td>
                        <td class="px-4 py-3">{{ $classroom->capacity }}</td>
                        <td class="px-4 py-3">
                            <x-nav-link href="{{ route('subject-index', ['id' => $classroom->id]) }}" wire:navigate>
                                {{ $classroom->Subjects->count() }}
                            </x-nav-link>
                        </td>
                        <td class="px-4 py-3 text-sm">{{ $classroom->created_at->diffForHumans() }}</td>
                        <td class="px-4 py-3 text-sm">{{ $classroom->updated_at->diffForHumans() }}</td>
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
                                        <x-dropdown-link href="{{ route('subject-index', ['id' => $classroom->id]) }}">{{ __('Liste de cours') }}</x-dropdown-link>
                                        <div class="border-t border-gray-200"></div>
                                        <x-dropdown-link href="{{ route('subject-index', ['id' => $classroom->id]) }}">{{ __('Editer la classe') }}</x-dropdown-link>
                                        <x-dropdown-link href="{{ route('subject-index', ['id' => $classroom->id]) }}">{{ __('Supprimer de cours') }}</x-dropdown-link>
                                    </div>
                                </x-slot>
                            </x-dropdown>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="w-full overflow-x-auto px-4 py-3">
            {{ $classrooms->links() }}
        </div>
    </div>
</div>