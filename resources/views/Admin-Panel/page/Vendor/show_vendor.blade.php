@extends('Admin-Panel.partial.Layout')
@section('content')

<style>
    @import url('https://fonts.googleapis.com/css?family=Nunito+Sans:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap');
    font-family{
        font-family: 'Nunito Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    }

</style>
<div class="row justify-content-center font-family">
    <div class="col-lg-12 col-sm-12">
        <div class="body-content">

            <div class="row ">
                <div class="col-sm-6 col-xs-12 contact">
                    <div class="card">

                        <div class="box-body m-3" style="font-family: 'Nunito Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif">
                            <center>
                                <h3 class="">{{ $vendor->name }}</h3>
                            </center>
                            <address class="mb-0 text-center">
                                <p class="m-0"><b>Phone: </b> {{ $vendor->phone }} </p>
                                <p class="m-0"><b>Address: </b> {{ $vendor->address }} </p>
                            </address>
                        </div>
                    </div>
                </div>

                <br>


            </div>

            <div class="body-content " id="example-print">
                <div class="card ">
                    <div class="card-body">
                        <div class="table-responsive mb-4">
                            <table id="ladger" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th> Date</th>
                                        <th>Type</th>
                                        <th>Debit</th>
                                        <th> Credit</th>
                                        <td>Balance</td>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>27-06-2022</td>
                                        <td> Payment </td>
                                        <td>
                                            <font color="blue">0 Taka</font>
                                        </td>
                                        <td>
                                            <font color="green">14771 Taka</font>
                                        </td>
                                        <td>-14771 Taka
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>30-08-2022</td>
                                        <td> Purchase </td>
                                        <td>
                                            <font color="blue">304346 Taka</font>
                                        </td>
                                        <td>
                                            <font color="green">0 Taka</font>
                                        </td>
                                        <td>289575 Taka
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>16-02-2023</td>
                                        <td> Payment </td>
                                        <td>
                                            <font color="blue">0 Taka</font>
                                        </td>
                                        <td>
                                            <font color="green">30000 Taka</font>
                                        </td>
                                        <td>259575 Taka
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>4</td>
                                        <td>07-03-2023</td>
                                        <td> Payment </td>
                                        <td>
                                            <font color="blue">0 Taka</font>
                                        </td>
                                        <td>
                                            <font color="green">50000 Taka</font>
                                        </td>
                                        <td>209575 Taka
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>5</td>
                                        <td>26-06-2023</td>
                                        <td> Payment </td>
                                        <td>
                                            <font color="blue">0 Taka</font>
                                        </td>
                                        <td>
                                            <font color="green">25000 Taka</font>
                                        </td>
                                        <td>184575 Taka
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>6</td>
                                        <td>06-07-2023</td>
                                        <td> Payment </td>
                                        <td>
                                            <font color="blue">0 Taka</font>
                                        </td>
                                        <td>
                                            <font color="green">30000 Taka</font>
                                        </td>
                                        <td>154575 Taka
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>7</td>
                                        <td>12-10-2023</td>
                                        <td> Payment </td>
                                        <td>
                                            <font color="blue">0 Taka</font>
                                        </td>
                                        <td>
                                            <font color="green">30000 Taka</font>
                                        </td>
                                        <td>124575 Taka
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>8</td>
                                        <td>20-03-2024</td>
                                        <td> Payment </td>
                                        <td>
                                            <font color="blue">0 Taka</font>
                                        </td>
                                        <td>
                                            <font color="green">50000 Taka</font>
                                        </td>
                                        <td>74575 Taka
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <button class="btn-block btn btn-success btn-sm" type="button" onclick="printDiv('example-print')">Print</button>
                    <button class="btn-block btn btn-primary btn-sm" type="button" onclick="exportToCsv('ladger')">Export as CSV</button>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function exportToCsv(tableId) {
        const table = document.getElementById(tableId);
        const rows = Array.from(table.querySelectorAll('tbody tr'));
        const headers = Array.from(table.querySelectorAll('thead th')).map(th => th.innerText);

        const csvContent = headers.join(',') + '\n' +
            rows.map(row => Array.from(row.querySelectorAll('td')).map(td => td.innerText).join(',')).join('\n');

        const encodedUri = encodeURI('data:text/csv;charset=utf-8,' + csvContent);
        const link = document.createElement('a');
        link.setAttribute('href', encodedUri);
        link.setAttribute('download', 'table_data.csv');
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

</script>
@endsection
