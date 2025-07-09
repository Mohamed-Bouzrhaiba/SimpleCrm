<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Support\Facades\Gate;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Clients = Client::paginate(10);
        return view("clients.index",compact('Clients'))->with('success','client added succefully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("clients.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
       Client::create($request->validated());


    return redirect()->route('clients.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view("clients.edit",compact("client"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
          $client->update($request->validated());

         return redirect()->route('clients.index')->with('success','client modified succefully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        Gate::authorize(\App\PermissionEnum::DELETE_CLIENTS);
        $client->delete();
        return redirect()->route('clients.index')->with('success','client deleted succefully');
    }
     public function search(Request $request){
        $query = $request->input("query");
        $clients = Client::where("client_name","like","%{$query}%")
                    ->get();
        return view("clients.results",compact("clients","query"));
    }
}
