<div>
    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row portfolioContainer">
                        <div class="col-md-12 profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6" style="text-align: center;">
                                            Feedbacks
                                        </div>
                                        <br>
                                        <div class="col-md-6">

                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">

                                    <table class="table table-striped" border="1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Category</th>
                                                <th>Feedback</th>
                                                <th>Created At</th>

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

                                                </tr>
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
