@extends('layouts.admin')

@section('content')
<section class="container">
    <div class="row justify-content-center">
        <article class="col-3 my-4">
            <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">
                    <h2 class="card-title">
                        {{$project->id}}: {{$project->name}}
                    </h2>
                </div>
                <div class="card-body">
                    <h5 class="card-text">
                        Language Used: {{$project->language_used}}
                    </h5>
                    <a href=" {{ $project->url_repo}}" class="card-text">
                        Click here for the repository
                    </a>
                </div>
                <div class="card-footer card-link d-flex justify-content-center ">
                    <a href="{{route('admin.project.index', $project) }}" class="btn btn-primary btn-sm d-flex justify-content-center mx-2">Back to do project list</a>
                    <a href="{{ route('admin.project.edit', $project )}}" class="btn btn-warning btn-sm d-flex justify-content-center mx-2">Edit</a>
                </div>
                <form  action="{{ route('admin.project.destroy', $project) }}" method="POST" class="d-inline-block delete-form my-2 col-12 d-flex justify-content-center" data_project_id="{{ $project->id }}" data_project_name="{{ $project->name }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm col-5">Delete</button>
                </form>
            </div>
        </article>
    </div>
</section>
@endsection

@section('custom_script')
@vite('resources/js/project/delete-confirmation.js')
@endsection
