<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4aa2dd;
            color: white;
        }
    </style>
</head>

<body>

    <h1>Laporan Keuangan</h1>

    <table id="customers">
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
                    <td colspan="5" style="text-align: center;">DATA KOSONG</td>
                </tr>
            @else
                <!-- Perulangan data gabungan yang sudah terurut -->
                @foreach ($reversedData as $data)
                    @if ($data->komunitas_id == $getKomunitas['id'])
                        <tr>
                            <td>{{ $index }}</td>
                            <td>
                                @if ($data instanceof \App\Models\IuranPengguna)
                                    Pembayaran {{ $data->iuran->nama_iuran }}
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
                                    <span class="text-danger">{{ number_format($data['jumlah'], 0, ',', '.') }}</span>
                                @endif
                            </td>
                            <td>
                                @if ($data instanceof \App\Models\IuranPengguna)
                                    {{ number_format($data['jumlah'], 0, ',', '.') }}
                                @elseif ($data instanceof \App\Models\Pengeluaran)
                                    <span class="text-danger">{{ number_format($data['jumlah'], 0, ',', '.') }}</span>
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
                <!-- Baris tambahan untuk menampilkan total -->
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2"><strong>JUMLAH</strong></td>
                <td>{{ number_format($totalPemasukan, 0, ',', '.') }}</td>
                <td>
                    <span class="text-danger">{{ number_format($totalPengeluaran, 0, ',', '.') }}</span>
                </td>
                <td>{{ number_format($totalSaldo, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>

</body>

</html>
