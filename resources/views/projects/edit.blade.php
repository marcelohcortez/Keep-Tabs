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
                        <p class="text-general-dark"><strong>{{Form::label('company_name', 'Company Name')}}</strong></p>
                        {{Form::text('company_name', $project->company_name, ['class' => 'form-control', 'placeholder' => 'Insert company name', 'value' => '{{ old("company_name") \}\}'])}}
                    </div>
                    <div class="form-group mb-4">
                        <p class="text-general-dark"><strong>{{Form::label('contact_name', 'Contact Name')}}</strong></p>
                        {{Form::text('contact_name', $project->contact_name, ['class' => 'form-control', 'placeholder' => 'Insert contact name', 'value' => '{{ old("contact_name") \}\}'])}}
                    </div>
                    <div class="form-group mb-4">
                        <p class="text-general-dark"><strong>{{Form::label('contact_email', 'Contact Email')}}</strong></p>
                        {{Form::text('contact_email', $project->contact_email, ['class' => 'form-control', 'placeholder' => 'Insert contact email', 'value' => '{{ old("contact_email") \}\}'])}}
                    </div>
                    <div class="form-group mb-4">
                        <p class="text-general-dark"><strong>{{Form::label('contact_number', 'Contact Number')}}</strong></p>
                        {{Form::text('contact_number', $project->contact_number, ['class' => 'form-control', 'placeholder' => 'Insert contact number', 'value' => '{{ old("contact_number") \}\}'])}}
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
