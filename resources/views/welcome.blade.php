<title>Rec.ipe</title>
@laravelPWA
<x-guest-layout>
        <!-- Main Hero Content -->
    <div
      class="container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center"
      style="background-image: url('https://cdn.pixabay.com/photo/2016/02/05/15/34/pasta-1181189_960_720.jpg')">
      <h1
        class="font-mono text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 to-fuchsia-400 md:text-center sm:leading-none lg:text-5xl">
        <span class="inline md:block"> REC.IPE FOODBLOG</span>
      </h1>
      <div class="mx-auto mt-2 text-green-50 md:text-center lg:text-lg">
      Willkommen auf unserer internationalen Food-Blog-Webseite!<br>
      Tauchen Sie ein in eine kulinarische Reise um die Welt und entdecken Sie eine Vielzahl von köstlichen Gerichten,<br> 
      inspirierenden Rezepten und faszinierenden Geschichten über die vielfältigen Esskulturen unserer Erde.
      </div>
      <div class="flex flex-col items-center mt-12 text-center">
        <h2 class="text-white"> Melden Sie sich oder registrieren Sie, um ein Rezept hinzufügen zu können. <a href="/register" class="text-indigo-500 underline dark:text-indigo-500 hover:no-underline hover:text-blue-400">registrieren</a>
          <br>
          <br>
        <span class="relative inline-flex w-full md:w-auto">
        @if(auth()->check()) <!-- Überprüft, ob der Benutzer angemeldet ist -->
        <a href="{{ route('recipes.creat')}}" type="button" class="inline-flex items-center justify-center px-6 py-2 text-base font-bold leading-6 text-white bg-indigo-500 hover:bg-indigo-400 rounded-full w-full md:w-auto focus:outline-none">
         Rezept hinzufügen
       </a>

          @endif
      </div>
    </div>
    <!-- End Main Hero Content -->
<section class="mt-8 bg-stone-200">
            <div class=" mt-4 text-center">
              <h3 class="text-4xl text-indigo-500 font-bold">User Rezepte </h3>
            </div>
            <div class="container w-full px-5 py-6 mx-auto">
             <div class="grid lg:grid-cols-4 gap-y-6">
        @foreach($userrecipes as $userrecipe)
        <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
           <a href="#">
        <img class="rounded-t-lg" src="{{ Storage::url($userrecipe->image) }}" alt="" />
    </a>
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-indigo-500 dark:text-indigo-500">{{$userrecipe->name}}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$userrecipe->description}}</p>
        <div class="flex flex-warp p-2">
          @foreach($userrecipe->categories as $category)
          <span class="text-sm font-semibold text-indigo-500 ">#{{ $category->name }}</span>
          @endforeach
         </div>
         
        <a href="{{ route('user.show', ['user_id' => $user->id, 'id' => $userrecipe->id]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-indigo-500 rounded-lg hover:indigo-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:indigo-500 dark:hover:indigo-600 dark:focus:ring-indigo-500">
            View Rezeptdetails
            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </a>
    </div>
  </div>
        @endforeach
     </div>
      </div>
</section>

