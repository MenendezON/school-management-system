<div class="container-fluid px-6 mx-auto grid">

    @if(session('success'))
    <div class="flex justify-between w-full bg-green-100 rounded-md mt-4 p-4 shadow-xs">
        <span class="text-green-500 text-md">{{ session('success') }}</span>
        <button class="text-green-500" wire:click="removeflash">x</button>
    </div>
    @endif

    <div class="flex">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Année académique
        </h2>
    </div>

    <div>
        <x-button wire:click="showCreateStudentClassroomModal" class="mb-2">
            {{ __('Nouvelle classe') }}
        </x-button>
        <!-- Create classroom modal -->
        <x-dialog-modal wire:model="createStudentClassroomModal">
            <x-slot name="title">
                {{ __('Créer une nouvelle classe') }}
            </x-slot>

            <form>
                <x-slot name="content">
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1/1mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Student
                                </span>
                                <select wire:model.live="selectStudent" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                    <option>Sélectionner un élève</option>
                                    @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }} </option>
                                    @endforeach
                                </select>
                                @error('selectStudent')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1/1mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Classroom
                                </span>
                                <select wire:model.live="selectClassroom" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                    <option>Sélectionner une classe</option>
                                    @foreach ($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                    @endforeach
                                </select>
                                @error('selectClassroom')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1/1mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    School Year
                                </span>
                                <select wire:model.live="academic_year" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                    <option>Sélectionner une année scolaire</option>
                                    @foreach($generateSchoolYears as $year)
                                    <option>{{ $year }}-{{ $year+1 }}</option>
                                    @endforeach
                                </select>
                                @error('academic_year')
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
                            <div class="flex item-center">Student</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Classroom</div>
                        </th>
                        <th class="px-4 py-3">Academic year</th>
                        <th class="px-4 py-3">Observations</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($liststudents as $student)
                    @foreach ($student->classrooms as $classroom)
                    <tr class="text-gray-700 dark:text-gray-400" wire:key="{{$student->id}}">
                        <td class="px-4 py-3">{{ ucwords($student->first_name) }} {{ strtoupper($student->last_name) }}</td>
                        <td class="px-4 py-3">
                            <x-nav-link href="{{ route('classroom-show', ['id' => $classroom->id]) }}" wire:navigate>
                                {{ $classroom->name }}, {{ $classroom->type }}
                            </x-nav-link>
                        </td>
                        <td class="px-4 py-3">{{ $classroom->pivot->academic_year }}</td>
                        <td class="px-4 py-3">{{ $classroom->pivot->observations?$classroom->pivot->observations:'-' }}</td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="w-full overflow-x-auto px-4 py-3">
            {{ $liststudents->links() }}
        </div>
    </div>
</div>