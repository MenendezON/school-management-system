<div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        
                        <th class="px-4 py-3">
                            <div class="flex item-center">#</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Nom d'utilisateur</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Email</div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex item-center">Groupe et rôle</div>
                        </th>
                        <th class="px-4 py-3">&nbsp;</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($users as $user)
                    <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-sm">{{ $user->id }}</td>
                    <td class="px-4 py-3 text-sm">{{ $user->name }}</td>
                    <td class="px-4 py-3 text-sm">{{ $user->email }}</td>
                    <td class="px-4 py-3 text-sm">
                        @foreach($user->allTeams() as $team)
                            @if($user->id == 1 || $user->teamRole($team)->name !== 'Owner')
                                <li>{{ $team->name }}({{ $user->teamRole($team)->name }})</li>
                            @endif
                        @endforeach
                    </td>
                    <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <x-button type="button" wire:click="$dispatch('edit-user', {id: {{$user->id}}})" class="bg-green-500 hover:bg-green-700" aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </x-button>
                                <x-button type="button" wire:click="delete({{$user->id}})" wire:confirm="Etes-vous sûr de vouloir supprimer cette utilisateur?" class="bg-red-500 hover:bg-red-700" aria-label="Delete">
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
            {{ $users->links() }}
        </div>
    </div>