<section class="py-20 bg-stone-200">
      <div class="container items-center max-w-6xl px-4 px-10 mx-auto sm:px-20 md:px-32 lg:px-16">
        <div class="flex flex-wrap items-center -mx-3">
          <div class="order-1 w-full px-3 lg:w-1/2 lg:order-0">
            <div class="w-full lg:max-w-md">
              <h2 class="mb-4 text-2xl font-bold">About Us</h2>
              <h2
                class="mb-4 text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
                WHY CHOOSE US?</h2>

              <p class="mb-4 font-medium tracking-tight text-gray-400 xl:mb-6">Unser Food-Blog ist ein Treffpunkt für alle Liebhaber der internationalen Küche.<br>
               Hier finden Sie eine reiche Auswahl an Gerichten aus verschiedenen Ländern und Regionen,<br> von exotischen Spezialitäten bis hin zu beliebten Klassikern. Unsere leidenschaftlichen Autoren teilen ihre Expertise und Leidenschaft für gutes Essen,
                 während sie Ihnen wertvolle Tipps, Tricks und Anleitungen zur Zubereitung authentischer internationaler Gerichte geben.</p>
              <ul>
                <li class="flex items-center py-2 space-x-4 xl:py-3">
                  <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z">
                    </path>
                  </svg>
                  <span class="font-medium text-gray-500">Faster Processing and Delivery</span>
                </li>
                <li class="flex items-center py-2 space-x-4 xl:py-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <span class="font-medium text-gray-500">Easy Payments</span>
                </li>
                <li class="flex items-center py-2 space-x-4 xl:py-3">
                  <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                    </path>
                  </svg>
                  <span class="font-medium text-gray-500">100% Protection and Security for Your App</span>
                </li>
              </ul>
            </div>
          </div>
          <div class="w-full px-3 mb-12 lg:w-1/2 order-0 lg:order-1 lg:mb-0">
 <div class="mb-4">
  <img
    src="https://images.unsplash.com/photo-1504754524776-8f4f37790ca0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
    class="h-auto max-w-full rounded-full hover:scale-110"
    alt="" />
 </div>
  <br>
   <div class="mb-4">
    <img
    src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
    class="h-auto max-w-full rounded-full hover:scale-110"
    alt="" />
    </div>
    </div>
        </div>
      </div>
    </section>

<section class="mt-8 bg-violet-100">
   <div class="mt-4 text-center">
  <br>
            <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 to-fuchsia-400">
                BESONDERES BELIEBT</h2>
                <h4>Diese internationalen Rezepte sind nur eine kleine Auswahl der vielfältigen kulinarischen Genüsse,<br> die die Welt zu bieten hat.</h4>
        </div>
  <div class="container w-full px-5 py-6 mx-auto">
    <div class="grid lg:grid-cols-4 gap-y-6">
      @if($specials !== null && $specials->recipes->count() > 0)
        @foreach($specials->recipes as $recipe)
          <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
            <img class="w-full h-48" src="{{ Storage::url($recipe->image) }}" alt="Image" />
            <div class="px-6 py-4 bg-white">
              <h4 class="mb-3 text-xl font-semibold tracking-tight text-indigo-500 uppercase">{{ $recipe->name }}</h4>
              <p class="text-sm font-semibold text-indigo-500 ">{{ $recipe->description }}</p>  
                        <br>  
              <div class="mb-3 text-l font-semibold tracking-tight text-indigo-500 hover:text-indigo-400">
              <a href="{{ route('categories.recipeshow', [$specials->id, $recipe->id]) }}">
                      <h4>Rezeptdetails &#10140;</h4>
                  </a>
                    </div>
            </div>
          </div>
        @endforeach
      @else
        <p>Keine Rezepte gefunden.</p>
      @endif
    </div>
  </div>
</section>

  <section class="pt-4 pb-12 bg-fuchsia-100">
      <div>
      <div class="my-9 text-center">
        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
          Food Gallery</h2>
      </div> 
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    <div class="grid gap-4">
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://images.unsplash.com/photo-1586511934875-5c5411eebf79?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&q=80" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://images.unsplash.com/photo-1592417817098-8fd3d9eb14a5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&q=80" alt="">
        </div>
    </div>
    <div class="grid gap-4">
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://plus.unsplash.com/premium_photo-1666649675527-6a7859752c53?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://images.unsplash.com/photo-1534080564583-6be75777b70a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="">
        </div>
    </div>
    <div class="grid gap-4">
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://images.unsplash.com/photo-1594212699903-ec8a3eca50f5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1171&q=80" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://images.unsplash.com/photo-1544025162-d76694265947?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1169&q=80" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://images.unsplash.com/photo-1455619452474-d2be8b1e70cd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="">
        </div>
    </div>
    <div class="grid gap-4">
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&q=80" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://plus.unsplash.com/premium_photo-1672363353887-d5a9d1a3c8c3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&q=80" alt="">
        </div>
    </div>
</div>
</div>

</section>

</x-guest-layout>