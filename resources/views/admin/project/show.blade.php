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
                <div class="card-footer card-link d-flex justify-content-around">

                    <a href="{{route('admin.project.index', $project) }}" class="btn btn-primary d-flex justify-content-center">Back to do project list</a>
                    <a href="" class="btn btn-warning d-flex justify-content-center">Edit</a>
                </div>
            </div>
        </article>
    </div>
</section>
@endsection
