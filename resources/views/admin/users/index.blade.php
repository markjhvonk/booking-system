@extends ('layouts.master')

@section ('content')
    <div class="row">
        <h1>Users</h1>
    </div>
    <div class="row">
        <div class="col s12 m12">
            <a class="waves-effect waves-light btn" href="{{ url('admin/users/register') }}">new user</a>
        </div>
    </div>
    <div class="row">
        <table class="striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->role == 1)
                            Admin
                        @elseif($user->role == 2)
                            Editor
                        @else
                            Client
                        @endif
                    </td>
                    <td>
                        <a class="blue-text" href="{{ url('admin/users',$user->id) }}/edit"><i class="material-icons">edit</i></a>
                        <form method="POST" action="{{ url('admin/users',$user->id) }}" style="display: inline-block;">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="red-text clear-btn" type="submit"><i class="material-icons">delete</i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    
@endsection