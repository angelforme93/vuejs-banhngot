<template>
  <div >
    <nav class="main-menu">
					<ul class="l-inline ov">
						<router-link tag="li" to="/"><a>Trang chủ</a></router-link>
						<li><a href="#">Sản phẩm</a>
							<ul class="sub-menu">
								
								<router-link  tag="li" :to="`/category/${cate.id}`" v-for="(cate,index) in category"
								 v-bind:key="index">
									<a>{{ cate.name }}</a>
									</router-link>
								
							</ul>
						</li>
						<li><router-link tag="a" to="/about">Giới thiệu </router-link></li>
						<li><router-link tag="a" to="/contact">Liên hệ</router-link></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
  </div>
</template>

<script>

   export default {
	   data(){
		   return{
			  category:[],
			  
			  
		   }
	   },
	  
      created:function(){
		  
		this.danhsach_category();
	
		
      },
      methods:{
          danhsach_category(){
			Vue.axios.get('/api').then((res) => {
					this.category=res.data;
		})
		  },
       
      }
  }
  

</script>