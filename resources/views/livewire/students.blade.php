<div class="container-fluid px-6 mx-auto grid">
    <div class="flex">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard hello
        </h2>
    </div>
    <div class="px-6 my-6">
            <button class="flex items-center justify-between w-20 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Create new student
                <span class="ml-2" aria-hidden="true">+</span>
            </button>
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
                    @foreach($students as $student)
                    <tr class="text-gray-700 dark:text-gray-400" wire:key="{{$student->id}}">
                        <td class="px-4 py-3">{{ $student->id }}</td>
                        <td class="px-4 py-3">{{ $student->first_name }}</td>
                        <td class="px-4 py-3 text-sm">{{ $student->last_name }}</td>
                        <td class="px-4 py-3 text-sm">{{ $student->gender? 'Male':'Female' }}</td>
                        <td class="px-4 py-3 text-sm"><a href="mailto:{{ $student->email }}">{{ $student->email }}</a></td>
                        <td class="px-4 py-3 text-sm">{{ $student->phone }}</td>
                        <td class="px-4 py-3 text-sm">{{ $student->date_of_birth }}, {{ $student->place_of_birth }}</td>
                        <td class="px-4 py-3 text-sm">{{ $student->updated_at->diffForHumans() }}</td>
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
            {{ $students->links() }}
        </div>
    </div>
</div>