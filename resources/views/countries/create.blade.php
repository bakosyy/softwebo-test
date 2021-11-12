@extends('layouts.app')

@section('content')
  <!-- Page title -->
  <h1 class="text-2xl font-semibold tracking-wide text-gray-600">Add new country</h1>
  <form method="POST" action="{{route('countries.store')}}" enctype="multipart/form-data" class="space-y-5">
  @csrf
  <!-- Title -->
    <div class="space-y-2">
      <label class="" for="">Name</label>
      <div class="w-3/5">
        <input type="text" name="name" placeholder="Type country.." value="{{old('name')}}" class="w-full px-2 py-1 rounded-md placeholder-gray-300 outline-none focus:ring-0 text-gray-500 border border-gray-300">
        @error('name')
        <x-error>{{$message}}</x-error>
        @enderror
      </div>
    </div>
    
    <!-- Image -->
    <div class="space-y-2">
      <label class="" for="">Flag</label>
      <div class="w-1/2">
        <input type="file" name="flag" placeholder="Image" class="w-full px-2 py-1 rounded-md outline-none focus:ring-0 text-gray-500 border border-gray-300">
        @error('flag')
        <x-error>{{$message}}</x-error>
        @enderror
      </div>
    </div>
    
    <!-- Submit button -->
    <div class="space-y-2">
      <div class="">
        <button class="px-5 py-1.5 rounded-md border border-gray-300 bg-purple-600 text-green-50" type="submit">
          Add
        </button>
      </div>
    </div>
  </form>

@endsection
