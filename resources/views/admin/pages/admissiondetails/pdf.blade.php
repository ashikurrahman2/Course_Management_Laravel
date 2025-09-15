<!DOCTYPE html>
<html>
<head>
    <title>Admission Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 30px;
            color: #333;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 900px;
            margin: auto;
            margin-bottom: 20px;
        }

        .header h2 {
            font-size: 34px;
            color: #1E88E5;
            margin: 0 auto; /* Center the heading */
            text-align: center;
            flex: 1;
        }

        .header img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border: 3px solid #1E88E5;
            border-radius: 0; /* Square shape */
        }

        .admission-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
            max-width: 900px;
            margin: 0 auto;
            overflow: hidden;
        }

        .admission-card table {
            width: 100%;
            border-collapse: collapse;
        }

        .admission-card th, .admission-card td {
            padding: 15px 20px;
            text-align: left;
        }

        .admission-card th {
            background: #1abc9c;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 14px;
        }

        .admission-card td {
            background-color: #f9f9f9;
            color: #555;
            font-size: 14px;
        }

        .admission-card tr:nth-child(even) td {
            background-color: #e0f7fa;
        }

        .admission-card tr:hover td {
            background-color: #ffeaa7;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #888;
        }

        @media screen and (max-width: 768px){
            .header h2 { font-size: 28px; }
            .header img { width: 60px; height: 60px; }
            .admission-card th, .admission-card td {
                padding: 12px 10px;
                font-size: 13px;
            }
        }

        @media screen and (max-width: 480px){
            .header { flex-direction: column; align-items: center; }
            .header h2 { margin: 0 0 10px 0; }
            .header img { margin-bottom: 0; }
            .admission-card th, .admission-card td { font-size: 12px; padding: 10px; }
        }
    </style>
</head>
<body>

    {{-- <div class="header">
        <h2>🎓 Student Admission Details</h2>
        @if($admission->stu_photo)
            <img src="{{ asset($admission->stu_photo) }}" alt="Student Photo">
        @else
            <img src="{{ asset('default-user.png') }}" alt="No Photo">
        @endif
    </div> --}}

    <div class="header" style="display:flex; justify-content: center; align-items: center; gap:20px; max-width:900px; margin:auto; margin-bottom:20px;">
    <h2 style="margin:0; color:#1E88E5; font-size:34px;">🎓 Student Admission Details</h2>
    @if($admission->stu_photo)
        <img src="{{ asset($admission->stu_photo) }}" alt="Student Photo" style="width:80px; height:80px; object-fit:cover; border:3px solid #1E88E5; border-radius:0;">
    @else
        <img src="{{ asset('default-user.png') }}" alt="No Photo" style="width:80px; height:80px; object-fit:cover; border:3px solid #1E88E5; border-radius:0;">
    @endif
</div>


    <div class="admission-card">
        <table>
            <tr><th>ID</th><td>{{ $admission->id }}</td></tr>
            <tr><th>Name</th><td>{{ $admission->stu_name }}</td></tr>
            <tr><th>Email</th><td>{{ $admission->stu_email }}</td></tr>
            <tr><th>Phone</th><td>{{ $admission->stu_phone }}</td></tr>
            <tr><th>Gender</th><td>{{ $admission->stu_gender }}</td></tr>
            <tr><th>Course</th><td>{{ $admission->stu_course }}</td></tr>
            <tr><th>Address</th><td>{{ $admission->stu_address }}</td></tr>
            <tr><th>Division</th><td>{{ $admission->stu_division }}</td></tr>
            <tr><th>District</th><td>{{ $admission->stu_distict }}</td></tr>
            <tr><th>Payment Method</th><td>{{ $admission->payment_method ?? 'N/A' }}</td></tr>
            <tr><th>Payment Number</th><td>{{ $admission->payment_number ?? 'N/A' }}</td></tr>
        </table>
    </div>

    <div class="footer">
        © {{ date('Y') }} শিখবোআমি একাডেমি - All rights reserved.
    </div>

</body>
</html>
