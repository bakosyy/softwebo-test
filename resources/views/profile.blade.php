@extends('layouts.app')

@section('content')
  @if($message = Session::get('success'))
    <h2 class="text-lg py-3 px-5 bg-green-200 text-green-700 border-l-4 border-green-500 mb-6">{{$message}}</h2>
  @endif
  
  <div class="shadow-xl bg-white text-gray-700">
    <div class="pt-6 pb-14 px-10 flex flex-col">
      <h2 class="mb-6 text-4xl text-center text-gray-700 font-semibold tracking-wide font-arch">{{$user->name}} {{$user->surname}}</h2>
      <p class=""><span class="font-semibold">Username: </span>{{$user->username}} </p>
      <p class=""><span class="font-semibold">Email: </span>{{$user->email}} </p>
      <p class=""><span class="font-semibold">Full Name: </span>{{$user->name}} {{$user->surname}}</p>
      <p class="mb-4"><span class="font-semibold">Visited countries number: </span>{{$user->countries->count()}} </p>
      <div class="self-center pt-2">
        @foreach($user->countries as $country)
          <div class="inline-block text-sm border border-indigo-500 text-indigo-500 px-4 py-1.5 my-0.5 font-bold">
            <a href="{{route('countries.show', $country->id)}}" class="">{{$country->name}}</a>
          </div>
        @endforeach
      </div>
    
    @if($user->id == Auth::user()->id)
      <!-- Manage visited countries -->
        <h1 class="text-lg font-semibold tracking-wide text-gray-600 mt-6">Manage your visited countries</h1>
        <form method="POST" action="{{route('profiles.setCountries', $user->id)}}" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <!-- Countries -->
          <div class="w-1/2">
            <select name="countries[]" id="" multiple class="w-full px-2 py-1 rounded-md outline-none focus:ring-0 text-gray-500 border border-gray-300">
              @foreach($countries as $country)
                <option value="{{$country->id}}"
                    @if(old('$countries') !== NULL && in_array($country->id, old('$countries'))) selected
                    @elseif($user->hasCountries())
                    @if(in_array($country->id, $user->selectedCountries())) selected @endif
                    @endif >
                  {{$country->name}}
                </option>
              @endforeach
            </select>
            
            @error('countries')
            <x-error>{{$message}}</x-error>
            @enderror
          </div>
          
          <!-- Submit button -->
          <div>
            <button class="px-5 py-1.5 rounded-md border border-gray-300 bg-purple-600 text-green-50" type="submit">
              Submit
            </button>
          </div>
        
        </form>
      @endif
    
    </div>
  </div>

@endsection