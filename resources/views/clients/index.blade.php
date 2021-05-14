<x-app-layout>
    <x-slot name="header">
            {{ __('Clients') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(count($clients) > 0)
                @foreach($clients as $client)
                    <div class="mb-8 border-b border-t border-blue-100 self-center flex flex-row">
                        <div class="w-9/12 pl-4 pt-4 pb-4">
                            <a href="/clients/{{$client->id}}">
                                <div>
                                    <p class="text-gray-50"><strong>Company:</strong> {{$client->company_name}}</p>
                                    <p class="text-gray-50"><strong>Contact:</strong> {{$client->contact_name}}</p>
                                </div>
                            </a>
                        </div>
                        <div class="w-3/12 flex flex-col bg-blue-800 p-4">
                            <a href="mailto:{{$client->contact_email}}" class="text-gray-50 hover:underline">
                                <strong>Email:</strong> {{$client->contact_email}}
                            </a>
                            @if($client->contact_number)
                                <a href="tel:{{$client->contact_number}}" class="text-gray-50 hover:underline">
                                    <strong>Number:</strong> {{$client->contact_number}}
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
