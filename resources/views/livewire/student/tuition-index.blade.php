<div class="container-fluid px-6 mx-auto grid">

    @if(session('success'))
    <div class="flex justify-between w-full bg-green-100 rounded-md mt-4 p-4 shadow-xs">
        <span class="text-green-500 text-md">{{ session('success') }}</span>
        <button class="text-green-500" wire:click="removeflash">x</button>
    </div>
    @endif

    <div class="flex">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Tuition fees
        </h2>
    </div>

    <div>
        <x-button wire:click="showCreateTuitionModal" class="mb-2">
            {{ __('New payment') }}
        </x-button>
        <!-- Create classroom modal -->
        <x-dialog-modal wire:model="createTuitionModal">
            <x-slot name="title">
                {{ __('Create classroom') }}
            </x-slot>

            <form>
                <x-slot name="content">
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Student
                                </span>
                                <select wire:model="studentId" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                    <option>Select a type...</option>
                                    @foreach (\App\Models\Student::all() as $student)
                                    <option value="{{ $student->id }}">(Matricule) {{ $student->first_name }} {{ $student->last_name }}</option>
                                    @endforeach
                                </select>
                                @error('studentId')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-1 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Class
                                </span>
                                <select wire:model="classroomId" wire:click="fillSelect" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                    <option>Select a type...</option>
                                    @foreach ($classrooms as $classroom)
                                    <option value="{{ $classroom->id }},{{isset($classroom->pivot->academic_year)?$classroom->pivot->academic_year:''}}">({{isset($classroom->pivot->academic_year)?$classroom->pivot->academic_year:''}}) | {{ $classroom->name }} - {{ $classroom->type }} </option>
                                    @endforeach
                                </select>
                                @error('classroomId')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="flex px-2 my-2">
                        <div class="w-full md:w-2/3 mr-4 ml-4">
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Label
                                </span>
                                <select wire:model="label" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                    <option>Select a type...</option>
                                    @foreach(\App\Enums\LabelType::cases() as $label)
                                    <option value="{{ $label->value }}">{{ $label->name }}</option>
                                    @endforeach
                                </select>
                                @error('label')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="w-full md:w-1/3 mr-4 ml-4">
                        <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Amount
                                </span>
                                <input type="number" wire:model="amount" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                @error('amount')
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
                            <div class="flex item-center">Student</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Classroom</div>
                        </th>
                        <th class="px-4 py-3">Academic year</th>

                        <th class="px-4 py-3">Label</th>
                        <th class="px-4 py-3">Amount</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($students as $student)
                    <tr class="text-gray-700 dark:text-gray-400" wire:key="{{$student->id}}">
                        <td class="px-4 py-3">{{ ucwords($student->first_name) }} {{ strtoupper($student->last_name) }}</td>
                        <td class="px-4 py-3">
                            <x-nav-link href="{{ route('classroom-show', ['id' => $student->id]) }}" wire:navigate>
                            {{ $student->name }}, {{ $student->type }}
                            </x-nav-link>
                        </td>
                        <td class="px-4 py-3">{{ $student->academic_year }}</td>
                        <td class="px-4 py-3">{{ $student->label }}</td>
                        <td class="px-4 py-3">{{ $student->amount }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </button>
                                <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="w-full overflow-x-auto px-4 py-3">
        </div>
    </div>
</div>