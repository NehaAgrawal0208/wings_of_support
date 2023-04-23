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
                <h1>All Service</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/admin/dashboard">Dashboard</a></li>
                        <li>/</li>
                        <li>All Service</li>
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
                                            All Service
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('admin.add_service') }}" class="btn btn-info pull-right">Add Services</a>
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
                                                {{-- <th>Price</th> --}}
                                                <th>Status</th>
                                                <th>Featured</th>
                                                <th>Category</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($services as $service)
                                                <tr>
                                                    <td>{{$loop->index +1}}</td>
                                                    <td><img src="{{ asset('images/services/thumbnails') }}/{{ $service->thumbmail }}" width="60" /></td>
                                                    <td>{{ $service->name }}</td>
                                                    {{-- <td>{{ $service->price }}</td> --}}
                                                    <td>
                                                        @if($service->status)
                                                            Active
                                                        @else
                                                            Inactive
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($service->featured)
                                                            Yes
                                                        @else
                                                            No
                                                        @endif
                                                    </td>
                                                    <td>{{ $service->category->name }}</td>
                                                    <td>{{ $service->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.edit_service',['service_slug'=>$service->slug]) }}">
                                                            <i class="fa fa-edit fa-2x text-info"></i>
                                                        </a>
                                                        <a href="#" onclick="if(!confirm('Are you sure to delete?? ')){ event.stopImmediatePropagation(); }" wire:click.prevent="deleteService({{ $service->id }})" style="margin-left:10px; ">
                                                            <i class="fa fa-times fa-2x text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                {{ $services->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
