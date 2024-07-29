@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">


        <div class="col-12">
            <form action="{{ route('admin.project.store') }}" method="POST" id="creation_form">
                @csrf

                <div class="input-group-sm container mb-5 w-50">

                    <label for="name">Name</label>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Project Name" id="name" name="name" value="{{ old('name') }}">


                    <label for="language_used">Language Used</label>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Language Used" id="language_used" name="language_used" value="{{ old('language_used') }}">

                    <label for="url_repo">Url Repository</label>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Url Repository" id="url_repo" name="url_repo" value="{{ old('url_repo') }}">



                    <div class="d-flex justify-content-between mt-3">

                            <input class="btn btn-success" type="submit" value="Create new project">
                            <input class="btn btn-secondary" type="reset" value="Reset">

                    </div>
                </div>
            </form>
            <a href="{{route('admin.project.index', $project) }}" class="btn btn-primary d-flex justify-content-center">Back to do project list</a>
        </div>

    </div>
</div>
@endsection
