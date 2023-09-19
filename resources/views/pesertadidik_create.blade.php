@extends('adminlte')
@section('content')
 <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data peserta didik</h1>
                </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">tambah data peserta didik</li>
                </ol>
            </div>
        </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
            <h3 class="card-title">Informasion list</h3>
      </div>
      <div class="card-body">
            <a href="{{ route('pesertadidik.index') }}" class="btn btn-default">KEMBALI</a>
            <br><br>
            <form action="{{ route('pesertadidik.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">NIS</label>
                    <input name="nis" type="text" class="form-control" placeholder="...">
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input name="nama_lengkap" type="text" class="form-control" placeholder="...">
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="jk" class="form-control" id="">
                        <option>pilih jenis kelamin</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">perempuan</option>
                    </select>
                    @error('jk')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Nilai</label>
                    <input name="nilai" type="text" class="form-control" placeholder="...">
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" name="submit" class="btn btn-success" value="Tambah">
            </form>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
@endsection