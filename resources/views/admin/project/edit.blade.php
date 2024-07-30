@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <form action="{{ route('admin.project.update', $project )}}" method="POST" id="creation-form">
                @method("PUT")
                @csrf

                <div class="input-group-sm container mb-5 w-50">

                    <label for="name">Name</label>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Project Name" id="name" name="name" value="{{ old('name', $project->name) }}">


                    <label for="language_used">Language Used</label>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Language Used" id="language_used" name="language_used" value="{{ old('language_used', $project->language_used) }}">

                    <label for="url_repo">Url Repository</label>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Url Repository" id="url_repo" name="url_repo" value="{{ old('url_repo', $project->url_repo) }}">

                </div>
                <div class="col-12 d-flex justify-content-center mb-3">
                    <div class="input">
                        <input class="btn btn-warning ml-5" type="submit" value="Edit">
                        <input class="btn btn-secondary ms-5" type="reset" value="Reset">
                    </div>
                </div>
            </form>
            <div class="col-12 d-flex justify-content-center">
                <a href="{{route('admin.project.index') }}" class="btn btn-primary col-2  ">Back to do project list</a>
            </div>
        </div>

    </div>
</div>
@endsection

@section('custom_script')
@vite('resources/js/project/edit-confirmation.js')
@endsection
