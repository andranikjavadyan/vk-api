@extends('layout')
@section('content')
    <div class="container">
        <div class="col-12 text-center pt-3">
        </div>
        <div class="row">
            @foreach ([$news] as $k => $item)
                @if(property_exists($item, 'copy_history'))
                    <div class="col-md-12">
                        @php
                            $likes = $item->likes->count;
                        @endphp
                        @foreach($item->copy_history as $history)
                            <div class="card" style="">
                                <div id="carouselExampleInterval-{{ $k }}" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @if(property_exists($history, 'attachments'))
                                            @foreach($history->attachments as $key => $attachment)
                                                @if($attachment->type == 'photo')
                                                    @php
                                                        $sizes = $attachment->photo->sizes;
                                                        $imageUrl = $sizes[count($sizes)-1]->url;
                                                    @endphp
                                                    <div class="carousel-item {{ !$key ? 'active' : '' }}">
                                                        <img class="d-block w-100" src="{{ $imageUrl }}" alt="First slide">
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleInterval-{{ $k }}" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleInterval-{{ $k }}" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                                <div class="card-body">
                                    <p class="card-text">{{ $history->text }}</p>
                                    <p class="card-date">{{ date('d/m/Y', $history->date) }}</p>
                                    <p class="card-likes">{{ $likes }} Likes</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    </div>

@endsection
@push('css')
    <link rel="stylesheet" href="{{ url('css/custom.css') }}">
@endpush
@push('js')
    <script>
        $(document).ready(function () {
            $('.carousel').carousel();
        });
    </script>
@endpush