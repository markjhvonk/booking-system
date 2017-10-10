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
            <table>
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
                {{--  @foreach ($equipment as $equipment)  --}}
                    <tr class="visibility">
                        <td></td>
                        <td class="description truncate"></td>
                        <td>
                            {{--  @if(!$equipment->data)
                                N/A
                            @else
                                {{ $equipment->data }}
                            @endif  --}}
                        </td>
                        <td>&pound;</td>
                        <td></td>
                        <td class="right-align">
                            <a class="blue-text" href="/edit"><i class="material-icons">edit</i></a>
                            <form method="POST" action="" style="display: inline-block;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button class="red-text clear-btn" type="submit"><i class="material-icons">delete</i></button>
                            </form>
                            <form method="POST" action="/visible" style="display: inline-block;">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}
                                <button class="green-text clear-btn" type="submit">
                                    <i class="material-icons">
                                    {{--  @if($equipment->visible === 1)
                                        visibility
                                    @else
                                        visibility_off
                                    @endif  --}}
                                    </i>
                                </button>
                            </form>
                        </td>
                    </tr>
                {{--  @endforeach  --}}
                </tbody>
            </table>
        </div>
        <div class="col s6">
            <h4>Packages</h4>
        </div>
    </div>
@endsection

@section ('footer')
    <script src=""></script>
@endsection