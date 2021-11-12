<nav class="absolute top-20 inset-x-0 py-5 bg-gray-100 shadow-md border-b border-gray-300">
  <div class="container mx-auto max-w-7xl flex">
    <!-- Links -->
    <div class="flex space-x-10 mr-auto sm:pl-6">
      <x-nav-link :href="route('homepage')" :active="request()->routeIs('homepage')">Countries</x-nav-link>
      <x-nav-link :href="route('profiles')" :active="request()->routeIs('profiles')">Profiles</x-nav-link>
      @auth
        <x-nav-link :href="route('profiles.show', Auth::user()->id)" :active="request()->routeIs('profiles.show')">My
          Profile
        </x-nav-link>
      @endauth
    
    </div>
    <!-- Socials -->
    <div class="flex space-x-5 sm:pr-11">
      <a href="#" class=""><img src="{{asset('assets/svgs/facebook.svg')}}" alt="facebook-logo" class="h-5"></a>
      <a href="#" class=""><img src="{{asset('assets/svgs/twitter.svg')}}" alt="twitter-logo" class="h-5"></a>
      <a href="#" class=""><img src="{{asset('assets/svgs/email.svg')}}" alt="email" class="h-5"></a>
    </div>
  </div>
</nav>