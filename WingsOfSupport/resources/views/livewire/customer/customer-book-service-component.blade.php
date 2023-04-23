<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"><img src="{{ asset('assets/img/slide/2.png')}}" style="width:100%"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Book Service</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Book Service</li>
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
                                            Book Service
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <a href="{{ route('admin.service_categories') }}" class="btn btn-info pull-right">All Service Categories</a>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="panel-body">
                                    @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                    @endif
                                    <form class="form-horizontal" wire:submit.prevent='bookService'>
                                        @csrf
                                        <div class="form-group">
                                            <label for="service_id" class="control-label col-md-3">Service:</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="service_id" wire:model="service_id">
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                @endforeach
                                                </select>
                                                @error('service_id')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="service_id" class="control-label col-md-3">Service Provider:</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="service_provider_id" wire:model="service_provider_id">
                                                    <option value="">Select Service Provider</option>
                                                    @foreach ($providers as $provider)
                                                        <option value="{{ $provider->id }}" data-charge="{{ $provider->charge }}">{{ $provider->user->name }}</option>
                                                    @endforeach
                                                </select>
                                                {{-- <label for="service_charge" class="control-label">Service Charge:</label>
                                                <input class="form-control" type="text" id="service_charge" name="service_charge" readonly> --}}
                                                @error('service_provider_id')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="service_charge" class="control-label col-md-3">Service Charge:</label>
                                            <div class="col-md-9">
                                            <input class="form-control" type="text" id="service_charge" name="service_charge" readonly>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success pull-right">Book</button>
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
<script>
    const providerSelect = document.querySelector('[name="service_provider_id"]');
    const chargeInput = document.querySelector('[name="service_charge"]');
    providerSelect.addEventListener('change', () => {
        const selectedOption = providerSelect.selectedOptions[0];
        const charge = selectedOption.getAttribute('data-charge');
        chargeInput.value = charge;
    });
</script>
