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

    @if(sizeof($medical) === 0)
    Create a medical folder
    {{ $student->id }}
    @else
    Edit your medical folder
    @endif
</div>