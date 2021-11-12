<?php

namespace App\Http\Controllers;

use App\Exports\CountriesExport;
use App\Http\Requests\CountryStoreRequest;
use App\Models\Country;
use Maatwebsite\Excel\Facades\Excel;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::with('users')->orderBy('id', 'desc')->paginate(5);
        return view('homepage', compact('countries'));
    }

    public function export()
    {
        $countries = Country::all();

        return Excel::download(new CountriesExport(), 'countries.xlsx');
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(CountryStoreRequest $request)
    {
        Country::store($request->validated());
        return redirect()->route('homepage')->with(['success' => 'Country added']);
    }

    public function show(Country $country)
    {
        return view('countries.show', [
            'country' => $country->load('users')
        ]);
    }
}
