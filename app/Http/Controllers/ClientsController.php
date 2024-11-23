<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Clients::latest()->paginate(5);

        return view('clients.index', compact('clients'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'contactno' => 'required',
            'client_tin' => 'required'
        ]);

        Clients::create($request->all());

        return redirect()->route('clients.index')
            ->with('success', 'Client details added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $clientID
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $clientID
     * @return \Illuminate\Http\Response
     */
    public function edit(Clients $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $clientID
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clients $client)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'contactno' => 'required',
            'client_email' => 'required'
        ]);
        $client->update($request->all());

        return redirect()->route('clients.index')
            ->with('success', 'Updated Client details successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $clientID
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $client)
    {
        $client->delete();

        return redirect()->route('clients.index')
            ->with('success', 'Client deleted successfully');
    }
}
