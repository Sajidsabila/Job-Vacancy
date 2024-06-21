<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Resume Website</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background: #fff;
        }

        .container {
            background: #f5f5f5;
            max-width: 800px;
            margin: 60px auto;
            padding: 20px;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin-bottom: 10px;
        }

        .header h3 {
            text-transform: uppercase;
            font-size: 15px;
            font-weight: 500;
        }

        .img-area {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            margin: 25px auto;
            border: 5px groove deepskyblue;
        }

        .img-area img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        h2 {
            background: #00b6c4;
            padding: 15px;
            color: #fff;
            margin: 30px 0 10px 0;
            font-size: 20px;
            border-radius: 0 50px 50px 0;
        }

        .main {
            display: flex;
            flex-wrap: wrap;
        }

        .left {
            flex: 1;
            padding: 30px;
        }

        .left p {
            line-height: 2;
        }

        .left ul li {
            line-height: 2;
            margin: 10px 0;
        }

        .right {
            flex: 1;
            padding: 30px;
        }

        .right h3 {
            margin-bottom: 5px;
        }

        .right p {
            line-height: 2;
        }

        .right ul li {
            line-height: 2;
            margin: 10px 0;
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .container {
                width: 95%;
                height: auto;
            }

            h2 {
                font-size: 18px;
            }
        }

        @media screen and (max-width: 600px) {
            .main {
                flex-direction: column;
            }

            .left,
            .right {
                flex: none;
                width: 100%;
            }

            .container {
                width: 95%;
                height: auto;
            }

            h2 {
                font-size: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <center>
            <h1>Daftar Riwayat Hidup</h1>
        </center>
        <div class="header">
            <div class="img-area">
                <img src="{{ public_path('storage/' . $jobseeker->photo) }}" alt="{{ $jobseeker->first_name }}">
            </div>
            <h1>{{ $jobseeker->first_name . ' ' . $jobseeker->last_name }}</h1>

        </div>

        <div class="main">
            <div class="left">
                <h2>Data Pribadi</h2>
                <p><strong>Nama:</strong> {{ $jobseeker->first_name . ' ' . $jobseeker->last_name }}</p>
                <p><strong>Tanggal Lahir:</strong> {{ $jobseeker->birth_date }}</p>
                <p><strong>Phone:</strong> {{ $jobseeker->phone }}</p>
                <p><strong>Alamat:</strong> {{ $jobseeker->address }}</p>
                <p><strong>Agama:</strong> {{ $jobseeker->religion->religion }}</p>

                <h2>Skills</h2>
                <ul>
                    @foreach ($skills as $skill)
                        <li>{{ $skill->skill }}</li>
                    @endforeach
                </ul>

                <h2>Riwayat Pendidikan</h2>
                <ul>
                    @foreach ($educations as $edu)
                        <li>
                            <h3>{{ $edu->educationlevel->level }} - {{ $edu->school }}, {{ $edu->start_month }}
                                {{ $edu->start_year }} S/D
                                @if ($edu->ongoing)
                                    Sampai saat ini
                                @else
                                    {{ $edu->end_month && $edu->end_year ? $edu->end_month . ' ' . $edu->end_year : 'N/A' }}
                                @endif
                            </h3>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="right">
                <h2>Work Experience</h2>
                <ul>
                    @foreach ($workexperiences as $workexperience)
                        <li>
                            <h3>{{ $workexperience->company_name }}</h3>
                            <p><strong>Position:</strong> {{ $workexperience->position }}</p>
                            <p><strong>Duration:</strong> {{ $workexperience->start_month }}
                                {{ $workexperience->start_year }} S/D
                                @if ($workexperience->ongoing)
                                    Sampai saat ini
                                @else
                                    {{ $workexperience->end_month && $workexperience->end_year ? $workexperience->end_month . ' ' . $workexperience->end_year : 'N/A' }}
                                @endif
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
