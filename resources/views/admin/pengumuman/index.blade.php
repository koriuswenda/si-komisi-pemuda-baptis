@extends('admin.layout.tamplate')
@section('title')
    Pengumuman
@endsection
@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                @include('admin.layout.breadcump')

                <div class="row">
                    <div class="col-12 ">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title"> Data Pengumuman</h4>
                                <div class="row mt-3 d-flex justify-content-between">
                                    <div class="col-6">
                                        @include('admin.layout.search')
                                    </div>

                                    <div class="">
                                        @if(Auth::user()->hasRole('wilayah') || Auth::user()->hasRole('admin') )
                                        <a class="btn btn-dark" href="{{ route('admin.pengumuman.tambah') }}"> Tambah Data <i
                                                data-feather="plus"></i></a>
                                        @endif
                                                <a class="btn btn-success" href="{{route('admin.pengumuman.excel','s='.request()->s)}}">Cetak Excel <i data-feather="printer"></i></a>
                                                <a class="btn btn-danger" href="{{route('admin.pengumuman.pdf','s='.request()->s ?? '')}}">Cetak PDF <i data-feather="printer"></i></a>
                                </div>

                                <div class="mt-3 table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th width="1%">No</th>
                                            <th>Judul</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal Pengumuman</th>
                                            <th></th>
                                        </tr>
                                        @forelse ($datas as $data)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td class="text-dark">
                                                    {{ $data->judul }}
                                                </td>
                                                <td class="text-dark">
                                                    {{ $data->keterangan }}
                                                </td>
                                                <td>
                                                    {{ strftime('%d %B %Y', strtotime($data->mulai))  .' - '.  strftime('%d %B %Y', strtotime($data->selesai)) }}
                                                </td>


                                                <td>

                                                    <a href="{{ route('admin.pengumuman.detail', $data->id) }}"
                                                        class="btn btn-sm btn-outline-warning border-0  waves-effect waves-light fs-4">
                                                        <i class="fas fa-eye"></i>
                                                    </a>

                                                    @if(Auth::user()->hasRole('wilayah') || Auth::user()->hasRole('admin') )
                                                    <a href="{{ route('admin.pengumuman.ubah', $data->id) }}"
                                                        class="btn btn-sm btn-outline-primary border-0 waves-effect waves-light fs-4">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form class="d-inline"
                                                        action="{{ route('admin.pengumuman.hapus', $data->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            class="btn btn-sm btn-outline-danger border-0 waves-effect waves-light fs-4"
                                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"
                                                            type="submit">

                                                            <i class="fas fa-trash"></i>

                                                        </button>
                                                    </form>

                                                    @endif

                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7">
                                                    No data . . .
                                                </td>
                                            </tr>
                                        @endforelse


                                    </table>
                                </div>
                                <!-- end .mt-4 -->
                                {!! $datas->appends(['s' => request()->s])->links() !!}


                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
                {{-- end row --}}





            </div> <!-- container -->

        </div> <!-- content -->
    @endsection
