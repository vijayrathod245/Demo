(function( $ ) {
    'use strict';
 
    $(function() {
		
		//checkall//
			$("#checkall").click(function(){  
				$(".del").prop('checked', $(this).prop("checked"));
			});

			//".del" change 
					$('.del').click(function()
					{ 
						
						if(false == $(this).prop("checked"))
						{ 
							$("#checkall").prop('checked', false); 
						}
						if ($('.del:checked').length == $('.del').length )
						{
							$("#checkall").prop('checked', true);
						}
					});

//checkall//

/* Multipaldelete record */
	$('#deleteall').click(function(e) { 
		var allVals = [];  
        $(".del:checked").each(function() {  
            allVals.push($(this).attr('value'));
        });  
        //alert(allVals.length); return false;
                var join_selected_values = allVals.join(",");
				//alert(join_selected_values); 
                
                $.ajax({   
                  
                    type: "POST",  
                    url: "multipledelete.php",    
                    data: 'ids='+join_selected_values,  
                    success: function(response)  
                    {   
                        //$("#loading").hide();  
                        $("#dataTable_wrapper").html(response);
                        //referesh table
                    }   
                });
        
	});
	/* End multipaldelete */
        jQuery('.deladdmin').click(function(){
            //alert('Hi');
            var id = jQuery(this).attr("value");
            if (confirm("Sure you want to delete this post? This cannot be undone later.")) {
            $.ajax({
                type:'POST',
                url: "result.php",
                data:{
                    'action':'delete',
                    'id':id,
                },
                success: function(data){
                    jQuery('#dataTables_wrapper').html(data);
                    location.reload();
                }
            });
        }
        return false;
        });
        

        jQuery('.popup').click(function(){
            var id = jQuery(this).attr('value');
           // alert(id);
           jQuery('#id').val(id);
           $.ajax({
            type: 'POST',
            url: "result.php",
            data:{
                'action':'select',
                'id':id
            },
            dataType:"JSON",
            success: function(array){
                jQuery('#name').val(array['name']);
                jQuery('#email').val(array['email']);
                jQuery('#password').val(array['password']);
                //jQuery('#image').attr('src');
               // alert(image);
            }
       });

    });

    jQuery('#update').click(function(){
        //alert('Hello');
        var id=jQuery('#id').val();
        //alert(id);
        var name = jQuery('#name').val();
        var email = jQuery('#email').val();
        var password = jQuery('#password').val();
       // var image = jQuery('#image').attr('src');

        $.ajax({
            type:'POST',
            url:"result.php",
            data:{
                'action':'update',
                'id':id,
                'name':name,
                'email':email,
                'password':password //,
               // 'image' :image
            },
            success: function(data){
             //jQuery('#id').val('');
             jQuery("#name").val('');
             jQuery("#email").val('');
             jQuery("#password").val('');
           //  jQuery('#image').attr('src');
             //location.reload();
            }
        });

    });


	/* Login form js */
	/*
	       $("#signup").click(function() {
$("#first").fadeOut("fast", function() {
$("#second").fadeIn("fast");
});
});

$("#signin").click(function() {
$("#second").fadeOut("fast", function() {
$("#first").fadeIn("fast");
});
});


  
         $(function() {
           $("form[name='login']").validate({
             rules: {
               
               email: {
                 required: true,
                 email: true
               },
               password: {
                 required: true,
                 
               }
             },
              messages: {
               email: "Please enter a valid email address",
              
               password: {
                 required: "Please enter password",
                
               }
               
             },
             submitHandler: function(form) {
               form.submit();
             }
           });
         });
         


$(function() {
  
  $("form[name='registration']").validate({
    rules: {
      firstname: "required",
      lastname: "required",
      email: {
        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 5
      }
    },
    
    messages: {
      firstname: "Please enter your firstname",
      lastname: "Please enter your lastname",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      email: "Please enter a valid email address"
    },
  
    submitHandler: function(form) {
      form.submit();
    }
  });
});
*/
/* On click country Display State */
	 $('#country').on('change',function(){
        var countryID = $(this).val();
		//alert(countryID);
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajax_result_state.php',
                data:'country_id='+countryID,
                success:function(data){
                    $('#state').html(data);
                    $('#city').html('<option value="">Choose City...</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Choose Country...</option>');
            $('#city').html('<option value="">Choose State...</option>'); 
        }
    });
	
	/* On click state Display City */
	$('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajax_result_city.php',
                data:'state_id='+stateID,
                success:function(data){
                    $('#city').html(data);
                }
            }); 
        }else{
            $('#city').html('<option value="">Choose City...</option>'); 
        }
    });
	
/* End function */	
	
});
 
})( jQuery );