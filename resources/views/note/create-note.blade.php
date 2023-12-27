@section('title33')
    Create note
@endsection

@extends('layouts.master')

@section('section12')
    <h2>Create note</h2>
    <form class="row g-3" method="POST" action="{{ route('note.store') }}">
        @csrf
        <div class="col-12">
            <label for="inputName" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="inputTitle">
        </div>

        <div class="col-12">
            <label for="inputDesc" class="form-label">Desc</label>
            <textarea type="text" name="desc" class="form-control" id="inputDesc" placeholder="description..."></textarea>
        </div>

        <div class="col-12">
            <button type="submit" name="create" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection
