<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"><img src="{{ asset('assets/img/slide/2.png')}}" style="width:100%"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Profile</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
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
                                            @if($customer->image)
                                                <img src="{{ asset('images/homeowners') }}/{{ $customer->image }}" width="100%" />
                                            @else
                                                <img src="{{ asset('images/homeowners/1.jpg') }}" width="100%" />
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <h3>Name:{{ Auth::user()->name }}</h3>
                                            <p><b>Email:</b>{{ Auth::user()->email }}</p>
                                            <p><b>Phone:</b>{{ Auth::user()->phone }}</p>
                                            <p><b>Address:</b>{{ $customer->address }}</p>
                                            <a href="{{ route('customer.edit_profile') }}" class="btn btn-info pull-right">Edit Profile</a>
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
