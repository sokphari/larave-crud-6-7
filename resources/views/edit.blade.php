<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" enctype="multipart/form-data" method="post">
        @csrf
        <input type="text" name="name" id="" value="{{ old('name',$student->name) }}">
        <select name="gender" id="" >
            <option value="Male" {{  old('gender',$student->gender)=='Male'?'selected':'.'  }}>Male</option>
            <option value="Female" {{  old('gender',$student->gender)=='Female'?'selected':'.'  }}>Male</option>
        <input type="number" name="phone" id="address">
        <input type="text" name="address" id="address">
        <input type="file" name="image" id="image">
        <button type="submit">Save</button>
    </form>
</body>
</html>