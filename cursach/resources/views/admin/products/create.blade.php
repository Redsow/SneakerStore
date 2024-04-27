
<body>
<section>
    <h1>Add Product</h1>
    <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="name">
        <input type="text" name="price" placeholder="price">
        <input type="text" name="description" placeholder="description">
        <input type="file" name="image" placeholder="image">
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Create">
    </form>
</section>
</body>

<style>

    body{
        background-color: #bcbec1;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    section {
        margin: 20px auto;
        max-width: 400px;
        background-color: #ffffff;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h1{
        text-align: center;
        margin-top: 20px;
        margin-bottom: 20px;
        font-size: 30px;
        font-weight: bold;
        color: #000000;
        text-transform: uppercase;
        letter-spacing: 2px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        font-family: Arial, sans-serif;
    }

    form {
        text-align: center;
        margin-top: 20px;
    }

    form input[type="text"],
    form input[type="file"],
    form select,
    form input[type="submit"] {
        display: block;
        margin: 10px auto;
        padding: 8px;
        width: 80%;
        border: 1px solid #ccc; /
        border-radius: 4px;
    }

    form input[type="submit"] {
        background-color: #ca2a07;
        color: #fff;
        cursor: pointer;
    }
</style>
