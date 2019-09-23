<template>
  <div >
    	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng nhập</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng nhập</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form class="beta-form-checkout">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
					
						<h4>Đăng nhập </h4>
						<div class="space20">&nbsp;</div>

							<div class="them-thanh-cong">
							<span> Tài khoản hoặc mật khẩu không đúng </span>
						</div>
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email" v-validate="'required|email'" v-model="username" name="email"> 
							<span class="errr" style="margin-left:15em;">{{ errors.first('email') }}</span>
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" id="phone" v-validate="'required|min:6'" v-model="password" name="password">
							<span class="errr" style="margin-left:15em;">{{ errors.first('password') }}</span>
						</div>
						<div class="form-block">
							<button @click.prevent="login()" class="btn btn-primary">Login</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
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
		 return {
			 username:'',
			 password:'',
			 thongbao:'',
			 User:[],
			 
			 
		 }
	 },
	 methods:{
		 login(){
			 this.$validator.validateAll().then((valid)=>{
				 if(valid){
					 
					 this.$store.dispatch('login',{
							username:this.username,
							password:this.password,
				})
				.then(res =>{
							
							this.$router.push('/donhang');
							
						})
						
						.catch(function (error) {
							
						$('.them-thanh-cong').css('opacity','1.0');
						setTimeout(function(){ $('.them-thanh-cong').css('opacity','0.0'); }, 1500);
							
						})
						

				 }
			 })
			
		 }
	 }
   }
</script>
<style>
input{
	height: 40px;
}
	span.errr {
	font-size: 13px;
   color: tomato;
   margin-top: 10px;
}
.them-thanh-cong{
    margin: 12px 200px;
    
    width: 58%;
    text-align: center;
    padding: 9px 10px;
	 color: #f4511e;
	
	opacity: 0.0;
    font-size: 15px;
    border-radius: 13px;
	z-index: 9999;
 }
 .them-thanh-cong span{
	 font-weight: 600;
 }
</style>