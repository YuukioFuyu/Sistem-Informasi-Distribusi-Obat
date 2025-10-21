<?php
// ========== Placeholder / Default mapping (jika backend belum mengisi) ==========
$company = $company ?? new stdClass();
$company->title   = $company->title   ?? '';
$company->address = $company->address ?? '-';
$company->phone   = $company->phone   ?? '-';
$company->logo    = $company->logo    ?? '';
$company->currency= $company->currency?? '';
$company->npwp    = $company->npwp    ?? '-';
$company->cdob    = $company->cdob    ?? '-';
$company->izin_pbf= $company->izin_pbf?? '-';

// Main invoice / fraktur
$invoice = $invoice ?? new stdClass();
$invoice->invoice                 = $invoice->invoice ?? '0000';
$invoice->date                    = $invoice->date ?? '';
$invoice->customer_name           = $invoice->customer_name ?? '';
$invoice->customer_npwp           = $invoice->customer_npwp ?? '-';
$invoice->request_date            = $invoice->request_date ?? '';
$invoice->sales_by_firstname      = $invoice->sales_by_firstname ?? 'Sales';
$invoice->sales_by_lastname       = $invoice->sales_by_lastname ?? '';
$invoice->total_discount          = $invoice->total_discount ?? 0;
$invoice->invoice_discount        = $invoice->invoice_discount ?? 0;
$invoice->total_tax               = $invoice->total_tax ?? 0;
$invoice->prevous_due             = $invoice->prevous_due ?? 0;
$invoice->total_amount            = $invoice->total_amount ?? 0;
$invoice->paid_amount             = $invoice->paid_amount ?? 0;
$invoice->due_amount              = $invoice->due_amount ?? 0;
$invoice->invoice_details         = $invoice->invoice_details ?? 'Hormat kami';

// ========== Perhitungan ringkasan (fallback jika backend belum memberikan) ==========
$total = 0;
$total_discount_amount = 0;
foreach($details as $d){
    $line_total = isset($d['total_price']) ? $d['total_price'] : ( (isset($d['rate'])? $d['rate']:0) * (isset($d['quantity'])? $d['quantity']:1) );
    $total += $line_total;
    $total_discount_amount += isset($d['discount']) ? $d['discount'] : 0;
}
// Jika main sudah punya nilai, prioritaskan nilai backend
$subtotal = $invoice->total_amount && $invoice->total_amount>0 ? ($invoice->total_amount - $invoice->total_tax) : $total;
$deemed_value = $invoice->deemed_value ?? 0; // nilai lain
$ppn_amount = $invoice->total_tax ?? 0;
$grand_total = $invoice->total_amount && $invoice->total_amount>0 ? $invoice->total_amount : ($subtotal + $deemed_value + $ppn_amount);

// Helper currency format
function money($val, $currency='Rp'){
    return $currency . ' ' . number_format((float)$val,0,',','.');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Fraktur - <?php echo htmlspecialchars($invoice->invoice); ?></title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<style>
    /* ====== Print page settings ====== */
    @page { size: A4 portrait; margin: 0; }
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        font-size: 13px;
        -webkit-print-color-adjust: exact;
    }
    .container {
        width: 210mm;
        height: 297mm;
        padding: 3mm 3mm;
        box-sizing: border-box;
        position: relative;
        color: #000;
    }

    /* ====== HEADER ====== */
    .header-row {
        position: relative;
        display: flex;
        justify-content: space-between;
        align-items: stretch;
        min-height: 90px;
    }
    .left-header {
        display: flex;
        align-items: flex-start;
        max-width: 46%;
    }
    .logo {
        width: 88px;
        height: 88px;
        background: #f0f0f0;
        margin-right: 12px;
        display:flex;
        align-items:center;
        justify-content:center;
        overflow: hidden;
    }
    .logo img {
        max-width: 100%;
        max-height: 100%;
        display:block;
    }
    .company-title {
        font-weight: bold;
        font-size: 16px;
        line-height: 1.1;
    }
    .company-info {
        margin-top:6px;
        font-size: 12px;
        line-height: 1.25;
    }

    .center-header {
        position: absolute;
        top: 50%;
        left: 58%;
        transform: translate(-50%, -50%);
        font-weight: bold;
        font-size: 15px;
        text-align: center;
        white-space: nowrap;
    }

    .right-header {
        border: 1px solid #000;
        padding: 8px 12px;
        font-size: 13px;
        line-height: 1.8;
        min-width: 200px;
        box-sizing: border-box;
    }

    /* ====== TABLE ====== */
    .items {
        width: 100%;
        border-collapse: collapse;
        margin-top: 18px;
    }
    .items th {
        border: 1px solid #000;
        padding: 6px 6px;
        text-align: center;
        font-size: 12px;
        font-weight: bold;
    }
    .items td {
        border-top: none;
        border-bottom: none;
        border-left: 1px solid #000;
        border-right: 1px solid #000;
        padding: 6px 6px;
        text-align: center;
        font-size: 12px;
    }
    .items tbody tr:last-child td {
        border-bottom: 1px solid #000;
    }
    .items th { font-weight: bold; }
    .items td.left { text-align: left; padding-left:8px; }

    /* make fixed-height rows for consistent print appearance */
    .items tbody tr { height: 18px; }

    /* ====== FOOTER AREA (ABSOLUTE POSITIONS) ====== */
    .footer-area {
        position: relative;
        width: 100%;
        height: 140px; /* ruang untuk footer */
        margin-top: 18px;
    }

    .left-footer {
        position: absolute;
        top: 0;
        left: 0;
        width: 32%;
        text-align: center;
        font-size: 13px;
    }
    .left-footer p { margin: 6px 0; }

    .center-footer {
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        font-size: 14px;
    }

    .right-footer {
        position: absolute;
        top: 0;
        right: 0;
        width: 28%;
        font-size: 13px;
        text-align: left;
        box-sizing: border-box;
        padding-left: 6px;
    }
    .right-footer p { margin: 4px 0; }
    .right-footer .line { border-top:1px solid #000; margin:6px 0; width:100%; display:block; }

    /* Misc */
    .small { font-size:11px; }
    .text-right { text-align: right; }
    .muted { color:#333; }
</style>
</head>
<body>
<div class="container">

    <!-- HEADER -->
    <div class="header-row">

        <!-- LEFT: Company -->
        <div class="left-header">
            <div class="logo">
                <?php if(!empty($company->logo)): ?>
                    <img src="<?php echo htmlspecialchars($company->logo); ?>" alt="logo">
                <?php else: ?>
                    <!-- placeholder logo -->
                    <div style="font-size:11px;color:#666;text-align:center;">LOGO</div>
                <?php endif; ?>
            </div>
            <div>
                <div class="company-title">
                    <?php echo htmlspecialchars($company->title); ?>
                </div>
                <div class="company-info">
                    <?php echo nl2br(htmlspecialchars($company->address)); ?><br>
                    Telp: <?php echo htmlspecialchars($company->phone); ?><br>
                    CDOB: <?php echo htmlspecialchars($company->cdob); ?><br>
                    NPWP: <?php echo htmlspecialchars($company->npwp); ?><br>
                    Izin PBF: <?php echo htmlspecialchars($company->izin_pbf); ?>
                </div>
            </div>
        </div>

        <!-- RIGHT: Textbox -->
        <div class="right-header">
            Tanggal: <?php $dateTime = new DateTime($invoice->date); echo htmlspecialchars($dateTime->format('d/m/Y H:i:s')); ?><br>
            Kepada: <?php echo htmlspecialchars($invoice->customer_name); ?><br>
            NPWP: <?php echo htmlspecialchars($invoice->customer_npwp); ?><br>
            Tanggal SP: <?php $requestDate = new DateTime($invoice->request_date); echo htmlspecialchars($requestDate->format('d/m/Y')); ?>
        </div>

        <!-- CENTER: Fraktur -->
        <div class="center-header">
            Fraktur: <?php echo htmlspecialchars($invoice->invoice); ?>
        </div>
    </div>

    <!-- ITEMS TABLE -->
    <table class="items" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th style="width:8%;">PBR.CODE</th>
                <th style="width:9%;">BATCH</th>
                <th style="width:7%;">E D</th>
                <th style="width:7%;">Q T Y</th>
                <th style="width:40%;">NAMA BARANG</th>
                <th style="width:10%;">HARGA</th>
                <th style="width:7%;">DISC</th>
                <th style="width:12%;">SUB TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // render rows from $details; keep a fixed count of rows for consistent print layout (e.g., 12 rows)
            $max_rows = 12;
            $i = 0;
            foreach($details as $d):
                $i++;
                $pbr   = $d['pbr_code'] ?? '-';
                $batch = $d['batch_id'] ?? '-';
                $ed    = $d['ed'] ?? ($d['expeire_date'] ?? '-');
                $qty   = isset($d['quantity']) ? $d['quantity'] : ($d['qty'] ?? 0);
                $name  = ($d['product_name'] ?? ($d['nama_barang'] ?? 'nama_barang')) . (isset($d['strength']) ? ' ('.$d['strength'].')' : '');
                $rate  = isset($d['rate']) ? $d['rate'] : ($d['harga'] ?? 0);
                $disc  = isset($d['discount']) ? $d['discount'] : ($d['disc'] ?? 0);
                $subtotal_line = isset($d['total_price']) ? $d['total_price'] : ($rate * ($qty?:1) - $disc);
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

            <?php
            // fill remaining empty rows until max_rows
            for($j = $i; $j < $max_rows; $j++): ?>
            <tr>
                <td>&nbsp;</td><td></td><td></td><td></td><td class="left"></td><td></td><td></td><td></td>
            </tr>
            <?php endfor; ?>

        </tbody>
    </table>

    <!-- FOOTER -->
    <div class="footer-area">

        <!-- LEFT: Penerima (centered within its block) -->
        <div class="left-footer">
            <p><strong>Penerima</strong></p><br><br><br>
            <p>( ................................................. )</p>
            <p>Nama Terang</p>
        </div>

        <!-- CENTER: Hormat Kami -->
        <div class="center-footer">
            <p><strong><?php echo htmlspecialchars($invoice->invoice_details); ?></strong></p>
        </div>

        <!-- RIGHT: Sub Total, DPP, PPN, Garis, Total -->
        <div class="right-footer">
            <?php
                // compute summary values (prefer backend $invoice if available)
                $computed_subtotal = $total;
                $display_subtotal = isset($invoice->subtotal) && $invoice->subtotal>0 ? $invoice->subtotal : $computed_subtotal;
                $display_deemed_value = isset($invoice->deemed_value) ? $invoice->deemed_value : $deemed_value;
                $display_ppn = isset($invoice->total_tax) ? $invoice->total_tax : $ppn_amount;
                $display_total = isset($invoice->total_amount) && $invoice->total_amount>0 ? $invoice->total_amount : ($display_subtotal + $display_deemed_value + $display_ppn);
            ?>
            <p>Sub Total: <?php echo money($display_subtotal, $company->currency); ?></p>
            <p>DPP Nilai Lain: <?php echo money($display_deemed_value, $company->currency); ?></p>
            <p>PPN: <?php echo money($display_ppn, $company->currency); ?></p>
            <span class="line"></span>
            <p><strong>Total: <?php echo money($display_total, $company->currency); ?></strong></p>
        </div>

    </div>

    <!-- Optional: commented barcode (keputusan Anda: jangan hapus, hanya comment) -->
    <?php
    /*
    // Barcode disabled - keep for future use
    // Example using Picqer\Barcode\BarcodeGeneratorPNG
    // $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    // echo '<div style="text-align:center;margin-top:8px;"><img src="data:image/png;base64,' . base64_encode($generator->getBarcode($invoice->invoice, $generator::TYPE_CODE_128)) . '" alt="barcode"/></div>';
    */
    ?>

</div>
</body>
</html>
