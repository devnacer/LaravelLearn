@section('title33')
    Home
@endsection

@extends('layouts.master')

@section('section12')
    <h2>My Notes</h2>

    <div class="row d-flex justify-content-center">

        @foreach ($notes as $note)
            <x-note :note='$note' />
        @endforeach

    </div>

    {{$notes->links()}}

@endsection
