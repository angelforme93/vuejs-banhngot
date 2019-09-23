<template>

  <div >
	   <div class="them-thanh-cong">
		  <span>Them gio hang thanh cong</span>
	  </div>
   <div class="rev-slider">
	<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						
						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{ products.lenght }}</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								<div class="col-sm-3" v-for="product in products" :key="product.id">
									<div class="single-item">
										<div class="single-item-header">
											<router-link tag="a" :to="`/product/${product.id}`" ><img :src="`/image/product/${product.image} `"></router-link>
										</div>
										
										<div class="single-item-body">
											<p class="single-item-title">{{ product.name }}</p>
											<p class="single-item-price">
												<span>{{product.unit_price| currency(' Đ', 0, { symbolOnLeft: false }) }}</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left"  @click="abc(product)" ><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								
							</div>
							<div class="row">
							 <paginate
								:page-count="6"
								:page-range="3"
								:margin-pages="2"
								:click-handler="clickCallback"
								:prev-text="'Prev'"
								:next-text="'Next'"
								:container-class="'pagination'"
								:page-class="'page-item'">
							</paginate>
  
							</div>
						
						</div> <!-- .beta-products-list -->

						
					
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> 
  </div>
</template>

<script>
import $ from 'jquery';
import { mapActions } from 'vuex';
import { mapGetters } from 'vuex';  
   export default {
	  data(){
		   return{
			  products:[],
			  
		   }
	   },
	 
	  
	   created:function(){
		   
			this.load_Products();
				
				
	  },
	
	       methods:{
			abc(item) {
			$('.them-thanh-cong').css('opacity','0.8');
			setTimeout(function(){ $('.them-thanh-cong').css('opacity','0.0'); }, 1000);
			this.$store.dispatch('addcart',item) // chú ý đây là lời gọi đến action
				
			
       
	
	

        },

			   load_Products(){
				Vue.axios.get('/api/products')
								.then((res) => {
												this.products=res.data.data;
												
									})
			   },
			clickCallback: function(pageNum) {
					Vue.axios.get('/api/products?page=' + pageNum)
					.then((res) => {
									this.products=res.data.data;
						})
				},
				

				//them gio hang
				

				
				

						
			
						
          
      }  
   }




</script>
<style>
.single-item .single-item-header img{
	width: 300px;
	height: 200px;
	
}
.single-item {
	margin-top: 10px;
}
.success_tb {
	position: absolute;
	/* background-color: aquamarine; */
	padding: 10px 20px;
	left: 20%;
	top:30%;
}
.them-thanh-cong{
	 position: fixed;
	 padding: 15px 20px;
	 color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;
	 left: 42vw;
    top: 15vh;
    font-size: 16px;
    border-radius: 13px;
	z-index: 9999;

	opacity: 0.0;

 }
 .them-thanh-cong span{
	 font-weight: 600;
 }
</style>