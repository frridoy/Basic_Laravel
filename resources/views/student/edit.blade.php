

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Info</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #e9ecef;
            font-family: Arial, sans-serif;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #343a40;
        }
        .form-group label {
            font-weight: bold;
            color: #495057;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .form-control {
            border-radius: 5px;
        }
        .invalid-feedback {
            color: red;
            font-size: 0.875em;
        }
    </style>
</head>
<body>

<div class="container form-container">
    <h2>Edit Student Info</h2>
    @include('message')
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="studentName">Student Name</label>
            <input type="text" name="studentName" value="{{ old('studentName', $student->name) }}" class="form-control" id="studentName" placeholder="Enter student name" >
        </div>

        <div class="form-group">
            <label for="studentEmail">Student Email</label>
            <input type="text" name="studentEmail" value="{{ old('studentEmail', $student->email) }}" class="form-control" id="studentEmail" placeholder="Enter student email" >
        </div>

        <div class="form-group">
            <label for="studentRelation">Relation with Student</label>
            <select class="form-control" name="studentRelation" id="studentRelation" required>
                <option value="" disabled {{ old('studentRelation', $student->student_relation) ? '' : 'selected' }}>Select relation</option>
                <option value="Father" {{ old('studentRelation', $student->student_relation) == 'Father' ? 'selected' : '' }}>Father</option>
                <option value="Mother" {{ old('studentRelation', $student->student_relation) == 'Mother' ? 'selected' : '' }}>Mother</option>
                <option value="Brother" {{ old('studentRelation', $student->student_relation) == 'Brother' ? 'selected' : '' }}>Brother</option>
                <option value="Sister" {{ old('studentRelation', $student->student_relation) == 'Sister' ? 'selected' : '' }}>Sister</option>
                <option value="Others" {{ old('studentRelation', $student->student_relation) == 'Others' ? 'selected' : '' }}>Others</option>
            </select>
        </div>

        <div class="form-group">
            <label for="guardianPhone">Guardian's Phone Number</label>
            <input type="text" name="guardianPhone" value="{{ old('guardianPhone', $student->guardian_phone_number) }}" class="form-control" id="guardianPhone" placeholder="Enter guardian's phone number" >
        </div>

        <div class="form-group">
            <label for="studentAddress">Address</label>
            <textarea class="form-control" name="studentAddress" id="studentAddress" rows="3" placeholder="Enter address" >{{ old('studentAddress', $student->address) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Update</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
