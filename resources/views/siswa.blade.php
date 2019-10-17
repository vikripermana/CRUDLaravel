@extends('layouts.master')

@section('contain')
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>CRUDLaravel</title>
  </head>
  <body>
    <div class="container">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah Data
</button>

<!-- Modal Tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/siswa/tambah" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputNIS">NIS</label>
                    <input type="text" name="nis" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan NIS">
            </div>
            <div class="form-group">
                <label for="exampleInputNama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputNama" aria-describedby="emailHelp" placeholder="Masukan Nama">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Kelas</label>
                <select class="form-control" name="kelas" id="exampleFormControlSelect1">
                <option>XI-RPL-1</option>
                <option>XI-RPL-2</option>
                <option>XI-RPL-3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Alamat</label>
                <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
    </form>
  </div>
</div>
<!-- Akhir Modal Tambah -->
        <table class="table table-hover" id="tabel">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>   
                    <th scope="col">Kelas</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
        <tbody>
                @foreach($siswa as $s)
                <tr>
                    <th scope="row">{{ $s->id }}  </th>
                    <td>{{ $s->nis }}</td>
                    <td>{{ $s->nama }}</td>
                    <td>{{ $s->kelas }}</td>
                    <td>{{ $s->alamat }}</td>
                    <td><a class="btn btn-warning" href="/siswa/edit/{{ $s->id }}" role="button" data-toggle="modal" data-target="#modalEdit">Edit</a><a class="btn btn-danger" href="/siswa/hapus/{{ $s->id }}">Hapus</a></td>
                </tr> 
                <!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/siswa/update" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputNIS">NIS</label>
                    <input type="text" name="nis" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan NIS">
            </div>
            <div class="form-group">
                <label for="exampleInputNama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputNama" aria-describedby="emailHelp" placeholder="Masukan Nama">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Kelas</label>
                <select class="form-control" name="kelas" id="exampleFormControlSelect1">
                <option>XI-RPL-1</option>
                <option>XI-RPL-2</option>
                <option>XI-RPL-3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Alamat</label>
                <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
  </form>
    </div>
  </div>    
</div>
<!-- Akhir Modal Edit -->
                @endforeach
        </tbody>
    </table>
</div>
@endsection
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>