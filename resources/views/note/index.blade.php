@section('title33')
    Home
@endsection

@extends('layouts.master')

@section('section12')
    <h2>My Notes</h2>

    @include('partials.flashBag')

    <div class="row d-flex justify-content-center">
        @foreach ($notes as $note)
            @if (Auth()->user()->id = $note->profile_id)
                <x-note :note='$note' />
            @endif
        @endforeach

    </div>

    {{ $notes->links() }}
@endsection
