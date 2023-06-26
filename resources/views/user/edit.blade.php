<x-guest-layout>
    
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('user.show', ['user_id' => $userrecipe->user_id, 'id' => $userrecipe->id]) }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Zurück</a>
            </div>
            <div class="m-2 p-2 bg-stone-200 rounded">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                <form method="POST" action="{{ route('user.update',['user_id' => $user->id, 'userrecipe' => $userrecipe->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                       
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                            <div class="mt-1">
                                <input type="text" id="name" name="name" value= "{{ $userrecipe->name }}"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />
                            </div>
                            @error('name')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="sm:col-span-6 pt-5">
                            <label for="categories" class="block text-sm font-medium text-gray-700">Kategorien</label>
                            <div class="mt-1">
                            <select id="categories" name="categories[]" class="form-multiselect block w-full mt-1" multiple>
                           @foreach($categories as $category)
                             <option value="{{ $category->id }}" @if($userrecipe->categories->contains($category)) selected @endif>{{ $category->name }}</option>
                             @endforeach
                                 </select>
                                   </div>

    <div class="sm:col-span-6 pt-5">
        <label for="body" class="block text-sm font-medium text-gray-700">Beschreibung</label>
            <div class="mt-1">
                <textarea id="body" rows="3" name="description" 
                    class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('description') border-red-400 @enderror">{{ $userrecipe->description }}</textarea>
                     </div>
                     @error('description')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                            </div>
   
    <div class="sm:col-span-6 pt-5">
    <label for="body" class="block text-sm font-medium text-gray-700">Zutaten</label>
      <div class="mt-1">
        <textarea id="body" rows="3" name="ingredients"  class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('ingredients') border-red-400 @enderror">{{ $userrecipe->ingredients }}</textarea>
      </div>
      @error('ingredients')
            <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
    </div>

    <div class="sm:col-span-6 pt-5">
    <label for="body" class="block text-sm font-medium text-gray-700">Zubereitung</label>
      <div class="mt-1">
        <textarea id="body" rows="3" name="steps"  class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('steps') border-red-400 @enderror">{{ $userrecipe->steps }}</textarea>
      </div>
      @error('steps')
            <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
    </div>
                           
        <div class="sm:col-span-6">
            <label for="image" class="block text-sm font-medium text-gray-700"> Image </label>
            <div>
            <img class="w-32 h-32" src="{{ Storage::url($userrecipe->image) }}">
             </div>
            <div class="mt-1">
                <input type="file" id="image" name="image"
                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('image') border-red-400 @enderror" />
                    </div>
                    @error('image')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
    
                    </div>

            <div class="mt-6 p-4">
            <button type="submit"
                 class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Aktualisieren</button>
                </div>
                    </div>
                    </form>
                </div>
                </div>

            </div>
        </div>
    </div>
    
</x-guest-layout>