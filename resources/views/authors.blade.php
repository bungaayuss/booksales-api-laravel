<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Autor</title>
</head>
<body>
    <h1>Selamat Datang di toko BookSales!</h1>
    <p>ini adalah halaman penulis dari toko buku</p>  
    @foreach ($authors as $item)
        <ul>
            <li>{{$item['id']}}</li>
            <li>{{$item['name']}}</li>
            <li>{{$item['description']}}</li>
        </ul>
    @endforeach
</body>
</html>