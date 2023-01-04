<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Proyek</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Anggaran</th>
                <th scope="col">Waktu Mulai</th>
                <th scope="col">Waktu Selesai</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            ?>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->nama_proyek }}</td>
                    <td>{{ $item->lokasi }}</td>
                    <td>{{ $item->anggaran }}</td>
                    <td>{{ $item->waktu_mulai }}</td>
                    <td>{{ $item->waktu_selesai }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script>
        window.print()
    </script>
</body>

</html>
