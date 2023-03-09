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
                    <h4 class="card-title">Table Petugas</h4>
                    <a href="{{ route('petugas.create') }}" class="btn btn-rounded btn-success"><span class="btn-icon-left text-success"><i class="fa fa-plus color-success"></i></span>Add</a>
                    <!-- <a href="{{ route('petugas.create') }}" class="btn btn-warning" style="width: 150px;">Tambah</a> -->
                </div>
                <div class="card-body">
                    <div class="table">
                        <table id="example4" class="display min-w850">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Petugas</th>
                                    <th>Username</th>
                                    <th>No Telp</th>
                                    <th>Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach( $petugas as $k => $v )
                                <tr>
                                    <td>{{$k += 1}}</td>
                                    <td>{{$v->nama_petugas}}</td>
                                    <td>{{$v->username}}</td>
                                    <td>{{$v->telp}}</td>
                                    <td>{{$v->level}}</td>
                                    <td>
                                        <a href="{{ route('petugas.edit', $v->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                    </td>
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