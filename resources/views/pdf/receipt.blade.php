<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Struk Penjualan - {{ $sale->sale_number }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
        }
        .header p {
            margin: 5px 0;
            font-size: 10px;
        }
        .info {
            margin-bottom: 15px;
        }
        .info table {
            width: 100%;
        }
        .info td {
            padding: 3px 0;
        }
        .items {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        .items th {
            background-color: #f0f0f0;
            padding: 8px;
            text-align: left;
            border-bottom: 2px solid #000;
        }
        .items td {
            padding: 6px 8px;
            border-bottom: 1px solid #ddd;
        }
        .items .text-right {
            text-align: right;
        }
        .items .text-center {
            text-align: center;
        }
        .total {
            margin-top: 15px;
            border-top: 2px solid #000;
            padding-top: 10px;
        }
        .total table {
            width: 100%;
        }
        .total td {
            padding: 5px 0;
        }
        .total .grand-total {
            font-size: 16px;
            font-weight: bold;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>UMKM TOKO</h1>
        <p>Sistem Manajemen Inventori dan Penjualan</p>
        <p>{{ now()->format('d/m/Y H:i') }}</p>
    </div>

    <div class="info">
        <table>
            <tr>
                <td width="30%"><strong>No. Transaksi:</strong></td>
                <td>{{ $sale->sale_number }}</td>
            </tr>
            <tr>
                <td><strong>Tanggal:</strong></td>
                <td>{{ $sale->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            <tr>
                <td><strong>Kasir:</strong></td>
                <td>{{ $sale->user->name }}</td>
            </tr>
            <tr>
                <td><strong>Pembayaran:</strong></td>
                <td>{{ ucfirst($sale->payment_method) }}</td>
            </tr>
        </table>
    </div>

    <table class="items">
        <thead>
            <tr>
                <th>Produk</th>
                <th class="text-center">Qty</th>
                <th class="text-right">Harga</th>
                <th class="text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sale->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td class="text-center">{{ $item->quantity }}</td>
                    <td class="text-right">Rp {{ number_format($item->unit_price, 0, ',', '.') }}</td>
                    <td class="text-right">Rp {{ number_format($item->total_price, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="totals">
        <table>
            <tr class="grand-total bold">
                <td>TOTAL</td>
                <td class="text-right text-xl">Rp {{ number_format($sale->total_amount, 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>

    @if($sale->notes)
        <div style="font-size: 9px; margin-bottom: 5mm;">
            <p class="bold" style="margin-bottom: 1mm;">Catatan:</p>
            <p>{{ $sale->notes }}</p>
        </div>
    @endif

    <div class="footer text-center">
        <p class="bold">TERIMA KASIH</p>
        <p>Atas Kunjungan Anda</p>
        <p>Layanan Pelanggan: 0812-XXXX-XXXX</p>
        <div class="dashed-line"></div>
        <p>{{ now()->format('d/m/Y H:i:s') }}</p>
    </div>
</body>
</html>
