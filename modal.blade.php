<?php
//dd($_SERVER);
$digital_marketing = "";
if(strpos($_SERVER['REQUEST_URI'],"digital-marketing") > 0){
	$digital_marketing = "selected='selected'";
}

$creative_logo_design = "";
if(strpos($_SERVER['REQUEST_URI'],"creative-logo-design") > 0){
	$creative_logo_design = "selected='selected'";
}

$website_development = "";
if(strpos($_SERVER['REQUEST_URI'],"website-development") > 0){
	$website_development = "selected='selected'";
}

$animation = "";
if(strpos($_SERVER['REQUEST_URI'],"animation") > 0){
	$animation = "selected='selected'";
}

$website_maintenance = "";
if(strpos($_SERVER['REQUEST_URI'],"website-maintenance") > 0){
	$website_maintenance = "selected='selected'";
}

$mobile_application = "";
if(strpos($_SERVER['REQUEST_URI'],"mobile-application") > 0){
	$mobile_application = "selected='selected'";
}

######################### Custom Captcha Start ###########################
$convert_to_alphabets = array(
    '1' => 'One',
    '2' => 'Two',
    '3' => 'Three',
    '4' => 'Four',
    '5' => 'Five',
    '6' => 'Six',
    '7' => 'Seven',
    '8' => 'Eight',
    '9' => 'Nine',
    '10' => 'Ten');
