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
        <a class="waves-effect waves-light btn green darken-1" href="{{ url('admin/studios',$studio->id) }}/edit"><i class="material-icons right">visibility</i>visibility</a>
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
            <h4>Packages</h4>
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