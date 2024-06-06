<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View PDF</title>
</head>

<body>
    <h1>{{ $jobhistori->jobseeker->first_name . ' ' . $jobhistori->jobseeker->last_name }}'s PDF</h1>
    <div style="text-align:center;">
        <iframe src="{{ asset('storage/' . $jobhistori->file) }}" width="600" height="800"
            style="border:none;"></iframe>
    </div>
</body>

</html>
