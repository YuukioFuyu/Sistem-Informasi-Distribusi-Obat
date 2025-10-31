<?php
// ========== Placeholder / Default mapping (jika backend belum mengisi) ==========
$company = $company ?? new stdClass();
$company->title   = $company->title   ?? '';
$company->address = $company->address ?? '-';
$company->email   = $company->email   ?? '-';
$company->phone   = $company->phone   ?? '-';
$company->logo    = $company->logo    ?? '';
$company->currency= $company->currency?? '';
$company->tin     = $company->tin     ?? '-';
$company->gdp     = $company->gdp     ?? '-';
$company->pbd     = $company->pbd     ?? '-';

// Main invoice / Faktur
$main = $main ?? new stdClass();
$main->invoice                 = $main->invoice ?? '0000';
$main->date                    = $main->date ?? '';
$main->customer_name           = $main->customer_name ?? '';
$main->customer_tin            = $main->customer_tin ?? '-';
$main->request_date            = $main->request_date ?? '';
$main->sales_firstname         = $main->sales_firstname ?? 'Sales';
$main->sales_lastname          = $main->sales_lastname ?? '';
$main->printed_firstname       = $main->printed_firstname ?? 'Operator';
$main->printed_lastname        = $main->printed_lastname ?? '';
$main->total_discount          = $main->total_discount ?? 0;
$main->invoice_discount        = $main->invoice_discount ?? 0;
$main->total_tax               = $main->total_tax ?? 0;
$main->prevous_due             = $main->prevous_due ?? 0;
$main->total_amount            = $main->total_amount ?? 0;
$main->paid_amount             = $main->paid_amount ?? 0;
$main->due_amount              = $main->due_amount ?? 0;
$main->invoice_details         = $main->invoice_details ?? 'Hormat kami';

// ========== Perhitungan ringkasan (fallback jika backend belum memberikan) ==========
$total = 0;
$total_discount_amount = 0;
foreach($details as $d){
    $line_total = isset($d['total_price']) ? $d['total_price'] : ( (isset($d['rate'])? $d['rate']:0) * (isset($d['quantity'])? $d['quantity']:1) );
    $total += $line_total;
    $total_discount_amount += isset($d['discount']) ? $d['discount'] : 0;
}
// Jika main sudah punya nilai, prioritaskan nilai backend
$subtotal = $main->total_amount && $main->total_amount>0 ? ($main->total_amount - $main->total_tax) : $total;
$deemed_value = $main->deemed_value ?? 0; // nilai lain
$ppn_amount = $main->total_tax ?? 0;
$grand_total = $main->total_amount && $main->total_amount>0 ? $main->total_amount : ($subtotal + $deemed_value + $ppn_amount);

// Helper currency format
function money($val, $currency='Rp'){
    return $currency . ' ' . number_format((float)$val,0,',','.');
}

// Fungsi terbilang
function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = penyebut($nilai - 10) . " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai / 1000000000) . " miliar" . penyebut($nilai % 1000000000);
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai / 1000000000000) . " triliun" . penyebut($nilai % 1000000000000);
    }
    return $temp;
}

function terbilang($nilai) {
    if ($nilai < 0) {
        $hasil = "minus " . trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }
    return ucwords($hasil) . " Rupiah";
}
?>

