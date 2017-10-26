@extends ('layouts.master')

@section ('content')
    <div class="row">
        <h1>Categories</h1>
    </div>
    
    <div class="row">
        @foreach ($categories as $category)
        <div class="col s12 m4">
            <a href="{{ url('admin/equipment',$category->id) }}">
                <div class="card blue-grey hoverable">
                    <div class="card-content white-text">
                        <span class="card-title">{{ $category->name }}</span>
                        <p>{{ $category->description }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        <div class="col s12 m4">
            <div class="card blue-grey darken-1 hoverable">
                <div class="card-content white-text">
                    <span class="card-title">New category</span>
                    <form method="POST" action="{{ url('admin/equipment/category') }}" class="col s12">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="name" id="name" type="text" class="validate">
                                <label for="name">Name</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="description" id="description" type="text" class="validate">
                                <label for="description">Description</label>
                            </div>
                        </div>
                        <button class="btn-floating halfway-fab waves-effect waves-light"><i class="material-icons">send</i></button>
                    </form>
                    <div style="clear: both;"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section ('footer')
    <script src=""></script>
@endsection