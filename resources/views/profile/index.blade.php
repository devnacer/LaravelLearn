@section('title33')
    All Profile
@endsection

@extends('layouts.master')

@section('section12')
    <h2>All profiles</h2>

    @include('partials.flashBag')

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

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Image</th>
                <th scope="col">Created at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($profiles as $profile)
                <tr>
                    <th>{{ $profile->id }}</th>
                    <td>{{ $profile->name }}</td>
                    <td>{{ $profile->email }}</td>
                    <td><img style="width:50px" src="storage/{{ $profile->image }}" alt="{{ $profile->name }}"></td>
                    <td>{{ $profile->created_at }}</td>
                    <td class="d-flex ">

                        <a class="btn-sm btn-primary" href="{{ route('profiles.show', $profile->id) }}">show</a>

                        <form action="{{ route('profiles.destroy', $profile->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" name="delete" class="btn-sm btn-danger mx-1">Delete</button>
                        </form>

                        <form action="{{ route('profiles.edit', $profile->id) }}" method="GET">
                          @csrf
                          <button class="btn-sm btn-info">Update</button>
                      </form>
                        
                    </td>
                </tr>
            @endforeach
    </table>

    {{ $profiles->links() }}





@endsection
