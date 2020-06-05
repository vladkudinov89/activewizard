@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Users</h2>

            <div class="container">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>&#35;</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>
                                {{ $user->id  }}
                            </td>
                            <td>
                                {{ $user->name  }}
                            </td>
                            <td>{{$user->gender}}</td>

                            <td>
                                <a class="float-left btn btn-info mr-2"
{{--                                   href="{{route('users.edit' , $user)}}">--}}
                                   href="#">
                                    Edit
                                </a>

                                <form action="#" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button class="btn btn-danger" type="submit">
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <p>No Users!</p>
                    @endforelse

                    </tbody>

                </table>
                {{ $users->links() }}
        </div>
    </div>
@endsection
