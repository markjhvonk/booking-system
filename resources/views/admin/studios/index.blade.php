@extends ('layouts.master')

@section ('content')
    <div class="row">
        <h1>Studios</h1>
    </div>
    <div class="row">
        <div class="col s12 m12">
            <a class="waves-effect waves-light btn" href="{{ url('admin/studios/create') }}">new studio</a>
        </div>
    </div>
    <div class="row">
        
    @foreach ($studios as $studio)

        <div class="col s12 m4">
            <div class="card medium">
                <div class="card-image">
                    @foreach ($studio->photo as $photo)
                        @if($loop->first)
                            <img src="{{asset('/storage/'.$photo->url)}}">
                        @endif
                    @endforeach
                    <span class="card-title">{{ $studio->name }}</span>
                </div>
                <div class="card-content">
                    <p class="truncate">{{ $studio->info }}</p>
                </div>
                <div class="card-action">
                    <a class="btn-flat left" href="{{ url('admin/studios',$studio->id) }}">View</a>
                    <form method="POST" action="{{ url('admin/studios',$studio->id) }}/visible">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        @if($studio->visible)
                        <button type="submit" class="btn-flat right"><i class="material-icons green-text">visibility</i></button>
                        @else
                        <button type="submit" class="btn-flat right"><i class="material-icons gray-text">visibility_off</i></button>
                        @endif
                    </form>
                </div>
            </div>
        </div>

    @endforeach

    </div>

@endsection

@section ('footer')
    <script src=""></script>
@endsection