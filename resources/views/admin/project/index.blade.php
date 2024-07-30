@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">


        <div class="col-12">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Project Name</th>
                        <th scope="col">Language Used</th>
                        <th scope="col">Url Repository</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($projects as $project)

                    <tr>
                        <th>{{ $project->id}}</th>
                        <td>{{ $project->name}}</td>
                        <td>{{ $project->language_used}}</td>
                        <td>
                            <a href=" {{ $project->url_repo}}">Click here for the repository</a></td>
                        <td>

                            <a href="{{ route('admin.project.show', $project )}}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('admin.project.edit', $project )}}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.project.destroy', $project) }}" method="POST" class="d-inline-block delete-form mx-2" data_project_id="{{ $project->id }}" data_project_name="{{ $project->name }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
                <div class="pagination">
                    {{ $projects->links(); }}
                </div>

        </div>

    </div>
</div>

@endsection

@section('custom_script')
@vite('resources/js/project/delete-confirmation.js')
@endsection
