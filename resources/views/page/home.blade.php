@extends('page.layout.content')
@section('title', 'Trang chủ')
@section('content')
<main>
    <div class="main-section">
        <div class="container">
            <div class="carousel px-3 slide" id="carouselExampleIndicators" data-ride="carousel">
                <div class="p-3 tabs">
                    <div>
                        <a href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
                <div class="carousel-inner ">
                    <div class="carousel-item active">

                        <img src="https://www.w3schools.com/bootstrap/ny.jpg" alt="Chicago">
                        <h3>Slide 1</h3>
                        <p>Thank you, Chicago!</p>

                    </div>
                    <div class="carousel-item ">
                        <img src="https://www.w3schools.com/bootstrap/la.jpg" alt="">
                        <h3>Slide 2</h3>
                        <p>Thank you, Chicago!</p>

                    </div>
                    <div class="carousel-item ">
                        <img src="https://www.w3schools.com/bootstrap/chicago.jpg" alt="">
                        <h3>Slide 3</h3>
                        <p>Thank you, Chicago!</p>

                    </div>

                </div>
            </div>
            {{----------------end carousel save--}}
        </div>
    </div>
</main>
@endsection