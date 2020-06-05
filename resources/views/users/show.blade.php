@extends('layouts.app')

@section('content')
    <div class="container">

        <a href="{{route('users.index')}}" class="btn btn-info">Back</a>

        <h2 class="mb-4 mt-4">View "{{$user->name}}" user</h2>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->gender}}</td>
                <td>
                    <form action="{{ route('users.destroy',$user) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button class="btn btn-danger" type="submit">
                            Delete
                        </button>
                    </form>

                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
