@extends ('layouts.master')

@section ('content')
    <div class="row">
        <h1>Studios</h1>
    </div>
    <div class="row">
        
    @foreach ($studios as $studio)

        <div class="col s12 m4">
            <div class="card medium blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">{{ $studio->name }}</span>
                    <p>{{ $studio->info }}</p>
                </div>
                <div class="card-action">
                    <a href="/admin/studios/{{ $studio->id }}">View</a>
                </div>
            </div>
        </div>

    @endforeach

    </div>

@endsection

@section ('footer')
    <script src=""></script>
@endsection