@extends('Admin-Panel.partial.Layout')
@section('content')
    
    <section class="content">
        <div class="container-fluid">
            <div class="block-header bg-white p-3 mb-3 shadow-sm">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row ">

                <div class="col-lg-3 col-sm-6">
                    <div class="card border-primary dash-card">
                        <div class="card-body p-3 d-flex justify-content-between d-flex justify-content-between">
                            <div class=" text-center">
                                <h5 class="card-result">0</h5>
                                <h5 class="card-text">Total Flat </h5>
                            </div>
                            <div class="">
                                <div class="icon-circle bg-primary text-white">
                                    <i class="fas fa-project-diagram material-icons" width="50"></i> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="card gradient-16 p-3">
                        <div class="icon">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                        <div class="content">
                            <div class="text"><h4>Project</h4></div>
                            <div class="number count-to" data-from="0" data-to="985"
                                 data-speed="1000"
                                 data-fresh-interval="0"></div>
                        </div>
                    </div>
                </div> --}}


                {{-- <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="card gradient-3 p-3">
                        <div class="icon">
                            <i class="fas fa-boxes"></i>
                        </div>
                        <div class="content">
                            <div class="text"><h4>Product</h4></div>
                            <div class="number count-to" data-from="0" data-to="325"
                                 data-speed="1000"
                                 data-fresh-interval="0"></div>
                        </div>
                    </div>

                </div> --}}

                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="card  dash-card" style="border-color:rgb(163, 80, 3)">
                        <div class="card-body p-3 d-flex justify-content-between d-flex justify-content-between">
                            <div class=" text-center">
                                <h5 class="card-result">0</h5>
                                <h5 class="card-text">Complate Flat</h5>
                            </div>
                            <div class="">
                                <div class="icon-circle  text-white" style="background-color: rgb(163, 80, 3)">
                                    <i class="fas fa-boxes material-icons" width="50"></i> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card  dash-card" style="border-color:#9ac500">
                        <div class="card-body p-3 d-flex justify-content-between d-flex justify-content-between">
                            <div class=" text-center">
                                <h5 class="card-result">0</h5>
                                <h5 class="card-text">Under Constraction Flat</h5>
                            </div>
                            <div class="">
                                <div class="icon-circle  text-white" style="background-color: #9ac500">
                                    <i class="fas fa-dolly material-icons" width="50"></i> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="card gradient-13 p-3">
                        <div class="icon">
                            <i class="fas fa-dolly"></i>
                        </div>
                        <div class="content">
                            <div class="text"><h4>Sell</h4></div>
                            <div class="number count-to" data-from="0" data-to="784"
                                 data-speed="1000"
                                 data-fresh-interval="0"></div>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="card gradient-15 p-3">
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="content">
                            <div class="text"><h4>Purchase RQN</h4></div>
                            <div class="number count-to" data-from="0" data-to="659"
                                 data-speed="1000"
                                 data-fresh-interval="0"></div>
                        </div>
                    </div>
                </div> --}}

                <div class="col-lg-3 col-sm-6">
                    <div class="card  dash-card" style="border-color:#01b4b4">
                        <div class="card-body p-3 d-flex justify-content-between d-flex justify-content-between">
                            <div class=" text-center">
                                <h5 class="card-result">1000</h5>
                                <h5 class="card-text">Totel Customer</h5>
                            </div>
                            <div class="">
                                <div class="icon-circle  text-white" style="background-color: #01b4b4">
                                    <i class="fas fa-shopping-cart material-icons" width="50"></i> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card border-warning dash-card">
                        <div class="card-body p-3 d-flex justify-content-between d-flex justify-content-between">
                            <div class=" text-center">
                                <h5 class="card-result">1000</h5>
                                <h5 class="card-text">Totel Investor</h5>
                            </div>
                            <div class="">
                                <div class="icon-circle bg-warning text-white">
                                    <i class="fas fa-shopping-cart material-icons" width="50"></i> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="card gradient-18 p-3">
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="content">
                            <div class="text"><h4>Purchase Order</h4></div>
                            <div class="number count-to" data-from="0" data-to="451"
                                 data-speed="1000"
                                 data-fresh-interval="0"></div>
                        </div>
                    </div>
                </div> --}}


                {{-- <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="card gradient-9 p-3">
                        <div class="icon">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                        <div class="content">
                            <div class="text"><h4>Ledger Type</h4></div>
                            <div class="number count-to" data-from="0"
                                 data-to="702" data-speed="1000"
                                 data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div> --}}

                <div class="col-lg-3 col-sm-6">
                    <div class="card  dash-card" style="border-color:#4b5819">
                        <div class="card-body p-3 d-flex justify-content-between d-flex justify-content-between">
                            <div class=" text-center">
                                <h5 class="card-result">0</h5>
                                <h5 class="card-text">Totel Sold</h5>
                            </div>
                            <div class="">
                                <div class="icon-circle  text-white" style="background-color: #4b5819">
                                    <i class="fas fa-file-invoice-dollar material-icons" width="50"></i> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="card gradient-6 p-3">
                        <div class="icon">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                        <div class="content">
                            <div class="text"><h4>Ledger Group</h4></div>
                            <div class="number count-to" data-from="0"
                                 data-to="300" data-speed="1000"
                                 data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="card gradient-4 p-3">
                        <div class="icon">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                        <div class="content">
                            <div class="text"><h4>Ledger </h4></div>
                            <div class="number count-to" data-from="0"
                                 data-to="1200" data-speed="1000"
                                 data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div> --}}

                <div class="col-lg-3 col-sm-6">
                    <div class="card  dash-card" style="border-color:#940368">
                        <div class="card-body p-3 d-flex justify-content-between d-flex justify-content-between">
                            <div class=" text-center">
                                <h5 class="card-result">0</h5>
                                <h5 class="card-text">Totel Unsold Flat</h5>
                            </div>
                            <div class="">
                                <div class="icon-circle  text-white" style="background-color: #940368">
                                    <i class="fa-solid fa-download material-icons" width="50"></i> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card  dash-card" style="border-color:#b62c65">
                        <div class="card-body p-3 d-flex justify-content-between d-flex justify-content-between">
                            <div class=" text-center">
                                <h5 class="card-result">1000</h5>
                                <h5 class="card-text">Totel Invest Amount</h5>
                            </div>
                            <div class="">
                                <div class="icon-circle  text-white" style="background-color: #b62c65">
                                    <i class="fas fa-university material-icons" width="50"></i> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="card gradient-11 p-3">
                        <div class="icon">
                            <i class="fas fa-university"></i>
                        </div>
                        <div class="content">
                            <div class="text"><h4>Bank Or Cash</h4></div>
                            <div class="number count-to" data-from="0" data-to="900"
                                 data-speed="1000"
                                 data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="card gradient-12 p-3">
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="content">
                            <div class="text"><h4>User</h4></div>
                            <div class="number count-to" data-from="0" data-to="800"
                                 data-speed="1000"
                                 data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div> --}}

                <div class="col-lg-3 col-sm-6">
                    <div class="card  dash-card" style="border-color:#3c768d">
                        <div class="card-body p-3 d-flex justify-content-between d-flex justify-content-between">
                            <div class=" text-center">
                                <h5 class="card-result">0</h5>
                                <h5 class="card-text">Totel Purchase Amount</h5>
                            </div>
                            <div class="">
                                <div class="icon-circle  text-white" style="background-color: #3c768d">
                                    <i class="fas fa-user material-icons" width="50"></i> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card  dash-card" style="border-color:#6c2ffa">
                        <div class="card-body p-3 d-flex justify-content-between d-flex justify-content-between">
                            <div class=" text-center">
                                <h5 class="card-result">0</h5>
                                <h5 class="card-text">Paid Purchase Amount</h5>
                            </div>
                            <div class="">
                                <div class="icon-circle  text-white" style="background-color: #6c2ffa">
                                    <i class="fas fa-user-lock material-icons" width="50"></i> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card  dash-card" style="border-color:#53a885">
                        <div class="card-body p-3 d-flex justify-content-between d-flex justify-content-between">
                            <div class=" text-center">
                                <h5 class="card-result" >0</h5>
                                <h5 class="card-text" >Due Purchase Amount</h5>
                            </div>
                            <div class="">
                                <div class="icon-circle  text-white" style="background-color: #53a885">
                                    <i class="fas fa-receipt material-icons" width="50"></i> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="card gradient-1 p-3">
                        <div class="icon">
                            <i class="fas fa-user-lock "></i>
                        </div>
                        <div class="content">
                            <div class="text"><h4>Role Manage</h4></div>
                            {{-- <div class="number count-to" data-from="0" data-to="{{  count(App\RoleManage::all()) }}"
                                 data-speed="1000"
                                 data-fresh-interval="20"></div> 
                                 <div class="number count-to" data-from="0" data-to="500"
                                 data-speed="1000"
                                 data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="card gradient-2 p-3">
                        <div class="icon">
                            <i class="fas fa-receipt"></i>
                        </div>
                        <div class="content">
                            <div class="text"><h4>Report</h4></div>
                            <div class="number count-to" data-from="0" data-to="14"
                                 data-speed="1000"
                                 data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div> --}}
                <!-- #END# Widgets -->
            </div>


            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="">
                            <h2>
                                Quick Access
                            </h2>
                        </div>
                        <div class="body">
                            <div class="button-demo">
                                {{-- <a  href="{{ route('branch') }}" type="button" class="btn bg-pink waves-effect">Project</a>
                                <a  href="{{ route('product') }}" type="button" class="btn bg-green waves-effect">Product</a>
                                <a  href="{{ route('sell') }}" type="button" class="btn bg-amber waves-effect">Sell</a>
                                <a  href="{{ route('purchase_requisition') }}" type="button" class="btn bg-black waves-effect">Purchase Requisition</a>
                                <a  href="{{ route('purchase_order') }}" type="button" class="btn bg-cyan waves-effect">Purchase Order</a>
                                <a  href="{{ route('vendor') }}" type="button" class="btn bg-green waves-effect">Vendor</a>
                                <a  href="{{ route('employee') }}" type="button" class="btn bg-amber waves-effect">Employee</a>
                                <a  href="{{ route('customer') }}" type="button" class="btn bg-black waves-effect">Customer</a>


                                <a  href="{{ route('reports.accounts.ledger') }}" type="button" class="btn bg-teal waves-effect">Ledger</a>


                                <a href="{{ route('reports.accounts.trial_balance')  }}" type="button" class="btn bg-green waves-effect">Trial Balance</a>
                                <a href="{{ route('reports.accounts.cost_of_revenue') }}" type="button" class="btn bg-orange waves-effect">Cost Of Revenue </a>
                                <a href="{{ route('reports.accounts.profit_or_loss_account') }}" type="button" class="btn bg-deep-purple waves-effect">Profit Or Loss Account</a>
                                <a href="{{ route('reports.accounts.retained_earnings') }}" type="button" class="btn bg-blue waves-effect">Retained Earnings</a>
                                <a href="{{ route('reports.accounts.fixed_asset_schedule') }}" type="button" class="btn bg-light-green waves-effect">Fixed Asset Schedule</a>
                                <a href="{{ route('reports.accounts.balance_sheet') }}" type="button" class="btn bg-light-blue waves-effect">Balance sheet</a>
                                <a href="{{ route('reports.accounts.cash_flow') }}" type="button" class="btn bg-cyan waves-effect">Cash Flow</a>
                                <a href="{{ route('reports.accounts.receive_payment') }}" type="button" class="btn bg-teal waves-effect">Receive Payment</a>

                                <a href="{{ route('income_expense_type') }}" type="button" class="btn bg-light-green waves-effect">Ledger Type</a>
                                <a href="{{ route('income_expense_group') }}" type="button" class="btn bg-orange waves-effect">Ledger Group</a>



                                <a href="{{ route('dr_voucher') }}" type="button" class="btn bg-lime waves-effect">Debit Voucher</a>
                                <a href="{{ route('cr_voucher') }}" type="button" class="btn bg-brown waves-effect">Credit Voucher</a>
                                <a href="{{ route('jnl_voucher') }}" type="button" class="btn bg-deep-orange waves-effect">Journal Voucher</a>
                                <a href="{{ route('contra_voucher') }}" type="button" class="btn bg-orange waves-effect">Contra Voucher</a> --}}

                                <a  href="" type="button" class="btn bg-pink waves-effect">Project</a>
                                <a  href="" type="button" class="btn bg-green waves-effect">Product</a>
                                <a  href="" type="button" class="btn bg-amber waves-effect">Sell</a>
                                <a  href="" type="button" class="btn bg-black waves-effect">Purchase Requisition</a>
                                <a  href="" type="button" class="btn bg-cyan waves-effect">Purchase Order</a>
                                <a  href="" type="button" class="btn bg-green waves-effect">Vendor</a>
                                <a  href="" type="button" class="btn bg-amber waves-effect">Employee</a>
                                <a  href="" type="button" class="btn bg-black waves-effect">Customer</a>


                                <a  href="" type="button" class="btn bg-teal waves-effect">Ledger</a>


                                <a href="" type="button" class="btn bg-green waves-effect">Trial Balance</a>
                                <a href="" type="button" class="btn bg-orange waves-effect">Cost Of Revenue </a>
                                <a href="" type="button" class="btn bg-deep-purple waves-effect">Profit Or Loss Account</a>
                                <a href="" type="button" class="btn bg-blue waves-effect">Retained Earnings</a>
                                <a href="" type="button" class="btn bg-light-green waves-effect">Fixed Asset Schedule</a>
                                <a href="" type="button" class="btn bg-light-blue waves-effect">Balance sheet</a>
                                <a href="" type="button" class="btn bg-cyan waves-effect">Cash Flow</a>
                                <a href="" type="button" class="btn bg-teal waves-effect">Receive Payment</a>

                                <a href="" type="button" class="btn bg-light-green waves-effect">Ledger Type</a>
                                <a href="" type="button" class="btn bg-orange waves-effect">Ledger Group</a>



                                <a href="" type="button" class="btn bg-lime waves-effect">Debit Voucher</a>
                                <a href="" type="button" class="btn bg-brown waves-effect">Credit Voucher</a>
                                <a href="" type="button" class="btn bg-deep-orange waves-effect">Journal Voucher</a>
                                <a href="#" type="button" class="btn bg-orange waves-effect">Contra Voucher</a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </section>
@endsection
