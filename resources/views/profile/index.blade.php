@section('title33')
    All Profile
@endsection

@extends('layouts.master')

@section('section12')
    <h2>All profiles</h2>
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
              <th>{{$profile->id}}</th>
              <td>{{$profile->name}}</td>
              <td>{{$profile->email}}</td>
              <td><img style="width:50px" src="storage/{{$profile->image}}" alt="{{$profile->name}}"></td>
              <td>{{$profile->created_at}}</td>
            </tr>

            @endforeach
      </table>

      {{$profiles->links()}}

        
    
 

@endsection
