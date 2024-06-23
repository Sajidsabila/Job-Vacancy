<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <style>
        .cv-container {
            width: auto;
            /* A4 width */
            height: auto;
            /* A4 height */
            margin: 0 auto;
            margin-bottom: 20px;
            padding: 20px;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            /* margin-bottom: 20px; */
            background-color: #337ab7;
            color: #fff;
            padding: 10px;
            border-radius: 10px;
        }

        .photo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid #fff;
            margin-bottom: 5px;
        }

        .contact-info {
            margin-top: 5px;
            font-size: 14px;
            color: #ffffff;
            flex: 1;
            padding: 0 0 30px 0;
            display: flex;
            flex-wrap: wrap;
        }

        .contact-info p {
            margin-left: 5px;
            line-height: 2;
            color: black;

        }

        .social-links {
            margin-top: 10px;
        }

        .social-links a {
            margin-right: 10px;
            color: #fff;
        }

        .social-links a:hover {
            color: #ccc;
        }

        .section {
            margin-bottom: 20px;
            padding: 0 10px 0 10px;
            background-color: #f7f7f7;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        h1 {
            font-weight: bold;
            margin-top: 0;
            color: #ffffff;
            font-size: 20px;
        }

        h2 {

            font-weight: bold;
            background-color: #337ab7;
            padding: 15px;
            color: #fff;
            margin: 30px 0 10px 0;
            font-size: 20px;
            border-radius: 0 50px 50px 0;
        }

        h2 span.badge {
            margin-right: 10px;
        }

        .badge {

            color: #fff;
            padding: 5px 10px;
            border-radius: 10px;
            font-size: 20px;
            font-weight: bold;
        }

        ul {
            list-style: disc;
            padding: 0;
            margin: 0;
        }

        li {
            margin-left: 15px;
        }

        p {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="cv-container">
        <div class="header">
            <img src="{{ public_path('storage/' . $jobseeker->photo) }}" alt="{{ $jobseeker->first_name }}"
                class="photo">
            <h1 class="name">{{ $jobseeker->first_name . ' ' . $jobseeker->last_name }}</h1>
            <p>{!! $jobseeker->description !!}</p>
        </div>
    </div>

    <div class="section">
        <h2><span class="badge">Profil</span></h2>
        <div class="contact-info">
            <p><strong>Nama:</strong> {{ $jobseeker->first_name . ' ' . $jobseeker->last_name }}</p>
            <p><strong>Tanggal Lahir:</strong> {{ $jobseeker->birth_date }}</p>
            <p><strong>Phone:</strong> {{ $jobseeker->phone }}</p>
            <p><strong>Alamat:</strong> {{ $jobseeker->address }}</p>
            <p><strong>Email:</strong> <href="mailto:{{ $user->email }}">{{ $user->email }}</p>

        </div>
        {{-- <div class="social-links">
                <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
                <a href="#" target="_blank"><i class="fab fa-github"></i></a>
                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
            </div> --}}
    </div>
    </div>

    {{-- <div class="section">
            <h2><span class="badge">Summary</span></h2>
            <ul>
            {{ $jobseeker->description }}</ul>
        </div> --}}
    <div class="section">
        <h2><span class="badge">Education</span></h2>
        <ul>
            @foreach ($educations as $edu)
                <li>
                    <p>{{ $edu->educationlevel->level }} - {{ $edu->school }}, {{ $edu->start_month }}
                        {{ $edu->start_year }} S/D
                        @if ($edu->ongoing)
                            Sampai saat ini
                        @else
                            {{ $edu->end_month && $edu->end_year ? $edu->end_month . ' ' . $edu->end_year : 'N/A' }}
                        @endif
                    </p>
                </li>
                {{-- <li>
                    <p>Master of Science in Software Engineering, ABC University (2020-2022)</p>
                </li> --}}
            @endforeach
        </ul>
    </div>
    <div class="section">
        <h2><span class="badge">Work Experience</span></h2>
        <ul>
            @foreach ($workexperiences as $workexperience)
                <li>
                    <p>{{ $workexperience->company_name }} , ( {{ $workexperience->start_month }}
                        {{ $workexperience->start_year }} S/D
                        @if ($workexperience->ongoing)
                            Sampai saat ini )
                        @else
                            {{ $workexperience->end_month && $workexperience->end_year ? $workexperience->end_month . ' ' . $workexperience->end_year : 'N/A' }})
                        @endif
                    </p>

                </li>
            @endforeach
        </ul>
    </div>
    <div class="section">
        <h2><span class="badge">Skills</span></h2>
        <ul>
            @foreach ($skills as $skill)
                <li>{{ $skill->skill }}</li>
            @endforeach
        </ul>
    </div>
    </div>
</body>
<script>
    < link rel = "stylesheet"
    href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" >
</script>

</html>
