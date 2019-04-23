@extends('layout')
@section('content')
<header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h1 class="mb-5">Build a landing page for your business or project and generate more leads!</h1>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <form action="{{ route('newslist') }}" method="get">
                    <div class="form-row">
                        <div class="col-12 col-md-9 mb-2 mb-md-0">
                            <input type="text" name="search" class="form-control form-control-lg" placeholder="Search...">
                        </div>
                        <div class="col-12 col-md-3">
                            <input type="submit" value="Search" class="btn btn-block btn-lg btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ url('css/landing-page.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
@endpush

@push('js')
    <script>
        $('form').on('submit', function (e) {
            e.preventDefault();
            location.href = location.origin + '/news-list/' + $('input[name=search]').val();
        })
    </script>
@endpush
