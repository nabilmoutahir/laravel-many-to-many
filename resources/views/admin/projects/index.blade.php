@extends('layouts.app')


@section('content')
    <section>
        <div class="container">
            <h1>Projects</h1>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Content</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->title}}</td>
                            <td>{{ $project->slug}}</td>
                            <td>{{ $project->content}}</td>
                            <td>{{ $project->type->label ?? '' }}</td>
                            <td>
                                <a href="{{ route('admin.projects.show', $project) }}">Details</a>
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