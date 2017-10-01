@extends ('layouts.master')

@section ('content')
    <div class="row">
        <h1>Edit Category</h1>
    </div>
    <div class="row">
        <div class="col s12 red-text">
            <a href="{{ url('admin/equipment') }}" class="breadcrumb grey-text lighten-1">Categories</a>
            <a href="{{ url('admin/equipment',$category->id) }}" class="breadcrumb grey-text lighten-1">{{ $category->name }}</a>
            <a href="#!" class="breadcrumb red-text">edit</a>
        </div>
    </div>
    <div class="row">
        <form method="POST" action="{{ url('admin/equipment/category',$category->id) }}" class="col s12">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s6">
                    <input name="name" id="name" type="text" class="validate" value="{{ $category->name }}">
                    <label for="name">Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="description" id="description" class="materialize-textarea">{{ $category->description }}</textarea>
                    <label for="description">Description</label>
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