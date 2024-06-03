<div class="container-fluid px-6 mx-auto grid">

    @if(session('success'))
    <div class="flex justify-between w-full bg-green-100 rounded-md mt-4 p-4 shadow-xs">
        <span class="text-green-500 text-md">{{ session('success') }}</span>
        <button class="text-green-500" wire:click="removeflash">x</button>
    </div>
    @endif

    <div class="flex">

        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            <x-nav-link href="{{ route('dashboard') }}" class="bg-blue-500 pt-2 py-2 px-2 ml-2 rounded text-white" wire:navigate>
                <svg width="30px" height="30px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="icomoon-ignore">
                    </g>
                    <path d="M14.389 7.956v4.374l1.056 0.010c7.335 0.071 11.466 3.333 12.543 9.944-4.029-4.661-8.675-4.663-12.532-4.664h-1.067v4.337l-9.884-7.001 9.884-7zM15.456 5.893l-12.795 9.063 12.795 9.063v-5.332c5.121 0.002 9.869 0.26 13.884 7.42 0-4.547-0.751-14.706-13.884-14.833v-5.381z" fill="#ffffff">

                    </path>
                </svg>
            </x-nav-link>

            <span>{{ Str::of("Rapport Psychoéducatif")->headline() }}</span>
        </h2>
    </div>

    <div class="flex justify-between my-3">
        <x-button wire:click="showCreatePostModal" class="mb-2">
            {{ __('Nouvel élève') }}
        </x-button>
        <!-- Create post modal -->
        <x-dialog-modal wire:model="createPostModal">
            <x-slot name="title">
                {{ __('Créer un élève') }}
            </x-slot>

            <form>
                <x-slot name="content">
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1/3 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Prénom
                                </span>
                                <input wire:model.live="first_name" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                @error('first_name')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="w-full md:w-1/3 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Nom
                                </span>
                                <input wire:model="last_name" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                @error('last_name')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="w-full md:w-1/3 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Date de naissance
                                </span>
                                <input wire:model="date_of_birth" type="date" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                @error('date_of_birth')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1/3 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Lieu de naissance
                                </span>
                                <input wire:model="place_of_birth" type="text" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                @error('place_of_birth')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="w-full md:w-1/4 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Sexe
                                </span>
                                <select wire:model="gender" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                    <option>Select a gender...</option>
                                    @foreach(\App\Enums\GenderType::cases() as $gender)
                                    <option value="{{ $gender->value }}">{{ $gender->name }}</option>
                                    @endforeach
                                </select>
                                @error('gender')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="w-full md:w-1/3 mr-4 ml-4">
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
                        <div class="w-full md:w-1/3 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Groupe sanguin
                                </span>
                                <select wire:model="blood_group" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                    <option>Sélectionner un GS...</option>
                                    <option value="A+">A+</option>
                                    <option value="O+">O+</option>
                                    <option value="B+">B+</option>
                                    <option value="AB+">AB+</option>
                                    <option value="A-">A-</option>
                                    <option value="O-">O-</option>
                                    <option value="B-">B-</option>
                                    <option value="AB-">AB-</option>
                                </select>
                                @error('blood_group')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="w-full md:w-1/3 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Email
                                </span>
                                <input wire:model="email" type="email" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                @error('email')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="w-full md:w-1/4 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Téléphone
                                </span>
                                <input type="tel" wire:model="phone" pattern="^\+221\d{9}$" title="Please enter a valid Senegalese phone number starting with +221 followed by 9 digits" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                @error('phone')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-2/3 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Adresse complète
                                </span>
                                <input wire:model="address" type="text" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                @error('address')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="w-full md:w-1/3 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Ville
                                </span>
                                <input wire:model="city" type="text" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                @error('city')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-4/4 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Ecole précédente
                                </span>
                                <input wire:model="previous_school" type="text" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                @error('previous_school')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1/1 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Vaccination
                                </span>
                                <textarea wire:model="medical_history" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"></textarea>
                                @error('medical_history')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1/1 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Allergie et diagnostique
                                </span>
                                <textarea wire:model="allergies" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"></textarea>
                                @error('allergies')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1/1 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Réservé à l'administration
                                </span>
                                <select wire:model="decision" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                    <option>Select a decision...</option>
                                    @foreach(\App\Enums\ClassroomType::cases() as $decision)
                                    <option value="{{ $decision->value }}">{{ $decision->name }}</option>
                                    @endforeach
                                </select>
                                @error('decision')
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
                                <div wire:loading>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="12" y1="2" x2="12" y2="6"></line>
                                        <line x1="12" y1="18" x2="12" y2="22"></line>
                                        <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                                        <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                                        <line x1="2" y1="12" x2="6" y2="12"></line>
                                        <line x1="18" y1="12" x2="22" y2="12"></line>
                                        <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                                        <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                                    </svg>
                                </div>
                            </x-button>
                        </div>
                    </div>
                </x-slot>
            </form>
        </x-dialog-modal>
        <div class="relative max-w-xl focus-within:text-purple-500">
            <div class="absolute inset-y-0 flex items-center pl-2">
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <input wire:model.live="keyword" type="text" class="pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" placeholder="Saisissez votre mot-clé" aria-label="Search" />
        </div>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">
                            Nom
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Sexe</div>
                        </th>
                        <!--th class="px-4 py-3">
                            <div class="flex item-center">Email</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Téléphone</div>
                        </th-->
                        <th class="px-4 py-3">
                            <div class="flex item-center">Date de naissance</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Lieu de naissance</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Classe</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Tuteur</div>
                        </th>
                        <th class="px-4 py-3">&nbsp;</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($students as $student)
                    <tr class="text-gray-700 dark:text-gray-400" wire:key="{{$student->id}}">

                        <td class="px-4 py-3">
                            <x-nav-link href="{{ route('student-show', ['id' => $student->id]) }}" wire:navigate class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full" src="https://www.shareicon.net/data/512x512/2016/07/26/802043_man_512x512.png" alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                </div>
                                <div>
                                    <p>{{ ucwords($student->first_name) }}</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                        {{ strtoupper($student->last_name) }}
                                    </p>
                                </div>
                            </x-nav-link>
                        </td>
                        <td class="px-4 py-3 text-sm">{{ $student->gender }}</td>
                        <!--td class="px-4 py-3 text-sm"><a href="mailto:{{ $student->email }}">{{ $student->email?$student->email:'-' }}</a></td>
                        <td class="px-4 py-3 text-sm">{{ $student->phone?$student->phone:'-' }}</td-->
                        <td class="px-4 py-3 text-sm">{{ \Carbon\Carbon::parse($student->date_of_birth)->format('d M Y') }}, {{ \Carbon\Carbon::parse($student->date_of_birth)->diffForHumans() }}</td>
                        <td class="px-4 py-3 text-sm">{{ $student->place_of_birth }}</td>
                        <td class="px-4 py-3 text-sm">
                            @foreach($student->classrooms as $classroom)
                            Pédago {{ $classroom->type }} {{ $classroom->name }}
                            @break
                            @endforeach
                        </td>
                        <td class="px-4 py-3 text-sm">
                            @foreach($student->tutors as $tutor)
                            @if($tutor->relationship=='Tuteur')
                            {{ ucwords($tutor->first_name) }} {{ strtoupper($tutor->last_name) }}<br>
                            {{ $tutor->phone }}<br>
                            @endif
                            @endforeach
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <x-button type="button" wire:click="$dispatch('edit-student', {id: {{$student->id}}})" class="bg-green-500 hover:bg-green-700" aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </x-button>
                                <x-button type="button" wire:click="deleteStudent({{$student->id}})" wire:confirm="Etes-vous sûr de vouloir supprimer cet élève?" class="bg-red-500 hover:bg-red-700" aria-label="Delete">
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
        <div class="w-full overflow-x-auto px-4 py-3">
            {{ $students->links() }}
        </div>
    </div>
</div>