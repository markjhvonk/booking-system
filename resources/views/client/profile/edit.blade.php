@extends ('layouts.master')

@section ('content')
    <div class="row">
        <h1>Edit client account</h1>
    </div>
    <div class="row">
        <form method="POST" action="{{ url('client/edit',Auth::user()->id) }}" class="col s12">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s6">
                    <input name="name" id="name" type="text" class="validate" value="{{ Auth::user()->name }}">
                    <label for="name">Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input name="email" id="email" type="email" class="validate" value="{{ Auth::user()->email }}">
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <blockquote><h6>Only enter a new password if you want to change/overwrite the original one!</h6></blockquote>
                <div class="input-field col s6">
                    <input name="password" id="password" type="password" class="validate">
                    <label for="password">Password</label>
                </div>
                <div class="input-field col s6">
                    <input name="password_confirmation" id="password_confirmation" type="password" class="validate">
                    <label for="password_confirmation">Password Confirmation</label>
                </div>
            </div>
            </div>
            <div class="row">
                <button class="btn waves-effect waves-light" type="submit">
                    Update
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