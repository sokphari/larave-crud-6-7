<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Pages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
    <style>
        .form{
            width: 500px ;
            height: 400px;
            padding: 50px 30px;
            margin: 60px auto ;
        }
    </style>
<body>
    <div class="container">
        <div class="form shadow rounded-lg">
            <h2>List Student</h2>
            <form action="{{ route('student.create') }}" method="post">
                @csrf
                <div class="form-group my-3">
                    <label for="name">Enter Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="form-group my-3">
                    <label for="gender">Gender</label>
                   <select name="gender" class="form-control" id="gender">
                    <option value="" selected disabled>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                    </select> 
                </div>
                <div class="form-group my-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="address">
                </div>
                <div class="my-3 form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>