@extends('admin.admin')
@section('content')
<div class="container-fluid">
    <div class="page-titles">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
			<li class="breadcrumb-item active"><a href="javascript:void(0)">Data Petugas</a></li>
		</ol>
    </div>
    <!-- row -->
    <div class="row" >
        <div class="col-12">
            <div class="card" >
                <div class="card-header">
                    <h4 class="card-title">Table Masyarakat</h4>
                </div>
                <div class="card-body">
                    <div class="table">
                        <table id="example4" class="display min-w850">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nik</th>
                                    <th>No Telp</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach( $data as $masyarakat )
                                <tr>
                                    <td>{{$k += 1}}</td>
                                    <td>{{$masyarakat->name}}</td>
                                    <td>{{$masyarakat->nik}}</td>
                                    <td>{{$masyarakat->telp}}</td>
                                    <td>{{$masyarakat->email}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection