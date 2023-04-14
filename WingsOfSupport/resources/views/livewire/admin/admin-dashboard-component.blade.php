<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"><img src="{{ asset('assets/img/slide/2.png')}}" style="width:100%"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Dashboard</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Dashboard</li>
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
                                        <div class="col-md-4">
                                            <a href="{{ route('admin.service_categories') }}" class="btn btn-info pull-right">Service Category</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="{{ route('admin.all_services') }}" class="btn btn-info pull-right">Service Subcategory</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="{{ route('admin.service_providers') }}" class="btn btn-info pull-right">All Service Providers</a>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="{{ route('admin.customers') }}" class="btn btn-info pull-left">All Homeowners</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="{{ route('admin.contacts') }}" class="btn btn-info pull-left">All Contacts</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="{{ route('admin.feedback') }}" class="btn btn-info pull-left">All Feedback</a>
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
