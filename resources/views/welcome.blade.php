<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>JogjaCamp Test</title>
</head>

<body>
    <div class="container" style="margin-top: 4%">
        <nav class="navbar navbar-expand-lg navbar-light" style="margin-bottom: 10px">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="btn btn-primary" href="{{ route('tambah_file') }}">+ Tambah Data</a>
                    </li>
                </ul>

                <form action="{{ route('filter_data') }}" class="form-inline my-2 my-lg-0">
                    <select class="form-control" style="margin-right: 10px" name="search" id="">
                        <option selected>Pilih Kategori</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Filter</button>
                </form>

                <form action="{{ route('cari_data') }}" class="form-inline my-2 my-lg-0" style="margin-left: 20px">
                    <input name="search" class="form-control mr-sm-2" value="{{ old('search') }}" type="search"
                        placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $datas as $key => $data )
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $data->name }}</td>
                    <td>
                        @if ($data->is_publish == 0)
                        tidak Aktif
                        @endif
                        @if ($data->is_publish == 1)
                        Aktif
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('edit_file', $data->id) }}" class="btn btn-primary">Edit</a>
                        <form style="display: inline" action="{{ route('delete_file', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>