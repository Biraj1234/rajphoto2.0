@section('main-content')

    <h1 style="text-align: center">Bills</h1>

<div class="dashboard">
    <a href="{{ route('bill.create') }}">
            <section>
                <i class="far fa-images"></i>
                <p>Photos</p>
            </section>
        </a>

    <a href="">
        <section>
            <i class="fas fa-money-bill-wave"></i>
            <p>Miscellaneous Income</p>
        </section>
    </a>

    <a href="">
        <section>
            <i class="fas fa-qrcode"></i>
            <p>Scan QR Code</p>
        </section>
    </a>
</div>
@endsection
@include('frontend.layout.master')


