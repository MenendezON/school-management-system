<div>
    @if( $medical == null)
    <div>
        <x-button wire:click="showCreateMedicalModal" class="mb-2">
            {{ __('Dossier médical') }}
        </x-button>

    </div>
    @else
    <a href="#" wire:click="$dispatch('edit-medical', {id: {{$medical->id}}})">Editer</a>
    @endif

    <!-- Create classroom modal -->
    <x-dialog-modal wire:model="createMedicalModal">
        <x-slot name="title">
            {{ __('Créer une classe') }}
        </x-slot>

        <form>
            <x-slot name="content">
                <div class="flex px-2 my-2">
                    <div class="w-full md:w-1/1mr-4 ml-4">
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                                Field 1
                            </span>
                            <input wire:model="field1" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                            @error('field1')
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