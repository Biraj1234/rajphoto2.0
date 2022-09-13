<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f0dad6a07d.js" crossorigin="anonymous"></script>
    <link href="{{ asset('compiledCssAndJs/css/system.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('toast/jquery.toast.min.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"
        integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"
        integrity="sha256-H2TaUgwe8vbd8Uf3Pki5UcggDC05eieuDNDCjzEngWU=" crossorigin="anonymous"></script>
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/frontend/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/dashboard.css') }}">
    <link href="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/css/nepali.datepicker.v3.7.min.css"
        rel="stylesheet" type="text/css" />

    <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js-bootstrap-css/1.2.1/typeaheadjs.min.css"
        integrity="sha512-jG7NmK8Pm8iKEjw8aIWc+GVFBM33O/Ow4U0Xw34D5yyST0fgmlcV6shsghOXexDsAqtE2TCM6WwNy35qX8E6ng=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Raj Photo Studio - {{ $pageTitle ?? '' }}</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

</head>

<body id="body">

    <nav class="navbar navbar-expand-lg navbar-light bg-primary no_print">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('logo.png') }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bills.index') }}">Bills</a>
                    </li>


                </ul>
                <form class="d-flex" action="">
                    @csrf
                    <input class="form-control me-2" type="search" name="id" id="id"
                        placeholder="Enter customer's name" aria-label="Search">
                    <button class="btn btn-success" type="submit"><i class="fas fa-search search-icon"></i></button>

                </form>
                <div class="dark-mode-btn">
                    <i class="fas fa-lightbulb dark-mode ml-2" data-mode="dark"></i>
                </div>
            </div>
        </div>
    </nav>
