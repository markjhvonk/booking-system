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
        <div class="col s12">
            <ul class="tabs z-depth-1">
            @foreach ($categories as $category)
                <li class="tab col s3">
                    @if($category->id == $current_category->id)
                    <a class="active" target="_self" href="{{ url('admin/equipment',$category->id) }}">{{ $category->name }}</a>
                    @else
                    <a target="_self" href="{{ url('admin/equipment',$category->id) }}">{{ $category->name }}</a>
                    @endif
                </li>
            @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
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
                        <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col s12">
            <div class="col s12">
                <table class="striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Data</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th></th>
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
                            <td class="right-align">
                                <a class="blue-text" href="{{ url('admin/equipment',$category->id) }}/edit"><i class="material-icons">edit</i></a>
                                <form method="POST" action="{{ url('admin/equipment',$equipment->id) }}" style="display: inline-block;">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="red-text clear-btn" type="submit"><i class="material-icons">delete</i></button>
                                </form>
                                <a class="green-text" href=""><i class="material-icons">visibility</i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

@endsection

@section ('footer')
    <script src=""></script>
@endsection