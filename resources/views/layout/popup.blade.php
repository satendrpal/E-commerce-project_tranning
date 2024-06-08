<?php

use App\Http\Controllers\HomeController;
use App\Register;
use App\Models\Addproduct;
use App\Models\card;
use App\Models\wishlist;

$total = 0;
$amount_get=0;
$wishlistcount = 0;
if (Session::has('userId')) {
  $user = Register::where('id', '=', Session::get('userId'))->first();
  $user_id = $user->id;
  $amount_get = $user->wallet_amount;
  $user_name = $user->name;
  $total = card::where('user_id', '=', $user_id)->count();
  $wishlistcount = wishlist::where('user_id', '=', $user_id)->count();
  // // $total=HomeController::cardItem();
}

?>
<div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel2">Amount</h4>
				</div>
              
				<div class="modal-body">
          <div class="row">
            <div class="col sm-6" style="padding-left: 12px;">
					<input type="hidden" placeholder="Amount" name="wallet_amount_old" id="wallet_amount_old" value="{{$amount_get}}">
                    <input type="text" placeholder="Amount" name="wallet_amount" id="wallet_amount">
                    </div>  
                    <div class="col sm-6" style="margin-top: -27px; padding-left:255px">
                    <!-- <a href="/user_pdf" style='font-size:24px' title="Excel"> <i class="fa fa-file-pdf-o" style="font-size:30px;color:red"></i> </a> -->
                   
                    </div>
                  </div>
</br>
</br>
                    <span>Current Amount :{{$amount_get}}</span>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btn_send_manager" class="btn btn-success" onclick="wallet_post()" data-dismiss="modal">Add Amount</button>
                </div>
			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->
	<script>


  </script>