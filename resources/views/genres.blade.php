<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Genres</title>
</head>
<body>
    <h1>Selamat Datang di toko BookSales!</h1>
    <p>ini adalah halaman genre dari toko buku</p>
    @foreach ($genres as $item)
        <ul>
            <li>{{$item['id']}}</li>
            <li>{{$item['name']}}</li>
            <li>{{$item['description']}}</li>
        </ul>
    @endforeach

</body>
</html>