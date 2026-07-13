<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kartu Anggota - {{ $member->name }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            width: 85.6mm;
            height: 53.98mm;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            position: relative;
            box-sizing: border-box;
            border: 1px solid #e5e7eb;
        }
        .card-header {
            background-color: #ffbe91;
            color: white;
            padding: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .logo {
            width: 45px;
            height: 45px;
            background-color: white;
            border-radius: 6px;
            padding: 2px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .logo img {
            max-width: 100%;
            max-height: 100%;
        }
        .header-text {
            line-height: 1.2;
        }
        .header-title {
            font-size: 14px;
            font-weight: bold;
            margin: 0;
        }
        .header-subtitle {
            font-size: 9px;
            margin: 0;
            opacity: 0.9;
        }
        .card-body {
            padding: 15px 15px 10px 15px;
            display: flex;
            gap: 15px;
        }
        .photo-placeholder {
            width: 60px;
            height: 75px;
            background-color: #e2e8f0;
            border: 2px solid #cbd5e1;
            border-radius: 4px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #94a3b8;
            font-size: 10px;
            text-align: center;
        }
        .member-info {
            flex: 1;
        }
        .info-group {
            margin-bottom: 6px;
        }
        .info-label {
            font-size: 9px;
            color: #64748b;
            text-transform: uppercase;
            margin: 0 0 2px 0;
        }
        .info-value {
            font-size: 12px;
            font-weight: bold;
            color: #0f172a;
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .card-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #f8fafc;
            border-top: 1px solid #e2e8f0;
            padding: 6px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .barcode {
            font-family: 'Courier New', Courier, monospace;
            font-size: 10px;
            letter-spacing: 2px;
            color: #334155;
            font-weight: bold;
        }
        .join-date {
            font-size: 8px;
            color: #64748b;
        }
        
        .print-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #ffbe91;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(255, 190, 145, 0.3);
            transition: all 0.2s;
        }
        .print-btn:hover {
            background-color: #e6a67a;
            transform: translateY(-2px);
        }

        @media print {
            body {
                background-color: white;
                display: block;
                height: auto;
            }
            .card {
                box-shadow: none;
            }
            .print-btn {
                display: none;
            }
            @page {
                size: 85.6mm 53.98mm; /* ID card size */
                margin: 0;
            }
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="card-header">
            <div class="logo">
                <img src="{{ asset('images/logopnp.png') }}" alt="Logo">
            </div>
            <div class="header-text">
                <h1 class="header-title">KARTU ANGGOTA</h1>
                <p class="header-subtitle">Perpustakaan PNP</p>
            </div>
        </div>
        <div class="card-body">
            <div class="member-info">
                <div class="info-group">
                    <p class="info-label">Nama Lengkap</p>
                    <p class="info-value">{{ $member->name }}</p>
                </div>
                <div class="info-group">
                    <p class="info-label">Email</p>
                    <p class="info-value">{{ $member->email }}</p>
                </div>
                <div class="info-group">
                    <p class="info-label">Telepon</p>
                    <p class="info-value">{{ $member->phone }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="barcode">*MEM-{{ str_pad($member->id, 5, '0', STR_PAD_LEFT) }}*</div>
            <div class="join-date">Terdaftar: {{ $member->created_at->format('d/m/Y') }}</div>
        </div>
    </div>

    <button class="print-btn" onclick="window.print()">
        🖨️ Cetak Kartu
    </button>

</body>
</html>
