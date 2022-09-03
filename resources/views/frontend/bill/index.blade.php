@section('main-content')

    <div class="table">
        <div class="table-responsive">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Order</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Advance</th>
                        <th>Balance Amount</th>
                        <th>Action</th>

                    </tr>
                </thead>

                <tbody>

                    @forelse($bills as $index=>$bill)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if (isset($bill->name))
                                    {{ $bill->name }} ({{ $bill->qr_code }})
                                @else
                                    <p>-----</p>
                                @endif
                            </td>

                            <td>
                                @foreach ($bill->billOrders as $index => $billOrder)
                                    {{ $billOrder->orders->name }},
                                @endforeach
                            </td>
                            <td>
                                @foreach ($bill->billOrders as $index => $billOrder)
                                    {{ $billOrder->sizes->name }},
                                @endforeach
                            </td>

                            <td>
                                @foreach ($bill->billOrders as $index => $billOrder)
                                    {{ $billOrder->quantity }},
                                @endforeach
                            </td>
                            <td>
                               {{ $bill->grand_total }}
                            </td>
                            <td>{{ $bill->paid_amount }}</td>
                            <td>
                                @if (isset($bill->balance_amount))
                                    {{ $bill->balance_amount }}
                                @else
                                    <p>-----</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('bill.searches',$bill->qr_code) }}" class="btn btn-success"><i class="far fa-eye"></i></a>

                    <a href="" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                    <a href="{{ route('bills.show',$bill->id) }}" class="btn btn-warning"><i class="fas fas fa-print"></i></a>

                            </td>
                        @empty
                            <td>
                                <p>No bills</p>
                            </td>

                        </tr>
                    @endforelse



                </tbody>
            </table>

        </div>

    </div>
@endsection



@include('frontend.layout.master')
