<template>
  <div >
	   <div class="them-thanh-cong">
		  <span>Them gio hang thanh cong</span>
	  </div>
    		<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu" >
							<li v-for="cate in category" :key="cate.id"><router-link tag="a" :to="'/category/' + cate.id " >{{ cate.name }}</router-link></li>
							
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{ products.lenght}}</p>
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
												<span>{{product.unit_price | currency(' D', 0, { symbolOnLeft: false }) }}</span>
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
						</div> <!-- .beta-products-list -->

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
  

					
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
  </div>
</template>

<script>
import $ from 'jquery';
   export default {
	   data(){
		   return{
			  products:[],
			  category:[],
			 
		   }
	   },
	   mounted:function(){
		  this.load_Products();
		  this.load_Category();
	
	  },
	
	       methods:{
			   	abc(item) {
					   $('.them-thanh-cong').css('opacity','0.8');
			setTimeout(function(){ $('.them-thanh-cong').css('opacity','0.0'); }, 1000);
            this.$store.dispatch('addcart',item) // chú ý đây là lời gọi đến action
        },
			   load_Products(){
				Vue.axios.get('/api/category/' + this.$route.params.id )
								.then((res) => {
												this.products=res.data.data;
												
									})
									
			   },
			   load_Category(){
				   Vue.axios.get('/api')
								.then((res) => {
												this.category=res.data
												
									})
			   },
			   
			clickCallback: function(pageNum) {
					Vue.axios.get('/api/category/'+ this.$route.params.id + '?page=' + pageNum)
					.then((res) => {
									this.products=res.data.data;
						});
				},
		// 		 changeNicknameProperly() {
        //     Vue.set(this.id);
        // }
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
.single-item .single-item-title{
	font-size: 12px;
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