<head>
    <meta charset="UTF-8">
    <title>Faktur - <?php echo htmlspecialchars($main->invoice); ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <style>
        /* ====== Print page settings ====== */
        @page { size: 216mm 139mm portrait; margin: 0; }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            font-size: 13.5px;
            -webkit-print-color-adjust: exact;
        }
        .container {
            width: 216mm;
            height: 139mm;
            padding-top: 5mm;
            padding-left: 3mm;
            padding-right: 3mm;
            padding-bottom: 0mm;
            box-sizing: border-box;
            position: relative;
            color: #fff;
        }

        /* ====== HEADER ====== */
        .header-row {
            display: flex;
            justify-content: space-between;
            align-items: stretch;
            min-height: 95px;
            position: relative;
        }
        .left-header {
            display: flex;
            align-items: flex-start;
            max-width: 55%;
        }
        .logo {
            width: 1.7cm;
            height: auto;
            margin-right: 8px;
            display:flex;
            align-items:center;
            justify-content:center;
            overflow: hidden;
        }
        .logo img {
            max-width: 100%;
            max-height: 100%;
            display: none;
        }
        .company-title {
            font-weight: bold;
            font-size: 14px;
            line-height: 1.1;
        }
        .company-info {
            margin-top: 6px;
            font-size: 12.5px;
            line-height: 1.2;
            max-width: 68%;
        }
        .info-grid {
            display: flex;
            flex-direction: column;
            gap: 3px;
            margin-top: 4px;
        }

        .info-grid .row {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .pair {
            display: inline-flex;
            white-space: nowrap;
            min-width: 82%;
        }

        .label {
            font-weight: normal;
            margin-right: 4px;
        }

        .value {
            color: #000;
        }
        .center-header {
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 12.5px;
            line-height: 1.5;
            font-weight: bold;
            text-align: left;
            white-space: nowrap;
        }
        .right-header {
            border: 1px solid #000;
            padding: 9px 14px;
            font-size: 13.5px;
            line-height: 1.4;
            min-width: 205px;
            box-sizing: border-box;
            position: absolute;
            right: 0;
            color: #000;
        }

        /* ====== TABLE ====== */
        .items {
            margin-top: 6px;
            table-layout: auto;
        }
        .items th, .items td {
            border: 1px solid #fff;
            text-align: center;
            font-size: 12.5px;
            box-sizing: border-box;
            color: #000;
        }
        .items th {
            font-weight: bold;
            color: #fff;
        }
        .items td.left {
            text-align: left;
            padding-left: 6px;
        }

        /* Lebar kolom presisi */
        .col-pbr      { width: 1.7cm; }
        .col-batch    { width: 2.2cm; }
        .col-ed       { width: 1.4cm; }
        .col-qty      { width: 1.85cm; }
        .col-nama     { width: 6.0cm; }
        .col-harga    { width: 2.8cm; }
        .col-disc     { width: 1.8cm; }
        .col-subtotal { width: 3.25cm; }

        /* Total tinggi tabel: 7.1 cm (header + body) */
        .items thead tr { height: 0.7cm; }
        .items tbody { height: 6.4cm; }
        .items tbody tr { height: calc(6.4cm / 12); }

        /* ====== FOOTER AREA ====== */
        .footer-area {
            position: relative;
            width: 100%;
            height: 160px;
            margin-top: 8px;
        }
        .footer-terbilang {
            position: absolute;
            top: -22px;
            left: 0;
            width: 74%;
            text-align: left;
            font-size: 12.5px;
            color: #000;
        }
        .footer-total {
            position: absolute;
            top: -10px;
            right: 0;
            width: 24%;
            font-size: 12.5px;
            text-align: left;
            box-sizing: border-box;
            line-height: 0.3;
            color: #000;
        }
        .footer-total .line {
            display: block;
            border-bottom: 1px solid #000;
            margin: 3px 0;
        }
        .left-footer {
            position: absolute;
            top: 20px;
            left: 0;
            width: 40%;
            text-align: center;
            font-size: 12px;
        }
        .center-footer {
            position: absolute;
            top: 18px;
            left: 42%;
            width: 40%;
            text-align: left;
            font-size: 12px;
        }
        .right-footer {
            position: absolute;
            top: -10px;
            right: 0;
            width: 24%;
            font-size: 12.5px;
            box-sizing: border-box;
            line-height: 0.3;
            color: #000;
        }
        .right-footer .line {
            border-top:1px solid #000;
            margin:6px 0;
            width:100%;
            display:block;
        }
        .signature-box {
            border: none;
            margin-top: 5px;
            height: 90px;
            width: 65%;
            box-sizing: border-box;
            text-align: center;
        }
        .signature-box .title {
            border-bottom: none;
            font-weight: bold;
            padding: 2px;
            margin-bottom: 5px;
        }
        .signature-box .space {
            height: 60px;
        }
        .operator {
            position: absolute;
            top: 50%;
            left: 76%;
            font-size: 12px;
            color: #000;
        }

        .small { font-size:11.5px; }
        .text-right { text-align: right; }
        .muted { color:#333; }
    </style>
</head>
<body>
    <div class="container">

        <!-- HEADER -->
        <div class="header-row">
            <!-- Kiri -->
            <div class="left-header">
                <div class="logo">
                    <?php if(!empty($company->logo)): ?>
                        <img src="<?php echo htmlspecialchars($company->logo); ?>" alt="logo">
                    <?php else: ?>
                        <div style="font-size:11px;color:#666;text-align:center;">LOGO</div>
                    <?php endif; ?>
                </div>
                <div>
                    <div class="company-title"><?php echo htmlspecialchars($company->title); ?></div>
                    <div class="company-info">
                        <?php echo nl2br(htmlspecialchars($company->address)); ?><br>
                        Telp: <?php echo htmlspecialchars($company->phone); ?><br>
                        <div class="info-grid">
                            <div class="row">
                                <span class="pair">
                                    <span class="label" style="color:#fff;">Email:</span>
                                    <span class="value" style="color:#fff;"><?php echo htmlspecialchars($company->email); ?></span>
                                </span>
                                <span class="pair" style="color:#000;">
                                    <span class="label">CDOB:</span>
                                    <span class="value"><?php echo htmlspecialchars($company->gdp); ?></span>
                                </span>
                            </div>
                            <div class="row">
                                <span class="pair">
                                    <span class="label" style="color:#fff;">NPWP:</span>
                                    <span class="value" style="color:#fff;"><?php echo htmlspecialchars($company->tin); ?></span>
                                </span>
                                <span class="pair" style="color:#000;">
                                    <span class="label">Izin PBF:</span>
                                    <span class="value"><?php echo htmlspecialchars($company->pbd); ?></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kanan -->
            <div class="right-header">
                <?php $dateTime = new DateTime($main->date); echo htmlspecialchars($dateTime->format('d/m/Y H:i:s')); ?><br>
                Kepada: <?php echo htmlspecialchars($main->customer_name); ?><br>
                NPWP: <?php echo htmlspecialchars($main->customer_tin); ?><br>
                Tanggal SP: <?php $requestDate = new DateTime($main->request_date); echo htmlspecialchars($requestDate->format('d/m/Y')); ?>
            </div>

            <!-- Tengah -->
            <div class="center-header" style="color: #000;">
                <div class="invoice-number">No. Faktur: <?php echo htmlspecialchars($main->invoice); ?></div>
                <div class="sales">Sales: <?php echo htmlspecialchars($main->sales_firstname . ' ' . $main->sales_lastname); ?></div>
                <div class="due-date">JT Tempo: <?php $dueDate = new DateTime($main->due_date); echo htmlspecialchars($dueDate->format('d/m/Y')); ?></div>
            </div>
        </div>

        <!-- TABEL ITEM -->
        <table class="items" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th class="col-pbr">PBR.CODE</th>
                    <th class="col-batch">BATCH</th>
                    <th class="col-ed">E D</th>
                    <th class="col-qty">Q T Y</th>
                    <th class="col-nama">NAMA BARANG</th>
                    <th class="col-harga">HARGA</th>
                    <th class="col-disc">DISC</th>
                    <th class="col-subtotal">SUB TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $max_rows = 10;
                $i = 0;
                foreach($details as $d):
                    $i++;
                    $pbr   = $d['quantity'] ?? ($d['qty'] ?? 0);
                    $batch = $d['batch_id'] ?? '-';
                    $ed    = $d['ed'] ?? ($d['expeire_date'] ?? '-');
                    $qty   = $d['quantity'] ?? ($d['qty'] ?? 0);
                    $name  = ($d['product_name'] ?? ($d['nama_barang'] ?? 'nama_barang')) . (isset($d['strength']) ? ' ('.$d['strength'].')' : '');
                    $rate  = $d['rate'] ?? ($d['harga'] ?? 0);
                    $disc  = $d['discount'] ?? ($d['disc'] ?? 0);
                    $subtotal_line = $d['total_price'] ?? ($rate * ($qty ?: 1) - $disc);
                    $rate_label = money($rate, $company->currency);
                    $subtotal_label = money($subtotal_line, $company->currency);
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($pbr); ?></td>
                    <td><?php echo htmlspecialchars($batch); ?></td>
                    <td><?php $EXPdate = new DateTime($ed); echo htmlspecialchars($EXPdate->format('d/m/Y')); ?></td>
                    <td><?php echo htmlspecialchars($qty); ?></td>
                    <td class="left"><?php echo htmlspecialchars($name); ?></td>
                    <td class="text-right"><?php echo $rate_label; ?></td>
                    <td class="text-right"><?php echo is_numeric($disc) ? number_format((float)$disc,0,',','.') : htmlspecialchars($disc); ?>%</td>
                    <td class="text-right"><?php echo $subtotal_label; ?></td>
                </tr>
                <?php endforeach; ?>

                <?php for($j = $i; $j < $max_rows; $j++): ?>
                <tr>
                    <td>&nbsp;</td><td></td><td></td><td></td><td class="left"></td><td></td><td></td><td></td>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>

        <!-- FOOTER -->
        <div class="footer-area">
            <!-- Baris atas (Terbilang + Total) -->
            <div class="footer-terbilang">
                <p><i><u>Terbilang :</u><br><strong><?php echo terbilang($grand_total); ?></strong></i></p>
            </div>

            <div class="footer-total">
                <?php
                    $computed_subtotal = $total;
                    $display_subtotal = $main->subtotal ?? $computed_subtotal;
                    $display_deemed_value = $main->deemed_value ?? $deemed_value;
                    $display_ppn = $main->total_tax ?? $ppn_amount;
                    $display_total = $main->total_amount > 0 ? $main->total_amount : ($display_subtotal + $display_deemed_value + $display_ppn);
                ?>
                <p>Total: <?php echo money($display_subtotal, $company->currency); ?></p>
                <p>PPN: <?php echo money($display_ppn, $company->currency); ?></p>
                <span class="line"></span>
                <p><strong>Total Penjualan: <?php echo money($display_total, $company->currency); ?></strong></p>
            </div>

            <!-- Baris bawah (Penerima + Hormat Kami) -->
            <div class="left-footer">
                <p><strong>Penerima</strong></p><br>
                <p>( ................................................. )</p>
                <p>Nama Terang</p>
            </div>

            <div class="center-footer">
                <div class="signature-box">
                    <div class="title"><?php echo htmlspecialchars($main->invoice_details); ?></div>
                    <div class="space"></div>
                </div>
            </div>

            <div class="operator">
                Operator: <?php echo htmlspecialchars($main->printed_firstname . ' ' . $main->printed_lastname); ?>
            </div>
        </div>
    </div>
</body>