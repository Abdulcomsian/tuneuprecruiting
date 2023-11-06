<x-student_app-layout>
    <div class="page-body">
        <div class="container-fluid"></div>
        <!-- Container-fluid starts-->
        <div class="container-fluid crm_dashboard">
            <div class="row widget-grid">
                <div class="col-12">
                    <div class="page-title mt-2">
                        <div class="row">
                            <div class="col-sm-6 ps-0">
                                <h3>CRM Dashboard</h3>
                            </div>
                            <div class="col-sm-6 pe-0">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">
                                            <svg class="stroke-icon">
                                                <use href="{{ asset('assets/svg/icon-sprite.svg') }}"></use>
                                            </svg></a></li>
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <li class="breadcrumb-item active">CRM Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card update-card">
                                <div class="card-body">
                                    <h2 class="text-white">Everyone may benefit from this exclusive selection.</h2>
                                    <p class="text-white f-16">Everyone may benefit from this exclusive selection.</p><a class="btn bg-white font-primary" href="knowledgebase.html">Upgrade</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h3>Transaction History</h3>
                                </div>
                                <div class="card-body pt-0 transaction">
                                    <div class="table-responsive theme-scrollbar">
                                        <table class="table display" id="transaction-history" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Date and time </th>
                                                <th>Amount</th>
                                                <th>Invoice</th>
                                                <th>Status</th>
                                                <th>Payment</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center"><img src="../assets/images/dashboard/user/05.jpg" alt="">
                                                        <div class="flex-grow-1 ms-2"><a href="product-page.html">
                                                                <h5>Nike Sports</h5><span>Item Sold</span></a></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p>Jan 25, 2022 (08:35:45)</p>
                                                </td>
                                                <td>
                                                    <h5>$243 USD</h5>
                                                </td>
                                                <td>
                                                    <p>#PH6539</p>
                                                </td>
                                                <td>
                                                    <p class="font-primary">Success</p>
                                                </td>
                                                <td>
                                                    <p>Paypal</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex"><img src="../assets/images/dashboard/user/06.jpg" alt="">
                                                        <div class="flex-grow-1 ms-2"><a href="product-page.html">
                                                                <h5>iphone 14 Pro</h5><span>Bought item</span></a></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p>Feb 19, 2022 (12:20:40)</p>
                                                </td>
                                                <td>
                                                    <h5>$356 USD</h5>
                                                </td>
                                                <td>
                                                    <p>#LH98NH</p>
                                                </td>
                                                <td>
                                                    <p class="font-secondary">Pending</p>
                                                </td>
                                                <td>
                                                    <p>Credit Card</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex"><img src="../assets/images/dashboard/user/07.jpg" alt="">
                                                        <div class="flex-grow-1 ms-2"><a href="product-page.html">
                                                                <h5>Headphone</h5><span>Bought item</span></a></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p>May 10, 2022 (04:39:13)</p>
                                                </td>
                                                <td>
                                                    <h5>$845 USD</h5>
                                                </td>
                                                <td>
                                                    <p>#D987BH</p>
                                                </td>
                                                <td>
                                                    <p class="font-primary">Success</p>
                                                </td>
                                                <td>
                                                    <p>Paypal</p>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-sm-12 box-col-4">
                    <div class="card top-customer">
                        <div class="card-header pb-0">
                            <div class="header-top">
                                <h3 class="m-0">Top Customer</h3>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li>
                                            <div><i class="icon-settings"></i></div>
                                        </li>
                                        <li><i class="view-html fa fa-code"></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                        <li><i class="icofont icofont-error close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center pt-0"><img src="../assets/images/dashboard-2/user/01.jpg" alt="">
                                <div class="flex-grow-1 ms-2"><a href="user-profile.html">
                                        <h5>Cameron Broadbet</h5><span>#736438</span></a></div>
                                <div class="flex-shrink-0">
                                    <button class="btn bg-light-secondary txt-secondary">Gold <span>Mamber</span></button>
                                </div>
                            </div>
                            <div class="d-flex align-items-center"><img src="../assets/images/dashboard-2/user/02.jpg" alt="">
                                <div class="flex-grow-1 ms-2"><a href="user-profile.html">
                                        <h5>Margaret Adelman</h5><span>#856932</span></a></div>
                                <div class="flex-shrink-0">
                                    <button class="btn bg-light-secondary txt-secondary">Gold <span>Mamber</span></button>
                                </div>
                            </div>
                            <div class="d-flex align-items-center"><img src="../assets/images/dashboard-2/user/03.jpg" alt="">
                                <div class="flex-grow-1 ms-2"><a href="user-profile.html">
                                        <h5>Ronald Barrlumsed</h5><span>#365248</span></a></div>
                                <div class="flex-shrink-0">
                                    <button class="btn bg-light-primary txt-primary">Platinum <span>Mamber</span></button>
                                </div>
                            </div>
                            <div class="d-flex align-items-center"><img src="../assets/images/dashboard-2/user/04.jpg" alt="">
                                <div class="flex-grow-1 ms-2"><a href="user-profile.html">
                                        <h5>Melvins Novakerofa</h5><span>#125896</span></a></div>
                                <div class="flex-shrink-0">
                                    <button class="btn bg-light-primary txt-primary">Platinum <span>Mamber</span></button>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pb-0"><img src="../assets/images/dashboard-2/user/05.jpg" alt="">
                                <div class="flex-grow-1 ms-2"><a href="user-profile.html">
                                        <h5>Jeffeld Connorsebarr</h5><span>#759684</span></a></div>
                                <div class="flex-shrink-0">
                                    <button class="btn bg-light-warning txt-warning">Silver <span>Mamber</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="card all-notification">
                        <div class="card-header pb-0">
                            <div class="header-top">
                                <h3 class="m-0">All Notification (4)</h3>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li>
                                            <div><i class="icon-settings"></i></div>
                                        </li>
                                        <li><i class="view-html fa fa-code"></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                        <li><i class="icofont icofont-error close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center pt-0"><img src="../assets/images/dashboard-2/user/06.jpg" alt="">
                                <div class="flex-grow-1 ms-2"><a href="product-page.html">
                                        <h5>You have new comments in real finical law agency landing page design.</h5><span>2 min ago</span></a></div>
                                <div class="flex-shrink-0"> <i class="fa fa-circle circle-dot-primary pull-right"></i></div>
                            </div>
                            <div class="d-flex align-items-center"><img src="../assets/images/dashboard-2/user/07.jpg" alt="">
                                <div class="flex-grow-1 ms-2"><a href="product-page.html">
                                        <h5>Congrats! you complete all task for today. just need to join meting.</h5><span>30 hours ago</span></a></div>
                                <div class="flex-shrink-0"> </div>
                            </div>
                            <div class="d-flex align-items-center"><img src="../assets/images/dashboard-2/user/08.jpg">
                                <div class="flex-grow-1 ms-2"><a href="product-page.html">
                                        <h5>Jose wheeler assassin a work for you</h5>
                                        <button class="btn btn-primary mt-1 mb-1">Accpet</button>
                                        <button class="btn btn-secondary mt-1 mb-1">Decline</button></a><span>Today 11:45pm</span></div>
                                <div class="flex-shrink-0"> <i class="fa fa-circle circle-dot-primary pull-right"></i></div>
                            </div>
                            <div class="d-flex align-items-center pb-0"><img src="../assets/images/dashboard-2/user/09.jpg" alt="">
                                <div class="flex-grow-1 ms-2"><a href="product-page.html">
                                        <h5>Congrats! you complete all task for today. just need to join meting.</h5><span>Mon 11:45pm</span></a></div>
                                <div class="flex-shrink-0"> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="header-top">
                                <h3 class="m-0">Balance Overview</h3>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li>
                                            <div><i class="icon-settings"></i></div>
                                        </li>
                                        <li><i class="view-html fa fa-code"></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                        <li><i class="icofont icofont-error close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="balance-overview"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <div class="header-top">
                                        <h3 class="m-0">Sales Analyics</h3>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li>
                                                    <div><i class="icon-settings"></i></div>
                                                </li>
                                                <li><i class="view-html fa fa-code"></i></li>
                                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                                <li><i class="icofont icofont-error close-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="company-viewchart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card widget-sell">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-3 box-col-3 mb-3">
                                            <div class="sale">
                                                <h3>Sale</h3>
                                                <h5>654</h5>
                                                <p class="d-flex"><span class="bg-light-secondary me-2">
                                  <svg>
                                    <use href="../assets/svg/icon-sprite.svg#arrow-down"></use>
                                  </svg></span><span class="font-secondary">- 36.28%</span></p><span class="sale-title">Since last 6 month</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 box-col-3 mb-3">
                                            <div class="sale">
                                                <h3>Revenue</h3>
                                                <h5>$45,680</h5>
                                                <p class="d-flex"><span class="bg-light-primary me-2">
                                  <svg>
                                    <use href="../assets/svg/icon-sprite.svg#arrow-top"></use>
                                  </svg></span><span class="font-primary">+14.28%</span></p><span class="sale-title">Since last month</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 box-col-3 mb-3">
                                            <div class="sale">
                                                <h3>Conversion</h3>
                                                <h5>34%</h5>
                                                <p class="d-flex"><span class="bg-light-secondary me-2">
                                  <svg>
                                    <use href="../assets/svg/icon-sprite.svg#arrow-down"></use>
                                  </svg></span><span class="font-secondary">- 36.28%</span></p><span class="sale-title">Then last week</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 box-col-3 mb-3">
                                            <div class="sale">
                                                <h3>Leads</h3>
                                                <h5>654</h5>
                                                <p class="d-flex"><span class="bg-light-primary me-2">
                                  <svg>
                                    <use href="../assets/svg/icon-sprite.svg#arrow-top"></use>
                                  </svg></span><span class="font-primary">+20.28%</span></p><span class="sale-title">Since last 6 month</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="row">
                        <div class="col-xl-12 col-lg-6">
                            <div class="card deal-open">
                                <div class="card-header pb-0">
                                    <div class="header-top">
                                        <h3 class="m-0">Deal Open</h3>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li>
                                                    <div><i class="icon-settings"></i></div>
                                                </li>
                                                <li><i class="view-html fa fa-code"></i></li>
                                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                                <li><i class="icofont icofont-error close-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="theme-scrollbar">
                                        <li class="d-flex align-items-center"><img src="../assets/images/dashboard-2/user/10.jpg" alt=""><a class="ms-2" href="edit-profile.html">
                                                <h5>Cameron Williamson</h5><span>Mi watch with jane</span></a>
                                            <div class="flex-grow-1 ms-2">
                                                <h5>Clossing Date </h5><span>14 Jan 2023</span>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <h5>$46.564</h5>
                                                <button class="btn bg-light-primary txt-primary">Contract Sent</button>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center"><img src="../assets/images/dashboard-2/user/11.jpg" alt=""><a class="ms-2" href="edit-profile.html">
                                                <h5>Brooklyn Simmons</h5><span>tree pot with jane</span></a>
                                            <div class="flex-grow-1 ms-2">
                                                <h5>Clossing Date </h5><span>20 May 2023</span>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <h5>$20.690</h5>
                                                <button class="btn bg-light-primary txt-primary">Contract Sent</button>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center"><img src="../assets/images/dashboard-2/user/12.jpg" alt=""><a class="ms-2" href="edit-profile.html">
                                                <h5>Darlene Robertson</h5><span>Wood Chair with jane</span></a>
                                            <div class="flex-grow-1 ms-2">
                                                <h5>Clossing Date </h5><span>12 Aug 2023</span>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <h5>$34.954</h5>
                                                <button class="btn bg-light-primary txt-primary">Contract Sent</button>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center"><img src="../assets/images/dashboard-2/user/13.jpg" alt=""><a class="ms-2" href="edit-profile.html">
                                                <h5>Elipotion Zopnisde</h5><span>Sneakers men with jane</span></a>
                                            <div class="flex-grow-1 ms-2">
                                                <h5>Clossing Date </h5><span>16 Aug 2023</span>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <h5>$12.954</h5>
                                                <button class="btn bg-light-primary txt-primary">Contract Sent</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-6">
                            <div class="card customer-chart">
                                <div class="card-header pb-0">
                                    <div class="header-top">
                                        <h3 class="m-0">Customer</h3>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li>
                                                    <div><i class="icon-settings"></i></div>
                                                </li>
                                                <li><i class="view-html fa fa-code"></i></li>
                                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                                <li><i class="icofont icofont-error close-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xxl-4">
                                            <ul>
                                                <li class="d-flex align-items-center">
                                                    <div class="circle-dashed-primary"><span></span></div>
                                                    <div class="flex-grow-1">
                                                        <p>Current Customer</p><span>1500</span>
                                                    </div>
                                                </li>
                                                <li class="d-flex align-items-center">
                                                    <div class="circle-dashed-secondary"><span></span></div>
                                                    <div class="flex-grow-1">
                                                        <p>New Customer </p><span>600</span>
                                                    </div>
                                                </li>
                                                <li class="d-flex align-items-center">
                                                    <div class="circle-dashed-dark"><span></span></div>
                                                    <div class="flex-grow-1">
                                                        <p>Old Customer </p><span>900</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xxl-8">
                                            <div id="customer-chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</x-student_app-layout>
