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
        <ul>
            @foreach ($users as $user)
            <li>{{ $user->name }}</li>
            @endforeach
        </ul>  
    </div>
    
@endsection