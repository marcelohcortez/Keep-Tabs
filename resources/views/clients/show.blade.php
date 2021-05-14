<x-app-layout>
    <x-slot name="header">
        {{ __('Client') }}
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="action-list p-4 bg-blue-100 rounded">
                <p class="text-general-dark mb-4 text-xl"><strong>COMPANY NAME:</strong><br/> <span class="pl-4">{{$client->company_name}}</span></p>
                <p class="text-general-dark mb-4 text-xl"><strong>CONTACT NAME:</strong><br/> <span class="pl-4">{{$client->contact_name}}</span></p>
                <p class="text-general-dark mb-4 text-xl"><strong>EMAIL:</strong><br/> <span class="pl-4"><a class="text-general-dark hover:underline" href="mailto:{{$client->contact_email}}">{{$client->contact_email}}</a></span></p>
                <p class="text-general-dark text-xl"><strong>NUMBER:</strong><br/> <span class="pl-4"><a class="text-general-dark hover:underline" href="tel:{{$client->contact_number}}">{{$client->contact_number}}</a></span></p>
                <div class="border-b mt-4 mb-4"></div>
                <div class="text-general-dark text-xl">
                    <p><strong>INFOS:</strong></p>
                    <div class="pl-4">{!! $client->extra_info !!}</div>
                </div>
            </div>
            <div class="flex flex-row items-center justify-between">
                <div class="action-return mb-3 mt-3">
                    <a href="{{ url('/clients') }}" class="btn btn-default">RETURN</a>
                </div>

                <div class="action-edit mb-3 mt-3">
                    <a href="/clients/{{$client->id}}/edit" class="btn btn-default">EDIT</a>
                </div>

                <div class="action-delete mb-3 mt-3">
                    {!!Form::open(['action' => ['App\Http\Controllers\ClientsController@destroy', $client->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
