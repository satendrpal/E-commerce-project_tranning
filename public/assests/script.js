$(document).ready(function(){
	$("#Addproduct").submit(function (e) {
        e.preventDefault();
  var formData = new FormData(this);
  var name=$('#name').val();
  var slug=$('#slug').val();
  var price=$('#price').val();
  var color=$('#color').val();
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
	$('.slug_error').html('category is required');
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
  if(color == ''){
    $('.color_error').html('color is required');
    return false ;
    }else {
    $('.color_error').html('');
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
                url:"/Addproductas", 
                data: formData,
                processData: false,
                 contentType: false,
                success: function (data) {
                    console.log(data);
                    swal("Registration", "successfull", "success", );
                    $('form').trigger('reset');
                      $("#Addproduct").trigger('reset');
                },
                
            });
  });

// update product

$("#update_product").submit(function (e) {
  e.preventDefault();
var formData = new FormData(this);
var name=$('#name').val();
var slug=$('#slug').val();
var price=$('#price').val();
var size=$('#size').val();
var description=$('#description').val();

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

$.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          });
      $.ajax({
          type:'POST',
          url:"/update_product", 
          data: formData,
          processData: false,
           contentType: false,
          success: function (data) {
              console.log(data);
              swal("Update", "successfull", "success", );
              $('form').trigger('reset');
                $("#Addproduct").trigger('reset');
          },
          
      });
});
});



$(document).ready(function(){
  $('#category_btn').click(function(e){
        e.preventDefault()
    var category_name= $("#category_name").val();
    var slug= $("#slug").val();
    var status= $("#status").val();
    console.log(category_name)
    $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });
    $.ajax({
      url:'/category_insert',
      type: "POST",
      data: {
        category_name: category_name,
        slug:slug,
        status:status,
    },
      success: function (data) {
          console.log(data) 
          swal("Registration", "successfull", "success", );
          $('form').trigger('reset');
      },
      error: function (data) {
          console.log('Error:', data);
          $('#saveBtn').html('Save Changes');
      }
  });
});

$('.minus-btn').on('click', function() {
  // e.preventDefault();
  
  var $this = $(this);
  var prices = parseFloat($('#totalprice').text());
  var price = parseFloat($('.total-price').text());
  var $input = $this.closest('div').find('input');
  var value = parseInt($input.val());
  var minus = value - 1;
  var minusvalue=$input.val(minus);
  var minusproductprice = price * minus; 
  $('#totalprice').text(minusproductprice.toFixed(2));
});

$('.plus-btn').on('click', function() {
  var $this = $(this);
  var price = parseFloat($('.total-price').text());
  var $input = $this.closest('div').find('input');
  var value = parseInt($input.val());
  var data = value + 1;
  $input.val(data);
  var productprice = price * data; // Multiply the numeric price by the numeric data
  $('#totalprice').text(productprice.toFixed(2)); // Display the product price as a string with 2 decimal places
});
})

function active(id){

    var status = $(this).prop('checked') == true ? "Active" : "Inactive"; 
    var user_id = $(this).data('id'); 
    $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });
    $.ajax({
        type: "post",
        dataType: "json",
        url: '/changeStatus',
        data: {'status': status, 'user_id': id},
        success: function(data){
          window.location.reload()
          console.log(data.success)
        }
    });

}

function inactive(id){

  // var status = $(this).prop('checked') == true ? "Active" : "Inactive"; 
  var user_id = $(this).data('id'); 
  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
  $.ajax({
      type: "post",
      dataType: "json",
      url: '/changeStatus',
      data: {'status': "active", 'user_id': id},
      success: function(data){
        window.location.reload()
        console.log(data.success)
      }
  });

}

function delivey_get(id )
{
    $('#product_order_get').val(id)

}

function delivery_post(){
  var product_id= $('#product_order_get').val()

  var select_option= $('#select_option').val()
  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
  $.ajax({
      type: "post",
      dataType: "json",
      url: '/delivery_update',
      data: { 
      
      'select_name': select_option,
      'id': product_id,
    },
      success: function(data){
        window.location.reload()
        console.log(data)
      }
  });

}


$(document).ready(function() {
  $('#example').DataTable();
} );


