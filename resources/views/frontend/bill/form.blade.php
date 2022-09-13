@extends('frontend.layout.master')
@section('main-content')

    <div class="form">
        {{-- {{ Form::open(['route' => 'bills.store']) }} --}}

        <form action="{{ route('bills.store') }}" method="POST" autocomplete="off">
            @csrf
            <div class="form-group row">
                <div class="col-6">
                    <!--Name-->
                    <div class="form-group row">
                        <label for="order_date" class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" value="" name="name" class="form-control" id="customer_name"
                                {{ isset($item) ? 'readonly' : '' }}>
                        </div>
                    </div>

                </div>

                <div class="col-6">
                    <!--Phone-->
                    <div class="form-group row">
                        <label for="order_date" class="col-sm-4 col-form-label">Phone</label>
                        <div class="col-sm-8">
                            <input type="text" value="" name="phone_number" class="form-control" id="phone_number"
                                {{ isset($item) ? 'readonly' : '' }}>
                        </div>
                    </div>

                </div>


            </div>

            {{-- For delivery --}}

            @if (isset($item->billOrders))
                @foreach ($item->billOrders as $key => $bill)
                    <div class="dynamic-input">
                        <div class="row">
                            <!--Order-->

                            {!! Form::label('order_id', 'Order', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-2">
                                <select name="bill[0][order_id]" id="1" class="form-control order"
                                    {{ isset($item) ? 'disabled' : '' }}>
                                    <option value="" selected>Select Order Type</option>
                                    @foreach ($orders as $order)
                                        <option value="{{ $bill->order_id }}" selected>{{ $bill->orders->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>



                            <!--Size-->
                            <div class="col-2 form-group row">
                                {!! Form::label('size_id', 'Size', ['class' => 'col-sm-3 col-form-label']) !!}
                                <div class="col-sm-9">
                                    <select name="bill[0][size_id]" id="size_id_1" class="form-control" disabled>
                                        <option value="{{ $bill->size_id }}" selected>{{ $bill->sizes->name }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <!--Rate-->
                            <div class="col-2 form-group row">
                                {!! Form::label('rate', 'Rate', ['class' => 'col-sm-3 col-form-label']) !!}
                                <div class="col-sm-9">
                                    <input type="number" name="bill[0][rate]" id="rate1" data-id="1"
                                        value="{{ $bill->rate ?? '' }}" {{ isset($item) ? 'readonly' : '' }}
                                        class="form-control">
                                    @error('rate')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!--Quantity-->
                            <div class="col-2 form-group row">
                                {!! Form::label('quantity', 'Quantity', ['class' => 'col-sm-4 col-form-label']) !!}
                                <div class="col-sm-8">
                                    <input type="number" name="bill[0][quantity]" id="quantity1" data-id="1"
                                        value="{{ $bill->quantity ?? '' }}" {{ isset($item) ? 'readonly' : '' }}
                                        value="1" class="form-control">
                                    @error('quantity')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>



                            <!--Total-->
                            <div class="col-2 form-group row">
                                {!! Form::label('total', 'Total', ['class' => 'col-sm-3 col-form-label']) !!}
                                <div class="col-sm-9">
                                    <input type="text" name="bill[0][total]" id="total1"
                                        value="{{ $bill->total ?? '0' }}" readonly class="form-control"> @error('rate')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        {{-- For cloning --}}

                        <div class="more-inputs"></div>

                    </div>
                @endforeach
                {{-- For creating new bill --}}
            @else
                <div class="dynamic-input">
                    <div class="row" id="order-1">
                        <!--Order-->

                        {!! Form::label('order_id', 'Order', ['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-2">
                            <select name="bill[0][order_id]" id="1" data-id="order" class="form-control" required>
                                <option value="" selected>Select Order Type</option>
                                @foreach ($orders as $order)
                                    <option value="{{ $order->id }}">{{ $order->name }}</option>
                                @endforeach
                            </select>
                        </div>



                        <!--Size-->
                        <div class="col-2 form-group row">
                            {!! Form::label('size_id', 'Size', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                                <select name="bill[0][size_id]" id="size_id_1" data-id="1" data-class="size"
                                    class="form-control" required>
                                    <option value="" selected>Select a size</option>
                                </select>
                            </div>
                        </div>


                        <!--Rate-->
                        <div class="col-2 form-group row">
                            {!! Form::label('rate', 'Rate', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                                <input type="number" name="bill[0][rate]" id="rate1" data-id="1" data-type="rate"
                                    class="form-control" required>
                                @error('rate')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!--Quantity-->
                        <div class="col-2 form-group row">
                            {!! Form::label('quantity', 'Quantity', ['class' => 'col-sm-4 col-form-label']) !!}
                            <div class="col-sm-8">
                                <input type="number" min="1" name="bill[0][quantity]" id="quantity1" data-id="1"
                                    data-type="quantity" value="1" class="form-control">
                                @error('quantity')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                        <!--Total-->
                        <div class="col-2 form-group row">
                            {!! Form::label('total', 'Total', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                                <input type="text" name="bill[0][total]" id="total1" value="" readonly
                                    class="form-control"> @error('rate')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="remove-order">
                            <i class="fas fa-times removeOrder d-none" data-orderId="order-1" data-order='1'></i>
                        </div>
                    </div>
                </div>
            @endif
            <div class="{{ isset($item) ? 'd-none' : '' }}">
                <button type="button" class="btn btn-info btn-sm" id="btnAdd"><i
                        class="fas fa-plus"></i>&nbspAdd</button>
            </div>

            <!--Grand Total-->
            <div class="row">
                <div class="col-4">
                    <div class="form-group row">
                        {!! Form::label('grand_total', 'Grand Total', ['class' => 'col-sm-6 col-form-label']) !!}
                        <div class="col-sm-6">
                            <td><input type="number" name="grand_total" value="{{ $item->grand_total ?? '0' }}"
                                    id="grand_total" class="form-control" readonly>
                            </td>
                        </div>
                    </div>
                </div>

                <!--Paid Amount-->
                <div class="col-4">
                    <div class="form-group row">
                        {!! Form::label('paid_amount', 'Paid Amount', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-6">
                            <td><input type="number" name="paid_amount" value="{{ $item->paid_amount ?? '' }}"
                                    id="paid_amount" class="form-control" {{ isset($item) ? 'readonly' : '' }} required>
                            </td>
                        </div>
                    </div>
                    @error('paid_amount')
                        <p class="text text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-4">
                    <!--Balance Amount-->
                    <div class="form-group row">
                        {!! Form::label('total', 'Due Amount', ['class' => 'col-sm-4 col-form-label']) !!}
                        <div class="col-sm-6">
                            <td><input type="text" name="due_amount" id="due_amount"
                                    value="{{ $item->due_amount ?? '' }}" readonly class="form-control"></td>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <!--Cash Received-->
                    <div class="form-group row">
                        <label for="order_date" class="col-sm-4 col-form-label">Cash Received</label>
                        <div class="col-sm-8">
                            <input type="number" name="cash_received" value="{{ $item->cash_received ?? '' }}"
                                id="cash_received" class="form-control" required>
                        </div>
                    </div>

                </div>
                <div class="col-6">
                    <!--Cash Return-->
                    <div class="form-group row">
                        <label for="texr" class="col-sm-4 col-form-label">Cash Return</label>
                        <div class="col-sm-8">
                            <input type="text" name="cash_return" value="{{ $item->cash_return ?? '' }}"
                                id="cash_return" class="form-control" readonly>
                        </div>
                    </div>
                    @error('delivery_date')
                        <span class="text text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>



            <div class="row">
                <div class="col-6">
                    <!--Ordered Data-->
                    <div class="form-group row">
                        <label for="order_date" class="col-sm-4 col-form-label">Ordered Date</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{ $item->ordered_date ?? '' }}" name="ordered_date"
                                class="form-control" id="order-date" {{ isset($item) ? 'readonly' : '' }}
                                readonly="readonly">
                        </div>
                    </div>

                </div>
                <div class="col-6">
                    <!--Delivery Date-->
                    <div class="form-group row">
                        <label for="texr" class="col-sm-4 col-form-label">Delivery Date</label>
                        <div class="col-sm-8">
                            <input type="text" name="delivery_date" required value="{{ $item->delivery_date ?? '' }}"
                                class="form-control" id="delivery-date" {{ isset($item) ? 'readonly' : '' }}>
                        </div>
                    </div>
                    @error('delivery_date')
                        <span class="text text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <!--Prepared by-->
                <div class="form-group row">
                    {!! Form::label('user_id', 'Prepare By', ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        @if (isset($item))
                            <select name="user_id" class="form-control" required>
                                @foreach ($users as $user)
                                    <option {{ $item->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        @else
                            <select name="user_id" class="form-control" required>
                                <option value="" selected>Select your name</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        @endif

                        @error('user_id')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
            <button class="btn btn-success btn-sm">Submit</button>
        </form>
    </div>

@endsection


@section('js')
    @include('frontend.bill.include.scripts.script')

    <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

    {{-- For nepali date picker --}}
    <script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v3.7.min.js"
        type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>


    <script type="text/javascript">
        window.onload = function() {
            $('#order-date').nepaliDatePicker({
                language: "english",
            });
            var currentBsDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate(), 'YYYY-MM-DD');
            $('#order-date').val(currentBsDate);

            //Delivery date
            $('#delivery-date').nepaliDatePicker({
                language: "english",
            });
            var deliveryDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BsAddDays(NepaliFunctions
                .GetCurrentBsDate(), 1), 'YYYY-MM-DD')
            $('#delivery-date').val(deliveryDate);

        };

        //Auto complete f


        $("#phone_number").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('autocompletePhone') }}",
                    type: 'GET',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function(data) {
                        response(data);
                    },
                });
            },
            delay: 200,
            select: function(event, ui) {
                $('#phone_number').val(ui.item.label);
                console.log(ui.item);
                return false;
            },
        });

        var path = "{{ route('autocompleteName') }}";
        $("#customer_name").typeahead({
            source: function(query, process) {
                return $.get(path, {
                    query: query
                }, function(data) {
                    console.log(data);
                    return process(data);
                });
            }
        });
    </script>
@endsection
