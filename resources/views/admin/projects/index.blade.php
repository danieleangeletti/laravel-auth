@extends('layouts.app')

@section('page-title', 'Tutti i progetti')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Tutti i progetti
                    </h1>

                    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary w-100">ADD PROJECT</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Content</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <th scope="row">{{ $project->id }}</th>
                                    <td>{{ $project->title }}</td>
                                    <td>{{ $project->slug }}</td>
                                    <td>{{ $project->content }}</td>
                                    <td>
                                        <a href="{{ route('admin.projects.show', ['project' => $project->slug]) }}" class="btn btn-primary">SHOW</a>
                                        <a href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}" class="btn btn-warning">EDIT</a>
                                        <form onsubmit="return confirm('Are you sure you want to delete this project?')" action="{{route ('admin.projects.destroy', ['project' => $project->slug])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                DELETE
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
