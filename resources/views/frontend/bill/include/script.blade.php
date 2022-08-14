<script>
    $(document).ready(function() {
        var count = 1;

        function init() {
            count++;
        }

        $('.dynamic-input').delegate('select[id=1]', 'change', function() {
            let sizedId = '#size_id_' + $(this).attr('id');
            let rateId = '#rate' + $(this).attr('id');
            let quantityId = '#quantity' + $(this).attr('id');
            let totalId = '#total' + $(this).attr('id');
            var order = $(this).val();
            var path = "{{ URL::route('order.getSize') }}";
            $.ajax({
                url: path,
                data: {
                    'order_id': order,
                    '_token': "{{ csrf_token() }}"
                },
                method: 'post',
                dataType: 'text',
                success: function(response) {
                    $(sizedId).empty();
                    $(rateId).val('');
                    $(quantityId).val('1');
                    $(totalId).val('');
                    $(sizedId).append(response);

                }
            });
        });



        //Append new order 
        $('#btnAdd').click(function(e) {
            init();
            e.preventDefault();
            var template = `   <div class="appended row">
                            <!--Order-->
                     
                                {!! Form::label('order_id', 'Order', ['class' => 'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-2">
                                    <select name="order_id[]" id="${count}" class="form-control">
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
                                    <select name="size_id[]" id="size_id_${count}" class="form-control">
                                        <option value="" selected>Select a size</option>
                                    </select>
                                </div>
                            </div>

                            <!--Rate-->
                            <div class="col-2 form-group row">
                                {!! Form::label('rate', 'Rate', ['class' => 'col-sm-3 col-form-label']) !!}
                                <div class="col-sm-9">
                                    <input type="number" name="rate[]" id="${count}" class="form-control">
                                    @error('rate')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                               <!--Quantity-->
                               <div class="col-2 form-group row">
                                {!! Form::label('quantity', 'Quantity', ['class' => 'col-sm-4 col-form-label']) !!}
                                <div class="col-sm-8">
                                    <input type="number" name="quantity[]" id="${count}" value="1" class="form-control">
                                    @error('quantity')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>



                            <!--Total-->
                            <div class="col-2 form-group row">
                                {!! Form::label('total', 'Total', ['class' => 'col-sm-3 col-form-label']) !!}
                                <div class="col-sm-9">
                                    <input type="text" name="total[]" id="total${count}" value="" readonly
                                        class="form-control"> @error('rate')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>`;

            $('.more-inputs').append(template);
        });

        $('#btnRemove').click(function() {
            $('.appended').last().remove();
        });
 


    //Calculation
    var rate = null;
    var quantity = 1;


    $('.dynamic-input').delegate('input', 'change keyup', function() {

        totalId = '#total' + $(this).attr('id');
        checkInputType = $(this).attr('name');
        if (checkInputType === 'rate[]') {
            rate = $(this).val();
            total = rate * quantity;
            $(totalId).val(total);
          
        } else {
            quantity = $(this).val();
            total = rate * quantity;
            $(totalId).val(total);
        }

        //Calculate grand total
        var grand_total = 0;
        for(let i = 1; i<=count; i++){

            let total = $(`#total${i}`).val();
            grand_total =  parseInt(total) + parseInt(grand_total);
            
        }
        $('#grand_total').val(grand_total);
      
    });


    //Calculate balance amount
    let balanceAmt = 0;
    $('#paid_amount').on('keyup change', function() {
        balanceAmt = grand_total - $('#paid_amount').val();
        $('#balance_amount').val(balanceAmt);
    });

    //Calculate cash return
    $('#cash_received').on('keyup change', function() {
        cashReturn = $('#cash_received').val() - $("#paid_amount").val();
        $('#cash_return').val(cashReturn);
    });

});
</script>
