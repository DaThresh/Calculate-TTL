<?php

session_start();
include ($_SERVER['DOCUMENT_ROOT']."/config/dbinfo.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-69544351-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-69544351-2');
</script>


	<title>Calculate TTL Texas</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="result.php" method="post">
				<span class="contact100-form-title">
					Calculate TTL
				</span>

				<div class="wrap-input100 input100-select bg1">
					<span class="label-input100">State *</span>
					<div>
						<select class="js-select2" name="state">
							<option>Select State</option>
							<?php
							// ------------------
							// State List
							// ------------------
							
							$conn = mysqli_connect('localhost',$db_username,$db_password,$db_db);
							if(!$conn){
								echo "<option>Connection to database failed</option>";
							}
							
							$result = mysqli_query($conn,"SELECT state FROM states");
							while ($row = mysqli_fetch_assoc($result)) {
								echo '<option>' . ucfirst($row['state']) . '</option>';
							}
							
							
							mysqli_free_result($result);
							mysqli_close($conn);
							
							?>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Vehicle Sale Price *</span>
					<input class="input100" type="text" name="price" placeholder="$">
				</div>
				
				<div class="wrap-contact100-form-radio">
					<span class="label-input100">What type of sale is this? *</span>

					<div class="contact100-form-radio m-t-15">
						<input class="input-radio100" id="dealer" type="radio" name="saletype" value="dealer">
						<label class="label-radio100" for="dealer">
							Dealer
						</label>
					</div>

					<div class="contact100-form-radio">
						<input class="input-radio100" id="private" type="radio" name="saletype" value="private">
						<label class="label-radio100" for="private">
							Private Party
						</label>
					</div>
				</div>
				
				<span id="tradeinbox" style="display: none;">
					<div class="wrap-contact100-form-radio">
						<span class="label-input100">Did you have a trade in?<span>
						<div class="contact100-form-radio m-t-15">
							<input class="input-radio100" id="yestrade" type="radio" name="tradein" value="true">
							<label class="label-radio100" for="yestrade">
								Yes
							</label>
						</div>
						
						<div class="contact100-form-radio">
							<input class="input-radio100" id="notrade" type="radio" name="tradein" value="false" checked="checked">
							<label class="label-radio100" for="notrade">
								No
							</label>
						</div>
					</div>
					
					<div class="wrap-input100 bg1 rs1-wrap-input100" id="tradeintext" style="display:none;width:100%;">
						<span class="label-input100">Enter vehicle trade-in value *</span>
						<input class="input100" type="text" name="tradeinvalue" placeholder="$">
					</div>
				</span>
				
				<span id="privatebox" style="display: none; width: 100%;">
					<div class="wrap-input100 bg1 rs1-wrap-input100" style="display:inline-block;">
						<span class="label-input100">Enter vehicle presumptive value *</span>
						<input class="input100" type="text" name="presumptive" placeholder="$">
					</div>
					<div class="wrap-input100 bg1 rs1-wrap-input100" style="display:inline-block;">
						<span class="label-input100">Click below to calculate presumptive value</span>
						<p>HYPERLINK</p>
					</div>
				</span>
				
				<div class="wrap-contact100-form-radio">
					<span class="label-input100">Are you a new resident?<span>
					
					<div class="contact100-form-radio m-t-15">
						<input class="input-radio100" id="radio5" type="radio" name="resident" value="true">
						<label class="label-radio100" for="radio5">
							Yes
						</label>
					</div>
					
					<div class="contact100-form-radio">
						<input class="input-radio100" id="radio6" type="radio" name="resident" value="false" checked="checked">
						<label class="label-radio100" for="radio6">
							No
						</label>
					</div>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
				
				<a href="disclaimer" class="wrap-input100 wrap-legal bg1 rs1-wrap-input100">
					<span class="legal">Disclaimer</span>
				</a>
				<a href="privacy/" class="wrap-input100 wrap-legal bg1 rs1-wrap-input100">
					<span class="legal">Privacy Policy</span>
				</a>
					
			</form>
		</div>
	</div>


<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		});

	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="vendor/noui/nouislider.min.js"></script>
	<script>
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 1500, 3900 ],
	        connect: true,
	        range: {
	            'min': 1500,
	            'max': 7500
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]);
	        $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
	        $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
	    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
<!--===============================================================================================-->
	<script>
		
		function showHide(first,second){
			if( $('#' + second).is(':visible') ){
				$('#' + second).slideUp();
			}
			if( $('#' + first).not(':visible') ){
				$('#' + first).slideDown();
			}
			console.log(first);
		}
		
		$('#dealer').each(function(){
			$(this).on('change', function(e){
				if($(this).val() == 'dealer'){
					showHide('tradeinbox','privatebox');
				}
			});
		});
		
		$('#private').each(function(){
			$(this).on('change', function(e){
				if($(this).val() == 'private'){
					showHide('privatebox','tradeinbox');
				}
			});
		});
		
		$('#yestrade').each(function(){
			$(this).on('change', function(e){
				if($(this).val() == 'true'){
					showHide('tradeintext','null');
				}
			});
		});
		
		$('#notrade').each(function(){
			$(this).on('change', function(e){
				if($(this).val() == 'false'){
					showHide('null','tradeintext');
				}
			});
		});
		
	</script>

</body>
</html>
