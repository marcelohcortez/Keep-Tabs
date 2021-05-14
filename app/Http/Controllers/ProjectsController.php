<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $clients = Client::all();
        return view('projects.index')->with('projects', $projects)->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::pluck('company_name', 'id');
        return view('projects.create')->with('clients', $clients);
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
                'client_id' => 'required',
                'project_name' => 'required',
            ],
            [
                'required' => ':attribute é obrigatório.'
            ]
        );
        if ($validator->fails()) {
            return redirect('projects/create')
                ->withErrors($validator)
                ->withInput();
        }
        $project = new Project;
        $project->client_id = $request->input('client_id');
        $project->project_name = $request->input('project_name');
        $project->project_description = $request->input('project_description');
        $project->total_value = $request->input('total_value');
        $project->paid_value = $request->input('paid_value');
        $project->starting_date = $request->input('starting_date');
        $project->estimated_finishing_date = $request->input('estimated_finishing_date');
        $project->status = 'ongoing';
        $project->save();
        return redirect('projects')->with('success', 'Project registered.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        $clients = Client::all();
        return view('projects.show')->with('project', $project)->with('clients', $clients);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        $clients = Client::pluck('company_name', 'id');
        return view('projects.edit')->with('project', $project)->with('clients', $clients);
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
                'client_id' => 'required',
                'project_name' => 'required',
            ],
            [
                'required' => ':attribute é obrigatório.'
            ]
        );
        if ($validator->fails()) {
            return redirect('projects/$id/edit')
                ->withErrors($validator)
                ->withInput();
        }
        $project = Project::find($id);
        $project->client_id = $request->input('client_id');
        $project->project_name = $request->input('project_name');
        $project->project_description = $request->input('project_description');
        $project->total_value = $request->input('total_value');
        $project->paid_value = $request->input('paid_value');
        $project->starting_date = $request->input('starting_date');
        $project->estimated_finishing_date = $request->input('estimated_finishing_date');
        $project->effective_finishing_date = $request->input('effective_finishing_date');
        $project->extra_info = $request->input('extra_info');
        $project->status = $request->input('status');
        $project->save();
        return redirect('/projects')->with('success', 'Project updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect('/projects')->with('success', 'Project removed');
    }
}
