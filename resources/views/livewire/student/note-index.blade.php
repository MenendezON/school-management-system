<div>
    <div class="container-fluid px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard
        </h2>


        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="table-auto w-full">
                    <thead>
                        <tr class="flex text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="w-1/9">#</th>
                            <th class="w-1/9">First name</th>
                            <th class="w-1/9">Last name</th>
                            <th class="w-1/9">Compo 1</th>
                            <th class="w-1/9">Finale 1</th>
                            <th class="w-1/9">Compo 2</th>
                            <th class="w-1/9">Finale 2</th>
                            <th class="w-1/9">Compo 3</th>
                            <th class="w-1/9">Finale 3</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach($classroomID as $student)
                        <tr class="text-gray-700 dark:text-gray-400 flex" wire:key="{{$student->id}}">
                            <td class="w-1/9">#</td>
                            <td class="w-1/9">First name</dh>
                            <td class="w-1/9">Last name</td>
                            <td class="w-1/9">Compo 1</td>
                            <td class="w-1/9">Finale 1</td>
                            <td class="w-1/9">Compo 2</td>
                            <td class="w-1/9">Finale 2</td>
                            <td class="w-1/9">Compo 3</td>
                            <td class="w-1/9">Finale 3</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>