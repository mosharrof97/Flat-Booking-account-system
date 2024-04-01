@extends('Admin-Panel.partial.Layout')
@section('content')
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Hello Admin</h1>
                     @php
                        dd(auth()->guard('admin')->user());
                    @endphp
                     @if (auth()->user())
                        @if (auth()->user()->role_id == 2)
                            <p>{{ auth()->user()->name }} are User logged in! </p>
                        @elseif (auth()->user()->role_id == 1)
                            <p>{{ auth()->user()->name }} are Admin logged in! </p>
                        @else
                            {{ __("You're logged in! -- ok") }}
                        @endif
                    @else
                        {{ __("You're logged in! -- ok") }}
                    @endif

                </div>
            </div>
        </div>
    </div> --}}

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">

                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
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
                </div>

                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="info-box bg-amber hover-expand-effect">
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
                </div>

                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
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
                </div>

                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
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
                </div>

                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="info-box bg-brown hover-expand-effect">
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
                </div>





                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
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
                </div>

                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="info-box bg-purple hover-expand-effect">
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
                </div>

                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
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
                </div>


                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="info-box bg-blue-grey hover-expand-effect">
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
                </div>

                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
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
                </div>

                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="fas fa-user-lock "></i>
                        </div>
                        <div class="content">
                            <div class="text"><h4>Role Manage</h4></div>
                            {{-- <div class="number count-to" data-from="0" data-to="{{  count(App\RoleManage::all()) }}"
                                 data-speed="1000"
                                 data-fresh-interval="20"></div> --}}
                                 <div class="number count-to" data-from="0" data-to="500"
                                 data-speed="1000"
                                 data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="info-box bg-brown hover-expand-effect">
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
                </div>



                <!-- #END# Widgets -->

            </div>




            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
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
