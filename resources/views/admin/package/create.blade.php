@extends ('layouts.master')

@section ('content')
    <div class="row">
        <h1>New Package</h1>
    </div>
    <div class="row">
        <div class="col s12 red-text">
            <a href="{{ url('admin/equipment') }}" class="breadcrumb grey-text lighten-1">Categories</a>
            {{--  find out why this doesnt just work with @isset($current_category)!  --}}
            @if($current_category->name != null)
                <a href="{{ url('admin/equipment',$current_category->id) }}" class="breadcrumb grey-text lighten-1">{{ $current_category->name }}</a>
            @endif
            <a href="#!" class="breadcrumb red-text">create</a>
        </div>
    </div>
    <div class="row">
        <form method="POST" action="{{ url('admin/equipment/package',$current_category->id) }}" class="col s12">
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
                    <select name="category_id">
                        <option value="" disabled selected>Select Category</option>
                        @foreach ($categories as $category)
                            @if($current_category && $current_category->id == $category->id)
                            <option selected value="{{ $current_category->id }}">{{ $current_category->name }}</option>
                            @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
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

@endsection

@section ('footer')
<script>
    // enable materialize dropdown
    $(document).ready(function() {
        $('select').material_select();
    });
</script>
@endsection