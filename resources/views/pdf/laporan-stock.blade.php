<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <title>Laporan Stock</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 5px;
        }

        p {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th {
            background: #eeeeee;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        .text-center {
            text-align: center;
        }
    </style>

</head>

<body>

    <h2>LAPORAN STOCK</h2>

    <p>
        Tanggal Cetak :
        {{ now()->format('d-m-Y H:i') }}
    </p>

    <table>

        <thead>

            <tr>

                <th>No</th>

                <th>Barang</th>

                <th>Bagian</th>

                <th>Batch</th>

                <th>Jumlah</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($stocks as $stock)

                <tr>

                    <td class="text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $stock->barang->nama ?? '-' }}
                    </td>

                    <td>
                        {{ $stock->bagian->nama ?? '-' }}
                    </td>

                    <td>
                        {{ $stock->batch }}
                    </td>

                    <td>
                        {{ $stock->jumlah_satuan_kecil }}
                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

    <br>

    <b>Total Data :</b>
    {{ $stocks->count() }}

</body>

</html>