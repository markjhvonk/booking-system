@extends ('layouts.master')

@section ('content')
    <div class="row">
        <h1>Equipment</h1>
    </div>
    <div class="row">
        <div class="col s12 m12">
            <a class="waves-effect waves-light btn" href="{{ url('admin/equipment/create') }}">new equipment</a>
            <a class="waves-effect waves-light btn" href="{{ url('admin/equipment/create-category') }}">new category</a>
        </div>
    </div>
    <div class="row">
        
        <table class="striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Data</th>
                    <th>Price</th>
                    <th>Category</th>
                </tr>
            </thead>

            <tbody>
            @foreach ($equipment as $equipment)
                <tr>
                    <td>{{ $equipment->name }}</td>
                    <td>{{ $equipment->description }}</td>
                    <td>{{ $equipment->data }}</td>
                    <td>{{ $equipment->price }}</td>
                    <td>{{ $equipment->category->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection

@section ('footer')
    <script src=""></script>
@endsection