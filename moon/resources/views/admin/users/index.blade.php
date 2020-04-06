@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>User Management</h2></div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($user as $user)
                        <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                        <td>
                            <a href="{{route('admin.users.edit', $user->id)}}"><button type="button" class="btn-sm btn-primary mr-1 mt-1 float-left">Edit</button></a>
                            <form action="{{route('admin.users.destroy', $user)}}" method="POST" class="float-left">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-sm btn-warning mr-1 mt-1">Delete</button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection