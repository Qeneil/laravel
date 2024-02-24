@extends('user.layouts.template')
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="box_main">
                <ul> 
                    <li><a href="{{ route('userprofile') }}">Dash Board</a></li>
                <li><a href="{{ route('userpendingorder') }}">PendingOrder</a></li>
                <li><a href="{{ route('userhistory') }}">History</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="box_main">
                @yield('profilecontent')
            </div>
        </div>
    </div>
</div>
@endsection
