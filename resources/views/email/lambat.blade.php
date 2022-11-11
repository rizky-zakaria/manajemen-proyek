<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Responsive</title>
    <link rel="stylesheet" href="style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
        rel="stylesheet">
    <style>
        body {
            margin: 30px 0 0;
            padding: 0;
            font-family: 'Source Sans Pro', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            padding: 0;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            margin: 5px 15px;
            gap: 20px;
            position: relative;
        }

        .card {
            width: 100%;
            height: auto;
            grid-column: span 8;
            margin: 10px 0;
            border-radius: 15px;
            position: relative;
            box-shadow: 0 10px 10px rgba(0, 0, 0, .1);

        }

        .head-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .body-card {
            padding: 10px 15px;
            background-color: lightgrey;
            border-radius: 5px;
        }

        .body-card h1 {
            margin: 0;

        }

        .body-card svg {
            width: 31px;
            position: absolute;
            bottom: 7px;
            right: 20px;
        }

        /*
        @media screen and (min-width: 550px) {
            .card: {
                grid-column: span 4;

            }


            @media screen and (min-width: 760px) {

                .card: {
                    width: 350px;
                    margin: 0 10px;
                }

                @media screen and (min-width: 960px) {} */
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="head-card">
                {{-- <img src="1.jpg" alt=""> --}}
                <h1>Notifikasi Keterlambatan Proyek</h1>
            </div>
            <div class="body-card">
                <p>
                    Hello, Pimpinan!
                    Proyek {{ $pesan }} mengalami keterlambatan {{ $data }} hari!
                </p>
            </div>
        </div>
    </div>
</body>

</html>