$first_num  = rand(1,5);
$second_num = rand(6,10);
$new_file_name = str_replace('.','_',$_SERVER['REMOTE_ADDR']);
$first_convert_alphabet = $convert_to_alphabets[$first_num];
$second_convert_alphabet = $convert_to_alphabets[$second_num];
$condition_num = rand(1,2);
$condition_num2 = rand(1,2);
if($condition_num == 1){ ////// Plus
    $num_plus_minus_multiply = $first_num + $second_num;
    $html_captcha = $convert_to_alphabets[$first_num]." + ".$convert_to_alphabets[$second_num];
}else if($condition_num == 2){ ////// Minus
    $num_plus_minus_multiply = $second_num - $first_num;
    $html_captcha = $convert_to_alphabets[$second_num]." - ".$convert_to_alphabets[$first_num];

}
/* else if($condition_num == 3){
	$num_plus_minus_multiply = $second_num * $first_num;
	echo $convert_to_alphabets[$second_num]." * ".$convert_to_alphabets[$first_num]." = <input type='text' />";
} */
$file_name = $new_file_name.".txt";
//echo "<pre>"; print_r($_SERVER['DOCUMENT_ROOT']);
$myfile = fopen($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'].$file_name, "w");
fwrite($myfile, $num_plus_minus_multiply);
fclose($myfile);
######################### Custom Captcha Start ###########################

// echo strpos($_SERVER['REQUEST_URI'],"anaxdesigns");
?>
<style>
.displayNone { display:none!important; }
.chkbx { font-size: 13px; text-align: left; padding: 0 0 0 20px; position: relative; margin: 5px 0; }
.chkbx input { position:absolute; left: 0; top: 4px; width: 15px; height: 15px; }
#simple_form .form-body,
.popup-form .form-body { height: min-content !important; display: flex; }
.popup-form .form-body form { margin:0; }
#popupform .clearfix.fieldwrap.chkbx.capthcha-code {display: flex;padding: 0;align-items: center;flex-wrap: wrap;justify-content: center;}
#popupform .clearfix.fieldwrap.chkbx.capthcha-code input[type="text"] { float: none; position: static; background: #F7F7F7; padding: 18px 12px; max-width: 20%; margin-left: 7px; }
</style>

<section id="simple_form"  class="popup-form">
    <span class="close"></span>
	<div class="form-body">
		<a href="javascript:;" title="" class="close"></a>
		<div class="formcontainer">
			<div class="tophead">
				<h2>Discuss your Project</h2>
				<h3>Free Consultation</h3>
			</div>
			<div id="popupform" class="inform">
				<form class="simple_form creative-logo-design-contact-us leadformm" action="{{route('formSubmit')}}" method="post" name="myForm" autocomplete="off" id="popupForm">
                    @csrf
					<div class="field"><input type="text" name="name" maxlength="60" placeholder="Name *" class="required alphanumeric iecn" required></div>
					<div class="field"><input type="text" name="email" maxlength="60" value="" placeholder="Email *" class="required email " required></div>
					<div class="field phone"><input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' minlength="10" maxlength="12" name="phone" value="" placeholder="Phone Number *" class="required number" required></div>
					<div class="field">
						<select name="sale_type" class="required pkg_fld" required>
							<option value="">I AM INTERESTED IN *</option>
							<option value="Logo Design" <?php echo $creative_logo_design;?>>Logo Design</option>
							<option value="Website Development" <?php echo $website_development;?>>Website Design &amp; Development</option>
							<option value="Digital Marketing" <?php echo $digital_marketing;?>>Digital Marketing</option>
							<option value="Animation" <?php echo $animation;?>>Animation</option>
							<option value="Website Maintenance" <?php echo $website_maintenance;?>>Website Maintenance</option>
							<option value="Mobile Application" <?php echo $mobile_application;?>>Mobile Application</option>
						</select>
					</div>
					<div class="field"><textarea name="message_discount" class="required iemsg" rows="4" placeholder="Tell us about your project"></textarea></div>

                    <div class="clearfix fieldwrap chkbx capthcha-code">
                        <?php echo $html_captcha;?> = <input type='text' name='dost' />
                    </div>
					<div class="clearfix fieldwrap chkbx">
						<input type="checkbox" name="chk_confirmation" class="" value="" />
						By submitting this form and signing up for texts, you consent to receive text messages. <a style="text-decoration:underline;" href="https://www.anaxdesigns.com/privacy-policy/" target="blank">Privacy Policy</a>
					</div>
                    <!-- Loader -->
                    <div class="form_loader" style="display:none;"></div>

                    <div class="invalid_captcha" style="text-align: center; color: #A94442; background-color: #F2DEDE; border-color: #EBCCD1; display: none;">
                        <strong>Invalid Captcha!</strong>
                    </div>
                    <div class="success" style="text-align: center; color: #3C763D; background-color: #DFF0D8; border-color: #D6E9C6; display: none;">
                        <strong>Your Inquiry Submitted Successfully</strong>
                    </div>
                    <div class="user-exists" style="display:none">
                        <div class="alert alert-warning">User already exists.</div>
                    </div>
					<div class="clearfix fieldwrap text-center">
						<input type="submit"  class="btn-validate submit-btn-1" value="Submit" />
						<input type="hidden" name="type" id="pkg-name" value="Animation Form">
                        <input type="hidden" class="package-id" name="pkg_id">
						<input type="hidden" name="page_type" value="Website">
						<input type="hidden" name="return_url" value="{{url('/video-packages')}}">
						<input name="pkg-price" id="pkg-price" value="000" type="hidden">
						<input name="page_url" class="page_url" value="<?php echo BASE_URL; ?>" type="hidden">
                        <input type="hidden" name="page_id" class="page_id" value="{{$pageContent->id}}">
						<input type="hidden" id="payment_url" name="payment_url" value="<?php echo BASE_URL; ?>">
						<input id="price_he_saw" name="price_he_saw" value="000" type="hidden">
						<input name="second_price" value="" type="hidden">
						<input name="third_price" value="0" type="hidden">
{{--						<input type="hidden" name="random_code" value="<?php echo $randomNumber; ?>">--}}
                        <!--Custom Captcha Start -->
                        <input type="hidden" name="donot_create" class="donot_create" value="0">
                        <input type="hidden" name="rand_file_name" value="<?php echo $file_name; ?>">
                        <!--Custom Captcha End -->
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<section id="logo_form"  class="popup-form">
    <span class="close"></span>
	<div class="form-body">
		<a href="javascript:;" title="" class="close"></a>
		<div class="formcontainer">
			<div class="tophead">
				<h2>Discuss your Project</h2>
				<h3>Free Consultation</h3>
			</div>
			<div id="popupform" class="inform">
				<form class='logo_form creative-logo-design-packages-3-forms leadformm' action="{{route('formSubmit')}}" method="post" autocomplete="off" id="popupForm">
                    @csrf
                    <div class="field"><input type="text" name="name" maxlength="60" placeholder="Name *" class="required alphanumeric iecn" required></div>
					<div class="field"><input type="text" name="email" maxlength="60" value="" placeholder="Email *" class="required email " required></div>
					<div class="field phone"><input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' minlength="10" maxlength="12" name="phone" value="" placeholder="Phone Number *" class="required number" required></div>
					<div class="field"><textarea name="message_discount" class="required iemsg" rows="4" placeholder="Tell us about your project"></textarea></div>

                    <div class="clearfix fieldwrap chkbx capthcha-code">
                        <?php echo $html_captcha;?> = <input type='text' name='dost' />
                    </div>
                    <div class="clearfix fieldwrap chkbx">
                        <input type="checkbox" name="chk_confirmation"  class="" value="" />
                        By submitting this form and signing up for texts, you consent to receive text messages. <a style="text-decoration:underline;" href="https://www.anaxdesigns.com/privacy-policy/" target="blank">Privacy Policy</a>
                    </div>
                    <!-- Loader -->
                    <div class="form_loader" style="display:none;"></div>

                    <div class="invalid_captcha" style="text-align: center; color: #A94442; background-color: #F2DEDE; border-color: #EBCCD1; display: none;">
                        <strong>Invalid Captcha!</strong>
                    </div>
                    <div class="success" style="text-align: center; color: #3C763D; background-color: #DFF0D8; border-color: #D6E9C6; display: none;">
                        <strong>Your Inquiry Submitted Successfully</strong>
                    </div>
                    <div class="user-exists" style="display:none">
                        <div class="alert alert-warning">User already exists.</div>
                    </div>
					<div class="clearfix fieldwrap text-center">
						<input type="submit"  class="btn-validate submit-btn-1" value="Submit" />
						<input type="hidden" name="type" id="pkg-name" value="Logo Form">
                        <input type="hidden" class="package-id" name="pkg_id">
						<input type="hidden" name="sale_type" value="Logo Design">
                        <input type="hidden" name="page_type" value="Website">
						<input type="hidden" name="pkg" value="Popup Form">
						<input type="hidden" name="return_url" value="{{url('/promo-offer')}}">
						<input name="pkg-price" id="pkg-price" value="199" type="hidden">
						<input name="page_url" class="page_url" value="<?php echo BASE_URL; ?>" type="hidden">
                        <input type="hidden" name="page_id" class="page_id" value="{{$pageContent->id}}">
						<input type="hidden" id="payment_url" name="payment_url" value="<?php echo BASE_URL; ?>promo-offer">
						<input id="price_he_saw" name="price_he_saw" value="199" type="hidden">
						<input name="second_price" value="" type="hidden">
						<input name="third_price" value="0" type="hidden">
{{--						<input type="hidden" name="random_code" value="<?php echo $randomNumber; ?>">--}}

                        <!--Custom Captcha Start -->
                        <input type="hidden" name="donot_create" class="donot_create" value="0">
                        <input type="hidden" name="rand_file_name" value="<?php echo $file_name; ?>">
                        <!--Custom Captcha End -->
                    </div>

				</form>
			</div>
		</div>
	</div>
</section>

<section id="website_form" class="popup-form">
    <span class="close"></span>
	<div class="form-body">
		<a href="javascript:;" title="" class="close"></a>
		<div class="formcontainer">
			<div class="tophead">
				<h2>Discuss your Project</h2>
				<h3>Free Consultation</h3>
			</div>
			<div id="popupform" class="inform">
				<form class="website_form leadformm" action="{{route('formSubmit')}}" method="post" autocomplete="off" id="popupForm">
                    @csrf
                    <div class="field"><input type="text" name="name" maxlength="60" placeholder="Name *" class="required alphanumeric iecn" required></div>
					<div class="field"><input type="text" name="email" maxlength="60" value="" placeholder="Email *" class="required email" required></div>
					<div class="field phone"><input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' minlength="10" maxlength="12" name="phone" value="" placeholder="Phone Number *" class="required number" required></div>
					<div class="field"><textarea name="message_discount" class="required iemsg" rows="4" placeholder="Tell us about your project"></textarea></div>
					<!--<div id="recaptcha-form-3"></div>-->
					<!--<span><b class="website_form-recaptcha-req" style="display:none;"  >CAPTCHA IS REQUIRED</b></span>-->
                    <div class="clearfix fieldwrap chkbx capthcha-code">
                        <?php echo $html_captcha;?> = <input type='text' name='dost' />
                    </div>
                    <div class="clearfix fieldwrap chkbx">
                        <input type="checkbox" name="chk_confirmation" class="" value="" />
                        By submitting this form and signing up for texts, you consent to receive text messages. <a style="text-decoration:underline;" href="https://www.anaxdesigns.com/privacy-policy/" target="blank">Privacy Policy</a>
                    </div>
                    <!-- Loader -->
                    <div class="form_loader" style="display:none;"></div>

                    <div class="invalid_captcha" style="text-align: center; color: #A94442; background-color: #F2DEDE; border-color: #EBCCD1; display: none;">
                        <strong>Invalid Captcha!</strong>
                    </div>
                    <div class="success" style="text-align: center; color: #3C763D; background-color: #DFF0D8; border-color: #D6E9C6; display: none;">
                        <strong>Your Inquiry Submitted Successfully</strong>
                    </div>
                    <div class="user-exists" style="display:none">
                        <div class="alert alert-warning">User already exists.</div>
                    </div>
					<div class="clearfix fieldwrap text-center">
						<input type="submit"  class="btn-validate submit-btn-1" value="Submit" />
						<input type="hidden" name="type" class="web_type" value="Website Form">
						<input type="hidden" name="sale_type" value="Website Development">
                        <input type="hidden" name="page_type" value="Website">
                        <input type="hidden" class="package-id" name="pkg_id">
						<input type="hidden" id="pkg-name" name="pkg" value="Website Form">
						<input type="hidden" id="price_he_saw" name="price_he_saw" value="149.99">
						<input type="hidden" name="payment_url" id="payment_url" value="<?php echo BASE_URL; ?>website-brief">
						<input type="hidden" name="return_url" class="return_url" value="{{url('/website-brief')}}">
						<input type="hidden" name="page_url" class="page_url_web" value="<?php echo BASE_URL; ?>">
                        <input type="hidden" name="page_id" class="page_id" value="{{$pageContent->id}}">
						<input name="second_price" value="" type="hidden">
						<input name="third_price" value="0" type="hidden">
{{--						<input type="hidden" name="random_code" value="<?php echo $randomNumber; ?>">--}}

                        <!--Custom Captcha Start -->
                        <input type="hidden" name="donot_create" class="donot_create" value="0">
                        <input type="hidden" name="rand_file_name" value="<?php echo $file_name; ?>">
                        <!--Custom Captcha End -->
                    </div>
				</form>
			</div>
		</div>
	</div>
</section>



<!--
<div id='modal1' class="modal">
	<div class="modal-wrapper">
		<a href="javascript:;" class="clsBtn">X</a>
		<form  action="https://www.anaxdesigns.com/code/anax/signupSubmitAPI" id='modal-1-form' method="post" class="" autocomplete="off" >
		    <input type="hidden" name="keyword" value="<?php echo $_REQUEST['kw'] ?? "" ;?>" />
			<div class="formPanel">
				<div class="row">
					<div class="col-lg-6 lftFrm">
						<img src="/assets/images/logo-white.png" alt="*">
						<h4>Sign Up Now &amp; <strong> Get Discount</strong></h4>
					</div>
					<div class="col-lg-6 rytFrm">
						<div class="clForm">
							<label>Enter your name</label>
							<div class="field">
							<input type="text" placeholder="Enter Name" name='name' id='name' required></div>
						</div>
						<div class="clForm">
							<label>Enter your Email Address</label>
							<div class="field">
							<input type="email" placeholder="Enter Email" name='email' id='email' required></div>
						</div>
						<div class="clForm">
							<label>Enter your Phone Number</label>
							<div class="field">
							<input type="tel" placeholder="Phone Number" name='phone' id='phone' ></div>
						</div>
						<div class="clForm">
							<label>Select Services</label>
							<div class="field">
								<select name="interested_in" id="interested_in" required>
									<option value="Logo Design">I Am Interested in</option>
									<option value="Logo Design">Logo Design</option>
									<option value="Animation">Animation</option>
									<option value="Stationary Design">Stationary Design</option>
									<option value="Web Design &amp; Development">Web Design &amp; Development</option>
									<option value="Website Maintenance">Website Maintenance</option>
									<option value="Mobile Application">Mobile Application</option>
								</select>
							</div>
						</div>
						<div class="clForm">
							<label>Description</label>
							<div class="field">
								<textarea placeholder="Description"  name="message_discount" id="message_discount"></textarea>
							</div>
						</div>
						<div class="clForm">
						    <div id="html_element"></div>
						</div>
						<div class="clForm">
							<input type="submit" value="Submit">
							<span class="notemsg">PLEASE NOTE THAT ALL FIELDS ARE REQUIRED.</span>

							<input type="hidden" class="web_url" value="">
							<input type="hidden" class="order_url" value="">
							<input type="hidden" id="type" name="type" value="">
				            <input type="hidden" id="pkg"  name="pkg"  value="">
				            <input type="hidden" id="pkg-price" name="pkg-price" value="">
				            <input type="hidden" id="price-he-saw" name="price_he_saw" value="none">
				            <input type="hidden" id="page_url" name="page_url" value="https://www.anaxdesigns.com/projects/">
				            <input type="hidden" id="payment_url" name="payment_url" value="">
				            <input type="hidden" name="return_url" value="https://www.anaxdesigns.com/promo-offer/?q=1">

						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<div id='modal2' class="modal">
	<div class="modal-wrapper">
		<a href="javascript:;" class="clsBtn">X</a>
			<div class="formPanel">
				<div class="row">
					<div class="col-lg-6 lftFrm">
						<img src="/assets/images/logo-white.png" alt="*">
						<h4>Sign Up Now &amp; <strong> Get Discount</strong></h4>
					</div>
					<div class="col-lg-6 rytFrm">
						<div class="clForm">
							<label>Enter your name</label>
							<div class="field">
							<input type="text" placeholder="Enter Name" name='name' id='name2' required></div>
						</div>
						<div class="clForm">
							<label>Enter your Email Address</label>
							<div class="field">
							<input type="email" placeholder="Enter Email" name='email' id='email2' required></div>
						</div>
						<div class="clForm">
							<label>Enter your Phone Number</label>
							<div class="field">
							<input type="tel" placeholder="Phone Number" name='phone' id='phone2' ></div>
						</div>
						<div class="clForm">
							<label>Select Services</label>
							<div class="field">
								<select name="interested_in" id="interested_in2" required>
									<option value="-1">I Am Interested in</option>
									<option value="Logo Design">Logo Design</option>
									<option value="Animation">Animation</option>
									<option value="Stationary Design">Stationary Design</option>
									<option value="Web Design &amp; Development">Web Design &amp; Development</option>
									<option value="Website Maintenance">Website Maintenance</option>
									<option value="Mobile Application">Mobile Application</option>
								</select>
							</div>
						</div>
						<div class="clForm">
							<label>Description</label>
							<div class="field">
								<textarea placeholder="Description" name="message_discount" id="message_discount2"></textarea>
							</div>
						</div>
						<div class="clForm">
						    <div id="html_element_2"></div>
						</div>
						<div class="clForm">
							<input id='submit-button' type="submit" value="Submit">
							<span class="notemsg">PLEASE NOTE THAT ALL FIELDS ARE REQUIRED.</span>

							<input type="hidden" class="web_url" value="">
							<input type="hidden" class="order_url" value="">

							<input type="hidden" id="type2" name="type" value="">
				            <input type="hidden" id="pkg2"  name="pkg"  value="">
				            <input type="hidden" id="pkg-price2" name="pkg-price" value="">
				            <input type="hidden" id="price-he-saw2" name="price_he_saw" value="none">
				            <input type="hidden" id="page_url2" name="page_url" value="https://www.anaxdesigns.com/packages/">
				            <input type="hidden" id="payment_url2" name="payment_url" value="">
				            <input type="hidden" name="return_url" value="https://www.anaxdesigns.com/promo-offer/?q=1">

						</div>
					</div>
				</div>
			</div>
	</div>
</div>

<div id='modal3' class="modal">
	<div class="modal-wrapper">
		<a href="javascript:;" class="clsBtn">X</a>
			<div class="formPanel">
			    <div class='alert alert-success' id='success-msg' style='text-align:center; margin-top: 25%; font-size: 30px; color:#fff;'>
                    <p>Thank you for your interest. A specialist will be with you shortly</p>
                </div>
			</div>
	</div>
</div>

<div class='alert alert-success' id='success-msg' style='position: absolute; z-index: 25; text-align: center; width: 60%; margin: 0 20%; background: #325449; height: 100px; line-height: 6; top: -1000px; border-radius: 6px;'>
    <p>Thank you for submitting the form</p>
</div>


<div id="popupform_new" class="inform" style="display:none;">
	<form class="website_form2" action="<?php echo BASE_URL; ?>code/anax2/signupSubmitAPI_new" method="post" name="myForm" autocomplete="off" id="popupForm">
		<div class="field"><input type="text" name="name" maxlength="60" placeholder="Name *" class="required alphanumeric iecn" required></div>
		<div class="field"><input type="text" name="email" maxlength="60" value="" placeholder="Email *" class="required email " required></div>
		<div class="field phone"><input type="text" maxlength="25" minlength="10" name="phone" value="" placeholder="Phone Number *" class="required number" required></div>
		<div class="field">
			<select name="pkg" class="required pkg_fld" required>
				<option value="">I AM INTERESTED IN *</option>
				<option value="Logo Design">Logo Design</option>
				<option value="Website Design &amp; Development">Website Design &amp; Development</option>
				<option value="Digital Marketing">Digital Marketing</option>
				<option value="Animation">Animation</option>
				<option value="Website Maintenance">Website Maintenance</option>
				<option value="Mobile Application">Mobile Application</option>
			</select>
		</div>
		<div class="field"><textarea name="message_discount" class="required iemsg" rows="4" placeholder="Tell us about your project"></textarea></div>
		<!--<div id="recaptcha-form-4"></div>-->
		<!--<span><b class="website_form-recaptcha-req" style="display:none;">CAPTCHA IS REQUIRED</b></span>
		<div class="clearfix fieldwrap chkbx">
			<input type="checkbox" name="chk_confirmation"  class="" value="" required />
			By submitting this form and signing up for texts, you consent to receive text messages
		</div>
		<div class="clearfix fieldwrap text-center">
			<input type="submit"  class="btn-validate" value="Submit" />
			<input type="hidden" name="type" id="pkg-name" value="Test Form">
			<input type="hidden" name="return_url" value="<?php echo BASE_URL; ?>">
			<input name="pkg-price" id="pkg-price" value="000" type="hidden">
			<input name="page_url" class="page_url" value="<?php echo BASE_URL; ?>" type="hidden">
			<input type="hidden" id="payment_url" name="payment_url" value="<?php echo BASE_URL; ?>">
			<input id="price_he_saw" name="price_he_saw" value="000" type="hidden">
			<input name="second_price" value="" type="hidden">
			<input name="third_price" value="0" type="hidden">
{{--			<input type="hidden" name="random_code" value="<?php echo $randomNumber; ?>">--}}
		</div>
	</form>
</div>-->
