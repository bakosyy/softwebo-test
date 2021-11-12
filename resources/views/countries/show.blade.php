@extends('layouts.app')

@section('content')
  <div class="shadow-xl bg-white text-gray-700">
    @if($country->hasImage())
      @if(\Illuminate\Support\Str::startsWith($country->flag, 'http'))
        <img src="{{$country->flag}}" alt="image" class="w-full object-cover">
      @else
        <img src="/{{$country->flag}}" alt="image" class="w-full object-cover">
      @endif
    @endif
    <div class="pt-6 pb-14 px-10 flex flex-col">
      <h2 class="text-4xl text-center text-gray-700 font-semibold tracking-wide font-arch uppercase mb-4">{{$country->name}}</h2>
      <p class="text-center mb-6"><span class="capitalize">{{$country->name}}</span> was visited
        by {{$country->users->count()}} people</p>
      <h3 class="text-lg text-center text-gray-700 font-semibold tracking-wide uppercase mb-4">Visitors:</h3>
      <div class="mb-8 divide-x divide-cyan-300">
        @forelse($country->users as $user)
          <div class="inline-block px-6">
            <a href="{{route('profiles.show', $user->id)}}" class="text-cyan-400 font-semibold">{{$user->name}}</a>
          </div>
        @empty
          <h2 class="text-4xl -mb-6 self-start">No visitors found</h2>
        @endforelse
      </div>
    </div>
  </div>

@endsection