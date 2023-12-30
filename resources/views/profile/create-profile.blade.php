@section('title33')
    Create Profile
@endsection

@extends('layouts.master')

@section('section12')
    <h2>Create profile</h2>
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

    <form class="row g-3" method="POST" action="{{ route('profile.store') }}">
        @csrf

        <div class="col-12">
            <label for="inputName" class="form-label">Name</label>
            <input type="text" name="name" value="{{old('name')}}" class="form-control" id="inputName">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="col-12">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" name="email" value="{{old('email')}}" class="form-control" id="inputEmail4">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword4">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Confirmation Password</label>
            <input type="password" name="password_confirmation" class="form-control" >
        </div>

        <div class="col-12">
            <button type="submit" name="create" class="btn btn-primary">Create</button>
        </div>
    </form>

@endsection
