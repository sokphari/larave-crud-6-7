<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($customer as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->gender }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->address }}</td>
                <td>
                    <img src="{{ asset('images/'.$item->image) }}" width="80" height="80" alt="">
                </td>
                <td>
                  <form action="{{ route('destroy.delete',$item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')" >Delete</button>
                </form> 
                <button>
                    <a href="{{ route('edit.get',$item->id) }}">Edit</a>    
                </button> 
                
                </tr>  
           @endforeach
        </tbody>
    </table>
</body>
</html>