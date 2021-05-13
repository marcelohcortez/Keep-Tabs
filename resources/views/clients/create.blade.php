<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register Client') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {!! Form::open(['action' => 'App\Http\Controllers\ClientsController@store', 'method' => 'post']) !!}
                    <div class="form-group">
                        {{Form::label('company_name', 'Company Name')}}
                        {{Form::text('company_name', '', ['class' => 'form-control', 'placeholder' => 'Insert company name', 'value' => '{{ old("company_name") \}\}'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('contact_name', 'Contact Name')}}
                        {{Form::text('contact_name', '', ['class' => 'form-control', 'placeholder' => 'Insert contact name', 'value' => '{{ old("contact_name") \}\}'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('contact_email', 'Contact Email')}}
                        {{Form::text('contact_email', '', ['class' => 'form-control', 'placeholder' => 'Insert contact email', 'value' => '{{ old("contact_email") \}\}'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('contact_number', 'Contact Number')}}
                        {{Form::text('contact_number', '', ['class' => 'form-control', 'placeholder' => 'Insert contact number', 'value' => '{{ old("contact_number") \}\}'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('extra_info', 'Extra Info')}}
                        {{Form::textarea('extra_info', '', ['class' => 'form-control, extra_info', 'placeholder' => 'Insert extra info', 'id' => 'extra_info', 'name' => 'extra_info', 'value' => '{{ old("extra_info") \}\}'])}}
                    </div>
                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
