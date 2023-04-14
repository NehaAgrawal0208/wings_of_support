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
                                            Contacts
                                        </div>
                                        <br>
                                        <div class="col-md-6">
                                            {{-- <a href="{{ route('admin.contacts_pdf') }}" class="btn btn-info pull-right">Export PDF</a> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    {{-- @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                    @endif --}}
                                    <table class="table table-striped" border="1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Message</th>
                                                <th>Created At</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contacts as $contact)
                                                <tr>
                                                    <td>{{$loop->index +1}}</td>
                                                    <td>{{ $contact->name }}</td>
                                                    <td>{{ $contact->email }}</td>
                                                    <td>{{ $contact->phone }}</td>
                                                    <td>{{ $contact->message }}</td>
                                                    <td>{{ $contact->created_at }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                {{-- {{ $contacts->links() }} --}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
