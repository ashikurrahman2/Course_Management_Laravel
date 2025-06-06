@extends('layouts.admin')

@section('admin_content')

    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-sm-auto">
                            <div class="page-header-title">
                                <h5 class="mb-0">Dashboard</h5>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.dashboard') }}"><i
                                            class="ph-duotone ph-house"></i></a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Main Page</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            {{-- <div class="row">
                <!-- [ Row 1 ] start -->
                <div class="col-md-6 col-xl-4">
                    <div class="card statistics-card-1">
                        <div class="card-header d-flex align-items-center justify-content-between py-3">
                            <h5>Online Orders</h5>
                            <div class="dropdown"><a
                                    class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                        class="material-icons-two-tone f-18">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">View</a>
                                    <a class="dropdown-item" href="#">Edit</a></div>
                            </div>
                        </div>
                        <div class="card-body"><img
                                src="http://html.phoenixcoded.net/flatable/assets/images/widget/img-status-1.svg"
                                alt="img" class="img-fluid img-bg h-100">
                            <div class="d-flex align-items-center">
                                <h3 class="f-w-300 d-flex align-items-center m-b-0">237 <small
                                        class="text-muted">/400</small></h3><span
                                    class="badge bg-light-success ms-2">36%</span>
                            </div>
                            <p class="text-muted mb-2 text-sm mt-3">Delivery Orders</p>
                            <div class="progress" style="height: 7px">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 75%"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card statistics-card-1">
                        <div class="card-header d-flex align-items-center justify-content-between py-3">
                            <h5>Pending Orders</h5>
                            <div class="dropdown"><a
                                    class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                        class="material-icons-two-tone f-18">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">View</a>
                                    <a class="dropdown-item" href="#">Edit</a></div>
                            </div>
                        </div>
                        <div class="card-body"><img
                                src="http://html.phoenixcoded.net/flatable/assets/images/widget/img-status-2.svg"
                                alt="img" class="img-fluid img-bg">
                            <div class="d-flex align-items-center">
                                <h3 class="f-w-300 d-flex align-items-center m-b-0">100 <small
                                        class="text-muted">/500</small></h3><span
                                    class="badge bg-light-primary ms-2">20%</span>
                            </div>
                            <p class="text-muted mb-2 text-sm mt-3">Delivery Orders</p>
                            <div class="progress" style="height: 7px">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 75%"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card statistics-card-1">
                        <div class="card-header d-flex align-items-center justify-content-between py-3">
                            <h5>Return Orders</h5>
                            <div class="dropdown"><a
                                    class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                        class="material-icons-two-tone f-18">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">View</a>
                                    <a class="dropdown-item" href="#">Edit</a></div>
                            </div>
                        </div>
                        <div class="card-body"><img
                                src="http://html.phoenixcoded.net/flatable/assets/images/widget/img-status-3.svg"
                                alt="img" class="img-fluid img-bg">
                            <div class="d-flex align-items-center">
                                <h3 class="f-w-300 d-flex align-items-center m-b-0">50 <small
                                        class="text-muted">/400</small></h3><span
                                    class="badge bg-light-danger ms-2">10%</span>
                            </div>
                            <p class="text-muted mb-2 text-sm mt-3">Return Orders</p>
                            <div class="progress" style="height: 7px">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 75%"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div><!-- [ Row 1 ] end -->
                <!-- support-section start -->
                <div class="col-xxl-6 col-md-12">
                    <div class="card flat-card">
                        <div class="row-table">
                            <div class="col-sm-6 card-body br">
                                <div class="row">
                                    <div class="col-4"><i class="material-icons-two-tone text-primary mb-1">group</i>
                                    </div>
                                    <div class="col-8 text-md-center">
                                        <h5>1000</h5><span>Customers</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 card-body br">
                                <div class="row">
                                    <div class="col-4"><i class="material-icons-two-tone text-primary mb-1">language</i>
                                    </div>
                                    <div class="col-8 text-md-center">
                                        <h5>$1252</h5><span>Revenue</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 card-body br">
                                <div class="row">
                                    <div class="col-4"><i
                                            class="material-icons-two-tone text-primary mb-1">unarchive</i></div>
                                    <div class="col-8 text-md-center">
                                        <h5>600</h5><span>Growth</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 card-body br">
                                <div class="row">
                                    <div class="col-4"><i
                                            class="material-icons-two-tone text-primary mb-1">swap_horizontal_circle</i>
                                    </div>
                                    <div class="col-8 text-md-center">
                                        <h5>3550</h5><span>Returns</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 card-body br">
                                <div class="row">
                                    <div class="col-4"><i
                                            class="material-icons-two-tone text-primary mb-1">cloud_download</i></div>
                                    <div class="col-8 text-md-center">
                                        <h5>3550</h5><span>Downloads</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 card-body">
                                <div class="row">
                                    <div class="col-4"><i
                                            class="material-icons-two-tone text-primary mb-1">shopping_cart</i></div>
                                    <div class="col-8 text-md-center">
                                        <h5>100%</h5><span>Order</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card support-bar overflow-hidden">
                                <div class="card-body pb-0">
                                    <h2 class="m-0">53.94%</h2><span class="text-primary">Conversion Rate</span>
                                    <p class="mb-3 mt-3">Number of conversions divided by the total visitors.</p>
                                </div>
                                <div id="support-chart"></div>
                                <div class="card-footer border-0 bg-primary text-white background-pattern-white">
                                    <div class="row text-center">
                                        <div class="col">
                                            <h4 class="m-0 text-white">10</h4><span>2018</span>
                                        </div>
                                        <div class="col">
                                            <h4 class="m-0 text-white">15</h4><span>2017</span>
                                        </div>
                                        <div class="col">
                                            <h4 class="m-0 text-white">13</h4><span>2016</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card support-bar overflow-hidden">
                                <div class="card-body pb-0">
                                    <h2 class="m-0">1432</h2><span class="text-primary">Order delivered</span>
                                    <p class="mb-3 mt-3">Total number of order delivered in this month.</p>
                                </div>
                                <div class="card-footer border-0">
                                    <div class="row text-center">
                                        <div class="col">
                                            <h4 class="m-0">130</h4><span>May</span>
                                        </div>
                                        <div class="col">
                                            <h4 class="m-0">251</h4><span>June</span>
                                        </div>
                                        <div class="col">
                                            <h4 class="m-0">235</h4><span>July</span>
                                        </div>
                                    </div>
                                </div>
                                <div id="support-chart1"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Department wise monthly sales report</h5>
                        </div>
                        <div class="card-body">
                            <div class="row pb-2">
                                <div class="col-auto m-b-10">
                                    <h3 class="mb-1">$21,356.46</h3><span>Total Sales</span>
                                </div>
                                <div class="col-auto m-b-10">
                                    <h3 class="mb-1">$1935.6</h3><span>Average</span>
                                </div>
                            </div>
                            <div id="account-chart"></div>
                        </div>
                    </div>
                </div><!-- support-section end -->
                <!-- customer-section start -->
                <div class="col-xl-6 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6>Customer Satisfaction</h6><span>It takes continuous effort to maintain high customer
                                satisfaction levels Internal and external.</span>
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col">
                                    <div id="satisfaction-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card table-card">
                        <div class="card-header">
                            <h5>New Products</h5>
                        </div>
                        <div class="pro-scroll" style="height:255px;position:relative;">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover m-b-0">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>HeadPhone</td>
                                                <td><img src="{{asset('/')}}admin/assets/images/widget/p1.jpg" alt="" class="img-20">
                                                </td>
                                                <td>
                                                    <div><label class="badge bg-light-warning">Pending</label></div>
                                                </td>
                                                <td>$10</td>
                                                <td><a href="#!"><i
                                                            class="icon feather icon-edit f-16 text-success"></i></a><a
                                                        class="ms-3" href="#!"><i
                                                            class="feather icon-trash-2 f-16 text-danger"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>Iphone 6</td>
                                                <td><img src="{{asset('/')}}admin/assets/images/widget/p2.jpg" alt="" class="img-20">
                                                </td>
                                                <td>
                                                    <div><label class="badge bg-light-danger">Cancel</label></div>
                                                </td>
                                                <td>$20</td>
                                                <td><a href="#!"><i
                                                            class="icon feather icon-edit f-16 text-success"></i></a><a
                                                        class="ms-3" href="#!"><i
                                                            class="feather icon-trash-2 f-16 text-danger"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>Jacket</td>
                                                <td><img src="{{asset('/')}}admin/assets/images/widget/p3.jpg" alt="" class="img-20">
                                                </td>
                                                <td>
                                                    <div><label class="badge bg-light-success">Success</label></div>
                                                </td>
                                                <td>$35</td>
                                                <td><a href="#!"><i
                                                            class="icon feather icon-edit f-16 text-success"></i></a><a
                                                        class="ms-3" href="#!"><i
                                                            class="feather icon-trash-2 f-16 text-danger"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>Sofa</td>
                                                <td><img src="{{asset('/')}}admin/assets/images/widget/p4.jpg" alt="" class="img-20">
                                                </td>
                                                <td>
                                                    <div><label class="badge bg-light-danger">Cancel</label></div>
                                                </td>
                                                <td>$85</td>
                                                <td><a href="#!"><i
                                                            class="icon feather icon-edit f-16 text-success"></i></a><a
                                                        class="ms-3" href="#!"><i
                                                            class="feather icon-trash-2 f-16 text-danger"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>Iphone 6</td>
                                                <td><img src="{{asset('/')}}admin/assets/images/widget/p2.jpg" alt="" class="img-20">
                                                </td>
                                                <td>
                                                    <div><label class="badge bg-light-success">Success</label></div>
                                                </td>
                                                <td>$20</td>
                                                <td><a href="#!"><i
                                                            class="icon feather icon-edit f-16 text-success"></i></a><a
                                                        class="ms-3" href="#!"><i
                                                            class="feather icon-trash-2 f-16 text-danger"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>HeadPhone</td>
                                                <td><img src="{{asset('/')}}admin/assets/images/widget/p1.jpg" alt="" class="img-20">
                                                </td>
                                                <td>
                                                    <div><label class="badge bg-light-warning">Pending</label></div>
                                                </td>
                                                <td>$50</td>
                                                <td><a href="#!"><i
                                                            class="icon feather icon-edit f-16 text-success"></i></a><a
                                                        class="ms-3" href="#!"><i
                                                            class="feather icon-trash-2 f-16 text-danger"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>Iphone 6</td>
                                                <td><img src="{{asset('/')}}admin/assets/images/widget/p2.jpg" alt="" class="img-20">
                                                </td>
                                                <td>
                                                    <div><label class="badge bg-light-danger">Cancel</label></div>
                                                </td>
                                                <td>$30</td>
                                                <td><a href="#!"><i
                                                            class="icon feather icon-edit f-16 text-success"></i></a><a
                                                        class="ms-3" href="#!"><i
                                                            class="feather icon-trash-2 f-16 text-danger"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card prod-p-card card-border-none">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-0">
                                        <div class="col">
                                            <h6 class="m-b-5">Total Profit</h6>
                                            <h3 class="m-b-0">$1,783</h3>
                                        </div>
                                        <div class="col-auto"><i
                                                class="material-icons-two-tone text-success">card_giftcard</i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card prod-p-card bg-purple-500 card-border-none">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-0">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Total Orders</h6>
                                            <h3 class="m-b-0 text-white">15,830</h3>
                                        </div>
                                        <div class="col-auto"><i
                                                class="material-icons-two-tone text-white">local_mall</i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card prod-p-card bg-info card-border-none">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-0">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Average Price</h6>
                                            <h3 class="m-b-0 text-white">$6,780</h3>
                                        </div>
                                        <div class="col-auto"><i
                                                class="material-icons-two-tone text-white">monetization_on</i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card prod-p-card card-border-none">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-0">
                                        <div class="col">
                                            <h6 class="m-b-5">Product Sold</h6>
                                            <h3 class="m-b-0">6,784</h3>
                                        </div>
                                        <div class="col-auto"><i
                                                class="material-icons-two-tone text-danger">local_offer</i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card feed-card">
                        <div class="card-header">
                            <h5>Feeds</h5>
                        </div>
                        <div class="feed-scroll" style="height:385px;position:relative;">
                            <div class="card-body">
                                <div class="row m-b-25 align-items-center">
                                    <div class="col-auto p-r-0"><i data-feather="bell"
                                            class="bg-light-primary feed-icon p-2 wid-30 hei-30"></i></div>
                                    <div class="col"><a href="#!">
                                            <h6 class="m-b-5">You have 3 pending tasks. <span
                                                    class="text-muted float-end f-14">Just Now</span></h6>
                                        </a></div>
                                </div>
                                <div class="row m-b-25 align-items-center">
                                    <div class="col-auto p-r-0"><i data-feather="shopping-cart"
                                            class="bg-light-danger feed-icon p-2 wid-30 hei-30"></i></div>
                                    <div class="col"><a href="#!">
                                            <h6 class="m-b-5">New order received <span
                                                    class="text-muted float-end f-14">30 min ago</span></h6>
                                        </a></div>
                                </div>
                                <div class="row m-b-25 align-items-center">
                                    <div class="col-auto p-r-0"><i data-feather="file-text"
                                            class="bg-light-success feed-icon p-2 wid-30 hei-30"></i></div>
                                    <div class="col"><a href="#!">
                                            <h6 class="m-b-5">You have 3 pending tasks. <span
                                                    class="text-muted float-end f-14">Just Now</span></h6>
                                        </a></div>
                                </div>
                                <div class="row m-b-25 align-items-center">
                                    <div class="col-auto p-r-0"><i data-feather="bell"
                                            class="bg-light-primary feed-icon p-2 wid-30 hei-30"></i></div>
                                    <div class="col"><a href="#!">
                                            <h6 class="m-b-5">You have 4 tasks Done. <span
                                                    class="text-muted float-end f-14">1 hours ago</span></h6>
                                        </a></div>
                                </div>
                                <div class="row m-b-25 align-items-center">
                                    <div class="col-auto p-r-0"><i data-feather="file-text"
                                            class="bg-light-success feed-icon p-2 wid-30 hei-30"></i></div>
                                    <div class="col"><a href="#!">
                                            <h6 class="m-b-5">You have 2 pending tasks. <span
                                                    class="text-muted float-end f-14">Just Now</span></h6>
                                        </a></div>
                                </div>
                                <div class="row m-b-25 align-items-center">
                                    <div class="col-auto p-r-0"><i data-feather="shopping-cart"
                                            class="bg-light-danger feed-icon p-2 wid-30 hei-30"></i></div>
                                    <div class="col"><a href="#!">
                                            <h6 class="m-b-5">New order received <span
                                                    class="text-muted float-end f-14">4 hours ago</span></h6>
                                        </a></div>
                                </div>
                                <div class="row m-b-25 align-items-center">
                                    <div class="col-auto p-r-0"><i data-feather="shopping-cart"
                                            class="bg-light-danger feed-icon p-2 wid-30 hei-30"></i></div>
                                    <div class="col"><a href="#!">
                                            <h6 class="m-b-5">New order Done <span
                                                    class="text-muted float-end f-14">Just Now</span></h6>
                                        </a></div>
                                </div>
                                <div class="row m-b-25 align-items-center">
                                    <div class="col-auto p-r-0"><i data-feather="file-text"
                                            class="bg-light-success feed-icon p-2 wid-30 hei-30"></i></div>
                                    <div class="col"><a href="#!">
                                            <h6 class="m-b-5">You have 5 pending tasks. <span
                                                    class="text-muted float-end f-14">5 hours ago</span></h6>
                                        </a></div>
                                </div>
                                <div class="row m-b-0 align-items-center">
                                    <div class="col-auto p-r-0"><i data-feather="bell"
                                            class="bg-light-primary feed-icon p-2 wid-30 hei-30"></i></div>
                                    <div class="col"><a href="#!">
                                            <h6 class="m-b-5">You have 4 tasks Done. <span
                                                    class="text-muted float-end f-14">2 hours ago</span></h6>
                                        </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- customer-section end -->
            </div> --}}

              <div class="row">
          <!-- [ Row 1 ] start -->
          <div class="col-md-12 col-xxl-4">
            <div class="card statistics-card-1">
              <div class="card-body">
                <img src="http://html.phoenixcoded.net/flatable/assets/images/widget/img-status-2.svg" alt="img" class="img-fluid img-bg">
                <div class="d-flex align-items-center">
                  <div class="avtar bg-brand-color-1 text-white me-3">
                    <i class="ph-duotone ph-currency-dollar f-26"></i>
                  </div>
                  <div>
                    <p class="text-muted mb-0">Referrals</p>
                    <div class="d-flex align-items-end">
                      <h2 class="mb-0 f-w-500">
                        <span class="text-muted">$</span> 134.6 <small class="text-muted">k</small>
                      </h2>
                      <span class="badge bg-light-success ms-2">
                        <i class="ti ti-chevrons-up"></i> 55% </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xxl-4">
            <div class="card statistics-card-1">
              <div class="card-body">
                <img src="http://html.phoenixcoded.net/flatable/assets/images/widget/img-status-1.svg" alt="img" class="img-fluid img-bg">
                <div class="d-flex align-items-center">
                  <div class="avtar bg-brand-color-2 text-white me-3">
                    <i class="ph-duotone ph-scales f-26"></i>
                  </div>
                  <div>
                    <p class="text-muted mb-0">Conversion Rate</p>
                    <div class="d-flex align-items-end">
                      <h2 class="mb-0 f-w-500">8.57 <small class="text-muted">%</small>
                      </h2>
                      <span class="badge bg-light-danger ms-2">
                        <i class="ti ti-chevrons-down"></i> 3.6% </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xxl-4">
            <div class="card statistics-card-1">
              <div class="card-body">
                <img src="http://html.phoenixcoded.net/flatable/assets/images/widget/img-status-3.svg" alt="img" class="img-fluid img-bg">
                <div class="d-flex align-items-center">
                  <div class="avtar bg-brand-color-3 text-white me-3">
                    <i class="ph-duotone ph-users-four f-26"></i>
                  </div>
                  <div>
                    <p class="text-muted mb-0">Visits</p>
                    <div class="d-flex align-items-end">
                      <h2 class="mb-0 f-w-500">278</h2>
                      <span class="badge bg-light-success ms-2">
                        <i class="ti ti-chevrons-up"></i> 7% </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- [ Row 1 ] end -->
          <!-- [ Row 2 ] start -->
          <div class="col-md-6">
            <div class="card table-card">
              <div class="card-header">
                <h5>Affiliates</h5>
              </div>
              <div class="card-body py-3 px-0">
                <div class="table-responsive affiliate-table">
                  <table class="table table-hover table-borderless mb-0">
                    <tbody>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <img src="../assets/images/user/avatar-2.jpg" alt="" class="img-fluid wid-30 rounded-1">
                            <h6 class="mb-0 ms-2">John Doe</h6>
                          </div>
                        </td>
                        <td>Dashboard</td>
                        <td class="text-end f-w-600">$38</td>
                        <td>
                          <i class="ti ti-arrow-up text-success f-18 align-text-bottom"></i> 5.8%
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <img src="../assets/images/user/avatar-1.jpg" alt="" class="img-fluid wid-30 rounded-1">
                            <h6 class="mb-0 ms-2">Keefs</h6>
                          </div>
                        </td>
                        <td>New Website</td>
                        <td class="text-end f-w-600">$928</td>
                        <td>
                          <i class="ti ti-arrow-down text-danger f-18 align-text-bottom"></i> 51.2%
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <img src="../assets/images/user/avatar-3.jpg" alt="" class="img-fluid wid-30 rounded-1">
                            <h6 class="mb-0 ms-2">Lazaro</h6>
                          </div>
                        </td>
                        <td>Dashboard</td>
                        <td class="text-end f-w-600">$674</td>
                        <td>
                          <i class="ti ti-arrow-up text-success f-18 align-text-bottom"></i> 17.1%
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <img src="../assets/images/user/avatar-4.jpg" alt="" class="img-fluid wid-30 rounded-1">
                            <h6 class="mb-0 ms-2">Adeline</h6>
                          </div>
                        </td>
                        <td>New Website</td>
                        <td class="text-end f-w-600">$1,438</td>
                        <td>
                          <i class="ti ti-arrow-down text-danger f-18 align-text-bottom"></i> 15.8%
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <img src="../assets/images/user/avatar-5.jpg" alt="" class="img-fluid wid-30 rounded-1">
                            <h6 class="mb-0 ms-2">John Doe</h6>
                          </div>
                        </td>
                        <td>Invoice</td>
                        <td class="text-end f-w-600">$90</td>
                        <td>
                          <i class="ti ti-arrow-up text-success f-18 align-text-bottom"></i> 9.8%
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <img src="../assets/images/user/avatar-6.jpg" alt="" class="img-fluid wid-30 rounded-1">
                            <h6 class="mb-0 ms-2">Keefs</h6>
                          </div>
                        </td>
                        <td>Dashboard</td>
                        <td class="text-end f-w-600">$123</td>
                        <td>
                          <i class="ti ti-arrow-up text-success f-18 align-text-bottom"></i> 5.8%
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <img src="../assets/images/user/avatar-7.jpg" alt="" class="img-fluid wid-30 rounded-1">
                            <h6 class="mb-0 ms-2">Lazaro</h6>
                          </div>
                        </td>
                        <td>Landing page</td>
                        <td class="text-end f-w-600">$928</td>
                        <td>
                          <i class="ti ti-arrow-down text-danger f-18 align-text-bottom"></i> 51.2%
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card table-card">
              <div class="card-header">
                <h5>Top Visitors</h5>
              </div>
              <div class="card-body py-3 px-0">
                <div class="table-responsive">
                  <table class="table table-hover table-borderless mb-0">
                    <tbody>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <img src="../assets/images/user/avatar-4.jpg" alt="" class="img-fluid wid-30 rounded-1">
                            <h6 class="mb-0 ms-2">Adeline</h6>
                          </div>
                        </td>
                        <td class="text-end f-w-600">$1,438</td>
                        <td>
                          <i class="ti ti-arrow-down text-danger f-18 align-text-bottom"></i> 15.8%
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <img src="../assets/images/user/avatar-5.jpg" alt="" class="img-fluid wid-30 rounded-1">
                            <h6 class="mb-0 ms-2">John Doe</h6>
                          </div>
                        </td>
                        <td class="text-end f-w-600">$90</td>
                        <td>
                          <i class="ti ti-arrow-up text-success f-18 align-text-bottom"></i> 9.8%
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <img src="../assets/images/user/avatar-6.jpg" alt="" class="img-fluid wid-30 rounded-1">
                            <h6 class="mb-0 ms-2">Keefs</h6>
                          </div>
                        </td>
                        <td class="text-end f-w-600">$123</td>
                        <td>
                          <i class="ti ti-arrow-up text-success f-18 align-text-bottom"></i> 5.8%
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <img src="../assets/images/user/avatar-7.jpg" alt="" class="img-fluid wid-30 rounded-1">
                            <h6 class="mb-0 ms-2">Lazaro</h6>
                          </div>
                        </td>
                        <td class="text-end f-w-600">$928</td>
                        <td>
                          <i class="ti ti-arrow-down text-danger f-18 align-text-bottom"></i> 51.2%
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <img src="../assets/images/user/avatar-2.jpg" alt="" class="img-fluid wid-30 rounded-1">
                            <h6 class="mb-0 ms-2">John Doe</h6>
                          </div>
                        </td>
                        <td class="text-end f-w-600">$38</td>
                        <td>
                          <i class="ti ti-arrow-up text-success f-18 align-text-bottom"></i> 5.8%
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <img src="../assets/images/user/avatar-1.jpg" alt="" class="img-fluid wid-30 rounded-1">
                            <h6 class="mb-0 ms-2">Keefs</h6>
                          </div>
                        </td>
                        <td class="text-end f-w-600">$928</td>
                        <td>
                          <i class="ti ti-arrow-down text-danger f-18 align-text-bottom"></i> 51.2%
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <img src="../assets/images/user/avatar-3.jpg" alt="" class="img-fluid wid-30 rounded-1">
                            <h6 class="mb-0 ms-2">Lazaro</h6>
                          </div>
                        </td>
                        <td class="text-end f-w-600">$674</td>
                        <td>
                          <i class="ti ti-arrow-up text-success f-18 align-text-bottom"></i> 17.1%
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- [ Row 2 ] end -->
        </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
@endsection
