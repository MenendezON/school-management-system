<div class="container px-6 mx-auto grid">
    <form>

        @if(session('success'))
        <div class="flex justify-between w-full bg-green-100 rounded-md mt-4 p-4 shadow-xs">
            <span class="text-green-500 text-md">{{ session('success') }}</span>
            <button class="text-green-500" wire:click="removeflash">x</button>
        </div>
        @endif

        <!-- Card -->
        <div class="flex items-center p-4 mt-8 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                </svg>
            </div>
            <div>
                <h2 class="my-3 text-2xl font-semibold text-gray-700 dark:text-gray-200">Questionnaire : {{ $survey->title }}</h2>
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
                    <select wire:model="quarter" class="block w-24 mt-1 text-sm rounded dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option>Sélectionner une valeur...</option>
                        @foreach(range(1, 3) as $number)
                        <option value="{{ $number }}">{{ $number }}e trimestre</option>
                        @endforeach
                    </select>
                    @error('quarter')
                    <span class="text-xs text-red-600 dark:text-gray-400">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs pt-4">
            <div class="w-full overflow-x-auto">
                <!-- Accordion Item 2 -->
                @foreach($categories as $category)
                <div class="accordion-item mb-4">
                    <x-button class="accordion-button w-full text-left py-2 px-4 bg-gray-200 hover:bg-gray-300 rounded-lg" onclick="toggleAccordion(event, this)">
                        {{ $category }}
                    </x-button>
                    <div class="accordion-content hidden mt-2 p-4 border border-t-0 border-gray-200 rounded-b-lg">
                        <table class="w-full whitespace-no-wrap">
                            @foreach($survey->questions as $index => $question)
                            @if ($question->category === $category )
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>&nbsp;</td>
                                <td class="px-4 py-3 text-sm">{{ $question->question_text }}</td>
                                <td class="px-4 py-3 text-sm">
                                    <select wire:model.live="option.{{ $index }}.{{ $question->id }}" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                        <option value="0" selected>Non_eval</option>
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
                        </table>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="w-full overflow-x-auto py-3">
                <div class="w-full overflow-x-auto">
                    <x-button type="submit" wire:click.prevent="save">{{ __('Valider') }}</x-button>
                </div>
            </div>
    </form>
</div>