<div class="container-fluid px-6 mx-auto grid">

    @if(session('success'))
    <div class="flex justify-between w-full bg-green-100 rounded-md mt-4 p-4 shadow-xs">
        <span class="text-green-500 text-md">{{ session('success') }}</span>
        <button class="text-green-500" wire:click="removeflash">x</button>
    </div>
    @endif

    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        {{ Str::of("Dossier de l'élève")->headline() }}
    </h2>

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
                <h2 class="my-6 mb-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    {{ $student->first_name }} {{ $student->last_name }}
                </h2>
                <h3>{{ $student->date_of_birth }}, {{ $student->place_of_birth }}</h3>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    {{ $student->nationality }}
                </p>
                </p>
            </div>
        </div>
    </div>

    <div x-data="{ tab: window.location.hash ? window.location.hash : '#tab1' }">
        <div class="flex flex-row justify-between">

            <a class="px-4 border-b-2 border-gray-900 hover:border-teal-300" href="#" x-on:click.prevent="tab='#tab1'">Tab1</a>

            <a class="px-4 border-b-2 border-gray-900 hover:border-teal-300" href="#" x-on:click.prevent="tab='#tab2'">Tab2</a>

            <a class="px-4 border-b-2 border-gray-900 hover:border-teal-300" href="#" x-on:click.prevent="tab='#tab3'">Tab3</a>

        </div>
        <div x-show="tab == '#tab1'" x-cloak>
            <p>This is the content of Tab 1</p>
        </div>

        <div x-show="tab == '#tab2'" x-cloak>
            <p>This is the content of Tab 2</p>
        </div>

        <div x-show="tab == '#tab3'" x-cloak>
            <p>This is the content of Tab 3</p>
        </div>
    </div>

    <div class="flex mt-6">
        <h2 class="my-2 mr-3 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ Str::of('Lien parenté')->headline() }}
        </h2>
        <x-button wire:click="showCreateTutorModal" class="mb-2">
            {{ __('Add new') }}
        </x-button>
    </div>
    <div>
        <!-- Create tutor modal -->
        <x-dialog-modal wire:model="createTutorModal">
            <x-slot name="title">
                {{ __('Create tutor') }}
            </x-slot>

            <form>
                <x-slot name="content">
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1/2 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    {{ _('Prénom') }}
                                </span>
                                <input wire:model="first_name" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                @error('first_name')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="w-full md:w-1/2 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    {{ _('Nom') }}
                                </span>
                                <input wire:model="last_name" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                @error('last_name')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Lien relationnel
                                </span>
                                <select wire:model="relationship" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                    <option>Select a type...</option>
                                    @foreach(\App\Enums\RelationType::cases() as $relation)
                                    <option value="{{ $relation->value }}">{{ $relation->name }}</option>
                                    @endforeach
                                </select>
                                @error('relationship')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Nationalité
                                </span>
                                <select wire:model="nationality" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                    <option>Select a type...</option>
                                    @foreach(\App\Enums\CountryType::cases() as $country)
                                    <option value="{{ $country->value }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('nationality')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Adresse
                                </span>
                                <input wire:model="address" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                @error('address')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Profession
                                </span>
                                <input wire:model="occupation" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                @error('occupation')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Lieu de travail
                                </span>
                                <input wire:model="duty_station" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                @error('duty_station')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-2/4 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Phone number (Cellular)<sup>*</sup>
                                </span>
                                <input type="tel" wire:model="phone" pattern="^\+221\d{9}$" title="Please enter a valid Senegalese phone number starting with +221 followed by 9 digits" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                @error('phone')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="w-full md:w-2/4 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Email
                                </span>
                                <input wire:model="email" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                @error('email')
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
                            <div class="flex item-center">Nom complet</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Lien relationnel</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Email</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Téléphone</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Nationalité</div>
                        </th>
                        <th class="px-4 py-3">Edité</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($student->tutors as $tutor)
                    <tr class="text-gray-700 dark:text-gray-400" wire:key="{{$tutor->id}}">
                        <td class="px-4 py-3">{{ $tutor->first_name }} {{ $tutor->last_name }}</td>
                        <td class="px-4 py-3 text-sm">{{ $tutor->relationship }}</td>
                        <td class="px-4 py-3">{{ $tutor->email?$tutor->email:'-' }}</td>
                        <td class="px-4 py-3 text-sm">{{ $tutor->phone }}</td>
                        <td class="px-4 py-3 text-sm">{{ $tutor->nationality }}</td>
                        <td class="px-4 py-3 text-sm">{{ $tutor->updated_at->diffForHumans() }}</td>
                        <td class="px-4 py-3">
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
                                    </div>
                                </x-slot>
                            </x-dropdown>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="flex mt-6">
        <h2 class="my-2 mr-3 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ Str::of("Année académique")->headline() }}
        </h2>
    </div>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">
                            <div class="flex item-center">Année scolaire</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Classe</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Observations</div>
                        </th>
                        <th class="px-4 py-3">Last updated</th>
                        <th class="px-4 py-3">&nbsp;</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($student->classrooms as $classroom)
                    <tr class="text-gray-700 dark:text-gray-400" wire:key="">
                        <td class="px-4 py-3 text-sm">{{ $classroom->pivot->academic_year }}</td>
                        <td class="px-4 py-3">Pédago {{ $classroom->type }} {{ $classroom->name }}</td>
                        <td class="px-4 py-3 text-sm">{{ $classroom->pivot->observations?$classroom->pivot->observations:'-' }}</td>
                        <td class="px-4 py-3 text-sm">{{ $classroom->updated_at->diffForHumans() }}</td>
                        <td class="px-4 py-3">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">

                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                            <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                        </svg>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <div class="w-66">
                                        @if(route('student-show', ['id' => $student->id]))
                                            @if(strtoupper($classroom->name) === "INDIGO")
                                                <x-dropdown-link href="{{ route('student-survey-show', ['id' => $student->id, 'idsurvey' => 1]) }}?ay={{ $classroom->pivot->academic_year }}">{{ __('Progression des apprentissages') }}</x-dropdown-link>
                                            @endif
                                            @if($classroom->name === "Académique")
                                                <x-dropdown-link href="{{ route('student-survey-show', ['id' => $student->id, 'idsurvey' => 2]) }}">{{ __('Progression des apprentissages') }}</x-dropdown-link>
                                            @endif
                                        @endif
                                    </div>
                                </x-slot>
                            </x-dropdown>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="flex mt-6">
        <h2 class="my-2 mr-3 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Evaluation
        </h2>
    </div>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">
                            <div class="flex item-center">Année scolaire</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Période</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Année académique</div>
                        </th>
                        <th class="px-4 py-3">&nbsp;</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($evaluations as $eval)
                    <tr class="text-gray-700 dark:text-gray-400" wire:key="">
                        <td class="px-4 py-3 text-sm">{{ $eval->title }}</td>
                        <td class="px-4 py-3">
                            @switch($eval->quarter)
                                @case(1)
                                    {{ $eval->quarter }} trimestre
                                    @break
                                @case(2)
                                    {{ $eval->quarter }} trimestre
                                    @break
                                @case(3)
                                    {{ $eval->quarter }} trimestre
                                    @break
                            @endswitch
                        </td>
                        <td class="px-4 py-3 text-sm">{{ $eval->academic_year }}</td>
                        <td class="px-4 py-3">
                        <x-nav-link href="{{ route('evaluation-index', ['id' => $student->id, 'q' => $eval->quarter, 'ay' => $eval->academic_year]) }}" wire:navigate class="flex items-center text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 15v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4M17 9l-5 5-5-5M12 12.8V2.5"/></svg>            
                             </x-nav-link>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>