<div>
    <div class="container-fluid px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard
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
                    <h2 class="my-6 mb-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">{{ $classroom->value('name') }}</h2>
                    <h3>Type: {{ $classroom->value('type') }}</h3>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Total: {{ $classroom->count() }} students
                    </p>
                    </p>
                </div>
            </div>
            <div>
                <select wire:model.live="yearfilter" class="block mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    @foreach($generateSchoolYears as $year)
                    <option>{{ $year }}-{{ $year+1 }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">
                                <div class="flex item-center">#</div>
                            </th>
                            <th class="px-4 py-3">
                                <div class="flex item-center">First name</div>
                            </th>
                            <th class="px-4 py-3">
                                <div class="flex item-center">Last name</div>
                            </th>
                            <th class="px-4 py-3">
                                <div class="flex item-center">Gender</div>
                            </th>
                            <th class="px-4 py-3">
                                <div class="flex item-center">Email</div>
                            </th>
                            <th class="px-4 py-3">
                                <div class="flex item-center">Phone</div>
                            </th>
                            <th class="px-4 py-3">
                                <div class="flex item-center">Date and place of birth</div>
                            </th>
                            <th class="px-4 py-3">Last updated</th>
                            <th class="px-4 py-3">Created by</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach($classroom as $student)
                        <tr class="text-gray-700 dark:text-gray-400" wire:key="{{$student->id}}">
                            <td class="px-4 py-3">{{ $student->id }}</td>
                            <td class="px-4 py-3">{{ ucwords($student->first_name) }}</td>
                            <td class="px-4 py-3 text-sm">{{ strtoupper($student->last_name) }}</td>
                            <td class="px-4 py-3 text-sm">{{ $student->gender? 'Male':'Female' }}</td>
                            <td class="px-4 py-3 text-sm"><a href="mailto:{{ $student->email }}">{{ $student->email }}</a></td>
                            <td class="px-4 py-3 text-sm">{{ $student->phone }}</td>
                            <td class="px-4 py-3 text-sm">{{ $student->date_of_birth }}, {{ $student->place_of_birth }}</td>
                            <td class="px-4 py-3 text-sm">{{ $student->updated_at }}</td>
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
        </div>
    </div>
</div>