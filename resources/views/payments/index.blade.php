<x-app-layout>
    <x-slot name="header">
        {{ __('Payments') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-row items-center justify-between">
                <div class="action-return mb-8">
                    <a href="{{ url('/payments/create') }}" class="btn btn-default">ADD PAYMENT</a>
                </div>
            </div>
            @if(count($payments) > 0)
                @foreach($payments as $payment)
                    <div class="mb-8 border-b border-t border-blue-900 self-center flex flex-row">
                        <div class="w-9/12 pl-4 pt-4 pb-4">
                            <a href="/payments/{{$payment->id}}">
                                <div>
                                    <p class="text-general-dark"><strong>Project:</strong>
                                        @foreach($projects as $project)
                                            @if($project->id === $payment->project_id)
                                                {{$project->project_name}}
                                            @endif
                                        @endforeach
                                    </p>
                                    <p class="text-general-dark"><strong>Payment value:</strong>{{$payment->value}}</p>
                                    <p class="text-general-dark"><strong>Paid on:</strong>{{$payment->paid_on}}</p>
                                </div>
                            </a>
                        </div>
                        <div class="w-3/12 flex flex-col bg-blue-800 p-4">
                            @foreach($clients as $client)
                                @if($client->id === $project->client_id)
                                    <a href="mailto:{{$client->contact_email}}" class="text-general hover:underline">
                                        <strong>Email:</strong>
                                        {{$client->contact_email}}
                                    </a>
                                    @if($client->contact_number)
                                        <a href="tel:{{$client->contact_number}}" class="text-general hover:underline">
                                            <strong>Number:</strong>
                                            {{$client->contact_number}}
                                        </a>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
