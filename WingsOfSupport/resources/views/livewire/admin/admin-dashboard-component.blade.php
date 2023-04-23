<style>
.button-container {
  display: flex;
  justify-content: center;
  align-items: center;
}

.button {
  display: inline-block;
  padding: 10px 20px;
  margin: 10px;
  border: 10px;
  border-radius: 5px;
  color: #fff;
  background-color: #007bff;
  font-size: 16px;
  font-weight: 600;
  text-align: center;
  letter-spacing: 1px;
  text-decoration: uppercase;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.button:hover {
  background-color: #b81616;
}

</style>
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
                                    
                                    <div class="button-container">

                                        <a href="{{ route('admin.service_categories') }}" class="button">Service Category</a>
                                        <a href="{{ route('admin.all_services') }}" class="button">Service Subcategory</a>
                                        <a href="{{ route('admin.service_providers') }}" class="button">All Service Providers</a>
                                        <a href="{{ route('admin.customers') }}" class="button">All Homeowners</a>
                                        <a href="{{ route('admin.contacts') }}" class="button">All Contacts</a>
                                        <a href="{{ route('admin.feedback') }}" class="button">All Feedback</a>
                                        <a href="{{ route('admin.book_services') }}" class="button">Book Services</a>
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
