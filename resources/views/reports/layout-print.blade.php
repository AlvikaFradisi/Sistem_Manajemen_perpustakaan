<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan - @yield('title')</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
            background-color: #f3f4f6;
        }
        .print-container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #333;
            padding-bottom: 20px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }
        .header img {
            width: 120px;
            height: auto;
        }
        .header h1 {
            margin: 0 0 10px 0;
            font-size: 24px;
            text-transform: uppercase;
        }
        .header p {
            margin: 0;
            font-size: 14px;
            color: #666;
        }
        .report-title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            font-size: 13px;
        }
        th {
            background-color: #f8fafc;
            font-weight: bold;
        }
        .footer {
            margin-top: 50px;
            display: flex;
            justify-content: flex-end;
        }
        .signature {
            text-align: center;
            width: 250px;
        }
        .signature p {
            margin-bottom: 70px;
        }
        .print-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            padding: 12px 24px;
            background-color: #ffbe91;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(255, 190, 145, 0.3);
            transition: all 0.2s;
        }
        .print-btn:hover {
            background-color: #e6a67a;
        }
        @media print {
            body {
                background-color: white;
                padding: 0;
            }
            .print-container {
                box-shadow: none;
                padding: 0;
                max-width: none;
            }
            .print-btn {
                display: none;
            }
            @page {
                size: A4 portrait;
                margin: 20mm;
            }
        }
    </style>
</head>
<body>

    <button class="print-btn" onclick="window.print()">🖨️ Cetak Laporan</button>

    <div class="print-container">
        <div class="header">
            <img src="{{ asset('images/logopnp.png') }}" alt="Logo" style="mix-blend-mode: multiply;">
            <div>
                <h1>PERPUSTAKAAN POLITEKNIK NEGERI PADANG</h1>
                <p>Kampus Limau Manis, Padang, Sumatera Barat</p>
                <p>Email: info@pnp.ac.id | Website: www.pnp.ac.id</p>
            </div>
        </div>

        <div class="report-title">
            @yield('title')
        </div>

        @yield('content')

        <div class="footer">
            <div class="signature">
                <p>Padang, {{ date('d F Y') }}<br>Kepala Perpustakaan,</p>
                <p>_______________________<br>NIP. .........................</p>
            </div>
        </div>
    </div>

</body>
</html>
