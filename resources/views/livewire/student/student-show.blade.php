<div class="container-fluid px-6 mx-auto grid">

    @if(session('success'))
    <div class="flex justify-between w-full bg-green-100 rounded-md mt-4 p-4 shadow-xs">
        <span class="text-green-500 text-md">{{ session('success') }}</span>
        <button class="text-green-500" wire:click="removeflash">x</button>
    </div>
    @endif

    <h2 class="my-2 text-2xl text-center font-semibold text-gray-700 dark:text-gray-200">
        {{ Str::of("Dossier de l'élève")->headline() }}
    </h2>

    <div class="mt-2">
        <div class="flow-root">
            <ul role="list" class="-my-6 divide-y divide-gray-200">
                <li class="flex py-6">
                    <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                        <img src="https://www.shareicon.net/data/512x512/2016/07/26/802043_man_512x512.png" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="h-full w-full object-cover object-center">
                    </div>

                    <div class="ml-4 flex flex-1 flex-col">
                        <div class="flex justify-between text-gray-900">
                            <h1>
                                <a href="#" class="font-semibold">{{ $student->first_name }} {{ $student->last_name }}</a>
                                <span class="text-sm">{{ $student->gender=="Masculin"?'(M)':'(F)' }}</span>
                            </h1>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">{{ \Carbon\Carbon::parse($student->date_of_birth)->format('d M Y') }} ({{ str_replace('years ago', 'ans', \Carbon\Carbon::parse($student->date_of_birth)->diffForHumans()) }}) &#8226; {{ $student->place_of_birth }}, {{ $student->nationality }}</p>
                        <p class="text-gray-500">{{ $student->decision }}</p>
                        <div class="flex">
                            <button type="button" wire:click="$dispatch('edit-student', {id: {{$student->id}}})" class="flex font-medium text-indigo-600 hover:text-indigo-500" aria-label="Edit">
                                {{ _('Modifier') }} 
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div x-data="{ tab: window.location.hash ? window.location.hash : '#tab1' }">
        <div class="flex flex-row border-b-2 border-gray-900 mt-6">

            <a class="px-4 border-b-2 uppercase hover:border-green-500" href="#" x-on:click.prevent="tab='#tab1'">
                {{ _('Vue globale' )}}
            </a>

            <a class="px-4 border-b-2 uppercase hover:border-green-300" href="#" x-on:click.prevent="tab='#tab2'">
                {{ _('Lien parenté' )}}
            </a>

            <a class="px-4 border-b-2 uppercase hover:border-green-300" href="#" x-on:click.prevent="tab='#tab3'">
                {{ _('Année académique' )}}
            </a>

            <a class="px-4 border-b-2 uppercase hover:border-green-300" href="#" x-on:click.prevent="tab='#tab4'">
                {{ _('Evaluation' )}}
            </a>

        </div>

        <!-- begin Overview's tab -->
        <div x-show="tab == '#tab1'" x-cloak>
            <div class="flex justify-between mt-6 border-b-2">
                <h2 class="my-2 mr-3 text-2xl font-normal text-gray-700 dark:text-gray-200">
                    {{ _('Information personnelle') }}
                </h2>
            </div>    
            <div class="columns-2">
                <div class="p-4 pt-0">
                    <div class="flex border-1 mb-0 p-3 hover:bg-gray-200">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                            </path>
                        </svg>
                        <div class="ml-2">
                            <h3 class="font-bold">Groupe sanguin</h3>
                            <p>{{ $student->blood_group }}</p>
                        </div>
                    </div>
                    <div class="flex border-1 mb-0 p-3 hover:bg-gray-200">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                            </path>
                        </svg>
                        <div class="ml-2">
                            <h3 class="font-bold">Email</h3>
                            <p>{{ $student->email }}</p>
                        </div>
                    </div>
                    <div class="flex border-1 mb-0 p-3 hover:bg-gray-200">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                            </path>
                        </svg>
                        <div class="ml-2">
                            <h3 class="font-bold">Téléphone</h3>
                            <p>{{ $student->phone }}</p>
                        </div>
                    </div>
                    <div class="flex border-1 mb-0 p-3 hover:bg-gray-200">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                            </path>
                        </svg>
                        <div class="ml-2">
                            <h3 class="font-bold">Adresse</h3>
                            <p>{{ $student->address }}, {{ $student->city }}</p>
                        </div>
                    </div>
                </div>
                <div class="p-4 pt-0">
                    <div class="flex border-1 mb-0 p-3 hover:bg-gray-200">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                            </path>
                        </svg>
                        <div class="ml-2">
                            <h3 class="font-bold">Ecole précédente</h3>
                            <p>{{ $student->previous_school }}</p>
                        </div>
                    </div>
                    <div class="flex border-1 mb-0 p-3 hover:bg-gray-200">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                            </path>
                        </svg>
                        <div class="ml-2">
                            <h3 class="font-bold">Vaccination</h3>
                            <p>{{ $student->medical_history }}</p>
                        </div>
                    </div>
                    <div class="flex border-1 mb-0 p-3 hover:bg-gray-200">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                            </path>
                        </svg>
                        <div class="ml-2">
                            <h3 class="font-bold">Allergies</h3>
                            <p>{{ $student->allergies }}</p>
                        </div>
                    </div>
                    <div class="flex border-1 mb-0 p-3 hover:bg-gray-200">                     
                        <div class="ml-2">
                            <h3 class="font-bold"></h3>
                            <p></p>
                        </div>
                    </div>                  
                </div>
            </div>
        </div>

        <!-- begin Tutor's tab -->
        <div x-show="tab == '#tab2'" x-cloak>
            <div class="flex justify-between mt-6 border-b-2">
                <h2 class="my-2 mr-3 text-2xl font-normal text-gray-700 dark:text-gray-200">
                    {{ Str::of('Lien parenté')->headline() }}
                </h2>
                <x-button wire:click="showCreateTutorModal" class="mb-2">
                    {{ __('Nouveau') }}
                </x-button>
            </div>
            <div>
                <!-- Create tutor modal -->
                <x-dialog-modal wire:model="createTutorModal">
                    <x-slot name="title">
                        {{ __('Ajouter un parent') }}
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
                                <div class="w-full md:w& mr-4 ml-4">
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
                                <div class="w-full md:w-1/1 mr-4 ml-4">
                                    <label class="block mt-4 text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            Nationalité
                                        </span>
                                        <select wire:model="nationality" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                            <option>Sélectionner un pays...</option>
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
                                <div class="w-full md:w-1/1 mr-4 ml-4">
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
                                <div class="w-full md:w-1/1 mr-4 ml-4">
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
                                <div class="w-full md:w-1/1 mr-4 ml-4">
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
                                <td class="px-3 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <x-button type="button" wire:click="$dispatch('edit-tutor', {id: {{$tutor->id}}})" class="bg-green-500 hover:bg-green-700" aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </x-button>
                                <x-button type="button" wire:click="deleteTutor({{$tutor->id}})" wire:confirm="Etes-vous sûr de vouloir supprimer ce lien parenté?" class="bg-red-500 hover:bg-red-700" aria-label="Delete">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </x-button>
                            </div>
                        </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- begin Academic year's tab -->
        <div x-show="tab == '#tab3'" x-cloak>
            <div class="flex mt-6">
                <h2 class="my-2 mr-3 text-2xl font-normal text-gray-700 dark:text-gray-200">
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
        </div>

        <!-- begin Evaluation's tab -->
        <div x-show="tab == '#tab4'" x-cloak>
            <div class="flex mt-6">
                <h2 class="my-2 mr-3 text-2xl font-normal text-gray-700 dark:text-gray-200">
                    {{ _('Evaluation') }}
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
    </div>
</div>