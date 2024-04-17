@extends('layouts.app')

@section('content')

    <section>

        <div class="container">

            <div>
                <h1>{{$project->id}}: {{$project->title}}</h1>
            </div>

            <div class="mt-3">
                <h5>Project Type:</h5>

                <div>
                    {{-- FUNCTION TO SHOW TYPE LABELS--}}
                    {{$project->type->label ?? ''}}
                </div>
            </div>

            <div class="mt-3">
                <h5 class="display-inline">Technologies:</h5>

                <div>
                    {{-- FUNCTION TO SHOW TECHS TEXT LABELS--}}
                    {{ $project->getTechsText()}}
                </div>
            </div>

            <div class="mt-3">
                <h3 >Description:</h3>
                
                <div>
                    {{$project->content}}
                </div>
            </div>

            {{-- IMAGE --}}
            @if (!@empty($project->image))
                
                <img src="{{ asset('storage/' . $project->image)}}" alt="">
                
            @endif

            <div class="mt-3">
                <a href="{{ route('admin.projects.index') }}">
                    <div class="btn btn-primary my-4">
                        <- index
                    </div>
                </a>
            </div>
        </div>

    </section>

@endsection