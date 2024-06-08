$(document).ready(function(){
	$("#Addproduct").submit(function (e) {
        e.preventDefault();
  var formData = new FormData(this);
  var name=$('#name').val();
  var slug=$('#slug').val();
  var price=$('#price').val();
  var size=$('#size').val();
  var description=$('#description').val();
  var profile=$('#file').val();
  if(name == ''){
	$('.name_error').html('name is required');
	return false ;
  }else {
	$('.name_error').html('');
  }
  if(slug == ''){
	$('.slug_error').html('slug is required');
	return false ;
  }else {
	$('.slug_error').html('');
  }
  if(price == ''){
	$('.price_error').html('price is required');
	return false ;
  }else {
	$('.price_error').html('');
  }
  if(size == ''){
	$('.size_error').html('size is required');
	return false ;
  }else {
	$('.size_error').html('');
  }
  if(description == ''){
	$('.description_error').html('description is required');
	return false ;
  }else {
	$('.description_error').html('');
  }
  if(profile == ''){
	$('.file_error').html('Profile is required');
	return false ;
  }else {
	$('.file_error').html('');
  }
  $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
            $.ajax({
                type:'POST',
                url:"/Addproduct", 
                data: formData,
                processData: false,
                 contentType: false,
                success: function (data) {
                    console.log(data);
                      $("#Addproduct").trigger('reset');
                },
                
            });
  });
});


// check
$(document).ready(function () {
  $("#check_id").submit(function (e) {
  

    e.preventDefault();
    var formData = new FormData(this);
    var name = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var mobile = $('#mobile').val();
    var gender = $('#gender').val();
    var profile = $('#resume').val();
    if (name == '') {
      $('.nameerr').show();
    }
    else if (email=='') {
      $('.nameerr').hide();
      $('.emailerr').show();
    }
    else if (password=='') {
      $('.nameerr').hide();
      $('.emailerr').hide();
      $('.passerrmsg').show();
    }
    else if (mobile=='') {
      $('.nameerr').hide();
      $('.emailerr').hide();
      $('.passerrmsg').hide();
      $('.mobileerrmess').show();
    }
    else if (gender=='') {
      $('.nameerr').hide();
      $('.emailerr').hide();
      $('.passerrmsg').hide();
      $('.mobileerrmess').hide();
      $('.genddderr').show();
    }
    else if (profile=='') {
      $('.nameerr').hide();
      $('.emailerr').hide();
      $('.passerrmsg').hide();
      $('.mobileerrmess').hide();
      $('.genddderr').hide();
      $('.imgerr').show();
      $('.mobileerr').hide();
    
   
    } else {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type: 'POST',
        url: "/check_insert",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {

          if (data.success == 'success') {
            $('.emailerr').hide()
            swal("Registration", "successfull", "success",);
            $('form').trigger('reset');
            $('.email_error').hide();
            $('.emailerr').hide();
             $('.fileerr').hide();
            console.log(data);
          }
           
          if(data.email_check == 'email_check'){
             $('.emailerr').show();
             $('.fileerr').hide();
          }
          if(data.pdf == 'pdf'){
            $('.emailerr').hide();
            $('.fileerr').show();
         }
        },

      });

    }
  });
});