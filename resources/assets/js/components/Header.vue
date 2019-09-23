<template>
  <div >
    
    <div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						<li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>
						<li><router-link tag="a" to="/dangky">Đăng kí</router-link></li>
						<router-link tag="li" to='/login'><a >Đăng nhập</a></router-link>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<router-link tag="a" to='/' id="logo"><img src="assets/dest/images/logo-cake.png" width="200px" alt=""></router-link>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="POST" id="searchform"> 
					        <input type="text" name="search" id="s" placeholder="Nhập từ khóa..." v-model="search" />
					        <router-link tag="button" class="fa fa-search"  id="searchsubmit" :to="`/search/${this.search}`" ></router-link>
						</form> 
					</div>

					<div class="beta-comp">
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng ( {{ quantity_cart() }}) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								
								<div class="cart-item" v-for="item in this.$store.state.cart" :key="item.id">
									<div class="media">
										<a class="pull-left" href="#"><img :src="`/image/product/${item.image}`" ></a>
										<div class="media-body">
											<span class="cart-item-title">{{item.name}}</span>
											
											<span class="cart-item-amount">{{item.qty}} * <span> {{ item.price | currency(' Đ', 0, { symbolOnLeft: false }) }}</span></span>
										</div>
									</div>
								</div>
							
							
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền:{{ this.total_cart() | currency(' Đ', 0, { symbolOnLeft: false }) }} <span class="cart-total-value"></span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<router-link tag="a" :to="`/cart`" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></router-link>
									</div>
								</div>
							</div>
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<Navbar />
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div>
  </div>
</template>

<script>
	import Navbar from './navbar/Nav.vue';
	import jQuery from './../jquery';
   export default {
	   data(){
		   return{
			   Category:[],
			  search:'',
			  cart:JSON.parse(localStorage.getItem('cart')),
		   }
	   },
	   components:{
		   Navbar,
	   },
	   methods:{
		   quantity_cart(){
			   let sum=0;
			   for(var i=0;i<this.$store.state.cart.length;i++){
				   sum = sum + this.$store.state.cart[i].qty;
			   }
			   return sum;
		   },
		   total_cart(){
			   var total=0;
			   
			   for(var i=0;i<this.$store.state.cart.length;i++){
				   total = total + (this.$store.state.cart[i].qty*this.$store.state.cart[i].price);
			   }
			   return total;
		   },
		
		   
	   },
	    created:function(){
				
	  },

	   }
    $(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})


</script>