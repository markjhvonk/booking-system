@extends ('layouts.master')

@section ('content')
    <div class="row">
        <h1>Admin Dashboard</h1>
    </div>
    <div class="row">
        <h3>Upcomming bookings:</h3>
    </div>
    <div class="row">
        @foreach( $bookings as $booking )
        <div class="col s12 m6">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Booking #{{ $booking->id }}</span>
                    <table>
                        <tbody>
                            <tr>
                                <td>Studio</td>
                                <td><b>{{ $booking->studio->name }}</b></td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td><b>{{ $booking->date }}</b></td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td><b>{{ $booking->time_frame }}</b></td>
                            </tr>
                            <tr>
                                <td>Notes</td>
                                <td><b>{{ $booking->notes }}</b></td>
                            </tr>
                            <tr>
                                <td>Client</td>
                                <td><b>{{ $booking->user->name }}</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{--  <div class="card-action">
                    <a href="{{ url('client/booking', $booking->id) }}" class="left">View booking</a>
                    <form action="{{ url('client/booking', $booking->id) }}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="red-text clear-btn right"><i class="material-icons left">clear</i>Cancel booking</button>
                    </form>
                    <div style="clear: both;"></div>
                </div>  --}}
            </div>
        </div>
        @endforeach
    </div>
@endsection