<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1 {
            color: #007bff;
            font-weight: bold;
        }
        .table {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .alert {
            font-size: 1.2rem;
        }
        .btn {
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
            color: white;
        }
        .container {
            margin-top: 50px;
            padding: 20px;
            border-radius: 10px;
            background: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="text-center mb-4">Student Information</h3>

        @include('message')

        <div class="text-center mt-4 mb-2">
            <a href="{{ route('students.create') }}" class="btn btn-primary" onclick="return confirm('Do you want to add a new student?');">
                <i class="fas fa-plus"></i> Add New Student
            </a>
        </div>


        @if (count($students) > 0)
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>

                        <th>SI</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Guardian Relation</th>
                        <th>Guardian Number</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{$student->id}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->student_relation}}</td>
                            <td>{{$student->guardian_phone_number}}</td>
                            <td>
                                {{ $student['address'] ?? 'N/A' }}
                            </td>
                            <td>
                                @if($student->image)
                                    <img src="{{ asset($student->image) }}" alt="Student Image" style="width: 75px; height: auto;">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>

                            <td>
                               <a href="{{route('students.edit', $student->id)}}" class="btn btn-warning">Edit</a>
                               <a href="{{route('students.destroy', $student->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info text-center">
                No student information is available.
            </div>
        @endif
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>

