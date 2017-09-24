@extends ('layouts.master')

@section ('content')
    <div class="row">
        <h1>New Equipment</h1>
        <div class="divider"></div>
    </div>
    <div class="row">
        <form method="POST" action="{{ url('admin/equipment') }}" class="col s12">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s6">
                    <input name="name" id="name" type="text" class="validate">
                    <label for="name">Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="description" id="description" class="materialize-textarea"></textarea>
                    <label for="description">Description</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input name="data" id="data" type="text" class="validate">
                    <label for="data">Data</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input name="price" id="price" type="text" class="validate">
                    <label for="price">Price</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <select>
                        <option value="" disabled selected>Categories:</option>
                        <option value="1">Category 1</option>
                        <option value="2">Category 2</option>
                        <option value="3">Category 3</option>
                    </select>
                    <label>Category</label>
                </div>
            </div>
            <div class="row">
                <button class="btn waves-effect waves-light" type="submit">
                    Submit
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>
    
    @include ('layouts.errors')

@endsection

@section ('footer')
<script>
    // enable materialize dropdown
    $(document).ready(function() {
        $('select').material_select();
    });
</script>
@endsection