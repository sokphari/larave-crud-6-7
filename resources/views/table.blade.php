<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>GENDER</th>
                <th>ADDRESS</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $item)
                <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->gender }}</td>
                <td>{{ $item->address }}</td>
                <td>
                    <form action="{{ route('delete',$item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
                    <a href="{{ route('edit',$item->id) }}" type="submit" class="btn btn-warning">Edit</a>
                </td>
            </tr> 
            @endforeach
        </tbody>
    </table>
</body>
</html>