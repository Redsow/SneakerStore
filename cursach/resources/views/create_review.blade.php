@extends('home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Review</div>

                    <div class="card-body">
                        <form action="{{ route('store.review') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="comment">Comment:</label>
                                <textarea class="form-control" id="comment" name="comment" rows="1"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="rating">Rating:</label>
                                <input type="number" class="form-control" id="rating" name="rating" min="1" max="5">
                            </div>
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </form>
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
        height: 50vh;
    }

    .card {
        width: 100%;
        max-width: 500px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #ca2a07;
        color: #fff;
        font-weight: bold;
        padding: 10px 20px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card-body {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    .btn-primary {
        background-color: #ca2a07;
        border: 2px #ca2a07 solid;
        border-radius: 5px ;
        color: white;
        padding: 5px 5px;
    }

    .btn-primary:hover {
        background-color: #ca2a07;
        border: 2px #ca2a07 solid;
        border-radius: 5px ;
        color: white;
    }
</style>
