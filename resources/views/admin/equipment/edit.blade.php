@extends ('layouts.master')

@section ('content')
    <div class="row">
        <h1>Edit Equipment</h1>
        <div class="divider"></div>
    </div>
    <div class="row">
        <form method="POST" action="{{ url('admin/equipment',$equipment->id) }}" class="col s12">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s6">
                    <input name="name" id="name" type="text" class="validate" value="{{ $equipment->name }}">
                    <label for="name">Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="description" id="description" class="materialize-textarea">{{ $equipment->description }}</textarea>
                    <label for="description">Description</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input name="data" id="data" type="text" class="validate" value="{{ $equipment->data }}">
                    <label for="data">Data</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input name="price" id="price" type="text" class="validate" value="{{ $equipment->price }}">
                    <label for="price">Price</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <select name="category_id">
                        <option value="" disabled selected>Categories:</option>
                        @foreach ($categories as $category)
                            @if($category->id == $equipment->category_id)
                                <option selected value="{{ $equipment->category->id }}">{{ $equipment->category->name }}</option>
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