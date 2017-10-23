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
                <div class="input-field col s6">
                    <select name="role">
                        <option value="" disabled selected>Select role</option>
                        <option value="1">Admin</option>
                        <option value="2">Editor</option>
                        <option value="3">Client</option>
                    </select>
                    <label>Role Select</label>
                </div>
            </div>
            </div>
            <div class="row">
                <button class="btn waves-effect waves-light" type="submit">
                    Register
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>
@endsection

@section ('footer')
    <script>
    $(document).ready(function() {
        $('select').material_select();
    });
    </script>
@endsection