@extends('layouts.app')

@section('content')
  <div class="space-y-16 mb-8">
    @if($message = Session::get('success'))
      <h2 class="text-lg py-3 px-5 bg-green-200 border-l-4 border-green-500 -mb-8">{{$message}}</h2>
    @endif
    
    <div class="flex justify-center items-center -mt-5 -mb-7 space-x-4">
      @auth
        <a href="{{route('countries.create')}}" class="py-2 px-4 bg-pink-200 text-pink-800 text-lg font-semibold rounded-md">
          Add new country
        </a>
      @endauth
      <a href="{{route('countries.export')}}" class="py-2 px-4 bg-blue-200 text-blue-800 text-lg font-semibold rounded-md">
        Export countries
      </a>
    </div>
    
    @forelse($countries as $country)
      <div class="shadow-xl bg-white">
        @if($country->hasImage())
          @if(\Illuminate\Support\Str::startsWith($country->flag, 'https'))
            <img src="{{$country->flag}}" alt="image" class="w-full h-96 object-cover">
          @else
            <img src="/{{$country->flag}}" alt="image" class="w-full h-96 object-cover">
          @endif
        @endif
        <div class="pt-6 pb-10 px-10 flex flex-col">
          <a href="{{route('countries.show', $country->id)}}">
            <h2 class="text-4xl text-center text-gray-700 font-semibold tracking-wide font-arch uppercase">{{$country->name}}</h2>
          </a>
          <p class="mt-3 mb-5 text-center">This country was visited by <b>{{$country->users->count()}}</b> people</p>
          <a href="{{route('countries.show', $country->id)}}" class="self-center px-2 py-1 border text-lg border-cyan-600 text-cyan-600 font-medium">
            Read more
          </a>
        </div>
      </div>
    @empty
      <h2 class="text-4xl -mb-6">No countries found</h2>
    @endforelse
  </div>
  {{$countries->links()}}
@endsection