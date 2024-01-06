@section('title33')
    {{ $note->title }}
@endsection

@extends('layouts.master')

@section('section12')
    <div class="card my-3" style="">
        <div class="card-body">
            <h5 class="card-title">{{ $note->title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Created at : {{ $note->created_at->format('d-m-y') }}</h6>
            <p class="card-text">{{ $note->desc }}</p>
        </div>
        <div class="card-footer bg-transparent border-top">
            <form action="{{ route('note.destroy', $note->id) }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn-sm btn-danger float-end">Delete</button>
            </form>
            <form action="{{ route('note.edit', $note->id) }}" method="get">
                @csrf
                <button class="btn-sm btn-primary float-end mx-2">Edit</button>
            </form>
        </div>
    </div>
@endsection
