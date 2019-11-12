<!DOCTYPE html>
<head>
<?php include "project-io-meta-data.php"; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/project-io/img/global/favicon.ico">
    <link rel="shortcut icon" href="/project-io/img/global/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Barlow|Inconsolata&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="/project-io/css/style.css">
<?php if ($target_name == "home") { ?>
    <link href="/project-io/js/prism/prism.css" rel="stylesheet" />
<?php } ?>    
  	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-22321867-19"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-22321867-19');
    </script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-TFTRJDG');</script>
    <!-- End Google Tag Manager -->
<?php if ($target_name == "signup" || $target_name == "login" || $target_name == "forgot-password" || $target_name == "reset-password") { ?>
    <script src="https://www.google.com/recaptcha/api.js" sync defer></script>
<?php } ?>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TFTRJDG" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<nav>
	<div>
        <a tabindex="0" class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </a>
        <a class="logo" href="/">
			<svg id="e90e5490-45c5-4953-8819-68e299dbe0ca" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 560.41073 130.08696">
              <defs>
                <style>
                  .adb26a28-8c7f-43e5-beb0-00c4b059cfda {
                    fill: #0A2135;
                  }

                  .f6de2db7-d04a-4b8d-8dbe-09bef8a7c04a {
                    fill: #EF544E;
                  }
                </style>
              </defs>
              <title>Logo V02.01</title>
              <g>
                <path class="adb26a28-8c7f-43e5-beb0-00c4b059cfda" d="M16.73026,93.62215c-.37631-.25677-9.21134-6.37625-9.21134-15.10473V14.14209h6.86077V78.51742c0,5.13265,6.18519,9.49,6.24772,9.533Z"/>
                <path class="adb26a28-8c7f-43e5-beb0-00c4b059cfda" d="M48.47248,93.72685c-8.19853,0-14.7176-2.66138-19.37743-7.91138C24.55139,80.7,22.24769,73.9049,22.24769,65.62216c0-8.0684,2.4064-14.78026,7.15221-19.94811a24.783,24.783,0,0,1,19.07258-7.934c8.17954,0,14.68191,2.58313,19.32494,7.67774,4.54928,4.99157,6.85519,11.78881,6.85519,20.20434,0,8.38633-2.34276,15.21331-6.96351,20.2914C62.97232,91.09853,56.50686,93.72685,48.47248,93.72685Zm0-49.216A17.92446,17.92446,0,0,0,34.483,50.22038c-3.61688,3.93915-5.37449,8.977-5.37449,15.40175,0,6.68593,1.68392,11.83178,5.14669,15.73127,3.34663,3.77,7.9964,5.60264,14.21733,5.60264,6.088,0,10.70431-1.82053,14.11125-5.56518,3.50409-3.8521,5.20811-9.01005,5.20811-15.76874,0-6.692-1.71406-11.96622-5.09533-15.67615-3.33324-3.65756-7.98524-5.43511-14.224-5.43511Z"/>
                <path class="adb26a28-8c7f-43e5-beb0-00c4b059cfda" d="M101.38176,113.68763c-5.36558,0-13.97837-.38129-14.34241-.39781l.3105-6.76418c.08711.00442,8.82274.39122,14.032.39122,4.748,0,11.25147,0,15.39206-4.08627,2.45331-2.42112,3.64589-6.31565,3.64589-11.90617v-.18518a28.78661,28.78661,0,0,1-3.2171,1.426,35.3875,35.3875,0,0,1-12.22968,1.556c-7.93611,0-14.2888-2.48062-18.88163-7.37247-4.52359-4.8191-6.81721-11.57-6.81721-20.06434,0-8.50645,2.61184-15.431,7.76415-20.58178A26.89811,26.89811,0,0,1,106.80766,37.922c2.57056,0,11.965.45127,17.3373.72017l3.25618.1631v9.5699s-.12066,39.52537-.12066,42.54929c0,7.47724-1.85035,12.93766-5.6559,16.69332C115.474,113.68763,106.99409,113.68763,101.38176,113.68763Zm5.42585-68.99494A19.97606,19.97606,0,0,0,91.92028,50.459c-3.89267,3.89232-5.78542,9.06907-5.78542,15.82556,0,6.73331,1.67835,11.93592,4.98924,15.46237,3.28745,3.5011,7.81774,5.20371,13.84876,5.20371a29.15846,29.15846,0,0,0,9.95168-1.17255,22.11513,22.11513,0,0,0,2.38346-1.07352,5.646,5.646,0,0,0,3.13964-5.01551c.02424-8.99.05884-21.86533.07814-29.05809a5.672,5.672,0,0,0-5.45993-5.6441C110.81112,44.79634,107.92477,44.69269,106.80761,44.69269Z"/>
                <path class="adb26a28-8c7f-43e5-beb0-00c4b059cfda" d="M190.868,92.81106h-6.86076V63.13381c0-9.582-1.75651-13.39-3.2305-14.89758-2.31707-2.36934-5.97636-3.46034-11.86341-3.53693l-.33947-.01377a93.62187,93.62187,0,0,0-9.80926,1.13877,5.66822,5.66822,0,0,0-4.85921,5.57886v41.4079h-6.86076V38.927s17.26024-1.01219,21.52924-1.01219c.18872,0,.36179.00605.52483.016,5.2807.076,11.91366.79565,16.61592,5.60429,3.51637,3.597,5.15342,9.82446,5.15342,19.59879Z"/>
                <rect class="adb26a28-8c7f-43e5-beb0-00c4b059cfda" x="133.43973" y="38.92695" width="6.86076" height="53.88412"/>
                <path class="adb26a28-8c7f-43e5-beb0-00c4b059cfda" d="M362.68764,93.65736c-.18983,0-.364-.00551-.52594-.01546-5.2807-.076-11.91367-.79676-16.61481-5.60485-3.51636-3.59813-5.15451-9.938-5.15451-19.95195V38.927h6.86077V68.08516c0,9.8724,1.75763,14.6601,3.23162,16.16766,2.316,2.36933,5.97525,3.46033,11.8634,3.53631l.33947.01433a93.59229,93.59229,0,0,0,9.80843-1.13892,5.66823,5.66823,0,0,0,4.859-5.57884V38.92684h6.86075V92.81106S366.95664,93.65736,362.68764,93.65736Z"/>
                <path class="adb26a28-8c7f-43e5-beb0-00c4b059cfda" d="M243.49075,93.72794a19.19342,19.19342,0,0,1-12.93095-4.18655c-3.26177-2.81234-5.05848-7.27661-5.05848-12.56847a16.52536,16.52536,0,0,1,6.84178-13.97411c4.24108-3.14955,10.17056-4.74637,17.62315-4.74637a40.99855,40.99855,0,0,1,10.07454,1.23315c-.12172-3.84218-.68229-7.72954-3.03733-10.05423-4.33935-4.28023-10.481-4.77559-14.72429-4.77559-5.17016,0-10.75792.19121-10.81376.19285l-.24009-6.76632c.05694-.00221,5.76533-.19726,11.05383-.19726,3.14786,0,12.72547,0,19.57507,6.75865,5.07858,5.012,5.07858,12.91121,5.07858,17.15507V92.76705l-3.19811.2138C263.2791,93.01164,252.46647,93.72794,243.49075,93.72794Zm6.47548-28.70472c-5.93171,0-10.472,1.13892-13.49706,3.38538a9.85112,9.85112,0,0,0-4.10709,8.56432c0,3.26086.98823,6.80493,2.71237,8.29156a12.58321,12.58321,0,0,0,8.41627,2.5137c3.63788,0,7.65356-.12544,11.1108-.27257a5.67406,5.67406,0,0,0,5.47051-5.63743V70.9926a5.68086,5.68086,0,0,0-4.87569-5.58507,35.47082,35.47082,0,0,0-5.23009-.38432Z"/>
                <path class="adb26a28-8c7f-43e5-beb0-00c4b059cfda" d="M297.48244,93.72794a23.93626,23.93626,0,0,1-17.98942-7.346c-4.30584-4.69347-6.5816-11.61138-6.5816-20.00481,0-8.25244,2.50579-15.11084,7.44925-20.38563a24.9248,24.9248,0,0,1,18.895-8.06289,49.86063,49.86063,0,0,1,10.567.95215,37.767,37.767,0,0,1,3.99205,1.12959V14.25889h6.86077V92.81106S302.03729,93.72794,297.48244,93.72794Zm1.77328-49.02864A18.04042,18.04042,0,0,0,285.39684,50.589c-3.78436,4.03887-5.62463,9.20346-5.62463,15.788,0,6.68646,1.66272,12.03288,4.80724,15.46126a17.77722,17.77722,0,0,0,12.903,5.96521c2.49269,0,6.76753-.14543,10.85293-.31224a5.67518,5.67518,0,0,0,5.47937-5.63767V51.24856a5.6682,5.6682,0,0,0-4.19756-5.44253c-.4269-.1175-.84735-.22247-1.25062-.30887a43.23535,43.23535,0,0,0-9.11089-.79786Z"/>
                <rect class="adb26a28-8c7f-43e5-beb0-00c4b059cfda" x="326.92657" y="38.92695" width="6.86077" height="53.88412"/>
                <path class="adb26a28-8c7f-43e5-beb0-00c4b059cfda" d="M219.75632,37.93072c-.163-.00992-.3372-.016-.52594-.016-4.269,0-21.5281,1.0122-21.5281,1.0122V92.81106h6.86077V51.40313a5.66816,5.66816,0,0,1,4.85916-5.57887,93.59628,93.59628,0,0,1,9.80819-1.13872l.33834.01376c2.46894.03252,4.11221-.10565,6.20976.08266v-6.8672A45.51746,45.51746,0,0,0,219.75632,37.93072Z"/>
                <path class="adb26a28-8c7f-43e5-beb0-00c4b059cfda" d="M426.82679,79.46783c-.39129,9.48668-7.38333,14.18958-19.99146,14.18958-7.29848,0-16.70256-.89876-16.70256-.89876V85.46319s4.294,1.44462,16.37078,1.44462c5.7509,0,12.67048-1.24158,13.36014-7.42479,1.742-15.61747-30.39048-3.09713-30.39048-25.5231,0-7.63983,5.0939-14.92626,19.47026-14.94245,5.73623-.00646,16.32185.50568,16.32185.50568V46.8908s-4.5444-1.47737-15.3884-1.42243c-5.63968.02855-13.18941,2.36184-13.11257,8.29136C396.96415,69.16262,427.80724,55.69653,426.82679,79.46783Z"/>
                <circle class="adb26a28-8c7f-43e5-beb0-00c4b059cfda" cx="136.73312" cy="18.86475" r="4.8868"/>
                <circle class="adb26a28-8c7f-43e5-beb0-00c4b059cfda" cx="330.22092" cy="18.86475" r="4.8868"/>
                <path class="adb26a28-8c7f-43e5-beb0-00c4b059cfda" d="M505.22258,93.72685c-8.19853,0-14.7176-2.66138-19.37742-7.91138-4.54367-5.11548-6.84737-11.91057-6.84737-20.19331,0-8.0684,2.4064-14.78026,7.15222-19.94811a24.783,24.783,0,0,1,19.07257-7.934c8.17954,0,14.68191,2.58313,19.32494,7.67774,4.54928,4.99157,6.85519,11.78881,6.85519,20.20434,0,8.38633-2.34276,15.21331-6.96351,20.2914C519.72242,91.09853,513.257,93.72685,505.22258,93.72685Zm0-49.216a17.92446,17.92446,0,0,0-13.98953,5.70955c-3.61688,3.93915-5.37449,8.977-5.37449,15.40175,0,6.68593,1.68392,11.83178,5.14669,15.73127,3.34663,3.77,7.9964,5.60264,14.21734,5.60264,6.088,0,10.7043-1.82053,14.11124-5.56518,3.50409-3.8521,5.20811-9.01005,5.20811-15.76874,0-6.692-1.71406-11.96622-5.09533-15.67615-3.33324-3.65756-7.98524-5.43511-14.224-5.43511Z"/>
                <rect class="adb26a28-8c7f-43e5-beb0-00c4b059cfda" x="466.87482" y="38.92695" width="6.86076" height="53.88412"/>
                <path class="f6de2db7-d04a-4b8d-8dbe-09bef8a7c04a" d="M497.12747,9.27843a55.55646,55.55646,0,0,0-16.84418,2.60608,12.22433,12.22433,0,0,1,1.87225,4.28009,51.29211,51.29211,0,1,1-20.19824,11.832,12.31506,12.31506,0,0,1-2.81824-3.7257,55.72472,55.72472,0,1,0,37.98841-14.9925Z"/>
                <circle class="adb26a28-8c7f-43e5-beb0-00c4b059cfda" cx="470.16821" cy="18.86475" r="4.8868"/>
              </g>
            </svg>
		</a>
		<div class="main-menu-items">
			<a id="featuresLink" href="#features">Features</a>
            <a id="pricingLink" href="#pricing">Pricing</a>
            <?php /*!--			<a id="apiLibrariesLink">Docs</a>-->
            <!--			<a id="aboutLink">About</a>-- */?>
            <a id="signInLink" href="/login/">Login</a>
		</div>
	</div>
    <div>
        <a class="btn-primary" href="/signup/">START NOW</a>
    </div>
    <div class="menu-overlay"></div>
