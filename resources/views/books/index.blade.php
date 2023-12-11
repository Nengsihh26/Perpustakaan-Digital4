<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        form, table {
            width: 100%;
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"] {
            width: calc(100% - 16px);
            padding: 8px;
            box-sizing: border-box;
            margin-top: 5px;
            border: 1px solid #ddd;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        form button {
            width: 100%;
            margin-top: 10px;
        }

        form table tr td {
            vertical-align: top;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Buku</h2>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form name="book-save-form" id="book-save-form" action="{{ url('/books/save-book') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="id">ID:</label>
                    <input type="text" class="form-control" name="id" id="id" required>
                </div>
                <div class="form-group col-md-5">
                    <label for="book_name">Book Name:</label>
                    <input type="text" class="form-control" name="book_name" id="book_name" required>
                </div>
                <div class="form-group col-md-5">
                    <label for="author">Author:</label>
                    <input type="text" class="form-control" name="author" id="author" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Published Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $b)
                    <tr>
                        <td>{{ $b['id'] }}</td>
                        <td>{{ $b['book_name'] }}</td>
                        <td>{{ $b['author'] }}</td>
                        <td>{{ $b['published_at'] }}</td>
                        <td>
                            <form action="{{ url('/books/delete-book?id=') . $b['id'] }}" method="get">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-top: 5px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Data Buku</h2>

    @if (session('status'))
        <h4 style="color: green;">{{ session('status') }}</h4>
    @endif

    <form name="book-save-form" id="book-save-form" action="{{ url('/books/save-book') }}" method="post">
        @csrf
        <table>
            <tr>
                <td>ID</td>
                <td>:</td>
                <td><input type="text" name="id" id="id" required></td>
            </tr>
            <tr>
                <td>Book Name</td>
                <td>:</td>
                <td><input type="text" name="book_name" id="book_name" required></td>
            </tr>
            <tr>
                <td>Author</td>
                <td>:</td>
                <td><input type="text" name="author" id="author" required></td>
            </tr>
            <tr>
                <td colspan="3">
                    <button type="submit">Save</button>
                </td>
            </tr>
        </table>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Book Name</th>
            <th>Author</th>
            <th>Published Date</th>
            <th>Action</th>
        </tr>
        @foreach ($data as $b)
            <tr>
                <td>{{ $b['id'] }}</td>
                <td>{{ $b['book_name'] }}</td>
                <td>{{ $b['author'] }}</td>
                <td>{{ $b['published_at'] }}</td>
                <td>
                    <form action="{{ url('/books/delete-book?id=') . $b['id'] }}" method="get">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html> --}}
