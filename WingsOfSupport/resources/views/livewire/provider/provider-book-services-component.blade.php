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
                <h1>Book Services</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/provider/dashboard">Dashboard</a></li>
                        <li>/</li>
                        <li>Book Services</li>
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
                                            Book Services
                                        </div>
                                        <div class="col-md-6">

                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">

                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Customer Name</th>
                                                <th>Customer Email</th>
                                                <th>Customer Phone</th>
                                                <th>Service Name</th>
                                                <th>Book Date</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bookservices as $bookservice)
                                                <tr>
                                                    <td>{{$loop->index +1}}</td>
                                                    <td>{{ $bookservice->user->name }}</td>
                                                    <td>{{ $bookservice->user->email }}</td>
                                                    <td>{{ $bookservice->user->phone }}</td>
                                                    <td>{{ $bookservice->service->name }}</td>
                                                    <td>{{ $bookservice->created_at }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                {{-- {{ $bookservices->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
