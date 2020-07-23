<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return view('clients.index', compact('clients'));
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
            'name'=>'required',
            'email'=>'required',
            'cep'=>'required',
            'street'=>'required',
            'city'=>'required',
            'uf'=>'required',
            'neigh'=>'required',
            'number'=>'required',
            'phone'=>'required',
            'birth_date'=>'required',
            'password'=>'required',
            'cpf'=>'required'
        ]);

        $client = new Client([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'cep' => $request->get('cep'),
            'street' => $request->get('street'),
            'city' => $request->get('city'),
            'uf' => $request->get('uf'),
            'neigh' => $request->get('neigh'),
            'number' => $request->get('number'),
            'phone' => $request->get('phone'),
            'birth_date' => date('Y-m-d', strtotime($request->get('birth_date'))),
            'password' => $request->get('password'),
            'gender' => $request->get('gender'),
            'cpf' => $request->get('cpf')
        ]);

        $client->save();
        return redirect('/clientes')->with('success', 'Cliente Cadastrado!');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit', compact('client'));     
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
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'cep'=>'required',
            'street'=>'required',
            'city'=>'required',
            'uf'=>'required',
            'neigh'=>'required',
            'number'=>'required',
            'phone'=>'required',
            'birth_date'=>'required',
            'password'=>'required',
            'cpf'=>'required'
        ]);

        $client = Client::find($id);
        $client->name = $request->get('name');
        $client->email = $request->get('email');
        $client->cep = $request->get('cep');
        $client->street = $request->get('street');
        $client->city = $request->get('city');
        $client->uf = $request->get('uf');
        $client->neigh = $request->get('neigh');
        $client->number = $request->get('number');
        $client->phone = $request->get('phone');
        $client->birth_date = date('Y-m-d', strtotime($request->get('birth_date')));
        $client->password = $request->get('password');
        $client->gender = $request->get('gender');
        $client->cpf = $request->get('cpf');

        $client->save();
        return redirect('/clientes')->with('success', 'Cliente Alutalizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();

        return redirect('/clientes')->with('success', 'Cliente excluído!');
 
    }
}
