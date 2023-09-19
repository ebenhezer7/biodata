@extends('adminlte')
@section('content')
 <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>peserta didik Page</h1>
                </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Blank Page</li>
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
        @if($message = Session::get('success'))
        <div class="alert alert-success">{{$message}}</div>
        @endif
        <a href="{{ route('guru.create') }}" class="btn btn-success">Tambah data</a>
        <br><br>
        <table class="table table-striped table-bordered">
          <tr>
            <th>NIP</th>
            <th>namaguru</th>
            <th>mapel</th>
            <th>Aksi</th>
          </tr>
          @foreach ($GuruM as $guru)
              <tr>
                <td>{{ $guru->NIP }}</td>
                <td>{{ $guru->namaguru }}</td>
                <td>{{ $guru->mapel }}</td>
                <td>

                  <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-warning btn-xs">EDIT</a>

                  <form action="{{ route('guru.destroy', $guru->id)}}" method="POST">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-xs btn-danger">DELETE</button>
                  </form>

                </td>
              </tr>
          @endforeach
        </table>
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