@extends ('layouts.master')

@section ('content')
    <div class="row">
        <h1>{{ $current_category->name }}</h1>
    </div>
    <div class="row">
        <div class="col s12 red-text">
            <a href="{{ url('admin/equipment') }}" class="breadcrumb grey-text lighten-1">Categories</a>
            <a href="#!" class="breadcrumb red-text">{{ $current_category->name }}</a>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m12">
            <a class="waves-effect waves-light btn" href="{{ url('admin/equipment/create',$current_category->id) }}">new item</a>
            <a class="waves-effect waves-light btn" href="{{ url('admin/equipment/package/create',$current_category->id) }}">new kit</a>
            <form method="POST" action="{{ url('admin/equipment/category',$current_category->id) }}" class="right" style="display: inline-block; margin: 0 0 0 5px">
                {{ method_field('DELETE') }} {{ csrf_field() }}
                <button class="waves-effect waves-light btn red">delete</button>
            </form>
            <a class="waves-effect waves-light btn right blue" href="{{ url('admin/equipment/category',$current_category->id) }}/edit">edit</a>
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
                        <a class="btn-floating halfway-fab waves-effect waves-light red" href="{{ url('admin/equipment/package',$package->id) }}/edit"><i class="material-icons">edit</i></a>
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
                        <tr class="visibility{{ $equipment->visible }}">
                            <td>{{ $equipment->name }}</td>
                            <td class="description truncate">{{ $equipment->description }}</td>
                            <td>
                                @if(!$equipment->data)
                                    N/A
                                @else
                                    {{ $equipment->data }}
                                @endif
                            </td>
                            <td>&pound;{{ $equipment->price }}</td>
                            <td>{{ $equipment->category->name }}</td>
                            <td class="right-align">
                                <a class="blue-text" href="{{ url('admin/equipment',$equipment->id) }}/edit"><i class="material-icons">edit</i></a>
                                <form method="POST" action="{{ url('admin/equipment',$equipment->id) }}" style="display: inline-block;">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="red-text clear-btn" type="submit"><i class="material-icons">delete</i></button>
                                </form>
                                <form method="POST" action="{{ url('admin/equipment',$equipment->id) }}/visible" style="display: inline-block;">
                                    {{ method_field('PATCH') }}
                                    {{ csrf_field() }}
                                    <button class="green-text clear-btn" type="submit">
                                        <i class="material-icons">
                                        @if($equipment->visible === 1)
                                            visibility
                                        @else
                                            visibility_off
                                        @endif
                                        </i>
                                    </button>
                                </form>
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