jQuery( function(){
	  var mediaWidth = window.innerWidth;
	  //alert(mediaWidth);
          
});

jQuery(document).ready(function () {
	jQuery( "#pack_face1" ).change(function() {

			var id= jQuery(this).val();

			if(id == '')
			{
				document.getElementById("faceF").innerHTML = '';
				return;
			}
	  
			jQuery("body").css({"position":""});
			document.getElementById("loading").style.display = "block";
			
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function()
			 {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{
					if(xmlhttp.responseText !== "")
					{
						document.getElementById("loading").style.display = "none";
						 jQuery('.customize').addClass('customize1');
						jQuery('.addCart').addClass('addCart1');
						document.getElementById("faceF").innerHTML = xmlhttp.responseText;					
					
					}
					
					
				}
			}
			xmlhttp.open("GET", url+"wp-face.php?id="+ id, true);
			xmlhttp.send();
	});


	jQuery( "#pack_face2" ).change(function() {

			var id= jQuery(this).val();

			if(id == '')
			{
				document.getElementById("faceF2").innerHTML = '';
				return;
			}
	  
			jQuery("body").css({"position":""});
			document.getElementById("loading").style.display = "block";
			
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function()
			 {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{
					if(xmlhttp.responseText !== "")
					{
						document.getElementById("loading").style.display = "none";
						 jQuery('.customize').addClass('customize1');
						jQuery('.addCart').addClass('addCart1');
						document.getElementById("faceF2").innerHTML = xmlhttp.responseText;					
					
					}
					
					
				}
			}
			xmlhttp.open("GET", url+"wp-face.php?id="+ id, true);
			xmlhttp.send();
	});
	

	jQuery( "#pack_face3" ).change(function() {

			var id= jQuery(this).val();

			if(id == '')
			{
				document.getElementById("faceF3").innerHTML = '';
				return;
			}
	  
			jQuery("body").css({"position":""});
			document.getElementById("loading").style.display = "block";
			
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function()
			 {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{
					if(xmlhttp.responseText !== "")
					{
						document.getElementById("loading").style.display = "none";
						 jQuery('.customize').addClass('customize1');
						jQuery('.addCart').addClass('addCart1');
						document.getElementById("faceF3").innerHTML = xmlhttp.responseText;					
					
					}
					
					
				}
			}
			xmlhttp.open("GET", url+"wp-face.php?id="+ id, true);
			xmlhttp.send();
	});



	jQuery( "#pack_band1" ).change(function() {

			var id= jQuery(this).val();

			if(id == '')
			{
				document.getElementById("bandF").innerHTML = '';
				return;
			}
	  
			jQuery("body").css({"position":""});
			document.getElementById("loading").style.display = "block";
			
			 var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function()
			 {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{
					if(xmlhttp.responseText !== "")
					{
						document.getElementById("loading").style.display = "none";
						jQuery('.customize').addClass('customize1');
						jQuery('.addCart').addClass('addCart1');
						document.getElementById("bandF").innerHTML = xmlhttp.responseText;
						
					}
					
				}
			}
			xmlhttp.open("GET", url+"wp-band.php?id="+ id, true);
			xmlhttp.send();
	});



	jQuery( "#pack_band2" ).change(function() {

			var id= jQuery(this).val();

			if(id == '')
			{
				document.getElementById("bandF2").innerHTML = '';
				return;
			}
	  
			jQuery("body").css({"position":""});
			document.getElementById("loading").style.display = "block";
			
			 var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function()
			 {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{
					if(xmlhttp.responseText !== "")
					{
						document.getElementById("loading").style.display = "none";
						jQuery('.customize').addClass('customize1');
						jQuery('.addCart').addClass('addCart1');
						document.getElementById("bandF2").innerHTML = xmlhttp.responseText;
						
					}
					
				}
			}
			xmlhttp.open("GET", url+"wp-band.php?id="+ id, true);
			xmlhttp.send();
	});


	jQuery( "#pack_band3" ).change(function() {

			var id= jQuery(this).val();

			if(id == '')
			{
				document.getElementById("bandF3").innerHTML = '';
				return;
			}
	  
			jQuery("body").css({"position":""});
		   
			document.getElementById("loading").style.display = "block";
			
			 var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function()
			 {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{
					if(xmlhttp.responseText !== "")
					{
						document.getElementById("loading").style.display = "none";
						jQuery('.customize').addClass('customize1');
						jQuery('.addCart').addClass('addCart1');
						document.getElementById("bandF3").innerHTML = xmlhttp.responseText;
						
					}
					
				}
			}
			xmlhttp.open("GET", url+"wp-band.php?id="+ id, true);
			xmlhttp.send();
	});


	jQuery("#pack22cart").click(function(){


		var arr=new Array();

		if(jQuery("#pack_face1").val() != '' && jQuery("#pack_face2").val() != '' && jQuery("#pack_face3").val() != '' && jQuery("#pack_band1").val() != '' && jQuery("#pack_band2").val() != '' && jQuery("#pack_band3").val() != '')
		{
		
			if (jQuery("#qty").val() != '') 
			{
			
				var qty= jQuery("#qty").val();
				arr['0'] = jQuery("#pack_face1").val();
				arr['1'] = jQuery("#pack_band3").val();
				arr['2'] = jQuery("#pack_face2").val();
				arr['3'] = jQuery("#pack_band2").val();				
				arr['4'] = jQuery("#pack_face3").val();
				arr['5'] = jQuery("#pack_band1").val();
				arr['6'] = arr['0']+"_"+arr['1']+"_"+arr['2']+"_"+arr['3']+"_"+arr['4']+"_"+arr['5'];
				for(var i=0; i<6;i++)
				{
					var myKeyVals = { action: "woocommerce_add_to_cart", product_id:arr[i], quantity: qty,watchId:arr[6]};
					jQuery.ajax({
						type: 'POST',
						url: "https://www.teezeewatches.com/wp-admin/admin-ajax.php",
						data: myKeyVals,
						dataType: "text",
						async: false,
						success: function(resultData)
						{
							
							window.location.reload();
						}
					});
				}
		}
		else
			alert('Please Enter Quantity');
		}
		else
			alert('Please Complete Your Package!');
		
	});


});


	
	 
	