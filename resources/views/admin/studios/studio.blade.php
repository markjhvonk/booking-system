@extends ('layouts.master')

@section ('content')
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red" href="">
            <i class="large material-icons">mode_edit</i>
        </a>
        <ul>
            <li><a class="btn-floating yellow darken-1" href="{{ url('admin/studios',$studio->id) }}/edit"><i class="material-icons">mode_edit</i></a></li>
            <li><a class="btn-floating green"><i class="material-icons">visibility</i></a></li>
            {{--  <li><a class="btn-floating green"><i class="material-icons">visibility_off</i></a></li>  --}}
            <form method="POST" action="{{ url('admin/studios',$studio->id) }}">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <li><button type="submit" class="btn-floating red"><i class="material-icons">delete</i></button></li>
            </form>
        </ul>
    </div>
    <div class="row">
        <h1>{{$studio->name}}</h1>
    </div>
    <div class="row">
        <div class="col s12 red-text">
            <a href="{{ url('admin/studios') }}" class="breadcrumb grey-text lighten-1">Studios</a>
            <a href="#!" class="breadcrumb red-text">{{ $studio->name }}</a>
        </div>
    </div>
    <div class="row">
        <a class="waves-effect waves-light btn yellow darken-1" href="{{ url('admin/studios',$studio->id) }}/edit"><i class="material-icons right">mode_edit</i>edit</a>
        <form method="POST" action="{{ url('admin/studios',$studio->id) }}/visible" style="display: inline-block;">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            @if($studio->visible === 1)
            <button class="waves-effect waves-light btn green darken-1" type="submit">
                <i class="material-icons right">visibility</i>
                visibility 
            </button>
            @else
            <button class="waves-effect waves-light btn grey lighten-1" type="submit">
                <i class="material-icons right">visibility_off</i>
                visibility 
            </button>
            @endif
        </form>
        <form method="POST" action="{{ url('admin/studios',$studio->id) }}" style="display: inline-block;">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button class="waves-effect waves-light btn red"><i class="material-icons right">delete</i>delete</button>
        </form>
    </div>
    <div class="row">
        <p>{{$studio->info}}</p>
    </div>
    <div class="row">
        <div class="row"><h3>Photo's</h3></div>
        <div class="row">
            @foreach ($studio->photo as $photo)
            <div class="col s6 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{asset('/storage/'.$photo->url)}}">
                        <form action="{{ url('admin/studios',$studio->id) }}/remove-photo/{{ $photo->id }}" method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">clear</i></button>
                        </form>
                    </div>
                    <div class="card-content">
                        <span class="card-title">{{ $photo->name }}</span>
                        <p>{{ $photo->caption }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col s6 m4 card blue-grey darken-1" style="padding: 15px;">
                <form action="{{ url('admin/studios',$studio->id) }}/add-photo" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="input-field">
                        <input id="name" type="text" class="validate" name="name">
                        <label for="name">Name</label>
                    </div>
                    <div class="input-field">
                        <input id="caption" type="text" class="validate" name="caption">
                        <label for="caption">Caption</label>
                    </div>
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>File</span>
                            <input name="url" type="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <input hidden name="studio_id" value="{{$studio->id}}">
                    <button class="btn waves-effect waves-light" type="submit">
                        Add photo
                        <i class="material-icons right">add</i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <h3>Available equipment</h3>
    </div>
    <div class="row">
        <div class="col s6">
            <h4>Equipment</h4>
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
                @foreach ($studio->equipment as $equipment)
                    <tr class="visibility">
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
                            <form method="POST" action="{{ url('admin/studios',$studio->id) }}/remove-equipment/{{ $equipment->id }}" style="display: inline-block;">
                                {{ csrf_field() }}
                                <button class="red-text clear-btn" type="submit"><i class="material-icons">clear</i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
                <form method="POST" action="{{ url('admin/studios',$studio->id) }}/add-equipment" class="col s12">
                    {{ csrf_field() }}
                   <div class="input-field col s6">
                        <select name="equipment_id">
                            <option value="" disabled selected>Equipment:</option>
                            @foreach ($equipments as $equipmentItem)
                                <option value="{{ $equipmentItem->id }}">{{ $equipmentItem->name }}</option>
                            @endforeach
                        </select>
                        <label>Add Equipment</label>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit">
                        Add item
                        <i class="material-icons right">add</i>
                    </button>              
                </form>
            </div>
        </div>
        <div class="col s6">
            <div class="row">
                <h4>Packages</h4>
            </div>
            <div class="row">
            @foreach ($studio->package as $package)
                <div class="col s12 m6">
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
                            <form action="{{ url('admin/studios',$studio->id) }}/remove-package/{{ $package->id }}" method="post">
                                {{ csrf_field() }}
                                <button type="submit" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">clear</i></button>
                            </form>
                            {{--  <a class="btn-floating halfway-fab waves-effect waves-light red" href="{{ url('admin/studios',$studio->id) }}/remove-package/{{ $package->id }}"><i class="material-icons">clear</i></a>  --}}
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="col s12 m6">
                    <form method="POST" action="{{ url('admin/studios',$studio->id) }}/add-package" class="col s12">
                        {{ csrf_field() }}
                        <div class="input-field col s12">
                            <select name="package_id">
                                <option value="" disabled selected>Equipment:</option>
                                @foreach ($packages as $package)
                                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                                @endforeach
                            </select>
                            <label>Add Equipment</label>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit">
                            Add Package
                            <i class="material-icons right">add</i>
                        </button>              
                    </form>
                </div>
            </div>
        </div>
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