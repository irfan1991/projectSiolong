 @extends('admin.layout.layout')
@section('content')
<!-- page content -->
      <div class="right_col" role="main">

        <br />



 <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="{{ url('/admin/peminjaman') }}">Dashboard</a></li>
          <li><a href="{{ url('/admin/user') }}">Member</a></li>
          <li class="active">Detail {{ $member->name }}</li>
        </ul>
        @include('flash::message')
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Detail {{ $member->name }}</h2>
          </div>

          <div class="panel-body">
            <p>Barang yang sedang dipinjam:</p>
            <table class="table table-condensed table-striped">
              <thead>
                <tr>
                  <td>Judul</td>
                  <td>Tanggal Peminjaman</td>
                </tr>
              </thead>
              <tbody>
                @forelse ($member->borrowLogs()->borrowed()->get() as $log)
                  <tr>
                    <td>{{ $log->barang->nama_barang }}</td>
                    <td>{{ $log->created_at }}</td>
                    <td>
                      {!! Form::open(['url' => route('admin.peminjaman.return', $log->barang->id),
                        'method' => 'put',
                        'class' => 'form-inline js-confirm',
                        'data-confirm' => "Anda yakin hendak mengembalikan " . $log->barang->nama_barang . "?"]
                        ) !!}
                        {{ $log->barang->nama_barang }}
                        {!! Form::submit('Kembalikan', ['class'=>'btn btn-xs btn-default']) !!}
                        {!! Form::close() !!}

                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="2">Tidak ada data</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
            <p>Barang yang telah dikembalikan:</p>
            <table class="table table-condensed table-striped">
              <thead>
                <tr>
                  <td>Judul</td>
                  <td>Tanggal Kembali</td>
                </tr>
              </thead>
              <tbody>
                @forelse ($member->borrowLogs()->returned()->get() as $log)
                  <tr>
                    <td>{{ $log->barang->nama_barang }}</td>
                    <td>{{ $log->updated_at }}</td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="2">Tidak ada data</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  @stop