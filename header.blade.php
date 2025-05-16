<!DOCTYPE html>
<html lang="en" class="with-promo-hidden">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php echo $title; ?></title>
<?php echo $canonical_link; ?>

<meta name="google-site-verification" content="45Zjf0P7OPLDJAW6W4J040HsfkQNFw8mGEeZt1fLFyU" />
<meta name="description" content="<?php echo $description; ?>" />
<meta name="Keywords" content="<?php echo $keyword; ?>" />
<meta name="p:domain_verify" content="c8e1ff1b3b1a34b9b65a352795b67538"/>
<?php
$phone_number = "(877) 908 8719";
$web_email = "sales@anaxdesigns.com";
define('BASE_URL', 'https://www.anaxdesigns.com/');

if ($_SERVER['REQUEST_URI'] == '/anax/'){
?>
	<link rel="canonical" href="https://www.anaxdesigns.com/" />
	<meta name="google-site-verification" content="-vYoCWBUAX14xDM3VPkpzunER4JXJyBOBoBDGsCxP8U" />
<?php } ?>

<!-- FAVICON -->
    <link rel="icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/anax-website/css/main.min.css')}}">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-EQF3NVSWHK"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-EQF3NVSWHK');
</script>

<?php echo $cstmschema; ?>
</head>
<style>
    .alert.alert-warning {text-align: center;background-color: #d69b9b;color: #500606;}
    .form_loader { border: 4px solid #f3f3f3; border-top: 4px solid #3498db; border-radius: 50%; width: 30px; height: 30px; animation: spin 1s linear infinite; margin: 20px auto; }
    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

</style>

<body class="custom-cursor with-promo">

	<div class="circle-cursor circle-cursor--outer"></div>
	<div class="circle-cursor circle-cursor--inner"></div>
	<header id="masthead" class="site-header header-3 both-types no-transition" data-header-fixed="true" data-fixed-initial-offset="150">
		<div class="header-wrap">
			<div class="header-wrap-inner">
				<div class="left-part">
                    <div class="site-branding">
                        <div class="site-title">
                            <a href="https://www.anaxdesigns.com/" rel="home" class="remove_underline">
                                <div class="logo"><img src="{{asset('assets/anax-website/images/logo.png')}}" width="160" height="61" alt="ANAX LOGO"></div>
                                <div class="fixed-logo"><img src="{{asset('assets/anax-website/images/logo.png')}}" width="121" height="46" alt="ANAX LOGO"></div>
                            </a>
                        </div>
						<a href="javascript:;" class="get-menu"><span></span></a>
					</div>
				</div>
				<div class="menu-sec">
					<a href="#" class="menu-cls"></a>
					<div class="brand-logo"><img src="{{asset('assets/anax-website/images/logo.png')}}" width="160" height="61" alt="ANAX LOGO"></div>
					<nav id="site-navigation" class="main-nav with-counters">
						<div class="main-nav-container">
							<ul class="menu">
								<li class="nav-item menu-item-depth-0"><a href="https://www.anaxdesigns.com/"><span>HOME</span></a></li>
								<li class="nav-item menu-item-depth-0"><a href="{{url('about-us')}}"><span>ABOUT US </span></a></li>
								<li class="nav-item menu-item-depth-0"><a href="{{url('projects')}}"><span>PROJECTS </span></a></li>
								<li class="nav-item menu-item-depth-0"><a href="{{url('portfolio')}}"><span>PORTFOLIO </span></a></li>
								<li class="nav-item menu-item-depth-0 child-menu"><a href="javascript:;"><span>SERVICES </span></a>
									<ul class="sub-menu">
										<li><a href="{{url('creative-logo-design')}}">Logo Design</a></li>
										<li><a href="{{url('website-development')}}">Website Design & Development</a></li>
										<!--<li><a href="stationary-design/">Stationary Design</a></li>-->
										<li><a href="{{url('video-animation-services')}}">Animation</a></li>
										<li><a href="{{url('website-maintenance')}}">Website Maintenance</a></li>
										<li><a href="{{url('mobile-application')}}">Mobile Application</a></li>
										<li><a href="{{url('digital-marketing-services')}}">Digital Marketing</a></li>
									</ul>
								</li>
								<li class="nav-item menu-item-depth-0"><a href="{{url('packages')}}"><span>PACKAGES </span></a></li>
								<!--<li class="nav-item menu-item-depth-0"><a href="contact-us/"><span>CONTACT </span></a></li>-->
							</ul>
						</div>
					</nav>
					<div class="right-part">
						<a class="btn purchase-btn small order_button3" pkg="Header Form" href="javascript:;">Contact Us</a>
						<a class="btn purchase-btn small" href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a>
					</div>
				</div>
			</div>
		</div>
	</header>
