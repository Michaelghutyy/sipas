<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="col-lg-12 mt-5">
        <div class="row justify-content-center">
            <h3 class="text-center">{{ $title }}</h3>
                <table border="1px" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="row">#</th>
                            <th>Kode Surat</th>
                            <th>No Surat Masuk</th>
                            <th>Tanggal Surat</th>
                            <th>Tanggal Surat Masuk</th>
                            <th>Asal Surat</th>
                            <th>Perihal</th>
                            <th>Disposisi</th>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>