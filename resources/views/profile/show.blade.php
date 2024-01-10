@section('title33')
    show Profile
@endsection

@extends('layouts.master')

@section('section12')
    <div class="container p-3">
        <div class="card mb-3">
            <img src="{{ asset('storage/' . $profile->image) }}" class="card-img-top w-25 p-3 mx-auto rounded">
            <div class="card-body d-flex flex-column align-items-center">
                <h5 class="card-title">{{ $profile->name }}</h5>
                <p class="card-text">Email : <a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a></p>
                <p class="card-text"><small class="text-muted">Created at {{ $profile->created_at }}</small></p>
            </div>
        </div>
    </div>


@endsection
