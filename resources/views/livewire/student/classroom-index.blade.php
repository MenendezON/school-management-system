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
                        <div class="w-full md:w-1/1mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Type de classe
                                </span>
                                <select wire:model.live="type" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
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
                        <div class="w-full md:w-1/1mr-4 ml-4">
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
                        <div class="w-full md:w-1/1mr-4 ml-4">
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
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <x-button type="button" wire:click="$dispatch('edit-classroom', {id: {{$classroom->id}}})" class="bg-green-500 hover:bg-green-700" aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </x-button>
                                <x-button type="button" wire:click="deleteClassroom({{$classroom->id}})" wire:confirm="Etes-vous sûr de vouloir supprimer cette classe?" class="bg-red-500 hover:bg-red-700" aria-label="Delete">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </x-button>
                                <x-button type="button" title="Ajouter des cours">
                                    <a href="{{ route('subject-index', ['id' => $classroom->id]) }}" wire:navigate>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
                                            <path d="m.5 3 .04.87a2 2 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2m5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19q-.362.002-.683.12L1.5 2.98a1 1 0 0 1 1-.98z" />
                                            <path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5" />
                                        </svg>
                                    </a>
                                </x-button>
                            </div>
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