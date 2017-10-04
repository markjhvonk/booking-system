@extends ('layouts.master')

@section ('content')
    <div class="row">
        <h1>Edit Package</h1>
    </div>
    <div class="row">
        <div class="col s12 red-text">
            <a href="{{ url('admin/equipment') }}" class="breadcrumb grey-text lighten-1">Categories</a>
            @foreach ($categories as $category)
                @if($category->id == $package->category_id)
                <a href="{{ url('admin/equipment',$category->id) }}" class="breadcrumb grey-text lighten-1">{{ $category->name }}</a>
                @endif
            @endforeach
            <a href="#!" class="breadcrumb red-text">{{ $package->name }}</a>
        </div>
    </div>
    <div class="row">
        
    </div>
    <div class="row">
        <form method="POST" action="{{ url('admin/equipment/package',$package->id) }}" class="col s12 m6">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s12">
                    <input name="name" id="name" type="text" class="validate" value="{{ $package->name }}">
                    <label for="name">Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="description" id="description" class="materialize-textarea">{{ $package->description }}</textarea>
                    <label for="description">Description</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <select disabled name="">
                        <option value="" disabled selected>Categories:</option>
                        @foreach ($categories as $category)
                            @if($category->id == $package->category_id)
                                <option selected value="{{ $package->category->id }}">{{ $package->category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <label>Category</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <button class="btn waves-effect waves-light" type="submit">
                        Submit
                        <i class="material-icons right">send</i>
                    </button>                
                </div>
            </div>
        </form>
        <div class="col s12 m6">
            <table class="striped" style="height: 200px;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Data</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($package->equipment as $packageEquipment)
                    <tr>
                        <td>{{ $packageEquipment->name}}</td>
                        <td class="truncate" style="max-width: 200px;">{{ $packageEquipment->description}}</td>
                        <td>
                        @if(!$packageEquipment->data)
                            N/A
                        @else
                            {{ $packageEquipment->data }}
                        @endif
                        </td>
                        <td>&pound;{{ $packageEquipment->price}}</td>
                        <td>
                            <form method="POST" action="{{ url('admin/equipment/package',$package->id) }}/remove-equipment/{{ $packageEquipment->id }}"> 
                                {{ csrf_field() }}
                                <button type="submit" class="clear-btn">
                                    <i class="material-icons right red-text">clear</i>
                                </button>
                            </form>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Total:</td>
                        <td>&pound;{{ $totalPrice }}</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            <div class="row">
                <form method="POST" action="{{ url('admin/equipment/package',$package->id) }}/add-equipment" class="col s12">
                    {{ csrf_field() }}
                    <div class="input-field col s6">
                        <select name="equipment_id">
                            <option value="" disabled selected>Equipment:</option>
                            @foreach ($equipment as $equipmentItem)
                                <option value="{{ $equipmentItem->id }}">{{ $equipmentItem->name }}</option>
                            @endforeach
                        </select>
                        <label>Category</label>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit">
                        Add item
                        <i class="material-icons right">add</i>
                    </button>                
                </form>
            </div>
        </div>
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