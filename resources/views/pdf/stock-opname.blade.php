<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Stock Opname</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #000;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
        }

        .header h4 {
            margin: 5px 0;
            font-weight: normal;
        }

        .info {
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead th {
            background: #e5e5e5;
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        table tbody td {
            border: 1px solid #000;
            padding: 6px;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .footer {
            margin-top: 60px;
            width: 100%;
        }

        .signature {
            width: 250px;
            float: right;
            text-align: center;
        }

        .signature p {
            margin-top: 70px;
        }
    </style>

</head>

<body>

    <div class="header">
        <h2>RUMAH SAKIT UMUM PEKERJA</h2>
        <h3>LAPORAN STOCK OPNAME</h3>
        <h4>Tanggal : {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}</h4>
    </div>

    <table>

        <thead>

            <tr>
                <th>No</th>
                <th>Barang</th>
                <th>Bagian</th>
                <th>Batch</th>
                <th>Stok Sistem</th>
                <th>Stok Fisik</th>
                <th>Selisih</th>
            </tr>

        </thead>

        <tbody>

            @forelse($stockOpnames as $index => $item)

                <tr>

                    <td class="text-center">
                        {{ $index + 1 }}
                    </td>

                    <td>
                        {{ $item->barang->nama }}
                    </td>

                    <td>
                        {{ $item->bagian->nama }}
                    </td>

                    <td class="text-center">
                        {{ $item->batch }}
                    </td>

                    <td class="text-right">
                        {{ number_format($item->stok_sistem) }}
                    </td>

                    <td class="text-right">
                        {{ number_format($item->stok_fisik) }}
                    </td>

                    <td class="text-right">
                        {{ $item->selisih }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7" class="text-center">
                        Tidak ada data stock opname.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

    <br>

    <table style="border:none;">
        <tr>
            <td style="border:none;">
                <strong>Total Barang :</strong>
                {{ $stockOpnames->count() }}
            </td>

            <!-- <td style="border:none;" class="text-right">
                <strong>Total Selisih :</strong>
                {{ $stockOpnames->sum('selisih') }}
            </td> -->
        </tr>
    </table>

    <div class="footer">

        <div class="signature">

            Jakarta,
            {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}

            <br><br>

            Petugas Stock Opname

            <p>
                ______________________
            </p>

        </div>

    </div>

</body>

</html>