@extends ('layouts.master')

@section ('content')
    <div class="row">
        <h1>Register new user</h1>
    </div>
    <div class="row">
        <form method="POST" action="{{ url('admin/users') }}" class="col s12">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s6">
                    <input name="name" id="name" type="text" class="validate">
                    <label for="name">Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input name="email" id="email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input name="password" id="password" type="password" class="validate">
                    <label for="password">Password</label>
                </div>
                <div class="input-field col s6">
                    <input name="password_confirmation" id="password_confirmation" type="password" class="validate">
                    <label for="password_confirmation">Password Confirmation</label>
                </div>
            </div>
            <div class="row">
                <button class="btn waves-effect waves-light" type="submit">
                    Register
                    <i class="material-icons right">send</i>
                </button>
            </div>
            <div class="row">
                @include ('layouts.errors')
            </div>
        </form>
    </div>
@endsection