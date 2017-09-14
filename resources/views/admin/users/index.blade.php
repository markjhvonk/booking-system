@extends ('layouts.master')

@section ('content')
    <div class="row">
        <h1>Users</h1>
    </div>
    <div class="row">
    <ul>
        @foreach ($users as $user)
        <li>{{ $user->name }}</li>
        @endforeach
    </ul>
        

        
    </div>
    
@endsection