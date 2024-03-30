<div class="container px-6 mx-auto grid">
    <form>

        @if(session('success'))
        <div class="flex justify-between w-full bg-green-100 rounded-md mt-4 p-4 shadow-xs">
            <span class="text-green-500 text-md">{{ session('success') }}</span>
            <button class="text-green-500" wire:click="removeflash">x</button>
        </div>
        @endif

        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-8 xl:grid-cols-16">
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                    </svg>
                </div>
                <div class="">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Questionnaire : {{ $survey->title }}</h2>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ $survey->description }}
                    </p>
                    <p class="text-lg text-gray-700 dark:text-gray-200">
                        <span class="font-semibold">Elève : </span>{{ $student->first_name }} {{ $student->last_name }}
                    </p>
                    <p class="text-lg text-gray-700 dark:text-gray-200">
                        <span class="font-semibold">Classe : </span>Pédago {{ $classroom->value('type') }} {{ $classroom->value('name') }}
                    </p>
                    <div>
                        <select wire:model="quarter" class="block w-24 mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option>Sélectionner une valeur...</option>
                            @foreach(range(1, 3) as $number)
                            <option value="{{ $number }}">{{ $number }}e trimestre</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>


        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th colspan="2" class="px-4 py-3">
                                <div class="flex item-center">Question</div>
                            </th>
                            <th class="px-4 py-3">Choisir une réponse</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach($categories as $category)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td colspan="5" class="px-4 py-3 text-sm font-semibold">{{ $category }}</td>
                            <td>&nbsp;</td>
                        </tr>
                        @foreach($survey->questions as $index => $question)
                        @if ($question->category === $category )
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td>&nbsp;</td>
                            <td class="px-4 py-3 text-sm">{{ $question->id }} {{ $question->question_text }}</td>
                            <td class="px-4 py-3 text-sm">
                                <select wire:model="option.{{ $index }}.{{ $question->id }}" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                    <option>Sélectionner une valeur...</option>
                                    @foreach(\App\Enums\SurveyValue::cases() as $type)
                                    <option value="{{ $type->value }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('option.{{ $index }}.{{ $question->id }}')
                                <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        @endif
                        @endforeach

                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="w-full overflow-x-auto px-4 py-3">
                <div class="px-2 my-2">
                    <div class="w-full md:w-3/3 mr-4 ml-4">
                        <button type="submit" wire:click.prevent="save">{{ __('Valider') }}</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>