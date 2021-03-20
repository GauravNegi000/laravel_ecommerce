@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if (session('failed'))
        <div class="alert alert-warning" role="alert">
            {{ session('failed') }}
        </div>
    @endif
    @if ($message ?? '')
        <div class="alert alert-success" role="alert">
            {{ $message ?? '' }}
        </div>
    @endif
    <div class="row justify-content-center">
    <div id="carouselTopFeatured" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselTopFeatured" data-slide-to="0" class="active"></li>
            <li data-target="#carouselTopFeatured" data-slide-to="1"></li>
            <li data-target="#carouselTopFeatured" data-slide-to="2"></li>
        </ol>
        <!-- Top Featured Carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="https://dummyimage.com/1400x400/000/fff.jpg" class="d-block" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="https://dummyimage.com/1400x400/000/fff.jpg" class="d-block" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="https://dummyimage.com/1400x400/000/fff.jpg" class="d-block" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselTopFeatured" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselTopFeatured" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- Top Featured Carousel ends-->
            {{ __('Hi from index!') }}
    </div>
</div>
@endsection
