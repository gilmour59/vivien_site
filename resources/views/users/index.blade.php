@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('users.create') }}" class="btn btn-success">Add</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            @if ($users->count() > 0)
                <table class="table table-hover">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>About</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td width="20%">
                                    {{ $user->name }}
                                </td>
                                <td width="30%">
                                    {{ $user->email }}
                                </td>
                                <td width="20%">
                                    {{ $user->about }}
                                </td>
                                <td width="20%">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm mr-3">Edit</a>
                                    <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $user->id }})">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h5 class="text-center">No Users Yet!</h5>
            @endif
            <form action="" method="POST" id="deleteUserForm">
                @csrf
                @method('DELETE')
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="font-weight-bold">
                                    Are you sure you want to delete this User?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back!</button>
                                <button type="submit" class="btn btn-danger">Delete!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function handleDelete(id) {
            $('#deleteModal').modal('show');
            var form = document.getElementById('deleteUserForm');
            //apparently route::resource adds its parent directory when directing to the route's url;
            //e.g. Route::resource('admin/users', 'UserController');
            //just direct to "users/id". 
            form.action = "users/" + id;
            console.log(id, form);
        }
    </script>
@endsection
