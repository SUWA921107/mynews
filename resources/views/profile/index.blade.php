@extends('layouts.profile_front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="profiles col-md-8 mx-auto mt-3">
                @foreach($profiles as $profile)
                    <div class="profile">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="name">
                                    <h4>name</h4>
                                    {{ $profile->name }}
                                </div>
                                <div class="gender mt-3">
                                    <h4>gender</h4>
                                    {{ $profile->gender }}
                                </div>
                                <div class="hobby mt-3">
                                    <h4>hobby</h4>
                                    {{ str_limit($profile->hobby, 1500) }}
                                </div>
                                <div class="introduction mt-3">
                                    <h4>introduction</h4>
                                    {{ str_limit($profile->introduction, 1500) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
@endsection