<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('country.index', [
            'countries' => Country::all()
            //'countries' => Country::all()->paginate()
        ]);

        //$countries = Country::with(['city', 'role'])->paginate();
        //return response()->view('countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validData = $request->validate([
            'name' => 'required|between:3,100|regex:/^[\pL\s\-]+$/u|unique:countries'
        ]);
        $country = new Country();
        $country->name = $request->get('name');
        $country->save();

        return redirect('/countries');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('country.show', [
            'country' => $country
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $country = Country::findOrFail($id);
        return view('country.edit', [
            'country' => $country
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validData = $request->validate([
            'name' => 'required|min:3|alpha|max:100'
        ]);
        $country = Country::findOrFail($id);
        $country->name = $request->get('name');
        $country->save();
        return redirect('/countries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $country = Country::findOrFail($id);
        $country->delete();
        return redirect('/countries');
    }
    
    /**
     * confirmDelete
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function confirmDelete($id)
    {
        $country = Country::findOrFail($id);
        return view('country.confirmDelete', [
            'country' => $country
        ]);
    }
}
