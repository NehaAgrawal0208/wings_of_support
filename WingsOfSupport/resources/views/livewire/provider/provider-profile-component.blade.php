<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"><img src="{{ asset('assets/img/slide/2.png')}}" style="width:100%"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Profile</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/provider/dashboard">Dashboard</a></li>
                        <li>/</li>
                        <li>Profile</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row portfolioContainer">
                        <div class="col-md-8 col-md-offset-2 profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            Profile
                                        </div>
                                        <div class="col-md-6">

                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="roe">
                                        <div class="col-md-4">
                                            @if($provider->image)
                                                <img src="{{ asset('images/providers') }}/{{ $provider->image }}" width="100%" />
                                            @else
                                                <img src="{{ asset('images/providers/1.jpg') }}" width="100%" />
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <h3>Name:{{ Auth::user()->name }}</h3>
                                            <p>{{ $provider->about }}</p>
                                            <p><b>Email:</b>{{ Auth::user()->email }}</p>
                                            <p><b>Phone:</b>{{ Auth::user()->phone }}</p>
                                            {{-- <p><b>Service Category:</b>
                                                @if($provider->service_category_id)
                                                    {{ $provider->category->name }}
                                                @endif
                                            </p> --}}
                                            <p><b>Service:</b>
                                                @if($provider->service_id)
                                                    {{ $provider->service->name }}
                                                @endif
                                            </p>
                                            <p><b>City:</b>{{ $provider->city }}</p>
                                            <p><b>Service Location:</b>{{ $provider->service_location }}</p>
                                            <p><b>Service Charge:</b>{{ $provider->charge }}</p>
                                            <a href="{{ route('provider.edit_profile') }}" class="btn btn-info pull-right">Edit Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
