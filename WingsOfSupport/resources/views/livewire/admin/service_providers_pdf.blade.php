<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display:block !important;
        }
    </style>

    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row portfolioContainer">
                        <div class="col-md-12 profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            All Service Providers
                                        </div>
                                        <div class="col-md-6">

                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">

                                    <table class="table table-striped" border="1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                {{-- <th>Image</th> --}}
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>City</th>
                                                <th>About</th>
                                                <th>Services</th>
                                                <th>Service Location</th>
                                                <th>Service Charge</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($providers as $provider)
                                                <tr>
                                                    <td>{{$loop->index +1}}</td>
                                                    {{-- <td><img src="{{ asset('images/providers') }}/{{ $provider->image }}" width="60" /></td> --}}
                                                    <td>{{ $provider->user->name }}</td>
                                                    <td>{{ $provider->user->email }}</td>
                                                    <td>{{ $provider->user->phone }}</td>
                                                    <td>{{ $provider->city }}</td>
                                                    <td>{{ $provider->about }}</td>
                                                    <td>{{ $provider->service->name }}</td>
                                                    <td>{{ $provider->service_location }}</td>
                                                    <td>{{ $provider->charge }}</td>

                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
