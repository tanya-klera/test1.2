jQuery.validator.setDefaults( {
			submitHandler: function () {
				jQuery.ajax({
						url: PT_Ajax.ajaxurl,
						method: "POST",
						data: jQuery("#signupForm").serialize(),
						success: function (response) {
							console.log(response);
							if(response>0)
							http://localhost/test_wp/thank-you/
							window.location = "http://localhost/test_wp/thank-you/";
						}
				})
	
			}
} );

jQuery( document ).ready( function () {
	jQuery( "#signupForm" ).validate( {
		ignore: ".ignore",
		rules: {
			firstname: "required",
			lastname: "required",
			email: {
				required: true,
				email: true,
				checkDomain:true
			},
			contact_no: {
				required:true,
				digits: true
			},
			organization: {
				required: true
			},
			// hiddenRecaptcha: {
			// 	required: function () {
			// 		// if (grecaptcha.getResponse() == '') {
			// 		// 	return true;
			// 		// } else {
			// 		// 	return false;
			// 		// }
			// 	}
			// },

			//timezone: "required",
			//form_date:"required",
			//form_time:'required',
			//captcha_text:'required',
			agree: "required"
		},
		messages: {
			firstname: "Please enter your first name",
			lastname: "Please enter your last name",
			email: {
				required:"Please enter email address",
				email:"Please enter a valid email address",
				checkDomain:"Please provide your business email"
			},
			contact_no:{
				required:"Please enter contact number",
				digits: "Please enter valid contact number"
			}, 
			organization: {
				required: "Please enter organization name"
			},
			// hiddenRecaptcha:{
			// 	required:"Please check the captcha checkbox."
			// },
			//timezone:  "Please select a timezone",
			//form_date:"Please select date",
			//form_time:"Please select time",
			//captcha_text:"Please enter content of image",
			agree: "Please accept our privacy policy"
		},
		errorElement: "span",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "help-block custom-error" );

			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.parent( "label" ) );
			} else {
				error.insertAfter( element );
			}
		},
		highlight: function ( element, errorClass, validClass ) {
			jQuery( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
		},
		unhighlight: function (element, errorClass, validClass) {
			jQuery( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
		}
});

jQuery.validator.addMethod("checkDomain", function(value, element) {

	var domains = ["gmail","rediff","yahoo","test"]; //update ur domains here
	var idx1 = value.indexOf("@");
	if(idx1>-1){
		var splitStr = value.split("@");
		var sub = splitStr[1].split(".");
		
		if(domains.indexOf(sub[0])>-1){
			value="";
			return false;
		}else{
			return true;
		}
	}
}, "Please provide your business email.");

jQuery.validator.addMethod("checkCaptcha", function () {

	if (grecaptcha.getResponse() == '') {
		console.log("in if");
		return true;
	} else {
		console.log("in else");
		console.log(grecaptcha.getResponse());
		jQuery('#hiddenRecaptcha').val(grecaptcha.getResponse());
		return false;
	}
}, "Please check the captcha checkbox."	)
});
