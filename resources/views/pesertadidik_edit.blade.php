@extends('adminlte')
@section('content')
 <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit peserta didik</h1>
                </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit peserta didik</li>
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
            <form action="{{ route('pesertadidik.update', $peserta->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">NIS</label>
                    <input name="nis" type="text" class="form-control" placeholder="..."  value="{{ $peserta->nis }}">
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input name="nama_lengkap" type="text" class="form-control" placeholder="..." value="{{ $peserta->nama_lengkap }}">
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="jk" class="form-control" id="">
                        <option>pilih jenis kelamin</option>

                        @if($peserta->jk == 'L')
                        <option value="L" selected>Laki-Laki</option>
                        <option value="P" >Perempuan</option>
                        @endif

                        @if($peserta->jk == 'P')
                        <option value="L">Laki-Laki</option>
                        <option value="P" selected>Perempuan</option>
                        @endif
                    </select>
                    @error('jk')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Nilai</label>
                    <input name="nilai" type="text" class="form-control" placeholder="..."  value="{{ $peserta->nilai }}">
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" name="submit" class="btn btn-success" value="edit">
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