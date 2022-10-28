@extends('frontend.layout.master')
@section('main-content')
    {{ Session::has('success') }}


    <div class="bill-index">

        <div class="d-flex justify-content-between mb-2 align-items-center">
            <h2>Savings</h2>
            <div>
                <button data-toggle="modal" data-target="#savings" target="_blank"
                    class="btn btn-success open-AddBookDialog"><i class="fa fa-plus"></i>&nbspAdd</button>
                </div>

          
            @include('frontend.saving.form')

        </div>

        <table class="table room-table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Amount</th>
                </tr>
            </thead>    

            <tbody>
                @forelse ($savings as $key => $saving)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $saving->savings->bank_name }}</td>
                        <td>{{ $saving->amount }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-danger">No Data found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- {{ $transactions }} --}}

    </div>
@endsection

