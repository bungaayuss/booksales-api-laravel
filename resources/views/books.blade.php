<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <style>
        body {
            background-color: #ffe6f0;
            font-family: Arial, sans-serif;
            color: #333;
            padding: 20px;
        }

        h1 {
            color: #d63384;
            text-align: center;
        }

        p {
            text-align: center;
            color: #555;
        }

        ul {
            background-color: #fff0f5;
            border: 1px solid #ffb6c1;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            list-style: none;
        }

        li:first-child {
            font-weight: bold;
            color: #c71585;
        }
    </style>
</head>
<body>
    <h1>Selamat Datang di toko BookSales!</h1>
    <p>ini adalah halaman buku dari toko buku</p>
    @foreach($books as $item)
        <ul>
            <li>{{$item['title']}}</li>
            <li>{{$item['description']}}</li>
            <li>{{$item['price']}}</li>
            <li>{{$item['stock']}}</li>
        </ul>
    @endforeach
</body>
</html>