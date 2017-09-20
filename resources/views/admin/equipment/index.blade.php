@extends ('layouts.master')

@section ('content')
    <div class="row">
        <h1>Equipment</h1>
    </div>
    <div class="row">
        <div class="col s12 m12">
            <a class="waves-effect waves-light btn" href="{{ url('admin/studios/create') }}">new equipment</a>
        </div>
    </div>
    <div class="row">
        
    @foreach ($equipment as $equipment)

        <div class="col s12 m4">
            <div class="card medium blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">{{ $equipment->name }}</span>
                    <p>{{ $studio->info }}</p>
                </div>
                <div class="card-action">
                    <a href="{{ url('admin/studios',$equipment->id) }}">View</a>
                </div>
            </div>
        </div>

    @endforeach

    </div>

@endsection

@section ('footer')
    <script src=""></script>
@endsection