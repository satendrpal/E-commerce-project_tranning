<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a{
            text-decoration:none;
            color: #525293;
        }
        #myImage {
    background-image:  url('data:images/px-conversions/1.webp;base64,iVBOR...[some more encoding]...rkggg==');
    width: 160px;
    height: 48px
}

.alt-image {
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
}

.background-image{
background: url ("images/px-conversions/3.webp") no-repeat; 
width:100%;
height:500px;
position:relative;
}

        </style>
</head>
    <body>
<div class="container">
        <div class="row">
          <div class="col">
          <spna>Thank you for reaching out to Mawai Infotech Limited. </spna>
          </div>
          <br>  
   <div class="py-2">
<span>Your message has been received, and we appreciate your interest in connecting with us. Our team will review your inquiry shortly and will be in touch soon to address your questions or requests. We look forward to the possibility of engaging with you.</span> 
</div>
<h4>Thanks & Regards</h4>
<h4 style="color: #525293;">Manish Panday</h4>
<h4 style="color: #525293;">Mawai Infotech Limited</h4>
<div class="col md-6 py-2">
   <a href="tel:7389823972"><span class="text-primary"><img src="cid:images/px-conversions/phone.jpg" aria-label="mawai Logo" width="60" height="30" class="img-fluid" alt="">7389823972</span></a>
<a href ="milto:manish@mawaimail.com" style="margin-left: 40px;"><span class="text-primary"><i class="fa fa-envelope" aria-hidden="true"></i>manish@mawaimail.com</span></a>
</div>
<div class="row py-2" style="margin-top: 20px;">
<div class="col md-6">
<a href="tel:0120 485 2000"><i class="fa fa-mobile" aria-hidden="true"></i><span >0120 485 2000</span></a>
    <a href="https://www.mawai.com/" style="margin-left: 23px;"><span class="text-primary"><i class="fa fa-mobile" aria-hidden="true"></i>https://www.mawai.com/</span></a>
    </div>
</div>

<div class="row py-2" style="margin-top:20px">
<!-- <div class="col md-6">
<span><i class="fa fa-map-marker" aria-hidden="true"></i>7543984945</span>
    </div> -->
    <div>
<span class="text-primary"><i class="fa-brands fa-facebook"></i></span>
    </div>
    <div>
<span class="text-primary"><i class="fa-brands fa-linkedin"></i></span>
    </div>
</div>

<hr>
<img src="{{$message->embed('images/px-conversions/1.webp')}}" aria-label="mawai Logo"   class="img-fluid" alt=""style="width:160px;height:48px;background-color:#fff">
<img src="{{$message->embed('images/px-conversions/3.webp')}}" aria-label="mawai Logo" class="img-fluid" alt=""style="width:160px;height:48px">

</div>
</div>
</div>
</body>
</html>


