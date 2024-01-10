@section('title33')
    Create note
@endsection

@extends('layouts.master')

@section('section12')
    <h2>Create note</h2>

    @if ($errors->any())
        <x-alert typeAlert='warning'>
            <h5>Errors:</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert>
    @endif

    <form class="row g-3" method="POST" action="{{ route('notes.store') }}">
        @csrf
        <div class="col-12">
            <label for="inputName" class="form-label">Title</label>
            <input type="text" value="{{old('title')}}" name="title" class="form-control" id="inputTitle">
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="col-12">
            <label for="inputDesc" class="form-label">Desc</label>
            <textarea type="text" name="desc" class="form-control" id="inputDesc" placeholder="description...">{{old('desc')}}</textarea>
            @error('desc')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="col-12">
            <button type="submit" name="create" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection
