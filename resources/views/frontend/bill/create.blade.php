@section('main-content')


    <div class="form">
        <div class="table">
            <div class="table-responsive">
                {{ Form::open(['id' => 'cart']) }}
                <!--Name-->
                <div class="form-group row">

                    {!! Form::label('name', 'Name', ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => "Enter customer's name"]) !!}
                        @error('name')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <!--Order-->
                <div class="form-group row ">
                    {!! Form::label('order_id', 'Order', ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::select('order_id', $orders, null, ['class' => 'form-control', 'placeholder' => 'Select a order']) !!}
                        @error('order_id')
                            <p class="text text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


                <!--Size-->
                <div class="form-group row">
                    {!! Form::label('size_id', 'Size', ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::select('size_id', [], null, ['class' => 'form-control', 'placeholder' => 'Select a size']) !!}
                        @error('size_id')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!--Quantity-->
                <div class="form-group row">
                    {!! Form::label('quantity', 'Quantity', ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::number('quantity', 1, ['class' => 'form-control']) !!}
                    </div>
                </div>
                @error('quantity')
                    <span class="text text-danger">{{ $message }}</span>
                @enderror

                <!--Rate-->
                <div class="form-group row">
                    {!! Form::label('rate', 'Rate', ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::number('rate', null, ['class' => 'form-control']) !!}
                        @error('rate')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <!--Total-->
                        <div class="form-group row">
                            {!! Form::label('total', 'Total', ['class' => 'col-sm-6 col-form-label']) !!}
                            <div class="col-sm-6">
                                <td><input type="text" name="total" value="" jAutoCalc="{quantity} * {rate}"
                                        class="form-control"></td>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <!--Paid Amount-->
                        <div class="form-group row">
                            {!! Form::label('total', 'Paid Amount', ['class' => 'col-sm-6 col-form-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::number('paid_amount', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @error('paid_amount')
                            <p class="text text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <!--Balance Amount-->
                        <div class="form-group row">
                            {!! Form::label('total', 'Balance Amount', ['class' => 'col-sm-6 col-form-label']) !!}
                            <div class="col-sm-6">
                                <td><input type="text" name="balance_amount" jAutoCalc="{total} - {paid_amount}"
                                        class="form-control"></td>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Cash Received-->
                <div class="form-group row">
                    {!! Form::label('rate', 'Cash Received', ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::number('cash_received', null, ['class' => 'form-control']) !!}
                        @error('rate')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!--Cash Return-->
                <div class="form-group row">
                    {!! Form::label('rate', 'Cash return', ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        <td><input type="text" name="cash_return" value=""
                                jAutoCalc="{cash_received} -{paid_amount}" class="form-control"></td>

                        @error('rate')
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
                                <input type="datetime-local" value="<?php date_default_timezone_set('Asia/Kathmandu'); ?> {{ date('m/d/Y') }}"
                                    name="ordered_date" class="form-control" id="order_date">
                            </div>
                        </div>


                    </div>
                    <div class="col-6">
                        <!--Delivery Date-->
                        <div class="form-group row">
                            <label for="delivery_date" class="col-sm-4 col-form-label">Delivery Date</label>
                            <div class="col-sm-8">
                                <input type="datetime-local" name="delivery_date"
                                    value="<?php date_default_timezone_set('Asia/Kathmandu');
                                    $d = strtotime('tomorrow'); ?>{{ date('m/d/Y', $d) }}" class="form-control"
                                    id="delivery_date">
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
                            {!! Form::select('user_id', [], null, ['class' => 'form-control', 'placeholder' => 'Select your name']) !!}
                            @error('user_id')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-success">Submit</button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
@endsection

{{-- @section('js')
    @include($base_route.'include.script')
@endsection --}}

@include('frontend.layout.master')
