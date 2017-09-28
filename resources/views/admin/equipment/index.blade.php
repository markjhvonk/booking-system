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

    
    {{--  Category test  --}}
    <div class="row">
        <ul>
            @foreach ($categories as $category)
                <li>{{ $category->name }}</li>
            @endforeach
        </ul>
    </div>


    {{--  Tab test  --}}
    <div class="row">
        <div class="col s12">
            <ul class="tabs">
            @foreach ($categories as $category)
                <li class="tab col s3">
                    <a target="_self" href="{{ url('admin/equipment',$category->id) }}">{{ $category->name }}</a>
                </li>
                {{--  {{ str_replace(' ', '_', $category->name) }}  --}}
            @endforeach
            </ul>
        </div>
    </div>

    {{--  Testing packages  --}}
    <div class="row">
        @foreach ($packages as $package)
        <div class="col s6 m4">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">{{ $package->name }}</span>
                    <p>{{ $package->description }}</p>
                    <div class="divider"></div>
                    <ul>
                        @foreach ($package->equipment as $packageEquipment)
                        <li>{{ $packageEquipment->name}}</li>
                        @endforeach
                    </ul>
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">edit</i></a>
                </div>
            </div>
        </div>
        @endforeach    
    </div>

    {{--  Working code  --}}
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