<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">
                <h3 class="text-center">{{ $title }}</h3>
                <div class="table-responsive">
                    <table class="table table-bordered col-12 text-center" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Surat</th>
                                <th scope="col">No Surat Masuk</th>
                                <th scope="col">Tanggal Surat</th>
                                <th scope="col">Tanggal Surat Masuk</th>
                                <th scope="col">Asal Surat</th>
                                <th scope="col">Perihal</th>
                                <th scope="col">Disposisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($data as $d)    
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $d->kodesuratMasuk }}</td>
                                    <td>{{ $d->nosuratMasuk }}</td>
                                    <td>{{ $d->tglSurat }}</td>
                                    <td>{{ $d->tglsuratMasuk }}</td>
                                    <td>{{ $d->asalSurat }}</td>
                                    <td>{{ $d->perihal }}</td>
                                    @if($d->disposisi_id == "")
                                        <td>Belum Disposisi</td>
                                    @else
                                        <td>{{ $d->disposisi->tujuan }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>