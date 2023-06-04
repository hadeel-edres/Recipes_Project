<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.recipes.create') }}"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white"> Neue Rezepte </a>
</div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                
                <th scope="col" class="px-6 py-3">
                Beschreibung
                </th>
                <th scope="col" class="px-6 py-3">
                    Bild
                </th>
                <th scope="col" class="px-6 py-3">
                    
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($recipes as $recipes)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $recipes->name }}
                </td>
                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $recipes->description }}
                </td>
                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   <img src="{{ Storage::url($recipes->image) }}" class="w-16 h-16 rounded">
                </td>
                
                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  <div class= "flex space-x-2">
                  <a href=" {{ route('admin.recipes.edit', $recipes->id) }}" class="py-2 px-4 bg-green-400 hover:bg-green-600 text-white rounded-lg"> Bearbeiten </a>
                  <a href=" {{ route('admin.recipes.show', $recipes->id) }}" class="py-2 px-4 bg-cyan-500 hover:bg-cyan-700 text-white rounded-lg"> Zeigen </a>
                  <form class= "py-2 px-4 bg-red-400 hover:bg-red-600 text-white rounded-lg" method="POST" 
                        action="{{ route('admin.recipes.destroy', $recipes->id) }}" onsubmit="return confirm('Bist du sicher?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Löschen</button>
</form>
                  </div>

                </td>
    </tr>
            @endforeach
        </tbody>
    </table>
</div>
        </div>
    </div>
</x-admin-layout>