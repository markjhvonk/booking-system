@extends ('layouts.master')

@section ('content')
    <div class="row">
        <h1>Booking #{{ $booking->id }}:</h1>
    </div>
    <div class="row">
        <div class="col s12 red-text">
            <a href="{{ url('client') }}" class="breadcrumb grey-text lighten-1">Dashboard</a>
            <a href="#!" class="breadcrumb red-text">Booking #{{ $booking->id }}</a>
        </div>
    </div>
    <div class="row">
        <h3>Studio: <b>{{ $booking->studio->name }}</b></h3>
    </div>
    <div class="row">
        <h4>Date & time:</h4>
        <table class="col m6 s12">
            <tbody>
                <tr>
                    <td>Date:</td>
                    <td><b>{{ $booking->date }}</b></td>
                </tr>
                <tr>
                    <td>Time</td>
                    <td><b>{{ $booking->time_frame }}</b></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <h4>
            Selected assistance: 
            <b>
                @if($booking->selected_assistance)
                Yes
                @else
                No
                @endif
            </b>
        </h4>
    </div>
    <div class="row">
        <h4>Notes:</h4>
        <p>{{ $booking->notes }}</p>
    </div>
    <form action="{{ url('client/booking', $booking->id) }}" method="post">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="red-text clear-btn"><i class="material-icons left">clear</i>Cancel booking</button>
    </form>
@endsection

@section ('footer')
    <script>
    $(document).ready(function() {
        $('select').material_select();
    });
    </script>
@endsection