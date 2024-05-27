@extends('dashboard.layouts.main')
@section('title', 'Pengaturan Keuangan')
@section('content')
    <div class="card bg-transparent shadow-none">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Komunitasku</li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('komunitas.index') }}">Komunitas</a>
                        </li>
                        <li class="breadcrumb-item active">Pengaturan Keuangan</li>
                    </ol>
                </div>
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card bg-transparent shadow-none">
                    <div class="card-body bg-white">
                        <!-- Profil Komunitas Perumahan -->
                        <div class="card">
                            <div class="card-body"
                                style="background: linear-gradient(to top, {{ $getKomunitas['warna_skunder'] }}, {{ $getKomunitas['warna_primer'] }});">
                                <div class="row">
                                    <div class="col-3 d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('storage/' . $getKomunitas['logo_komunitas']) }}" alt=""
                                            class="rounded-circle img-thumbnail thumb-xl">
                                        <div class="online-circle"></div>
                                    </div>
                                    <div class="col-7 text-center text-white">
                                        <h3>{{ $getKomunitas['nama_komunitas'] }}</h3>
                                        <p>"{{ $getKomunitas['moto_komunitas'] }}"</p>
                                        <hr class="col-9" style="border-color:#fff">
                                        <div class="d-flex justify-content-around">
                                            <span class="w-20">
                                                <i class="dripicons-user"></i>
                                                <p class="d-inline-block">{{ $getKomunitas->jumlah_warga }}</p>
                                            </span>
                                            <span class="w-20">
                                                <i class="dripicons-home"></i>
                                                <p class="d-inline-block">{{ $getKomunitas->jumlah_rumah }}</p>
                                            </span>
                                            <span class="w-35">
                                                <i
                                                    class="dripicons-location">{{ Str::limit($getKomunitas->alamat_komunitas, 30, '...') }}</i>
                                            </span>
                                            <span class="w-25">
                                                <i class="mdi mdi-phone"></i>
                                                <p class="d-inline-block">{{ $getKomunitas->no_tlp }}</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row ">
                                    <div class="col-4">
                                        <h4 class="mt-4 d-inline-block">Laporan Keuangan</h4>
                                    </div>
                                    <div class="col-8">
                                        <div class="d-flex justify-content-end px-3 py-3 mb-0">
                                            <div class="border-right mr-1">
                                                <a href="{{ route('pengeluaran.create', ['komunitas_id' => $getKomunitas['id']]) }}"
                                                    class="btn btn-outline-info btn-sm mr-2 mt-1">Input Laporan
                                                    Pengeluaran</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form
                                    action="{{ route('dataKeuangan.searchByDate', ['komunitas_id' => $getKomunitas['id']]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex">
                                        <label for="bulan" class="mr-2 mt-1">Bulan :</label>
                                        <select class="form-control form-control-sm" id="month" name="month"
                                            style="width: 200px;">
                                            <option value="">-- Pilih Bulan --</option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>

                                        <label for="tahun" class="ml-2 mr-2 mt-1">Tahun:</label>
                                        <select class="form-control form-control-sm" id="year" name="year"
                                            style="width: 200px;">
                                            <option value="">-- Pilih Tahun --</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                        </select>
                                        <button type="submit" class="btn-info btn-sm ml-2">Cari</button>
                                    </div>
                                </form>
                                <hr class="border">
                                <table id="tableKeuangan"
                                    class="table dataTables_wrapper dt-bootstrap4 no-footer table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>URAIAN</th>
                                            <th>PEMASUKAN</th>
                                            <th>PENGELUARAN</th>
                                            <th>SALDO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Proses penggabungan data iuran dan pengeluaran -->
                                        @php
                                            $iuranLunas = $iuranPengguna->where('status_pembayaran', 'lunas');
                                            $mergedData = $iuranLunas->merge($pengeluaran);
                                            $sortedData = $mergedData->sortByDesc('created_at');
                                            $reversedData = $sortedData->reverse();
                                            $index = 1;
                                            $totalPengeluaran = 0;
                                            $totalPemasukan = 0;
                                            $totalSaldo = 0;
                                        @endphp
                                        @if (count($reversedData) === 0)
                                            <tr>
                                                <td colspan="5" class="text-center">DATA KOSONG</td>
                                            </tr>
                                        @else
                                            @foreach ($reversedData as $data)
                                                @if ($data->komunitas_id == $getKomunitas['id'])
                                                    <tr>
                                                        <td>{{ $index }}</td>
                                                        <td>
                                                            @if ($data instanceof \App\Models\IuranPengguna)
                                                                Pembayaran {{ $data->iuran->nama_iuran }} dari
                                                                {{ $data->user->name }}
                                                            @elseif ($data instanceof \App\Models\Pengeluaran)
                                                                <span class="text-danger">{{ $data->keterangan }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($data instanceof \App\Models\IuranPengguna)
                                                                {{ number_format($data['jumlah'], 0, ',', '.') }}
                                                            @elseif ($data instanceof \App\Models\Pengeluaran)
                                                                {{ $data->pemasukan }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($data instanceof \App\Models\IuranPengguna)
                                                                {{ $data->pengeluaran }}
                                                            @elseif ($data instanceof \App\Models\Pengeluaran)
                                                                <span
                                                                    class="text-danger">{{ number_format($data['jumlah'], 0, ',', '.') }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($data instanceof \App\Models\IuranPengguna)
                                                                {{ number_format($data['jumlah'], 0, ',', '.') }}
                                                            @elseif ($data instanceof \App\Models\Pengeluaran)
                                                                <span
                                                                    class="text-danger">{{ number_format($data['jumlah'], 0, ',', '.') }}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $index++;
                                                    @endphp
                                                    @php
                                                        // Menjumlahkan data pengeluaran dan pemasukan berdasarkan baris
                                                        if ($data instanceof \App\Models\Pengeluaran) {
                                                            $totalPengeluaran += $data->jumlah;
                                                        } elseif ($data instanceof \App\Models\IuranPengguna) {
                                                            $totalPemasukan += $data->jumlah;
                                                        }
                                                        
                                                        // Menghitung saldo berdasarkan total pemasukan dan total pengeluaran
                                                        $totalSaldo = $totalPemasukan - $totalPengeluaran;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                        <!-- Perulangan data gabungan yang sudah terurut -->
                                        {{-- @foreach ($reversedData as $data)
                                            @if ($data->komunitas_id == $getKomunitas['id'])
                                                <tr>
                                                    <td>{{ $index }}</td>
                                                    <td>
                                                        @if ($data instanceof \App\Models\IuranPengguna)
                                                            Pembayaran {{ $data->iuran->nama_iuran }} dari
                                                            {{ $data->user->name }}
                                                        @elseif ($data instanceof \App\Models\Pengeluaran)
                                                            <span class="text-danger">{{ $data->keterangan }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data instanceof \App\Models\IuranPengguna)
                                                            {{ number_format($data['jumlah'], 0, ',', '.') }}
                                                        @elseif ($data instanceof \App\Models\Pengeluaran)
                                                            {{ $data->pemasukan }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data instanceof \App\Models\IuranPengguna)
                                                            {{ $data->pengeluaran }}
                                                        @elseif ($data instanceof \App\Models\Pengeluaran)
                                                            <span
                                                                class="text-danger">{{ number_format($data['jumlah'], 0, ',', '.') }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data instanceof \App\Models\IuranPengguna)
                                                            {{ number_format($data['jumlah'], 0, ',', '.') }}
                                                        @elseif ($data instanceof \App\Models\Pengeluaran)
                                                            <span
                                                                class="text-danger">{{ number_format($data['jumlah'], 0, ',', '.') }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @php
                                                    $index++;
                                                @endphp
                                                @php
                                                    // Menjumlahkan data pengeluaran dan pemasukan berdasarkan baris
                                                    if ($data instanceof \App\Models\Pengeluaran) {
                                                        $totalPengeluaran += $data->jumlah;
                                                    } elseif ($data instanceof \App\Models\IuranPengguna) {
                                                        $totalPemasukan += $data->jumlah;
                                                    }

                                                    // Menghitung saldo berdasarkan total pemasukan dan total pengeluaran
                                                    $totalSaldo = $totalPemasukan - $totalPengeluaran;
                                                @endphp
                                            @endif
                                        @endforeach --}}
                                        <!-- Baris tambahan untuk menampilkan total -->
                                    </tbody>
                                    <tfoot>
                                        <tr style="background-color: #E9ECEF;">
                                            <td colspan="2"><strong>JUMLAH</strong></td>
                                            <td>{{ number_format($totalPemasukan, 0, ',', '.') }}</td>
                                            <td>
                                                <span
                                                    class="text-danger">{{ number_format($totalPengeluaran, 0, ',', '.') }}</span>
                                            </td>
                                            <td>{{ number_format($totalSaldo, 0, ',', '.') }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <a href="{{ route('keuangancetakpdf.cetakpdf', ['komunitas_id' => $getKomunitas['id'], 'caritahun' => request('caritahun'), 'caribulan' => request('caribulan')]) }}"
                                    class="btn btn-primary" target="_blank">CETAK
                                    PDF</a>
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger px-4 float-right mr-3"
                            onclick="window.location.href = '{{ url('/dashboard/komunitas/' . $getKomunitas->id) }}'">KEMBALI</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.komunitasku.komunitas_keuangan.popup')
@endsection
