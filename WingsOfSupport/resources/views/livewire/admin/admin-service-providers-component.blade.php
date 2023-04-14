<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display:block !important;
        }
    </style>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"><img src="{{ asset('assets/img/slide/2.png')}}" style="width:100%"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Service Providers</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/admin/dashboard">Dashboard</a></li>
                        <li>/</li>
                        <li>Service Providers</li>
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
                        <div class="col-md-12 profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            All Service Providers
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('admin.service_provider_pdf') }}" class="btn btn-info pull-right">Export PDF</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                    @endif
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>City</th>
                                                <th>About</th>
                                                <th>Services</th>
                                                <th>Service Location</th>
                                                <th>Service Charge</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($providers as $provider)
                                                <tr>
                                                    <td>{{$loop->index +1}}</td>
                                                    <td><img src="{{ asset('images/providers') }}/{{ $provider->image }}" width="60" /></td>
                                                    <td>{{ $provider->user->name }}</td>
                                                    <td>{{ $provider->user->email }}</td>
                                                    <td>{{ $provider->user->phone }}</td>
                                                    <td>{{ $provider->city }}</td>
                                                    <td>{{ $provider->about }}</td>
                                                    <td>{{ $provider->service->name }}</td>
                                                    <td>{{ $provider->service_location }}</td>
                                                    <td>{{ $provider->charge }}</td>
                                                    <td>
                                                        <a href="#" onclick="if(!confirm('Are you sure to delete?? ')){ event.stopImmediatePropagation(); }" wire:click.prevent="deleteProvider({{ $provider->id }})" style="margin-left:10px; ">
                                                            <i class="fa fa-times fa-2x text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                {{ $providers->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
