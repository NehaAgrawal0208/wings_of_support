<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"><img src="{{ asset('assets/img/slide/2.png')}}" style="width:100%"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Edit Profile</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Edit Profile</li>
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
                                            Edit Profile
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('customer.profile') }}" class="btn btn-info pull-right">Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="roe">
                                        <div class="col-md-12">
                                            @if(Session::has('message'))
                                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                            @endif
                                            <form class="form-horizontal" wire:submit.prevent='updateProfile'>
                                                <div class="form-group">
                                                    <label for="newimage" class="control-label col-md-3">Profile Image:</label>
                                                    <div class="col-md-9">
                                                        <input type="file" class="form-control-file" name="newimage"  wire:model="newimage"/>
                                                        @if($newimage)
                                                            <img src="{{ $newimage->temporaryUrl() }}" width="220" />
                                                        @elseif($image)
                                                            <img src="{{ asset('images/homeowners') }}/{{ $image }}" width="220">
                                                        @else
                                                            <img src="{{ asset('images/homeowners/1.jpg') }}" width="220">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address" class="control-label col-md-3">Address:</label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" name="address" wire:model="address"></textarea>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-success pull-right">Update Profile</button>
                                            </form>
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
