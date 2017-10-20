@extends ('layouts.master')

@section ('content')
    <div class="row">
        <h1>Edit: {{$studio->name}}</h1>
    </div>
    <div class="row">
        <div class="col s12 red-text">
            <a href="{{ url('admin/studios') }}" class="breadcrumb grey-text lighten-1">Studios</a>
            <a href="#!" class="breadcrumb red-text">{{ $studio->name }}</a>
        </div>
    </div>
    <form method="POST" action="{{ url('admin/studios',$studio->id) }}" class="col s12">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="fixed-action-btn">
            <button class="btn-floating btn-large red" type="submit">
                <i class="large material-icons">save</i>
            </button>
        </div>
        <div class="row">
            <h4>General info</h4>
        </div>
        <div class="row">
         {{--  <table>
             <tr>
                 <td><b>Created:</b></td>
                 <td>{{ $studio->created_at->toFormattedDateString() }}</td>
             </tr>
             <tr>
                 <td><b>Last updated:</b></td>
                 <td>{{ $studio->updated_at->toFormattedDateString() }}</td>
             </tr>
         </table>  --}}
             
        </div>
        <div class="row">
            <div class="input-field col m5 s12">
                <input name="name" id="name" type="text" class="validate" value="{{$studio->name}}">
                <label for="name">Name</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col m8 s12">
                <textarea name="info" id="info" class="materialize-textarea">{{$studio->info}}</textarea>
                <label for="info">Info</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col m8 s12">
                <textarea name="specs" id="specs" class="materialize-textarea">{{$studio->specs}}</textarea>
                <label for="specs">Specs (seperated by ,)</label>
            </div>
        </div>
        <div class="row">
            <h4>Studio location:</h4>
        </div>
        <div class="row">
            <div class="col s12 m6">
            <iframe
                width="100%" height="450"
                frameborder="0" style="border:0"
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDvLi1PKDdoUCpCAiixd4qOjzeOxO-GfTQ&q={{$studio->location}}"
                allowfullscreen
                ></iframe>
            </div>
            <div class="col s12 m6">
                <div class="input-field col m8 s12">
                    <input name="location" id="location" type="text" class="validate" value="{{$studio->location}}">
                    <label for="location">Location</label>
                </div>
            </div>
        </div>
        <div class="row">
            <h4>Assistance availability:</h4>
        </div>
        <div class="row">
            <div class="col s12 m6">
                <div class="switch">
                    <label>
                        No
                        <input name="assistance" 
                            type="checkbox"
                            @if ($studio->assistance)
                            checked="checked"
                            @endif
                            value="1">
                        <span class="lever"></span>
                        Yes
                    </label>
                    <br/><br/>
                </div>
            </div>
        </div>
        <div class="row">
            @include ('layouts.errors')
        </div>
    </form>
    {{-- old table relation stuff --}}
    {{--  
    
    <div class="row">
        <div class="divider"></div>
        <h4>Stuff that needs to be editable in the future:</h4>
    </div>
    <div class="row">
        <h5>Equimpent kits</h5>
        <ul>
            @foreach ($studio->equipmentKits as $equipment)
            <li>
                <span>{{ $equipment->name }}</span>
                <span>{{ $equipment->equipment }}</span>                  
            </li>
            @endforeach
        </ul>
    </div>
    <div class="row">
        <h5>Colorama</h5>
        <div class="colorama">
            <ul>
                @foreach ($studio->colorama as $colorama)
                <li class="valign-wrapper center-align" style="background-color: #{{ $colorama->color}};">
                    <span>{{ $colorama->color }}</span>
                    <span>{{ $colorama->name }}</span>                  
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <h5>Lunch kits</h5>
        <ul>
            @foreach ($studio->lunchKits as $lunch)
            <li>
                <span>{{ $lunch->name }}</span>
                <span>{{ $lunch->content }}</span>                  
            </li>
            @endforeach
        </ul>
    </div>
    <div class="row">
        <h5>Minibar content</h5>
        <ul>
            @foreach ($studio->minibarContents as $minibar)
            <li>
                <span>{{ $minibar->name }}</span>              
            </li>
            @endforeach
        </ul>
    </div>  --}}
@endsection

@section ('footer')
    <script src=""></script>
@endsection