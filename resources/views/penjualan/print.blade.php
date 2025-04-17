<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Invoice Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #000;
            margin: 40px;
        }

        h2 {
            margin-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px 10px;
        }

        th {
            background-color: #f1f1f1;
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .no-border {
            border: none !important;
        }

        .summary {
            margin-top: 20px;
        }

        .summary td {
            border: none;
            padding: 4px 8px;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 13px;
        }
    </style>
</head>

<body onload="window.print()">
    <h2>FlexyLite</h2>
    <p>
        Member Status : MEMBER<br>
        No. HP : 081234567890<br>
        Bergabung Sejak : 12 Januari 2024<br>
        Poin Member : 50
    </p>

    <table>
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th class="text-center">QTY</th>
                <th class="text-right">Harga</th>
                <th class="text-right">Sub Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Produk A</td>
                <td class="text-center">2</td>
                <td class="text-right">Rp. 10.000</td>
                <td class="text-right">Rp. 20.000</td>
            </tr>
            <tr>
                <td>Produk B</td>
                <td class="text-center">1</td>
                <td class="text-right">Rp. 15.000</td>
                <td class="text-right">Rp. 15.000</td>
            </tr>
        </tbody>
    </table>

    <table class="summary">
        <tr>
            <td class="no-border">Total Harga</td>
            <td class="no-border text-right"><strong>Rp. 35.000</strong></td>
        </tr>
        <tr>
            <td class="no-border">Total Bayar</td>
            <td class="no-border text-right"><strong>Rp. 40.000</strong></td>
        </tr>
        <tr>
            <td class="no-border">Poin Digunakan</td>
            <td class="no-border text-right">10</td>
        </tr>
        <tr>
            <td class="no-border">Harga Setelah Poin</td>
            <td class="no-border text-right">Rp. 25.000</td>
        </tr>
        <tr>
            <td class="no-border">Total Kembalian</td>
            <td class="no-border text-right"><strong>Rp. 15.000</strong></td>
        </tr>
    </table>

    <div class="footer">
        <p>
            2024-01-12 14:32:01 | Admin<br>
            <strong>Terima kasih atas pembelian Anda!</strong>
        </p>
    </div>
</body>

</html>
