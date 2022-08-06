@section('main-content')
    <style type="text/css">
        /*if you want to remove some content in print display then use .no_print class on it */
        @media print {
            #datatable_wrapper .row:first-child {display:none;}
            #datatable_wrapper .row:last-child {display:none;}
            .no_print {display:none;}
        }
    </style>
    <div id="bill-container">

    <div class="table" id="bill">
        <div class="table-responsive">

            <table class="table table-bordered">
                <div class="qrcode">
                    <h1>Raj Photo Studio</h1>
                {!! QrCode::size(100)->generate($data['row']->qr_code); !!}
                <!--                    --><?php
                    //                    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                    //                    echo $generator->getBarcode($data['row']->id, $generator::TYPE_CODE_128)
                    //                    ?>

                </div>
               <table class="table table-bordered">

                   <tr>
                   <td><b>Particulars</b></td>
                       <td><b>Quantity</b></td>
                   <td><b>Rate</b></td>
                   <td><b>Total</b></td>
                   </tr>



                   <tr>
                       <td rowspan="1">{{$data['row']->order->name}}</td>
                       <td rowspan="1">{{$data['row']->quantity}}</td>
                       <td rowspan="1">रु{{$data['row']->rate}}</td>
                       <td rowspan="1">रु{{$data['row']->total}}</td>

                   </tr>

                   <tr>
                       <td colspan="3"><b>Total</b></td>
                       <td>रु{{$data['row']->total}}</td>
                   </tr>
                   <tr>
                       <td colspan="3"><b>Cash Received</b></td>
                       <td>रु{{$data['row']->cash_received}}</td>
                   </tr>
                   <tr>
                       <td colspan="3"><b>Cash Returned</b></td>
                       <td> रु{{$data['row']->cash_return}}</td>
                   </tr>


               </table>



            </table>

        </div>

    </div>
{{--    <button class="btn btn-primary" onclick="printBill()"><i class="fas fa-print"></i>Print</button>--}}
        <a class="btn btn-primary text-white no_print" id="printBtn" onclick="window.print()"><i class="nav-icon fas fa-print"></i>Print</a>

    </div>

@endsection

@section('js')
    @include($base_route.'include.script')
    @include($base_route.'include.print')

    <!--No print-->
    <script type="text/javascript" src="{{asset('backend/plugins/jQuery.print.min.js')}}"></script>
    <script type="text/javascript">
        $(function() {

            $("#printBtn").on('click', function() {

                $.print("#printable");

            });

        });
    </script>

@endsection

@include('frontend.layout.master')


