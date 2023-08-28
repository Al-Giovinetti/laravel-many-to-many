@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-12">
        <form action="{{ route('admin.projects.update', $project)}}" method="POST" class="card p-3" enctype="multipart/form-data">
        @csrf
        @method("PUT")
            <div class="d-flex flex-column">
                <label for="title">Title</label> 
                <input type="text" name="title" id="title" value="{{ $project->title }}">
            </div>
            <div class="d-flex flex-column">
                <label for="title">Image</label> 
                <input type="file" name="image" id="image" placeholder="insert your file">
            </div>
            <div class="d-flex flex-column">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10">
                    {{ $project->description }}
                </textarea>
            </div>
            <div class="d-flex flex-column">
                <label for="attachments">Attachments</label>
                <input type="number" name="attachments" id="attachments" placeholder="Insert number of attachments files" value="{{ $project->attachments }}">
            </div>
            <div class="d-flex p-2">
                <button type="submit" class="btn btn-sm btn-success">
                    Edit
                </button>
                <a href="{{ route('admin.projects.index')}}" class="btn btn-sm btn-secondary ms-3" >Go back</a>
            </div>
        </div>
        </form>
    </div>
</div>

@endsection