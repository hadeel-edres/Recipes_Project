<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid lg:grid-cols-4 gap-y-6">
            @foreach ($category->recipes as $recipe)
                <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                    <img class="w-full h-48" src="{{ Storage::url($recipe->image) }}" alt="Image" />
                    <div class="px-6 py-4">
                        <h4 class="mb-3 text-xl font-semibold tracking-tight text-indigo-500 uppercase">
                            {{ $recipe->name }}</h4>
                            <div class="mb-3 text-l font-semibold tracking-tight text-indigo-500 hover:text-indigo-400">
                    <a href="{{ route('categories.recipeshow', [$category->id, $recipe->id]) }}">
                            <h4>Rezeptdetails &#10140;</h4> 
                        </a>
                    </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="flex m-2 p-2">
                <a href="{{ route('categories.index') }}"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-400 rounded-lg text-white"> Zurück</a>
            </div>
    </div>
    
</x-guest-layout>