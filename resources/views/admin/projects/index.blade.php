@extends('layouts.app')


@section('content')
    <section>
        <div class="container">
            <h1>Projects</h1>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Technologies</th>
                        <th>Type</th>
                        <th>Slug</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->title}}</td>
                            <td>{{$project->getTechsText()}}</td>
                            <td>{!! $project->type?->getLabel() !!}</td>
                            <td>{{ $project->slug}}</td>
                            
                            <td>
                                <a href="{{ route('admin.projects.show', $project) }}">Details</a>
                            </td>

                            <td>
                                <a href="{{ route('admin.projects.edit', $project) }}">Update</a>
                            </td>

                            <td>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100%">Not Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{$projects->links()}}
        </div>

    </section>

@endsection