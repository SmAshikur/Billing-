<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <title>Document</title>
</head>
<body>

    <div style="height: 100vh"  class="container">
        <div class="card px-5">
            <h3 style="text-align: center">Welcome</h3>
            <form class="p-3" action="{{route('inventory')}}" method="post"> @csrf
                <div class="form-group row">
                    <input  name="bill_no"  id="find" type="text" class="form-control col-3 mx-5">
                    <button id="testt" class="btn btn-secondary"> find </button>
                </div>
                <div class="form-group row">
                     <select name="product_id" class="form-control col-4 mx-5 custom-select">
                        <option selected>Open this select menu</option>
                        @foreach ($products as $product )
                        <option   class="pro" value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                      </select>
                      <select  name="customer_id" class="form-control col-3  custom-select">
                        <option  selected>Open this select menu</option>
                        @foreach ($customers as $customer )
                        <option class="custo" value="{{$customer->id}}">{{$customer->name}}</option>
                        @endforeach

                      </select>
                      <input name="date" type="date" class="form-control col-2 mx-5">
                </div>
                <div class="form-group row mt-5">
                    <table id="proTable" class="mx-5 table table-bordered table-striped">
                        <thead>
                            <tr >
                                <th>Product</th>
                                <th>Rate</th>
                                <th>Qty</th>
                                <th>Total Amount</th>
                                <th>Discount(Amt)</th>
                                <th>Net Amount</th>
                            </tr>
                        </thead>
                        <tbody >

                        </tbody>
                    </table>
                </div>
                <div class="form-group row">
                    <div class="offset-md-6 col-md-6 ">
                        <div class="form-group row justify-content-end d-flex mb-1">
                            <label class="form-label"> Net Total </label>
                            <input type="text" name="total_amount" id="total" class="form-control col-6 mx-5 text-center">
                        </div>
                        <div class="form-group row  justify-content-end d-flex mb-1">
                            <label class="form-label"> Discount Total </label>
                            <input type="text"  name="total_discount" id="dis_total" class="form-control col-6 mx-5 text-center">
                        </div>
                        <div class="form-group row justify-content-end d-flex mb-1">
                            <label class="form-label"> Paid Amount </label>
                            <input type="text" name="paid_amount" id="paid_amount" class="form-control col-6 mx-5 text-center">
                        </div>
                        <div class="form-group row justify-content-end d-flex mb-3">
                            <label class="form-label"> Due Amount </label>
                            <input type="text" name="due_amount" id="due_amount" placeholder="0.00" class="form-control col-6 mx-5 text-center">
                        </div>
                        <div class="form-group row justify-content-end d-flex">
                           <button type="submit" class="btn btn-primary col-8 mx-5"> Save Change</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{asset('js/billing.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

</body>
</html>
