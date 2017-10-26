@extends ('layouts.master')

@section ('content')
    <div class="row">
        <h1>Client login</h1>
    </div>
    <div class="row">
        <form method="POST" action="login" class="col s12">
            {{ csrf_field() }}
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
            </div>
            <div class="row">
                <button class="btn waves-effect waves-light" type="submit">
                    Login
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>
@endsection