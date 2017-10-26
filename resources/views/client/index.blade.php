@extends ('layouts.master')

@section ('content')
    <div class="row">
        <h1>Client Dashboard</h1>
    </div>
    <div class="row">
        <h4>Welcome, {{ Auth::user()->name }}!</h4>
        <a class="waves-effect waves-light btn"><i class="material-icons right">settings</i>Account settings</a>
    </div>
    <div class="row">
        <h3>All your upcomming bookings:</h3>
    </div>
    <div class="row">
        @foreach( Auth::user()->booking as $booking )
        <div class="col s12 m6">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">{{ $booking->studio->name }}</span>
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
                    <p>Notes:{{ $booking->notes }}</p>
                </div>
                <div class="card-action">
                    <a href="#">View booking</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection