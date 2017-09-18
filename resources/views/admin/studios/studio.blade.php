@extends ('layouts.master')

@section ('content')
     <div class="fixed-action-btn">
        <a class="btn-floating btn-large red" href="">
            <i class="large material-icons">mode_edit</i>
        </a>
        <ul>
            <li><a class="btn-floating yellow darken-1" href="../../admin/studios/{{ $studio->id }}/edit"><i class="material-icons">mode_edit</i></a></li>
            <li><a class="btn-floating green"><i class="material-icons">visibility</i></a></li>
            {{--  <li><a class="btn-floating green"><i class="material-icons">visibility_off</i></a></li>  --}}
            <form method="POST" action="../../admin/studios/{{$studio->id}}">
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
        <p>{{$studio->info}}</p>
    </div>
    <div class="row">
        <h3>Equimpent kits</h3>
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
        <h3>Colorama</h3>
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
        <h3>Lunch kits</h3>
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
        <h3>Minibar content</h3>
        <ul>
            @foreach ($studio->minibarContents as $minibar)
            <li>
                <span>{{ $minibar->name }}</span>              
            </li>
            @endforeach
        </ul>
    </div>
@endsection

@section ('footer')
    <script src=""></script>
@endsection