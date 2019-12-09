<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Client;
use App\Country;
use App\Http\Requests\Client\StoreRequest;
use App\Http\Requests\Client\UpdateRequest;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::with(['country'])->paginate();
        return response()->view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clients = new Client;
        return response()->view('client.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //
        $client = new Client;
        $client->name = $request->input('name');
        $client->last_name = $request->input('last_name');
        $client->email = $request->input('email');
        $client->country_id = $request->input('country');
        $client->status = $request->input('status');

        $client->save();

        return redirect('/clients');
        //return redirect()->route('client.index')->withSuccess(__('Client created successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
        //$customers->load('country');
        return response()->view('client.show', compact('clients'));
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
        $client = Client::findOrFail($id);
        return view('client.edit', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Client $client)
    {
        //
        $client->name = $request->input('name');
        $client->last_name = $request->input('last_name');
        $client->email = $request->input('email');
        $client->country_id = $request->input('country_id');
        
        $country->save();

        return redirect('/clients');

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
    }
}
