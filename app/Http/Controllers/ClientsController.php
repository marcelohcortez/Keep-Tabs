<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients.index')->with('clients', $clients);
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
        $validator = Validator::make($request->all(),
            [
                'company_name' => 'required',
                'contact_name' => 'required',
                'contact_email' => 'required',
            ],
            [
                'required' => ':attribute é obrigatório.'
            ]
        );
        if ($validator->fails()) {
            return redirect('clients/create')
                ->withErrors($validator)
                ->withInput();
        }
        $client = new Client;
        $client->company_name = $request->input('company_name');
        $client->contact_name = $request->input('contact_name');
        $client->contact_email = $request->input('contact_email');
        $client->contact_number = $request->input('contact_number');
        $client->extra_info = $request->input('extra_info');
        $client->save();
        return redirect('clients')->with('success', 'Client registered.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        return view('clients.show')->with('client', $client);
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
        return view('clients.edit')->with('client', $client);
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
        $validator = Validator::make($request->all(),
            [
                'company_name' => 'required',
                'contact_name' => 'required',
                'contact_email' => 'required',
            ],
            [
                'required' => ':attribute é obrigatório.'
            ]
        );
        if ($validator->fails()) {
            return redirect('clients/$id/edit')
                ->withErrors($validator)
                ->withInput();
        }
        $client = Client::find($id);
        $client->company_name = $request->input('company_name');
        $client->contact_name = $request->input('contact_name');
        $client->contact_email = $request->input('contact_email');
        $client->contact_number = $request->input('contact_number');
        $client->extra_info = $request->input('extra_info');
        $client->save();
        return redirect('/clients')->with('success', 'Client updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Client::find($id);
        $post->delete();
        return redirect('/clients')->with('success', 'Client removed');
    }
}
