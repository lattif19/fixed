<<<<<<< HEAD
=======

>>>>>>> 1739b7ec5a5104216dffdcba9d35b55946848510
@extends('layout.main')
@include('absen.sidebar.menu')

@section('container')
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT Sumber Segara Primadaya</li>
            </ol>

            {{-- <div class="row"> --}}
		<div class="content">
                    <div class="box">
                        <div class="box-header">
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="collapse" id="hide_filter" aria-expanded="true">
                                <i class="fa fa-filter"></i>
                                <span class="hidden-xs" >Filter</span>
                            </a>
                            <div class="card" id="show">
                                <div class="card-header">
                                    <div class="card-body">
                                        <form method="get" action="data_absensi_pegawai">
                                            <div class="form-group">
                                                <i class="ml-3">Tanggal Awal &nbsp;</i><input type="date" placeholder="tanggal " name="cari_akhir" aria-label="Search" value="{{ request('cari_akhir') }}">&nbsp;&nbsp;&nbsp;
                                                <i class="ml-3">Tanggal Akhir &nbsp;</i><input type="date" placeholder="tanggal " name="cari_awal" aria-label="Search" value="{{ request('cari_awal') }}">
                                                <button class="btn btn-primary" type="submit">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>


                        <div class="box-body table-respon">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>Nama Pegawai</td>
                                        <td>Tanggal</td>
                                        <td>Jam Masuk</td>
                                        <td>Jam Pulang</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($absensi as $i)
                                        <tr>
                                            <td>{{ $i->nama }}</td>
                                            <td>{{ tanggl_id($i->tanggal) }}</td>
                                            <td>{{ format_jam($i->jam_masuk) }}</td>
                                            <td>{{ format_jam($i->jam_pulang) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3"> {{ $absensi->withQueryString()->links() }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
        </div>




@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
// $("#show").hide();
  $("#hide_filter").click(function(){
    $("#show").toggle();
  });
});
</script>
