@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Arsip Surat</h3>
                    <p class="text-subtitle text-muted">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan <br>
                    Klik "Lihat" pada kolom aksi untuk menampilkan surat
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">Arsip</li>
                            {{-- <li class="breadcrumb-item active" aria-current="page">Table</li> --}}
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Hoverable rows start -->
        <section class="section">
            <div class="row" id="table-hover-row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            {{-- <div class="card-body">
                                <p>Add <code class="highlighter-rouge">.table-hover</code> to enable a hover
                                    state on table
                                    rows
                                    within a
                                    <code class="highlighter-rouge">&lt;tbody&gt;</code>.
                                </p>
                            </div> --}}
                            <!-- table hover -->
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nomor Surat</th>
                                            <th>Kategori</th>
                                            <th>Judul</th>
                                            <th>Waktu Pengerjaan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($arsips as $arsip)
                                            <tr>
                                                <td>{{ $arsip->nomor_surat }}</td>
                                                <td>{{ $arsip->kategori }}</td>
                                                <td>{{ $arsip->judul }}</td>
                                                <td>{{ $arsip->created_at }}</td>
                                                <td></td>
                                            </tr>
                                        @empty
                                        <td class="text-center" colspan="5">Data tidak ada</td>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="d-sm-flex align-item-center justify-content-start mb-3 mt-3">
                                    <a href="{{ route('arsip.create') }}" class="btn btn-info">Arsipkan Surat</a>
                                </div>
                                <div class="d-sm-flex align-items-center justify-content-end mb-3">
                                    {!! $arsips->links('bootstrap-4') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hoverable rows end -->

    </div>
@endsection
