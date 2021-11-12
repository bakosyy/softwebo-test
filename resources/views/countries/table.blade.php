@extends('layouts.app')

@section('content')
  
  <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
    <tr>
      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        No.
      </th>
      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Country Name
      </th>
      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Image Link
      </th>
    </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
    @foreach($countries as $country)
      <tr>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
          {{$loop->iteration}}
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
          {{$country->name}}
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
          {{$country->flag}}
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>

@endsection