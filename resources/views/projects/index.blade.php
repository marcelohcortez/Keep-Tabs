<x-app-layout>
    <x-slot name="header">
            {{ __('Projects') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-row items-center justify-between">
                <div class="action-return mb-8">
                    <a href="{{ url('/projects/create') }}" class="btn btn-default">ADD PROJECT</a>
                </div>
            </div>
            @if(count($projects) > 0)
                @foreach($projects as $project)
                    <div class="mb-8 border-b border-t border-blue-900 self-center flex flex-row">
                        <div class="w-9/12 pl-4 pt-4 pb-4">
                            <a href="/projects/{{$project->id}}">
                                <div>
                                    <p class="text-general-dark"><strong>Project:</strong> {{$project->project_name}}</p>
                                    <p class="text-general-dark">
                                        <strong>Company:</strong>
                                        @foreach($clients as $client)
                                            @if($client->id === $project->client_id)
                                                {{$client->company_name}}
                                            @endif
                                        @endforeach
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="w-3/12 flex flex-col bg-blue-800 p-4">
                            <a href="mailto:{{$project->contact_email}}" class="text-general hover:underline">
                                <strong>Email:</strong>
                                @foreach($clients as $client)
                                    @if($client->id === $project->client_id)
                                        {{$client->contact_email}}
                                    @endif
                                @endforeach
                            </a>
                            @if($client->contact_number)
                                <a href="tel:{{$client->contact_number}}" class="text-general hover:underline">
                                    <strong>Number:</strong>
                                    @foreach($clients as $client)
                                        @if($client->id === $project->client_id)
                                            {{$client->contact_number}}
                                        @endif
                                    @endforeach
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
