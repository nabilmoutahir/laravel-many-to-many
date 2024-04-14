@extends('layouts.app')

@section('content')

    <section>

        

        <div class="container">

            <h1>{{$project->id}}: {{$project->title}} <span class="badge text-bg-secondary">{{$project->type->label ?? ''}}</span></h1>

            <h2 class="mt-4">Description:</h2>
            <div>
                {{$project->content}}
            </div>

            <a href="{{ route('admin.projects.index') }}">
                <div class="btn btn-primary my-4">
                    <- Back to the index
                </div>
            </a>
        </div>

    </section>



@endsection