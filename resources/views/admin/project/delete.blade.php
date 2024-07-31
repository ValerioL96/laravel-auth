@extends('layouts.admin')

@section('content')
<section class="container">
    <div class="row justify-content-center">
        @if (session('message_delete'))
        <div class="alert alert-success">
            {{ session('message_delete') }}
        </div>
        @elseif (session('message_restore'))
        <div class="alert alert-success">
            {{ session('message_restore') }}
        </div>
        @endif
        @foreach ($projects as $project)
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
                    <form action="{{ route('admin.project.restore', $project) }}" method="POST" class="d-inline-block mx-2" data_project_id="{{ $project->id }}" data_project_nome="{{ $project->name }}">
                        @method('PATCH')
                        @csrf
                        <button type="submit" class="btn btn-success">Restore</button>
                    </form>
                    <form action="{{ route('admin.project.permanent_delete',  $project) }}" method="POST" class="d-inline-block delete_form" data_project_id="{{ $project->id }}" data_project_nome="{{ $project->nome }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Empty the trash</button>
                    </form>
                </div>
            </div>
        </article>
        @endforeach
    </div>
</section>
@endsection

@section('custom_script')
@vite('resources/js/project/delete-confirmation.js')
@endsection
