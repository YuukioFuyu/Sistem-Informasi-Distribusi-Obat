<div class="row justify-content-center">
 <div class="col-12 col-lg-10 col-xl-8">
 	  <div class="header p-0 ml-0 mr-0 shadow-none">
<div class="header-body">
    <div class="row align-items-center">
        <div class="col">
            <h6 class="header-pretitle fs-10 font-weight-bold text-muted text-uppercase mb-1"><?php echo lan('payments')?></h6>
            <h1 class="header-title fs-25 font-weight-600"><?php echo lan('invoice_no')?>: <?php echo $invoice->invoice?></h1>
        </div>
        <div class="col-auto">
            <a href="<?php echo base_url('invoice/invoice_list')?>" class="btn btn-success-soft ml-2"><i class="fas fa-align-justify mr-1"></i><?php echo lan('invoice_list')?></a>
            <a src="javascript:void(0)" onclick="printDiv('printArea')" class="btn btn-success ml-2"><i class="typcn typcn-printer mr-1"></i><?php echo lan('print_invoice')?> </a>
        </div>
    </div> 
</div>
</div>

<div id="printArea">
    <?php
        // ========== Placeholder / Default mapping (jika backend belum mengisi) ==========
        $settings_info = $settings_info ?? new stdClass();
        $settings_info->title   = $settings_info->title   ?? '';
        $settings_info->address = $settings_info->address ?? '-';
        $settings_info->phone   = $settings_info->phone   ?? '-';
        $settings_info->logo    = $settings_info->logo    ?? '';
        $settings_info->currency= $settings_info->currency?? '';
        $settings_info->npwp    = $settings_info->npwp    ?? '-';
        $settings_info->cdob    = $settings_info->cdob    ?? '-';
        $settings_info->izin_pbf= $settings_info->izin_pbf?? '-';

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
            font-size: 16px; /* 13px × 1.3 */
            -webkit-print-color-adjust: exact;
        }

        .container {
            width: 210mm;
            height: 297mm;
            padding: 3.5mm 3.5mm;
            box-sizing: border-box;
            position: relative;
            color: #000;
            background: #fff;
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
            width: 110.5px; /* 85 × 1.3 */
            height: 110.5px;
            background: #f0f0f0;
            margin-right: 15.6px; /* 12 × 1.3 */
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .logo img {
            max-width: 100%;
            max-height: 100%;
            display: block;
        }

        .company-title {
            font-weight: bold;
            font-size: 20px; /* 16 × 1.3 */
            line-height: 1.1;
        }

        .company-info {
            margin-top: 7.8px; /* 6 × 1.3 */
            font-size: 15px; /* 12 × 1.3 */
            line-height: 1.25;
        }

        .center-header {
            position: absolute;
            top: 50%;
            left: 58%;
            transform: translate(-50%, -50%);
            font-weight: bold;
            font-size: 19px; /* 15 × 1.3 */
            text-align: center;
            white-space: nowrap;
        }

        .right-header {
            border: 1px solid #000;
            padding: 10.4px 15.6px; /* 8 × 1.3, 12 × 1.3 */
            font-size: 16.5px; /* 13 × 1.3 */
            line-height: 1.8;
            min-width: 200px;
            box-sizing: border-box;
        }

        /* ====== TABLE ====== */
        .items {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .items th {
            border: 1px solid #000 !important;
            padding: 7px 7px;
            text-align: center;
            font-size: 15px; /* 12 × 1.3 */
            font-weight: bold;
        }

        .items td {
            border-top: none;
            border-bottom: none;
            border-left: 1px solid #000 !important;
            border-right: 1px solid #000 !important;
            padding: 5px 5px;
            text-align: center;
            font-size: 15px; /* 12 × 1.3 */
        }

        .items tbody tr:last-child td {
            border-bottom: 1px solid #000 !important;
        }

        .items th { font-weight: bold !important; }
        .items td.left { text-align: left; padding-left: 8px; }
        .items tbody tr { height: 18px; }

        /* ====== FOOTER AREA (ABSOLUTE POSITIONS) ====== */
        .footer-area {
            position: relative;
            width: 100%;
            height: 140px;
            margin-top: 20px;
        }

        .left-footer {
            position: absolute;
            top: 4px;
            left: 0;
            width: 32%;
            line-height: 1.2;
            text-align: center;
            font-size: 16.5px; /* 13 × 1.3 */
        }
        .left-footer p { margin: 6px 0; }

        .center-footer {
            position: absolute;
            top: 16px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            font-size: 17.5px; /* 14 × 1.3 */
        }

        .right-footer {
            position: absolute;
            top: 2px;
            right: 0;
            width: 28%;
            font-size: 16.5px; /* 13 × 1.3 */
            line-height: 1.1;
            text-align: left;
            box-sizing: border-box;
            padding-left: 7.8px; /* 6 × 1.3 */
        }

        .right-footer p { margin: 5.2px 0; /* 4 × 1.3 */ }
        .right-footer .line { border-top: 2px solid #000; margin: 7.8px 0; width: 100%; display: block; }

        /* Misc */
        .small { font-size: 14px; /* 11 × 1.3 */ }
        .text-right { text-align: center !important; }
        .muted { color: #333; }
    </style>

    </head>
    <body>
        <div class="container">

            <!-- HEADER -->
            <div class="header-row">

                <!-- LEFT: Company -->
                <div class="left-header">
                    <div class="logo">
                        <?php if(!empty($settings_info->logo)): ?>
                            <img src="<?php echo htmlspecialchars($settings_info->logo); ?>" alt="logo">
                        <?php else: ?>
                            <!-- placeholder logo -->
                            <div style="font-size:11px;color:#666;text-align:center;">LOGO</div>
                        <?php endif; ?>
                    </div>
                    <div>
                        <div class="company-title">
                            <?php echo htmlspecialchars($settings_info->title); ?>
                        </div>
                        <div class="company-info">
                            <?php echo nl2br(htmlspecialchars($settings_info->address)); ?><br>
                            Telp: <?php echo htmlspecialchars($settings_info->phone); ?><br>
                            CDOB: <?php echo htmlspecialchars($settings_info->cdob); ?><br>
                            NPWP: <?php echo htmlspecialchars($settings_info->npwp); ?><br>
                            Izin PBF: <?php echo htmlspecialchars($settings_info->izin_pbf); ?>
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
                        $rate_label = money($rate, $settings_info->currency);
                        $subtotal_label = money($subtotal_line, $settings_info->currency);
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
                    <p><strong><?php echo $invoice_details; ?></strong></p>
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
                    <p>Sub Total: <?php echo money($display_subtotal, $settings_info->currency); ?></p>
                    <p>DPP Nilai Lain: <?php echo money($display_deemed_value, $settings_info->currency); ?></p>
                    <p>PPN: <?php echo money($display_ppn, $settings_info->currency); ?></p>
                    <span class="line"></span>
                    <p><strong>Total: <?php echo money($display_total, $settings_info->currency); ?></strong></p>
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
</div>