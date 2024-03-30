<div class="container-fluid px-6 mx-auto grid">

    @if(session('success'))
    <div class="flex justify-between w-full bg-green-100 rounded-md mt-4 p-4 shadow-xs">
        <span class="text-green-500 text-md">{{ session('success') }}</span>
        <button class="text-green-500" wire:click="removeflash">x</button>
    </div>
    @endif

    <div class="flex">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Liste des élèves
        </h2>
    </div>

    <div>
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
                                <input wire:model="first_name" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
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
                                    <option value="Senegal">Senegal</option>
                                    <option value="Haiti">Haiti</option>
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
                        <div class="w-full md:w-1 mr-4 ml-4">
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
                        <div class="w-full md:w-1 mr-4 ml-4">
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
                        <div class="w-full md:w-1 mr-4 ml-4">
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
                        <div class="w-full md:w-1 mr-4 ml-4">
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
                            Nom
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Sexe</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Email</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Téléphone</div>
                        </th>
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
                        <td class="px-4 py-3 text-sm">{{ $student->gender? 'Male':'Female' }}</td>
                        <td class="px-4 py-3 text-sm"><a href="mailto:{{ $student->email }}">{{ $student->email?$student->email:'-' }}</a></td>
                        <td class="px-4 py-3 text-sm">{{ $student->phone?$student->phone:'-' }}</td>
                        <td class="px-4 py-3 text-sm">{{ \Carbon\Carbon::parse($student->date_of_birth)->format('d M Y') }}, {{ \Carbon\Carbon::parse($student->date_of_birth)->diffForHumans() }}</td>
                        <td class="px-4 py-3 text-sm">{{ $student->place_of_birth }}</td>
                        <td class="px-4 py-3 text-sm">
                            @foreach($student->classrooms as $classroom)
                              Pédago {{ $classroom->type }} {{ $classroom->name }}
                              @break
                            @endforeach
                        </td>
                        @foreach($student->tutors as $tutor)
                        <td class="px-4 py-3 text-sm">{{ $tutor->relationship=='Tuteur'?$tutor->first_name:'' }} {{ $tutor->relationship=='Tuteur'?strtoupper($tutor->last_name):'' }}</td>
                        @endforeach
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