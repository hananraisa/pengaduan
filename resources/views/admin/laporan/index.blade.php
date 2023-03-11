@extends('admin.admin')
@section('content')
<div class="container-fluid">
    <div class="page-titles">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
			<li class="breadcrumb-item active"><a href="javascript:void(0)">Data Pengaduan</a></li>
		</ol>
    </div>
    <!-- row -->
    <div class="row" >
        <div class="col-12">
            <div class="card" >
                <div class="card-header">
                    <h4 class="card-title">Table Pengaduan</h4>
                    @if ($pengaduan ?? '')
                    <button type="button" class="btn btn-rounded btn-danger"><span class="btn-icon-left text-danger"><i class="fa fa-download color-danger"></i></span>Export PDF</button>
                    @endif
                </div>
                <div class="card-body">
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
                        @if (Session::has('status'))
                            <div class="alert alert-success mt-2">
                                {{ Session::get('status') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection