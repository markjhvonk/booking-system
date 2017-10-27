@extends ('layouts.master')

@section ('content')
    <div class="row">
        <h1>Client Dashboard</h1>
    </div>
    <div class="row">
        <h4>Welcome, <b>{{ Auth::user()->name }}</b>!</h4>
        {{--  <a class="waves-effect waves-light btn" href="{{ url('client/edit') }}"><i class="material-icons right">settings</i>Account settings</a>  --}}
    </div>
    <div class="row">
        <h3>All your upcomming bookings:</h3>
    </div>
    <div class="row">
        @foreach( Auth::user()->booking as $booking )
        <div class="col s12 m6">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Booking #{{ $booking->id }}, in {{ $booking->studio->name }}</span>
                    <table>
                        <tbody>
                            <tr>
                                <td>Date:</td>
                                <td>{{ $booking->date }}</td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td>{{ $booking->time_frame }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-action">
                    <a href="{{ url('client/booking', $booking->id) }}" class="left">View booking</a>
                    <form action="{{ url('client/booking', $booking->id) }}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="red-text clear-btn right"><i class="material-icons left">clear</i>Cancel booking</button>
                    </form>
                    <div style="clear: both;"></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection