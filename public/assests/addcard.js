$('document').ready(function(){
 
    // for registration begins
    $('#signUpForm').submit(function(e){
        e.preventDefault();
        var form_data= new FormData(this);

        var name=$("#name").val();
        var email=$("#email").val();
        var password=$("#password").val();
        var mobile=$("#mobile").val();
        var phonenumber=mobile.toString().length;
        var address=$("#address").val();
        var image=$("#file").val();

        if(name == ""){
            $('.nameerr').show();
        }else if(email ==""){
            $('.emailerr').show();
            $('.nameerr').hide();
        }else if(password ==""){
            $('.passerrmsg').show();
            $('.nameerr').hide();
            $('.emailerr').hide();
        }else if(mobile ==""){
            $('.mobileerr').show();
            $('.nameerr').hide();
            $('.emailerr').hide();
            $('.passerrmsg').hide();
        }else if((phonenumber !== 10)){
            $('.mobileerr').show();
            $('.nameerr').hide();
            $('.emailerr').hide();
            $('.passerrmsg').hide();
        }else if(address ==""){
            $('.adderr').show();
            $('.nameerr').hide();
            $('.emailerr').hide();
            $('.passerrmsg').hide();
            $('.mobileerr').hide();
        }else if(image== ""){
            $('.imgerr').show();
            $('.nameerr').hide();
            $('.emailerr').hide();
            $('.passerrmsg').hide();
            $('.mobileerr').hide();
            $('.adderr').hide();
        }else{
            $('.nameerr').hide();
            $('.emailerr').hide();
            $('.passerrmsg').hide();
            $('.mobileerr').hide();
            $('.adderr').hide();
            $('imgerr').hide();

            $.ajax({
                url:"/userInsert",
                type:'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:form_data,
                processData:false,
                contentType:false,
                success:function(response){
                    console.log(response);
                    if (response == 1) {
                        swal("Thank You...", "Your Registration Succefully Done", "success",);
                        $('#signUpForm').trigger('reset');
                        $('.emailerr2').hide();
                    } else if(response == 0) {
                        $('.emailerr2').show();
                    }else if(response == 2) {
                        swal("Oops...", "Something Went Wrong", "error",);
                        $('.emailerr2').hide();
                    }
                },
            })      
        }
    })
    // for registration ends

    // for login

    $('#loginForm').on('submit',function(e){
        e.preventDefault();
        var mail=$('#email').val();
        var pass=$('#password').val();
        $.ajax({
            url:'/login',
            method:'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{
                email:mail,
                Password:pass
            },
            success:function(response){
                console.log(response);
              if(response=="0"){
                $('.errorEmail').show();
                $('.errorPass').hide();
              }
              if(response =="1"){
                $('.errorPass').show();
                $('.errorEmail').hide();
              }
              if(response =="user"){
                $('.errorEmail').hide();
                $('.errorPass').hide();
                swal("Login-SuccesFully", "Welcome", "success",);
                $('#login-modal').modal('hide');
                $('#loginForm').trigger('reset');
              }
              if(response =="admin"){
                $('.errorEmail').hide();
                $('.errorPass').hide();
                $('#loginForm').trigger('reset');
                window.location.href = "http://127.0.0.1:8000/adminview";
              }
            }
        })
    })

    // for login ends

    //for admin add items

    $('#addItem').on('submit',function(e){
        var form_data=new FormData(this);
        e.preventDefault();
        var pCategeroy=$('#categeroy').val();
        var pName=$('#name').val();
        var pdiscription=$('#discription').val();
        var pPrice=$('#price').val();
        var pImage=$('#image').val();

        if(pCategeroy== ""){
            $('.caterror').show();
        }else if(pName==""){
            $('.nameerror').show();
            $('.caterror').hide();
        }else if(pdiscription==""){
            $('.discriptionerror').show();
            $('.caterror').hide();
            $('.nameerror').hide();
            $('.priceerror').hide();
            return false;
        }else if(pPrice==""){
            $('.priceerror').show();
            $('.caterror').hide();
            $('.nameerror').hide();
            $('.discriptionerror').hide();
        }else if(pImage==""){
            $('.imgerr').show();
            $('.caterror').hide();
            $('.nameerror').hide();
            $('.priceerror').hide();
            $('.discriptionerror').hide();
        }else{
            $('.caterror').hide();
            $('.nameerror').hide();
            $('.priceerror').hide();
            $('.imgerr').hide();
            $('.discriptionerror').hide();
            $.ajax({
                url:'adminAddItems',
                method:'post',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:form_data,
                processData:false,
                contentType:false,
                success:function(response){
                    console.log(response);
                    if(response ==1){
                        $('#success').show();
                        $('form').trigger('reset');
                        setTimeout(function(){
                            $("#success").fadeOut('slow');
                        },3000);
                        $('#error').hide();
                    }if(response ==0){
                        $('#error').show();
                    }
                }
            })
        }
    })

    //Welcome page ajax

    //addTocart page

    $('#addToCart').click(function(e){
        e.preventDefault();
        var noOfItem=$('#buyItem').val();
        var productid=$('#productid').val();
        if(noOfItem <= 0){
            $('.itemError').show();
        }else{
            $('.itemError').hide();
        $.ajax({
            url:"/loginCheck",
            type:'POST',
            dataType: 'JSON',
            data:{
                noOfItem:noOfItem,
                productid:productid
            },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success:function(response){
                console.log(response.data);
                if (response.response == 1) {
                    $('.aa-cart-notify').text(response.data)
                    // $('.aa-cart-notify').html('1');
                }
                if(response == 0) {
                    window.location.href = "http://127.0.0.1:8000/login";
                    // $('#login-modal').modal('show');
                }
            },
        })  
        }
    })

    $('#button-addon2').on('click',function(e){
        
        e.preventDefault();

        addValue = 0;

        var noOfItem=$('#buyItem').val();
            ++noOfItem;
        var addvalue= noOfItem + addValue;

        var Item=$('#buyItem').val(addvalue);
        // console.log(Item);


    })

    $('#button-addon1').on('click',function(e){
        e.preventDefault();

        addValue = 0;

        var noOfItem=$('#buyItem').val();
        if(noOfItem <= 1){
            var noOfItem=$('#buyItem').val();
        }else{
            --noOfItem;
            var addvalue= noOfItem + addValue;
    
            var Item=$('#buyItem').val(addvalue);
        }
    })



    $('#wishIcon').click(function(e){
     
        e.preventDefault();
       
        var productid = $('#product_id').val();
        var quantity = $('#buyItem').val();
        $.ajax({
            url: "/addwishlist",
            type: 'POST',
            dataType: 'JSON',
            data: {
                quantity:quantity,
                  product_id:productid,
                    wishlist:"wishlist"
                },
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function (response) {
                  
                    console.log(response);
                    if (response== 1) {
                        window.location.reload()
                        $("#wishIcon").removeClass("fa fa-heart-o");
                        $("#wishIcon").addClass("fa fa-heart");
                    }
                    if(response ==0){
                      
                        $("#wishIcon").addClass("fa fa-heart");
                    }
                    if (response == 0) {
                        window.location.reload()
                        window.location.href = "http://127.0.0.1:8000/login";
                    }
                },
        })

    })


});




function btn2(id1){
    
    addValue = 0;
    var quantity=$('.quantity').val();
    var noOfItem=$('#buyItem'+id1).val();
    if(noOfItem <= 1){
        var noOfItem=$('#buyItem'+id).val();
    }else{
        --noOfItem;
        var addvalue= noOfItem ;
        // $(this+id1).attr(addvalue)
        var Item=$('#buyItem'+id1).val(addvalue);
    }
    getdata(id1 ,noOfItem)
    total_neg(id1)
}

function btn(id){
    addValue = 0;
    var quantity=$('.quantity'+id).val();
     
    var noOfItem=$('#buyItem'+id).val();
        ++noOfItem;
    var addvalue= noOfItem+addValue;

  //   $(this+id).attr(addvalue)
    var Item=$('#buyItem'+id).val(addvalue);
    // console.log(Item);
    getdata(id ,noOfItem)
    totalval(id , item)
  }
function getdata(get_id,noOfItem_get){
    var sum = noOfItem_get;
    var row =$('#row'+get_id).val();
    item= row*noOfItem_get
    var get=$('.get').val();
    $('.text-muted'+row).each(function(){
        quantity = sum;   
    });
    $(".get").each(function(){
        // item = quantity*parseInt(get);      
    });
    $('.h5'+get_id).html('₹'+item);
    $('.text-muted'+get_id).html(noOfItem_get+'/Per Item');
    $('#buy_now'+get_id).val(noOfItem_get);
    $('#quantity'+get_id).val(noOfItem_get);
    $('#total').val(sum);
    quantity_update(get_id)
}
  
function totalval(total_id,val){
    total=0
       var inputs =   $('#get'+total_id).val();
       var totalval =   $('#totalprice_get').val(); 
              var a =parseInt(totalval)
              var b =parseInt(inputs)
                  total=a+b
                  $('.price').html('₹'+total)
                   $('#totalprice_get').val(total)
                 
 
}
function total_neg(neg_id,val){
    total=0
       var inputs =   $('#get'+neg_id).val();
       var totalval =   $('#totalprice_get').val(); 
              var a =parseInt(totalval)
              var b =parseInt(inputs)
                  total=a-b
                  $('.price').html('₹'+total)
                   $('#totalprice_get').val(total)
                 
 
}
function quantity_update(qut_id){
   
    var card_id = $('#card_id'+qut_id).val();
    var quantity = $('#quantity'+qut_id).val();
   
    $.ajax({
        url:"/quantity_update",
        type:'POST',
        dataType: 'JSON',
        data:{
            id:card_id,
            quantity:quantity
        },
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success:function(response){
                            
}
    })
}
function rating_get(id) {
    console.log(id)

    $.ajax({
      url: '/rating_get',
      type: "get",
      dataType: 'JSON',
      data: {
        userid: id,
      },
      success: function (response) {
        console.log(response.data.user_id)
        $('#user_id').val(response.data.user_id)
        $('#product_id').val(response.data.product_id)
        $('#message').val(response.data.id)
        $('#status').val(response.data.status)
      },
    });
  }

  function send_rating() {

    var user_id = $('#user_id').val();
    var product_id = $('#product_id').val();
    var rating =  $('input[name="rate"]:checked').val();
    

    console.log(rating)
    if (rating == '') {
      $('#cancelerrorr').html('Please Fill the Reasons')
    } else {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url: '/send_rating',
        type: "POST",
        dataType: 'JSON',
        data: {

         user_id: user_id,
         product_id: product_id,
         rating: rating,
        },
        success: function (response) {
          console.log(response)
          window.location.reload()
          $('#exampleModalsss').modal('hide');
        
        },
      });
    }
  }


  function get_cate(cat_id ,cat_name)
{
  
    $.ajax({
        url: '/get_cate',
        type: "get",
        dataType: 'JSON',
        data: {
            cat_id: cat_id,
        },
        success: function (response) {
            console.log(response)
            $("#men").append('')

             var rating=0;
            var str="";
            for (var i = 0; i < response.data.length; i++) {
                if (response.data[i].rating_count !=null)
                {
                    rating = response.data[i].rating / response.data[i].rating_count; 
                    check_rating = parseFloat(rating).toFixed(1);
                   
                 }
               else
               {
                check_rating = 0
               }
                 

               // $("#men").append("");     
                   // $(".card-imgsss").html('<img src="/Addproduct/'+response.data[i].profile+'" class="card-img" />')
                   // $(".text-titless").html('<p>'+response.data[i].name+'</p>')
                   // $(".text-price").html('<p>'+response.data[i].price+'</p>')
                     
                   str+=" <div class='col-lg-4 col-md-12 mb-6'>";
                   str+="<div class='card'>";
                    str+=" <div class='card-imgsss'> <img src='/Addproduct/"+response.data[i].profile+"' class='card-img' />";
                   str+="  </div>";
                    str+=" <div class='card-info'>";
                    str+="   <p class='text-titless'>"+response.data[i].name+"</p>";
                     str+="  <p class='text-body'></p>";
                    str+=" </div>";
                    str+=" <div class='card-footer'>";
                    str+="   <span class='text-price'>₹"+response.data[i].price+"</span>";
                    str+="   <div class='card-button'>";
                    str+="     <a href=''>";
                    str+="       <a href='/Addtocardview/"+response.data[i].id+"'><button type='submit' class='btn btn-add-to-cart small-padding'><i class='fa-solid fa-cart-shopping'></i> <span class='fs14 fw6 text-uppercase text-up-4'>Add To Cart</span></button></a>"; 
                    str+="     </a>";
                    str+="   </div>";
                   str+="  </div>";
                   if(response.data[i].rating_count !=''){
                    str+="  <span class='text-rate' id='rating'>"+check_rating+"<i class='fa fa-star' aria-hidden='true'></i></span>"
                   }
                   else{
                    str+="  <span class='text-ratess' id='rating'><i class='fa fa-star-o' aria-hidden='true'></i></span>"
                   }
                 
                  str+=" </div> </div>";
            }
       $('#rowdata').html(str);
        },
      });
}


   function wallet_post(){
    var product_id = $('#wallet_amount').val();
    
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/wellet_get',
        type: "post",
        dataType: 'JSON',
        data: {
            wallet_amount: product_id,
        },
        success: function (response) {
            window.location.reload()
          console.log(response)
          $('#wallet_amount_old').val(response.data.wallet_amount)

        },
      });
}





