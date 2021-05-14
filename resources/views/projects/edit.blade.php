<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Project') }}
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-blue-100 rounded-md">
                    {!! Form::open(['action' => ['App\Http\Controllers\ProjectsController@update', $project->id], 'method' => 'post']) !!}
                    <div class="form-group mb-4">
                        <p class="text-general-dark"><strong>{{Form::label('status', 'Status')}}</strong></p>
                        {{Form::select('status', ['Ongoing','Finished','Canceled'], $project->status, ['class' => 'form-control', 'placeholder' => 'Status', 'value' => '{{ old("status") \}\}'])}}
                    </div>
                    <div class="form-group mb-4">
                        <p class="text-general-dark"><strong>{{Form::label('client_id', 'Client name')}}</strong></p>
                        {{Form::select('client_id', $clients, $project->client_id, ['class' => 'form-control', 'placeholder' => 'Define a client', 'value' => '{{ old("client_id") \}\}'])}}
                    </div>
                    <div class="form-group mb-4">
                        <p class="text-general-dark"><strong>{{Form::label('project_name', 'Project Name')}}</strong></p>
                        {{Form::text('project_name', $project->project_name, ['class' => 'form-control', 'placeholder' => 'Insert project name', 'value' => '{{ old("project_name") \}\}'])}}
                    </div>
                    <div class="form-group mb-4">
                        <p class="text-general-dark"><strong>{{Form::label('project_description', 'Project Description')}}</strong></p>
                        {{Form::textarea('project_description', $project->project_description, ['class' => 'form-control, project_description', 'placeholder' => 'Insert project description', 'id' => 'project_description', 'name' => 'project_description', 'value' => '{{ old("project_description") \}\}'])}}
                    </div>
                    <div class="form-group mb-4">
                        <p class="text-general-dark"><strong>{{Form::label('total_value', 'Total project value')}}</strong></p>
                        {{Form::text('total_value', $project->total_value, ['class' => 'form-control', 'pattern' => '^\d*(\.\d{0,2})?$','placeholder' => 'Insert total project value', 'value' => '{{ old("total_value") \}\}'])}}
                    </div>
                    <div class="form-group mb-4">
                        <p class="text-general-dark"><strong>{{Form::label('paid_value', 'Paid value')}}</strong></p>
                        {{Form::text('paid_value', $project->paid_value, ['class' => 'form-control', 'pattern' => '^\d*(\.\d{0,2})?$','placeholder' => 'Insert paid value', 'value' => '{{ old("paid_value") \}\}'])}}
                    </div>
                    <div class="form-group mb-4">
                        <p class="text-general-dark"><strong>{{Form::label('starting_date', 'Starting date')}}</strong></p>
                        {{Form::date('starting_date', $project->starting_date)}}
                    </div>
                    <div class="form-group mb-4">
                        <p class="text-general-dark"><strong>{{Form::label('estimated_finishing_date', 'Estimated finishing date')}}</strong></p>
                        {{Form::date('estimated_finishing_date', $project->estimated_finishing_date)}}
                    </div>
                    <div class="form-group mb-4">
                        <p class="text-general-dark"><strong>{{Form::label('extra_info', 'Extra Info')}}</strong></p>
                        {{Form::textarea('extra_info', $project->extra_info, ['class' => 'form-control, extra_info', 'placeholder' => 'Insert extra info', 'id' => 'extra_info', 'name' => 'extra_info', 'value' => '{{ old("extra_info") \}\}'])}}
                    </div>
                    <div class="flex justify-end">
                        {{Form::hidden('_method', 'PUT')}}
                        {{Form::submit('Submit', ['class' => 'btn btn-default'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
