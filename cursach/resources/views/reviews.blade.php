@extends('home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Отзывы</h5>
                        <div id="reviews" class="carousel">
                            @foreach($reviews as $key => $review)
                                <div class="slide {{ $key < 3 ? 'active' : '' }}">
                                    <div class="review-card">
                                        <h5>{{ $review->user->first_name }}</h5>
                                        <p>Отзыв: {{ $review->comment }}</p>
                                        <p>Оценка: {{ $review->rating }}</p>
                                        <a href="{{ route('create.review') }}" onclick="event.preventDefault(); document.getElementById('create-review-form').submit();">Оставить отзыв</a>

                                        <form id="create-review-form" action="{{ route('create.review') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if($reviews->count() > 3)
                            <div id="show-more">
                                <button id="show-more-btn" class="btn btn-primary">Показать больше</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card {
        margin-top: 20px;
        background: #bcbec1;
        max-width: 800px;
        border: 2px solid #ddd;
        border-radius: 10px;
        padding: 20px;
    }

    .carousel {
        overflow: hidden;
        position: relative;
        margin-top: 20px;
        min-width: 400px;
        max-width: 600px;
    }

    .slide {
        display: none;
        transition: opacity 0.5s;
    }

    .slide.active {
        display: block;
        opacity: 1;
    }

    .review-card {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 10px;
        background-color: #fff;
    }

    #show-more-btn {
        margin-top: 10px;
    }

    .btn-primary {
        background-color: #ca2a07;
        border: 2px #ca2a07 solid;
        border-radius: 5px ;
        color: white;
    }

    .btn-primary:hover {
        background-color: #ca2a07;
        border-color: #ca2a07;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const showMoreBtn = document.getElementById('show-more-btn');
        let isShowingAll = false;

        showMoreBtn.addEventListener('click', function () {
            const hiddenSlides = document.querySelectorAll('.slide:nth-child(n+4)');
            hiddenSlides.forEach(slide => {
                slide.classList.toggle('active');
            });

            isShowingAll = !isShowingAll;
            showMoreBtn.textContent = isShowingAll ? 'Показать меньше' : 'Показать больше';
        });
    });
</script>
