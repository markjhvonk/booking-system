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
        <a class="waves-effect waves-light btn yellow darken-1" href="{{ url('admin/studios',$studio->id) }}/edit">edit</a>
        <a class="waves-effect waves-light btn yellow darken-1" href="{{ url('admin/studios',$studio->id) }}/edit">visibility</a>
        <form method="POST" action="{{ url('admin/studios',$studio->id) }}" style="display: inline-block; margin: 0 0 0 5px">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button class="waves-effect waves-light btn red"><i class="material-icons right">delete</i>delete</button>
        </form>
    </div>
    <div class="row">
        <p>{{$studio->info}}</p>
    </div>
@endsection

@section ('footer')
    <script src=""></script>
@endsection