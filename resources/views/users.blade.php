@extends('layouts.app')

@section('content')
  <div class="space-y-2 mb-8 flex flex-col items-center">
    @forelse($users as $user)
      <a href="{{route('profiles.show', $user->id)}}" class="text-cyan-400 font-semibold">{{$user->name}}</a>
    @empty
      <h2 class="text-4xl -mb-6 self-start">No users found</h2>
    @endforelse
  </div>
@endsection