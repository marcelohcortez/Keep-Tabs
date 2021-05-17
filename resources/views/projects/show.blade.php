<x-app-layout>
    <x-slot name="header">
        {{ __('Project') }}
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="action-list p-4 bg-blue-100 rounded">
                <p class="text-general-dark mb-4 text-xl"><strong>PROJECT STATUS:</strong><br/> <span class="pl-4">{{$project->status_project}}</span></p>
                <p class="text-general-dark mb-4 text-xl"><strong>PAYMENT STATUS:</strong><br/> <span class="pl-4">{{$project->status_payment}}</span></p>
                <p class="text-general-dark mb-4 text-xl"><strong>PROJECT NAME:</strong><br/> <span class="pl-4">{{$project->project_name}}</span></p>
                <p class="text-general-dark mb-4 text-xl"><strong>COMPANY NAME:</strong><br/>
                    <span class="pl-4">
                        @foreach($clients as $client)
                            @if($client->id === $project->client_id)
                                {{$client->company_name}}
                            @endif
                        @endforeach
                    </span>
                </p>
                <div class="text-general-dark mb-4 text-xl">
                    <p><strong>PROJECT DESCRIPTION:</strong></p>
                    <div class="pl-4">
                        @if($project->project_description)
                            {!! $project->project_description !!}
                        @else
                            Not defined
                        @endif
                    </div>
                </div>
                <p class="text-general-dark mb-4 text-xl"><strong>PROJECT VALUE:</strong><br/>
                    <span class="pl-4">
                        @if($project->total_value)
                            {{$project->total_value}}
                        @else
                            Not defined
                        @endif
                    </span>
                </p>
                <p class="text-general-dark mb-4 text-xl"><strong>PAID VALUE:</strong><br/>
                    <span class="pl-4">
                        @if($project->paid_value)
                            {{$project->paid_value}}
                        @else
                            Not defined
                        @endif
                    </span>
                </p>
                <p class="text-general-dark mb-4 text-xl"><strong>STARTING DATE:</strong><br/>
                    <span class="pl-4">
                        @if($project->starting_date)
                            {{$project->starting_date}}
                        @else
                            Not defined
                        @endif
                    </span>
                </p>
                <p class="text-general-dark mb-4 text-xl"><strong>ESTIMATED FINISHING DATE:</strong><br/>
                    <span class="pl-4">
                        @if($project->estimated_finishing_date)
                            {{$project->estimated_finishing_date}}
                        @else
                            Not defined
                        @endif
                    </span>
                </p>
                <p class="text-general-dark mb-4 text-xl"><strong>EFFECTIVE FINISHING DATE:</strong><br/>
                    <span class="pl-4">
                        @if($project->effective_finishing_date)
                            {{$project->effective_finishing_date}}
                        @else
                            Not defined
                        @endif
                    </span>
                </p>
                <div class="text-general-dark text-xl">
                    <p><strong>EXTRA INFO:</strong></p>
                    <div class="pl-4">
                        @if($project->extra_info)
                            {!! $project->extra_info !!}
                        @else
                            Not defined
                        @endif
                    </div>
                </div>
            </div>
            <div class="flex flex-row items-center justify-between">
                <div class="action-return mb-3 mt-3">
                    <a href="{{ url('/projects') }}" class="btn btn-default">RETURN</a>
                </div>

                <div class="action-edit mb-3 mt-3">
                    <a href="/projects/{{$project->id}}/edit" class="btn btn-default">EDIT</a>
                </div>

                <div class="action-delete mb-3 mt-3">
                    {!!Form::open(['action' => ['App\Http\Controllers\ProjectsController@destroy', $project->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
