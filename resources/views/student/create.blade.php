<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
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
        textarea {
            resize: none;
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
    <h2>Add New Student</h2>
    <form action="{{route('students.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="studentName">Student Name</label>
            <input type="text" name="studentName" value="{{old('studentName')}}" class="form-control @error('studentName') is-invalid @enderror" id="studentName" placeholder="Enter student name" >
            @error('studentName')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
        </div>
        <div class="form-group">
            <label for="studentEmail">Student Email</label>
            <input type="string" name="studentEmail"  value="{{old('studentEmail')}}" class="form-control @error('studentEmail') is-invalid @enderror" id="studentEmail" placeholder="Enter student email" >
            @error('studentEmail')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror

        </div>

        <div class="form-group">
            <label for="studentRelation">Relation with Student</label>
            <select class="form-control @error('studentRelation') is-invalid @enderror" name="studentRelation" id="studentRelation">
                <option value="" disabled {{ old('studentRelation') ? '' : 'selected' }}>Select relation</option>
                <option value="Father" {{ old('studentRelation') == 'Father' ? 'selected' : '' }}>Father</option>
                <option value="Mother" {{ old('studentRelation') == 'Mother' ? 'selected' : '' }}>Mother</option>
                <option value="Brother" {{ old('studentRelation') == 'Brother' ? 'selected' : '' }}>Brother</option>
                <option value="Sister" {{ old('studentRelation') == 'Sister' ? 'selected' : '' }}>Sister</option>
                <option value="Others" {{ old('studentRelation') == 'Others' ? 'selected' : '' }}>Others</option>
            </select>
            @error('studentRelation')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>


        <div class="form-group">
            <label for="guardianPhone">Guardian's Phone Number</label>
            <input type="text" name="guardianPhone" value="{{old('guardianPhone')}}" class="form-control @error('guardianPhone') is-invalid @enderror" id="guardianPhone" placeholder="Enter guardian's phone number" >
            @error('guardianPhone')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="studentAddress">Address</label>
            <textarea class="form-control" name="studentAddress" id="studentAddress" rows="3" placeholder="Enter address" ></textarea>

        </div>
        <button type="submit" class="btn btn-primary btn-block">Add Student</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