</nav>

<?php include "project-io-$target_name.php";  //individual page content ?>

<footer class="padding-top--md padding-bottom--md">
    <div class="links">
        <a href="/privacy-policy/">Privacy Policy</a><p>|</p>
        <a href="/terms/">Terms of Use</a><p>|</p>
        <a href="https://www.loginradius.com/about-us/" target="_blank">About</a>
    </div>
    <div class="copyright">
        <p>Copyright <?php echo date("Y"); ?>, LoginRadius Inc</p>
    </div>
</footer>

<script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js?ver=3.4.1'></script>
<script type='text/javascript' src="/project-io/js/svg.min.js"></script>
<script type='text/javascript' src="/project-io/js/site.js"></script>
<?php 
if ($target_name == "home") { ?>
<script type='text/javascript' src="/project-io/js/prism/clipboard.min.js"></script>
<script type='text/javascript' src="/project-io/js/prism/prism.js"></script>
<?php 
}
if ($target_name == "signup") { ?>
<script type='text/javascript' src="/project-io/js/signup.js"></script>
<?php 
}
if ($target_name == "finish-signup") { ?>
<script type='text/javascript' src="/project-io/js/finish-signup.js"></script>
<?php 
}   
if ($target_name == "login") { ?>
<script type='text/javascript' src="/project-io/js/login.js"></script>
<?php 
}
if ($target_name == "forgot-password") { ?>
<script type='text/javascript' src="/project-io/js/forgot-password.js"></script>
<?php 
}
if ($target_name == "reset-password") { ?>
<script type='text/javascript' src="/project-io/js/reset-password.js"></script>
<?php 
}
if (isset($_SESSION['error_message']) && $_SESSION['error_message'] != "") { ?>
<script>
$('#user-error').css("display", "block");
$('#user-error').next().css("border-color", "#EF544E");
</script>
<?php
} 
/*if ($target_name == "signup-thank-you") { ?>
<script>
setTimeout(function() {
    window.location.href = "/auto-login/";
}, 10000);
</script>
<?php
}*/
?>
</body>
</html>