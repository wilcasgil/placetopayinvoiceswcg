<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\Client\StoreRequest;
use App\Http\Requests\Client\UpdateRequest;
//use Illuminate\Http\Request;

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
        $clients = Client::all();
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
        //$clients->status = $request->input('status');

        $client->save();

        return redirect('/clients');        
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
        $client->name = $request->get('name');
        $client->last_name = $request->get('last_name');
        $client->email = $request->get('email');

        /* $client->name = $request->input('name');
        $client->last_name = $request->input('last_name');
        $client->email = $request->input('email');  */      
        
        $client->save();

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
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect('/clients');
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
        $client = Client::findOrFail($id);
        return view('client.confirmDelete', [
            'client' => $client
        ]);
    }
}
