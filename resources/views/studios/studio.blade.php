@extends ('layouts.master')

@section ('content')
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