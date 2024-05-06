@extends('Project-Panel.Partial.Layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-11 col-sm-12">

        <div class="card p-4">
            <div class="card-header ">
                <div class="col-sm-12 text-center">
                    <h4 class=" font-weight-bold font-italic mt-3">Investment Report</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <form action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 mt-3">
                                <select name="name" id="name" class="form-select">
                                    <option value="">All Client</option>
                                    <option value="">All Client</option>
                                </select>
                            </div>

                            <div class="col-lg-4 mt-3">
                                <input type="date" name="start_date" id="start_date" class="form-control">
                            </div>

                            <div class="col-lg-4 mt-3">
                                <input type="date" name="end_date" id="end_date" class="form-control">
                            </div>

                            <div class="col-lg-4 mt-3 text-end">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="table-responsive bg-white" data-mdb-perfect-scrollbar="true" style="position: relative; height: 445px;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Client Name</th>
                                <th scope="col">invest</th>
                                <th scope="col">profit (Fixed/Percentage)</th>
                                <th scope="col">Date</th>
                                <th scope="col">invest Amount</th>
                                <th scope="col">Method</th>
                                <th scope="col">Received by</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" style="color: #666666;">1</th>
                                <td>System Architect</td>
                                <td>2011/04/25</td>
                                <td>2021/03/08</td>
                                <td>tnixon12@example.com</td>
                                <td>61</td>
                                <td>Edinburgh</td>
                                <td>$320,800</td>
                            </tr>
                            <tr>
                                <th scope="row" style="color: #666666;">Sonya Frost</th>
                                <td>Software Engineer</td>
                                <td>2008/12/13</td>
                                <td>2021/03/08</td>
                                <td>sfrost34@example.com</td>
                                <td>23</td>
                                <td>Edinburgh</td>
                                <td>$103,600</td>
                            </tr>
                            <tr>
                                <th scope="row" style="color: #666666;">Jena Gaines</th>
                                <td>Office Manager</td>
                                <td>2008/12/19</td>
                                <td>2021/03/08</td>
                                <td>jgaines75@example.com</td>
                                <td>30</td>
                                <td>London</td>
                                <td>$90,560</td>
                            </tr>
                            <tr>
                                <th scope="row" style="color: #666666;">Quinn Flynn</th>
                                <td>Support Lead</td>
                                <td>2013/03/03</td>
                                <td>2021/03/08</td>
                                <td>qflyn09@example.com</td>
                                <td>22</td>
                                <td>Edinburgh</td>
                                <td>$342,000</td>
                            </tr>
                            <tr>
                                <th scope="row" style="color: #666666;">Charde Marshall</th>
                                <td>Regional Director</td>
                                <td>2008/10/16</td>
                                <td>2021/03/08</td>
                                <td>cmarshall28@example.com</td>
                                <td>36</td>
                                <td>San Francisco</td>
                                <td>$470,600</td>
                            </tr>
                            <tr>
                                <th scope="row" style="color: #666666;">Haley Kennedy</th>
                                <td>Senior Marketing Designer</td>
                                <td>2012/12/18</td>
                                <td>2021/03/08</td>
                                <td>hkennedy63@example.com</td>
                                <td>43</td>
                                <td>London</td>
                                <td>$313,500</td>
                            </tr>
                            <tr>
                                <th scope="row" style="color: #666666;">Tatyana Fitzpatrick</th>
                                <td>Regional Director</td>
                                <td>2010/03/17</td>
                                <td>2021/03/08</td>
                                <td>tfitzpatrick00@example.com</td>
                                <td>19</td>
                                <td>Warsaw</td>
                                <td>$385,750</td>
                            </tr>
                            <tr>
                                <th scope="row" style="color: #666666;">Jason Cox</th>
                                <td>Web Developer</td>
                                <td>2017/10/16</td>
                                <td>2021/03/08</td>
                                <td>jcox96@example.com</td>
                                <td>32</td>
                                <td>New York</td>
                                <td>$390,400</td>
                            </tr>
                            <tr>
                                <th scope="row" style="color: #666666;">Christian Perkins</th>
                                <td>Sale Specialist</td>
                                <td>2013/12/18</td>
                                <td>2021/03/08</td>
                                <td>cperkins10@example.com</td>
                                <td>40</td>
                                <td>Paris</td>
                                <td>$240,800</td>
                            </tr>
                            <tr>
                                <th scope="row" style="color: #666666;">Emily Wheeler</th>
                                <td>Junior Marketing Analyst</td>
                                <td>2020/03/17</td>
                                <td>2021/03/08</td>
                                <td>ewheeler07@example.com</td>
                                <td>20</td>
                                <td>New York</td>
                                <td>$85,620</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
