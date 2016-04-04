<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">

  <title><?php echo $title; ?></title>

  <meta name="description" content="<?php echo $metadescription; ?>" />
  
  <!-- Icons -->
  <!-- Note: One touch icon works but is a tad heavier (http://mathiasbynens.be/notes/touch-icons) -->
  <!--
  <link rel="apple-touch-iconprecomposed" sizes="152x152" href="img/apple-touch-icon-152x152.png">
  <link rel="icon" href="img/favicon.png">
  <meta name="msapplication-TileImage" content="img/wp-tile-icon-144x144.png">
  <meta name="msapplication-TileColor" content="#FFFFFF">
  -->
  <link rel="stylesheet" type="text/css" href="css/app.css">

  <!--[if lt IE 9]>
  <link rel="stylesheet" type="text/css"  href="css/ie.css">
  <![endif]-->

  <!--[if lt IE 9]>
  <script type="text/javascript" src="js/vendor/respond.min.js"></script>
  <![endif]-->

  <script type="text/javascript" src="js/vendor/modernizr-2.8.3.js"></script>


<!--
  <script type="text/javascript" src="http://use.typekit.com/your-typekit-code.js"></script>
  <script type="text/javascript">html5.shivMethods = false; try{Typekit.load();}catch(e){}</script> // Fixes conflict with HTML5 Shiv in Modernizr
-->
</head>
<body class="<?php echo $bodyClass; ?>">


  <!--[if lt IE 8]>
  <div class="chromeframe-container">
    <div class="chromeframe-wrapper">
      <div class="chromeframe-inner">
        <div class="row">
          <div class="large-12 medium-12 small-12 columns text-center updateBrowser">
            <h1 class="text-center">You are using an outdated browser.</h1>
            <h2 class="text-center">Please ugrade your <a href="http://whatbrowser.org/" target="_blank">browser</a>.</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <![endif]-->

            <div class="modal modal-medium" data-modal-window id="patient-downloads">
                <a class="close" style="font-size: 0.875em; color: #a2a2a2;" data-modal-close>close window</a>
                <h3>New Patient Downloads</h3>
                <p class="lead">For your convienence...</p>
                <ul class="no-bullet" style="margin-left:1.35em;">
                  <li><i class="fa fa-file-pdf-o fa-2x muted"></i>  <a href="patientdocs/Health_History.pdf">Health History</a> <span class="label secondary radius">556 KB</span> </li>
                  <li><i class="fa fa-file-pdf-o fa-2x muted"></i> <a href="patientdocs/new_patient_information.pdf">New Patient Information</a> <span class="label secondary radius">693 KB</span> </li>
                  <li><i class="fa fa-file-zip-o fa-2x muted"></i> <a href="patientdocs/ChristensonOrthodonticsForms.zip">Download All Forms</a>  <span class="label secondary radius">1.1 MB</span> </li>
                </ul>
               <!--  <div class="text-right"> 
                  <button class="tiny button" data-modal-close>Close</button>
                </div> -->
            </div>


    <div class="top-hat">
        <div class="row">
            <div class="large-6 medium-6 small-12 columns">
                <p class="large-text-left medium-text-left small-text-center">
                    <a class="modal-link" href="contact.php#great-bridge">Our Offices</a>  <span class="separator-bar">|</span>  <a class="modal-link" data-modal="#patient-downloads">New Patient Forms</a>
                </p>
            </div>
            <div class="large-6 medium-6 small-12 columns">
                <p class="large-text-right medium-text-right small-text-center increase-140"> <i class="fa fa-phone"></i> <span class="strong-text">757.482.7660</span></p>
            </div>
        </div>
    </div>

    <header class="page-header" role="banner">
            <div class="row collapse">
                <div class="large-3 medium-3 small-12 columns">
                <a href="index.php" rel="home">
                    <img src="img/logo600.png" class="brandmark aligncenter" alt="Christenson Orthodontics">
                </a>
                </div>
                <div class="large-9 medium-9 small-12 columns">
                    <!-- <img src="img/ABoOdiplomatlogo230x60.png"> -->
                    <h4 class="large-text-right medium-text-right small-text-center no-margin hide-for-small">We Make Great Smiles.</h4>

                    <nav id="main-nav" role="navigation">
                        <ul class="slimmenu">
                            <li><a href="our-team.php">Our Team</a></li>
                            <li><a href="media-gallery.php">Photo Gallery</a></li>
                            <li>
                                <a href="patient-information.php">Info for Patients</a><!--
                                <ul>
                                    <li><a href="patient-information.php#"></a></li>
                                    <li><a href="patient-information.php#"></a></li>
                                    <li><a href="patient-information.php#"></a></li>
                                    <li><a href="patient-information.php#"></a></li>
                                </ul> -->
                            </li>
                            <li><a href="contact.php">Our Office</a></li>
                            <li><a href="treatment-types.php">Treatment Types</a></li>
                        </ul>
                    </nav>

                </div>
            </div>
    </header>
