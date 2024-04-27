<body>
<section class="links">
    <a href="{{ route('admin.products.create_category') }}" class="btn btn-primary">Add Category</a>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add Product</a>
</section>
<div class="users-table">
    <h1>Users</h1>
    <table class="table">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>
                    <form id="delete-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        <button type="button" class="btn btn-secondary btn-sm cancel-btn">Cancel</button>
                    </form>
                    <button type="button" class="btn btn-danger btn-sm delete-btn" onclick="confirmDelete({{ $user->id }})">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


<div class="confirm-modal" id="confirm-modal">
    <h2>Confirm Deletion</h2>
    <p>Are you sure you want to delete this user?</p>
    <button type="button" class="btn btn-danger" id="confirm-delete">Confirm Delete</button>
    <button type="button" class="btn btn-secondary" id="cancel-delete">Cancel</button>
</div>
</body>


<script>
    function confirmDelete(userId) {
        if (confirm('Are you sure you want to delete this user?')) {
            document.getElementById('delete-form-' + userId).submit();
        }
    }
</script>
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

    .links {
        text-align: center;
        margin-top: 20px;
    }

    .links a {
        display: inline-block;
        margin-right: 10px;
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        text-decoration: none;
        color: #ffffff;
        font-size: 14px;
        font-weight: bold;
        text-transform: uppercase;
        background-color: #ca2a07;
        transition: background-color 0.3s ease; /
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

    .users-table {
        margin: 20px auto;
        width: 80%;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 8px;
        border: 1px solid #ccc;
        text-align: center;
    }

    .table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .table td{
        background-color: #f9f9f9;
    }

    .table .action-btns {
        text-align: center;
    }

    .table .action-btns button {
        margin: 0 5px;
    }

    ul.users-list {
        list-style: none;
        padding: 0;
        text-align: center;
    }

    ul.users-list li {
        margin-bottom: 10px;
        display: inline-block;
    }


    .btn {
        padding: 8px 12px;
        font-size: 14px;
        text-align: center;
        cursor: pointer;
        border: none;
        border-radius: 4px;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: #fff;
    }


    .confirm-modal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
    }

    .confirm-modal h2 {
        margin-top: 0;
    }

    .confirm-modal .btn {
        margin-right: 10px;
    }

</style>

