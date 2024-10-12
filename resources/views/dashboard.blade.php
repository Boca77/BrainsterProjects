@extends('layout.main')

@include('layout.nav')
@section('content')
    <h1 class="display-6">Dashboard</h1>
    <div class="p-4 mt-4 rounded-4"
        style="background-color: rgb(255, 255, 255); box-shadow: 2px 11px 24px 1px rgba(0,0,0,0.36);">
        <div class="row">
            <div class="col-4 d-flex justify-content-center">
                <a href="{{ route('users') }}" class="text-decoration-none text-black w-100">
                    <div class="card border-2"
                        style="height: 200px;
                        background-image:linear-gradient(rgba(255,255,255,0.6), rgba(255,255,255,0.6)),
                        url('{{ asset('icons/users.jpg') }}');
                        background-size: contain;
                        background-repeat: no-repeat;
                        background-position: center;
                        box-shadow: 9px 9px 5px 0px rgba(0,0,0,0.1);">
                        <div class="card-body">
                            <p class="h2 card-text">Users</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-4 d-flex justify-content-center">
                <a href="" class="text-decoration-none text-black w-100">
                    <div class="card border-2"
                        style="height: 200px;
                        background-image:linear-gradient(rgba(255,255,255,0.6), rgba(255,255,255,0.6)),
                        url('{{ asset('icons/blogs.jpg') }}');
                        background-size: contain;
                        background-repeat: no-repeat;
                        background-position: center;
                        box-shadow: 9px 9px 5px 0px rgba(0,0,0,0.1);">
                        <div class="card-body">
                            <p class="h2 card-text">Blogs</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-4 d-flex justify-content-center">
                <a href="" class="text-decoration-none text-black w-100">
                    <div class="card border-2"
                        style="height: 200px;
                        background-image:linear-gradient(rgba(255,255,255,0.6), rgba(255,255,255,0.6)),
                        url('{{ asset('icons/comment.png') }}');
                        background-size: contain;
                        background-repeat: no-repeat;
                        background-position: center;
                        box-shadow: 9px 9px 5px 0px rgba(0,0,0,0.1);">
                        <div class="card-body">
                            <p class="h2 card-text">Comments</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-4 d-flex justify-content-center">
                <a href="" class="text-decoration-none text-black w-100">
                    <div class="card border-2"
                        style="height: 200px;
                        background-image:linear-gradient(rgba(255,255,255,0.6), rgba(255,255,255,0.6)),
                        url('{{ asset('icons/events.png') }}');
                        background-size: contain;
                        background-repeat: no-repeat;
                        background-position: center;
                        box-shadow: 9px 9px 5px 0px rgba(0,0,0,0.1);">
                        <div class="card-body">
                            <p class="h2 card-text">Events</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-4 d-flex justify-content-center">
                <a href="" class="text-decoration-none text-black w-100">
                    <div class="card border-2"
                        style="height: 200px;
                        background-image:linear-gradient(rgba(255,255,255,0.6), rgba(255,255,255,0.6)),
                        url('{{ asset('icons/conference.jpg') }}');
                        background-size: contain;
                        background-repeat: no-repeat;
                        background-position: center;
                        box-shadow: 9px 9px 5px 0px rgba(0,0,0,0.1);">
                        <div class="card-body">
                            <p class="h2 card-text">Conferences</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-4 d-flex justify-content-center">
                <a href="" class="text-decoration-none text-black w-100">
                    <div class="card border-2"
                        style="height: 200px;
                        background-image:linear-gradient(rgba(255,255,255,0.6), rgba(255,255,255,0.6)),
                        url('{{ asset('icons/speaker.jpg') }}');
                        background-size: contain;
                        background-repeat: no-repeat;
                        background-position: center;
                        box-shadow: 9px 9px 5px 0px rgba(0,0,0,0.1);">
                        <div class="card-body">
                            <p class="h2 card-text">Speakers</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-4 d-flex justify-content-center">
                <a href="" class="text-decoration-none text-black w-100">
                    <div class="card border-2"
                        style="height: 200px;
                        background-image:linear-gradient(rgba(255,255,255,0.6), rgba(255,255,255,0.6)),
                        url('{{ asset('icons/gear-6116836_1280.png') }}');
                        background-size: contain;
                        background-repeat: no-repeat;
                        background-position: center;
                        box-shadow: 9px 9px 5px 0px rgba(0,0,0,0.1);">
                        <div class="card-body">
                            <p class="h2 card-text">Page Settings</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
