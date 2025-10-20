<!DOCTYPE html>
<html lang="en">
<head>
<?php echo view('template/head') ?>
</head>
<body class="fixed sidebar-collapse">
	 <!-- Page Loader -->
         <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-green">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div> 
        <!-- #END# Page Loader -->


<!-- HEADER: MENU -->

<div class="wrapper">
	<?php echo view('template/sidebar') ?>
<!-- CONTENT -->
 <div class="content-wrapper">
    <div class="main-content">

    	<?php echo view('template/header') ?>

    	<div class="body-content px-3 py-3">
             <?php if($segment_3 == 'pos_invoice'){?>
         <ul class="nav nav-pills mb-3 d-lg-none" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">New Sale </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Todays sale</a>
                            </li>
                        </ul>
                    <?php }?>
<?php echo view('template/messages') ?>
<?php
try
{

$path = 'App\Modules\"'.$module.'"\Views\"'.$page.'"';
$withourbackpath = str_replace('/\/', '/', $path);
$viewpath = str_replace('"', '', $withourbackpath);
 echo view($viewpath);

}
catch (Exception $e)
{
echo "<pre><code>$e</code></pre>";
}
?>
</div>
</div>

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->


<?php echo view('template/footer') ?>




</body>
</html>
