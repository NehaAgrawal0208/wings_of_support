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
                <h1>Feedbacks</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/admin/dashboard">Dashboard</a></li>
                        <li>/</li>
                        <li>Feedbacks</li>
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
                                            Feedbacks
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('admin.feedback_pdf') }}" class="btn btn-info pull-right">Export PDF</a>
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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Category</th>
                                                <th>Feedback</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($feedbacks as $feedback)
                                                <tr>
                                                    <td>{{$loop->index +1}}</td>
                                                    <td>{{ $feedback->name }}</td>
                                                    <td>{{ $feedback->email }}</td>
                                                    <td>{{ $feedback->phone }}</td>
                                                    <td>{{ $feedback->category->name }}</td>
                                                    <td>{{ $feedback->feedback }}</td>
                                                    <td>{{ $feedback->created_at }}</td>
                                                    <td>
                                                        <a href="#" onclick="if(!confirm('Are you sure to delete?? ')){ event.stopImmediatePropagation(); }" wire:click.prevent="deleteFeedback({{ $feedback->id }})" style="margin-left:10px; ">
                                                            <i class="fa fa-times fa-2x text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                {{ $feedbacks->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
