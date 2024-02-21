<div class="container-fluid px-6 mx-auto grid">

    @if(session('success'))
    <div class="flex justify-between w-full bg-green-100 rounded-md mt-4 p-4 shadow-xs">
        <span class="text-green-500 text-md">{{ session('success') }}</span>
        <button class="text-green-500" wire:click="removeflash">x</button>
    </div>
    @endif
<div class="container px-6 mx-auto grid">

    <div class="flex">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Add student {{ $gender}} {{$country}}
        </h2>
    </div>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <form wire:submit="addstudent">
            <div class="flex px-6 my-6">
                <div class="w-full md:w-1/4 mr-4 ml-4">
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            First name
                        </span>
                        <input wire:model="first_name" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                        @error('first_name')
                        <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div class="w-full md:w-1/4 mr-4 ml-4">
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Last name
                        </span>
                        <input wire:model="last_name" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                        @error('last_name')
                        <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div class="w-full md:w-1/4 mr-4 ml-4">
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Date of birth
                        </span>
                        <input wire:model="date_of_birth" type="date" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                        @error('date_of_birth')
                        <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div class="w-full md:w-1/4 mr-4 ml-4">
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Place of birth
                        </span>
                        <input wire:model="place_of_birth" type="text" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                        @error('place_of_birth')
                        <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
            </div>
            <div class="flex px-6 my-6">
                <div class="w-full md:w-1/4 mr-4 ml-4">
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            City
                        </span>
                        <input wire:model="city" type="text" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                        @error('city')
                        <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div class="w-full md:w-1/4 mr-4 ml-4">
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Country
                        </span>
                        <select wire:model="country" defaultValue="placeholder" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="placeholder" disabled>Chose from the list</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Haiti">Haiti</option>
                        </select>
                        @error('country')
                        <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div class="w-full md:w-1/4 mr-4 ml-4">
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Gender
                        </span>
                        <select wire:model="gender" defaultValue="placeholder" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="placeholder" disabled>Chose from the list</option>
                            <option value="1">Male</option>
                            <option value="0">Female</option>
                        </select>
                        @error('gender')
                        <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div class="w-full md:w-1/4 mr-4 ml-4">
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Phone number
                        </span>
                        <input type="tel" wire:model="phone" pattern="^\+221\d{9}$" title="Please enter a valid Senegalese phone number starting with +221 followed by 9 digits" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                        @error('phone')
                        <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
            </div>
            <div class="flex px-6 my-6">
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
                <div class="w-full md:w-2/3 mr-4 ml-4">
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Full address
                        </span>
                        <input wire:model="address" type="text" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                        @error('address')
                        <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
            </div>
            <div class="px-6 my-6">
                <div class="w-full md:w-1/3 mr-4 ml-4">
                    <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Add student
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>