<x-app-layout>
    <x-slot name="header">
            {{ __('Register Payment') }}
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-blue-100 rounded-md">
                    {!! Form::open(['action' => 'App\Http\Controllers\PaymentsController@store', 'method' => 'post']) !!}
                    <div class="form-group mb-4">
                        <p class="text-general-dark"><strong>{{Form::label('project_id', 'Project name')}}</strong></p>
                        {{Form::select('project_id', $projects, null, ['class' => 'form-control', 'placeholder' => 'Define a project', 'value' => '{{ old("project_id") \}\}'])}}
                    </div>
                    <div class="form-group mb-4">
                        <p class="text-general-dark"><strong>{{Form::label('value', 'Paid value')}}</strong></p>
                        {{Form::text('value', '', ['class' => 'form-control', 'pattern' => '^\d*(\.\d{0,2})?$','placeholder' => 'Insert paid value', 'value' => '{{ old("value") \}\}'])}}
                    </div>
                    <div class="form-group mb-4">
                        <p class="text-general-dark"><strong>{{Form::label('paid_on', 'Paid on')}}</strong></p>
                        {{Form::date('paid_on', \Carbon\Carbon::now()->format('d-m-Y'))}}
                    </div>
                    <div class="flex justify-end">
                        {{Form::submit('Submit', ['class' => 'btn btn-default'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
