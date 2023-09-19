<div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <style>
        /* Style the table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color:indigo;
            color: white;
        }

        /* Style the image */
        .student-image {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>
<body>
    <div class="container" style="margin-top: 20px;">
    <h5 style="text-align: center;color:black"><b>Student Details</b></h5>
        <table>
            <thead>
                <tr>
                <th style="text-align: center;">Image</th>
                    <th style="text-align: center;">Student ID</th>
                    <th style="text-align: center;">Name</th>
                    <th style="text-align: center;">Gender</th>
                    <th style="text-align: center;">Date of Birth</th>
                    <th style="text-align: center;">Class</th>
                    <th style="text-align: center;">Mobile</th></th>
                    <th style="text-align: center;">Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                <td  style="text-align: center;">
                        <img height="50" width="50" src="{{ asset('storage/' . $student->student_image_path) }}" alt="Student Image" class="student-image">
                    </td>
                    <td style="text-align: center;">{{ $student->std_id }}</td>
                    <td style="text-align: center;">{{ $student->std_first_name }} {{ $student->std_last_name }}</td>
                    <td style="text-align: center;">{{ $student->std_gender }}</td>
                    <td style="text-align: center;">{{ date('d-m-Y', strtotime($student->std_dob)) }}</td>
                    <td style="text-align: center;">{{ $student->class }}</td>
                    <td style="text-align: center;">{{ $student->std_phone_no }}</td>
                    <td style="text-align: center;">
            @if($student->std_status == 'Active')
            <div style="width: 200px;margin-left:10px">
            <button class="btn btn-primary">
                <a style="color: white" href="/EditStudentDetails/{{ $student->std_id }}">Edit</a>
            </button>
                <button class="btn btn-success">Active</button>
                <button class="btn btn-danger" wire:click="deleteStudent({{ $student->std_id }})">Delete</button>
            </div>
            @else
            <div style="width:220px">
            <button class="btn btn-primary" disabled>
              Edit
            </button>
                <button class="btn btn-danger">Inactive</button>
                <button class="btn btn-danger" disabled>Delete</button>
            </div>
            @endif
        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
</div>