<div class="row justify-content-center">
 <div class="col-12 col-lg-10 col-xl-8">
 	  <div class="header p-0 ml-0 mr-0 shadow-none">
<div class="header-body">
    <div class="row align-items-center">
        <div class="col">
            <h6 class="header-pretitle fs-10 font-weight-bold text-muted text-uppercase mb-1"><?php echo lan('payments')?></h6>
            <h1 class="header-title fs-25 font-weight-600"><?php echo lan('invoice_no')?>: <?php echo $main->invoice?></h1>
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

    // Main PO / Surat Pesanan
    $main = $main ?? new stdClass();
    $main->date                    = $main->date ?? '';
    $main->customer_name           = $main->customer_name ?? '';
    $main->customer_mobile         = $main->customer_mobile ?? '-';
    ?>

    <head>
        <meta charset="UTF-8">
        <title>Surat Pesanan - <?php echo htmlspecialchars($main->invoice); ?></title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <style>
            /* ====== Print page settings ====== */
            @page { size: 148mm 211mm portrait; margin: 0; }
            body {
                margin: 0;
                font-family: Arial, sans-serif;
                font-size: 13px;
                -webkit-print-color-adjust: exact;
            }
            .container {
                width: 148mm;
                height: 211mm;
                padding-top: 5mm;
                padding-left: 3mm;
                padding-right: 3mm;
                padding-bottom: 0mm;
                box-sizing: border-box;
                position: relative;
                color: #000;
            }

            /* ====== HEADER ====== */
            .header-row {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                min-height: 110px;
                position: relative;
            }
            .left-header {
            	margin-top: 20mm;
                display: flex;
                align-items: flex-start;
                max-width: 70%;
            }
            .logo {
                width: 1.7cm;
                height: auto;
                margin-right: 3px;
                display:flex;
                align-items:center;
                justify-content:center;
                overflow: hidden;
            }
            .logo img {
                max-width: 100%;
                max-height: 100%;
            }
            .company-title {
                font-weight: bold;
                font-size: 14px;
                line-height: 1.2;
            }
            .company-info {
                margin-top: 6px;
                font-size: 12px;
                line-height: 1.25;
                max-width: 80%;
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
                min-width: 80%;
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
                top: 10mm;
                left: 50%;
                transform: translate(-50%, -50%);
                font-size: 14px;
                font-weight: bold;
                color: #000;
                white-space: nowrap;
                text-align: center;
            }
            .right-header {
                border: none;
                margin-top: 20mm;
                font-size: 13px;
                line-height: 1.5;
                width: 36%;
                box-sizing: border-box;
                position: absolute;
                right: -25px;
                color: #000;
            }

            /* ====== TABLE ====== */
            .items {
                margin-top: 14px;
                width: 100%;
                border-collapse: collapse;
            }
            .items th {
                border: 1px solid #000;
                padding: 5px 6px;
                font-size: 13px;
                font-weight: bold;
                color: #000;
            }
            .items td {
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-top: none;
                border-bottom: none;
                padding: 5px 6px;
                font-size: 13px;
            }
            .items th {
                font-weight: bold;
                color: #000;
            }
            .items td.left {
                text-align: left;
                padding-left: 6px;
            }
            .items tbody tr:last-child td {
                border-bottom: 1px solid #000;
            }

            /* Lebar kolom presisi */
            .col-nama { width: 70%; }
            .col-qty  { width: 30%; text-align: center; }

            /* Total tinggi tabel: 7.1 cm (header + body) */
            .items thead tr { height: 0.7cm; }
            .items tbody { height: 10cm; }
            .items tbody tr { height: calc(10cm / 10); }

            /* ====== FOOTER AREA ====== */
            .footer-area {
                width: 100%;
                height: 120px;
                margin-top: 16px;
                position: relative;
            }
            .right-footer {
                position: absolute;
                right: 10mm;
                top: 10px;
                text-align: center;
                font-size: 13px;
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
                                        <span class="label">Email:</span>
                                        <span class="value"><?php echo htmlspecialchars($company->email); ?></span>
                                    </span>
                                    <span class="pair">
                                        <span class="label">CDOB:</span>
                                        <span class="value"><?php echo htmlspecialchars($company->gdp); ?></span>
                                    </span>
                                </div>
                                <div class="row">
                                    <span class="pair">
                                        <span class="label">NPWP:</span>
                                        <span class="value"><?php echo htmlspecialchars($company->tin); ?></span>
                                    </span>
                                    <span class="pair">
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
                    Tanggal: <?php $dateTime = new DateTime($main->date); echo htmlspecialchars($dateTime->format('d/m/Y H:i:s')); ?><br>
                    Kepada: <?php echo htmlspecialchars($main->customer_name); ?><br>
                    Telp: <?php echo htmlspecialchars($main->customer_mobile); ?><br>
                </div>

                <!-- Tengah -->
                <div class="center-header" style="color: #000;">
                    <h1>Purchase Order</h1>
                </div>
            </div>

            <!-- TABEL ITEM -->
            <table class="items">
                <thead>
                    <tr>
                        <th class="col-nama">Nama Barang</th>
                        <th class="col-qty">Qty</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $max_rows = 10;
                    $i = 0;
                    foreach($details as $d):
                        $i++;
                        $nama = ($d['product_name'] ?? ($d['nama_barang'] ?? '')) . (isset($d['strength']) ? ' ('.$d['strength'].')' : '');
                        $qty = $d['quantity'] ?? ($d['qty'] ?? '');
                    ?>
                    <tr>
                        <td class="col-nama"><?php echo htmlspecialchars($nama); ?></td>
                        <td class="col-qty"><?php echo htmlspecialchars($qty); ?></td>
                    </tr>
                    <?php endforeach; ?>

                    <?php for($j = $i; $j < $max_rows; $j++): ?>
                    <tr>
                        <td class="col-nama">&nbsp;</td>
                        <td class="col-qty">&nbsp;</td>
                    </tr>
                    <?php endfor; ?>
                </tbody>
            </table>

            <!-- FOOTER -->
            <div class="footer-area">
                <div class="right-footer">
                    <p><strong>Apoteker</strong></p><br><br><br><br>
                    <p>( ................................................. )</p>
                </div>
            </div>
        </div>
    </body>
</div>