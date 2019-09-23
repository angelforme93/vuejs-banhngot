<template>
  <div>
	 
      <div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form method="post" class="beta-form-checkout"  >
				<div class="row">
					<div class="col-sm-6">
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Họ tên*</label>
							<input type="text"  id="name"  v-validate="'required|min:3'" placeholder="Họ tên" v-model="name" name="name">
							<span class="errr" style="margin-left:15em;">{{ errors.first('name') }}</span>
						</div>
						<div class="form-block">
							<label>Giới tính </label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked style="width: 10%" v-model="gioitinh"><span style="margin-right: 10%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%" v-model="gioitinh"><span>Nữ</span>
										
						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email" v-validate="'required|email'" name="email" placeholder="expample@gmail.com" v-model="gmail">
							<span class="errr" style="margin-left:15em;">{{ errors.first('email') }}</span>
						</div>

						<div class="form-block">
							<label for="adress" >Địa chỉ*</label>
							<input type="text" id="adress" placeholder="Street Address" required v-model="address">
						</div>
						

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" id="phone" required v-model="phone">
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea id="notes" v-model="notes"></textarea>
						
						</div>
						
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
										<div class="media" v-for="(item,index) in cart" :key="index">
											<img width="25%" :src="`/image/product/${item.image}`" class="pull-left">
											<div class="media-body">
												<p class="font-large">{{ item.name }}</p>
												<span class="color-gray your-order-info">Price: {{ item.price | currency(' Đ', 0, { symbolOnLeft: false }) }}</span>
												
												<span class="color-gray your-order-info">Qty: {{ item.qty }}</span>
											</div>
										</div>
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">{{ this.total_cart() | currency(' Đ', 0, { symbolOnLeft: false }) }}</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="" v-model="thanhtoan">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="" v-model="thanhtoan">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Nguyễn A
											<br>- Ngân hàng ACB, Chi nhánh TPHCM
										</div>						
									</li>
									
								</ul>
							</div>

							<div class="text-center d_hang" ><a class="beta-btn primary" @click="dathang(),validate()" >Đặt hàng <i class="fa fa-chevron-right"></i></a></div>
							<div class="them-thanh-cong">
		  <span>{{ this.thongbao }}</span>
	  </div>
						</div> <!-- .your-order -->
					</div>
				</div>
				
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

  </div>
</template>

<script>
import $ from 'jquery';
   export default {
	   data(){
		   return{
			  cart:this.$store.state.cart,
			  
				
				name:'',
				gioitinh:'',
						gmail:'',
					  address:'',
					  phone:'',
					  notes:'',
					  thanhtoan:'',
					  thongbao:'',
					  
				
              
			 
		   }
	   },
	   mounted:function(){
		 
	  },
	
	       methods:{
			  
			
                 total_cart(){
			   var total=0;
			   
			   for(var i=0;i<this.$store.state.cart.length;i++){
				   total = total + (this.$store.state.cart[i].qty*this.$store.state.cart[i].price);
			   }
			   return total;
		   },

			dathang(){
				var arr={   'name':this.name ,
							'gioitinh':this.gioitinh,
						    'gmail':this.gmail,
					        'address':this.address,
					        'phone':this.phone,
					        'notes':this.notes,
					        'thanhtoan':this.thanhtoan,  };
					  var arrproduct=this.cart;
					  var total=this.total_cart();
				this.$validator.validateAll().then((valid)=>{
						if(valid){
							Vue.axios.post('/api/dathang',{
									arr,arrproduct,total
								})
								.then(res =>{
									this.thongbao='ĐẶT HÀNG THÀNH CÔNG';
									$('.them-thanh-cong').css('opacity','0.8');
						setTimeout(function(){ $('.them-thanh-cong').css('opacity','0.0'); }, 1500);
									this.$store.state.cart=[];

									 localStorage.setItem('cart',JSON.stringify(this.$store.state.cart));

					})
						}
						else{
							this.thongbao='ĐẶT HÀNG THẤT BẠI';
							
									$('.them-thanh-cong').css('opacity','0.8');
						setTimeout(function(){ $('.them-thanh-cong').css('opacity','0.0'); }, 1500);
						}
				})
			
				
					
					
					
					
					
			},
		
		   },
   }

</script>
<style>

span.errr {
	font-size: 13px;
   color: tomato;
   margin-top: 10px;
}
 .d_hang{
	 cursor: pointer;
 }
.them-thanh-cong{
margin: 40px auto;
	    width: 46%;
    text-align: center;
	 padding: 15px 20px;
	 color: #fff;
    background-color: #5cb85c;
  
	
    font-size: 16px;
    border-radius: 13px;
	z-index: 9999;

	opacity: 0.0;

 }
 .them-thanh-cong span{
	 font-weight: 600;
 }
</style>