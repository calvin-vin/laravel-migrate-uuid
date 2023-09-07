<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>

<body>

    <ul>
        @foreach ($users as $user)
            <li>{{ $user['username'] }}</li>
        @endforeach
    </ul>

    <form action="/users" method="post">
        @csrf
        <input type="text" name="username" placeholder="username">
        <input type="text" name="email" placeholder="email">
        <button type="submit">Tambah</button>
    </form>

</body>

</html>
