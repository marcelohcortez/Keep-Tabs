<x-app-layout>
    <x-slot name="header">
        {{ __('Client') }}
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="action-return">
                <a href="{{ url('/clients') }}"><small>RETURN</small></a>
            </div>

            <div>
                <p>{{$client->company_name}}</p>
                <p>{{$client->contact_name}}</p>
                <a href="{{$client->contact_email}}">{{$client->contact_email}}</a>
                <a href="{{$client->contact_number}}">{{$client->contact_number}}</a>
                <p>{!! $client->extra_info !!}</p>
            </div>

            <div class="action-edit">
                <a href="/posts/{{$client->id}}/edit" class="btn btn-default">EDIT</a>
            </div>

            <div class="action-delete">
                {!!Form::open(['action' => ['App\Http\Controllers\ClientsController@destroy', $client->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('delete', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</x-app-layout>
