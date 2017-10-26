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
    <div class="row" style="margin-bottom: 0;">
        <form class="col s12 valign-wrapper" action="{{ url('/admin/users/search') }}" method="post" style="margin-bottom: 0;">
            {{ csrf_field() }}
            <div class="input-field" style="width: 300px; margin-right: 15px;">
                <input id="search" name="searchQuery" type="text" class="validate"
                @if(isset($searchQuery))
                    value="{{ $searchQuery }}"
                @endif
                >
                <label for="search">Search users</label>
            </div>
            <button type="submit" class="waves-effect waves-light btn"><i class="material-icons right">search</i>Search</button>
        </form>
    </div>
    @if(isset($searchQuery))
    <div class="row">
        <div class="col s12" style="margin-bottom: 0;">
            <a class="waves-effect waves-light red-text clr-btn" href="{{ url('/admin/users') }}"><i class="material-icons left">clear</i>clear search</a>                        
        </div>
    </div>
    @endif
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