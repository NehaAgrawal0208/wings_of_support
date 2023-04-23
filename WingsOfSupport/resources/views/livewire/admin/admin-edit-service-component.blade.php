<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"><img src="{{ asset('assets/img/slide/2.png')}}" style="width:100%"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Edit Service</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/admin/dashboard">Dashboard</a></li>
                        <li>/</li>
                        <li>Edit Service</li>
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
                                            Edit Service
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('admin.all_services') }}" class="btn btn-info pull-right">All Services</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                    @endif
                                    <form class="form-horizontal" wire:submit.prevent='updateService'>
                                        @csrf
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">Name: </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="name" wire:model="name" wire:keyup='generateSlug' />
                                                @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">Slug: </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="slug" wire:model="slug" />
                                                @error('slug')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">Tagline: </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="tagline" wire:model="tagline" />
                                                @error('tagline')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">Service Category: </label>
                                            <div class="col-sm-9">
                                                <select class="form-control" wire:model="service_category_id">
                                                    <option value="">Select Service Category</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('service_category_id')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">Price: </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="price" wire:model="price" />
                                                @error('price')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">Discount: </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="discount" wire:model="discount" />
                                                @error('discount')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">Discount Type: </label>
                                            <div class="col-sm-9">
                                                <select class="form-control" wire:model="discount_type">
                                                    <option value="">Select Discount Type</option>
                                                    <option value="fixed">Fixed</option>
                                                    <option value="percent">Percent</option>
                                                </select>
                                                @error('discount_type')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">Featured: </label>
                                            <div class="col-sm-9">
                                                <select class="form-control" wire:model="featured">
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">Description: </label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" wire:model="description"></textarea>
                                                @error('description')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">Exclusion: </label>
                                            <div class="col-sm-9" wire:model="exclusion">
                                                <textarea class="form-control"></textarea>
                                                @error('exclusion')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">Thumbnail: </label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control-file" name="thumbmail" wire:model="newthumbmail" />
                                                @error('newthumbmail')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                @if($newthumbmail)
                                                    <img src="{{ $newthumbmail->temporaryUrl() }}" width="60" />
                                                @else
                                                <img src="{{ asset('images/services/thumbnails') }}/{{ $thumbmail }}" width="60" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">Image: </label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control-file" name="image" wire:model="newimage" />
                                                @error('newimage')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                @if($newimage)
                                                    <img src="{{ $newimage->temporaryUrl() }}" width="60" />
                                                @else
                                                    <img src="{{ asset('images/services') }}/{{ $image }}" width="60" />
                                                @endif
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success pull-right">Update Service</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
