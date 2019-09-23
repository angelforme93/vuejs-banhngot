<template>

  <div >
    <div class="them-thanh-cong">
		  <span>Them gio hang thanh cong</span>
	  </div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm Tìm thấy với từ khoá :{{ this.$route.params.key }}</h4>
							<div class="beta-products-details">
								<p class="pull-left"></p>
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
												<span>{{product.unit_price}}</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" @click="abc(product)"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								
							</div>
						
							 <paginate
								:page-count="5"
								:page-range="3"
								:margin-pages="2"
								:click-handler="clickCallback"
								:prev-text="'Prev'"
								:next-text="'Next'"
								:container-class="'pagination'"
								:page-class="'page-item'">
							</paginate>
  

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
   export default {
	  data(){
		   return{
			  products:[],
			  search:'',
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
				Vue.axios.get('/api/search/' + this.$route.params.key )
								.then((res) => {
												this.products=res.data.data;
												
									})
									
			   },
			   	clickCallback: function(pageNum) {
					Vue.axios.get('/api/search/'+ this.$route.params.key + '?page=' + pageNum)
					.then((res) => {
									this.products=res.data.data;
						});
				},
				//them gio hang
				
		
          
	  },
	  watch: {
			'$route': 'load_Products'
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
</style>