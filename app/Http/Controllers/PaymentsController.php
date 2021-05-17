<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Payment;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all()->sortBy('paid_on');
        $projects = Project::all();
        $clients = Client::all();
        return view('payments.index')->with('payments', $payments)->with('projects', $projects)->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::pluck('project_name', 'id');
        return view('payments.create')->with('projects', $projects);
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
                'project_id' => 'required',
                'value' => 'required',
            ],
            [
                'required' => ':attribute é obrigatório.'
            ]
        );
        if ($validator->fails()) {
            return redirect('payments/create')
                ->withErrors($validator)
                ->withInput();
        }
        $payment = new Payment;
        $payment->project_id = $request->input('project_id');
        $payment->value = $request->input('value');

        if($request->input('paid_on')){
            $payment->paid_on = $request->input('paid_on');
        } else{
            $payment->paid_on = date("Y-m-d H:i:s");
        }

        $payment->save();
        return redirect('payments')->with('success', 'Payment registered.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Payment::find($id);
        $projects = Project::all();
        $clients = Client::all();

        foreach($projects as $project){
            if($project->id === $payment->project_id){
                $projectItem = $project;
            }
        }
        foreach($clients as $client){
            if($client->id === $projectItem->client_id){
                $clientItem = $client;
            }
        }

        return view('payments.show')->with('payment', $payment)->with('project', $projectItem)->with('client', $clientItem);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = Payment::find($id);
        $projects = Project::pluck('project_name', 'id');
        return view('payments.edit')->with('payment', $payment)->with('projects', $projects);
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
                'project_id' => 'required',
                'value' => 'required',
            ],
            [
                'required' => ':attribute é obrigatório.'
            ]
        );

        if ($validator->fails()) {
            return redirect('payments/$id/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $payment = Payment::find($id);
        $payment->project_id = $request->input('project_id');
        $payment->value = $request->input('value');

        if($request->input('paid_on')){
            $payment->paid_on = $request->input('paid_on');
        }

        $payment->save();

        return redirect('/payments')->with('success', 'Payment updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::find($id);
        $payment->delete();
        return redirect('/payments')->with('success', 'Payment removed');
    }
}
