<x-guest-layout>
    <div class="container items-center max-w-6xl px-4 px-10 mx-auto sm:px-20 md:px-32 lg:px-16">
        <div class="flex flex-wrap items-center -mx-3">
            <div class="order-1 w-full px-3 lg:w-1/2 lg:order-0">
                <div class="w-full lg:max-w-md">
                    <br>
                    @if ($recipe)
                        <img src="{{ Storage::url($recipe->image) }}" alt="Image" />
                        <div class="px-6 py-4">
                            <h1 class="mb-3 text-xl font-semibold tracking-tight text-indigo-500 uppercase">
                                {{ $recipe->name }}</h1>
                            <h3 class="mb-3 text-xl font-semibold tracking-tight text-black"> Beschreibung </h3>
                            <p class="leading-normal text-gray-700">
                                {{ $recipe->description }}
                            </p>
                            <br>
                            <h3 class="mb-3 text-xl font-semibold tracking-tight text-black"> Zutaten </h3>
                            <p class="leading-normal text-gray-700">
                                {{ $recipe->ingredients }}
                            </p>
                            <br>
                            <h3 class="mb-3 text-xl font-semibold tracking-tight text-black"> Zubereitung </h3>
                            <p class="leading-normal text-gray-700">
                                {{ $recipe->steps }}
                            </p>
                        </div>
                        <div class="flex m-2 p-2">
    <a href="/rec.ipe" class="px-4 py-2 h-auto bg-indigo-500 hover:bg-indigo-400 rounded-lg text-white">Zurück</a>
    &nbsp;&nbsp;
    @auth
        <a href="{{ route('user.edit', ['user_id' => $recipe->user_id, 'userrecipe' => $recipe->id]) }}" class="px-4 py-2 h-auto bg-green-400 hover:bg-green-600 rounded-lg text-white">Bearbeiten</a>
    @endauth
    &nbsp;&nbsp;
    @auth
        @if(Auth::user()->is_admin)
            <form class="py-2 px-4 bg-red-400 hover:bg-red-600 text-white rounded-lg" method="POST" action="{{ route('user.destroy', ['user_id' => $recipe->user_id, 'userrecipe' => $recipe->id]) }}" onsubmit="return confirm('Bist du sicher?');">
                @csrf
                @method('DELETE')
                <button type="submit">Löschen</button>
            </form>
        @endif
    @endauth
</div>

                    @else
                        <p>Kein Rezept gefunden.</p>
                    @endif
                    
                </div>
                
            </div>
        </div>
    </div>
</x-guest-layout>
