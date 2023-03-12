@extends('admin.admin')
@section('content')
<div class="container-fluid">
    <div class="page-titles">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Data</a></li>
			<li class="breadcrumb-item active"><a href="javascript:void(0)">Cetak Laporan</a></li>
		</ol>
    </div>
    <!-- row -->
    <div class="row mt-3 ">
    <div class="col-lg-4 col-12">
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="card-header">
                    <h5 class="card-title text-center">Cari Berdasarkan Tanggal</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('laporan.getLaporan') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="form" class="form-control" placeholder="tanggal awal" onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                        </div>
                        <div class="form-group">
                            <input type="text" name="to" class="form-control" placeholder="tanggal akhir" onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                        </div>
                        <button type="submit" class="btn btn-warning" style="width: 100%">Cari Laporan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Cetak Laporan</h4>
                @if ($pengaduan ?? '')
                <a href="{{ route('laporan.cetakLaporan', ['from' => $from, 'to' => $to]) }}" class="btn btn-rounded btn-danger"><span class="btn-icon-left text-danger"><i class="fa fa-download color-danger"></i></span>Export PDF</a>
                @endif
            </div>
            <div class="card-body">
                @if ($pengaduan ?? '')
                    <div class="table">
                        <table id="example4" class="display min-w850">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Isi Laporan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach( $pengaduan as $k => $v )
                                <tr>
                                    <td>{{$k += 1}}</td>
                                    <td>{{$v->tgl_pengaduan}}</td>
                                    <td>{{$v->isi_laporan}}</td>
                                    <td>
                                        @if ($v->status == '0')
                                            <a href="#" class="badge badge-danger">Pending</a>
                                        @elseif($v->status == 'proses')
                                            <a href="#" class="badge badge-warning text-white">Proses</a>
                                        @else
                                            <a href="#" class="badge badge-success">Selesai</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center">
                        Tidak ada data
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
  
</div>
@endsection