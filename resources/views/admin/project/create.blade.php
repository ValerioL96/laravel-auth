@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="col-12">
            <form action="{{ route('admin.project.store') }}" method="POST" id="creation_form">
                @method("POST")
                @csrf

                <div class="input-group-m container mb-5 w-50">

                    <label for="name">Name</label>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Project Name" id="name" name="name" value="{{ old('name') }}">

                    <label for="language_used">Language Used</label>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Language Used" id="language_used" name="language_used" value="{{ old('language_used') }}">

                    <label for="url_repo">Url Repository</label>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Url Repository" id="url_repo" name="url_repo" value="{{ old('url_repo') }}">

                </div>
                <div class="col-12 d-flex justify-content-center mb-3">
                    <div class="input">
                        <input class="btn btn-success" type="submit" value="Create new project">
                        <input class="btn btn-secondary" type="reset" value="Reset">
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
