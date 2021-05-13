<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(count($clients) > 0)
                        <div class="mt-40">
                            @foreach($clients as $client)
                                <div class="shadow-md mt-8 bg-white p-4">
                                    <h3><a href="/posts/{{$client->id}}">{{$client->company_name}}</a></h3>
                                    <small>Written on {{$client->created_at}}</small>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
