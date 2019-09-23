<template>
  <div >
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng kí</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form  class="beta-form-checkout">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email" name="email" v-validate="'required|email'" v-model="email">
                            <span class="errr" style="margin-left:15em;">{{ errors.first('email') }}</span>
						</div>

						<div class="form-block">
							<label for="your_last_name">Fullname*</label>
							<input type="text" id="your_last_name" v-model="fullname" name="fullname" v-validate="'required|min:3'">
                            <span class="errr" style="margin-left:15em;">{{ errors.first('fullname') }}</span>
						</div>

						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text" id="adress"  name="address" v-model="address">

						</div>


						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" id="phone" v-model="phone"  name="phone" v-validate="'required|min:8|max:14'" >
                            <span class="errr" style="margin-left:15em;">{{ errors.first('phone') }}</span>
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="text" id="phone"  v-model="password"
                            v-validate="'required|min:6|max:35'"
                            name="password" ref="password">
                            <span class="errr" style="margin-left:15em;">{{ errors.first('password') }}</span>
						</div>
						<div class="form-block">
							<label for="phone">Re password*</label>
							<input type="text" id="phone" v-model="confirm_password"
                              v-validate="'required|confirmed:password'" name="confirm_password" data-vv-as="password">
                            <span class="errr" style="margin-left:15em;">{{ errors.first('confirm_password') }}</span>
						</div>
						<div class="form-block">
							<button  class="btn btn-primary" @click.stop.prevent="dangky()">Đăng Ký</button>
												<div class="them-thanh-cong">
							<span>{{ this.thongbaoUser }}</span>
						</div>
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
            email:'',
            fullname:'',
            address:'',
            phone:'',
            password:'',
			confirm_password:'',
			thongbaoUser:'',

		 }
	 },
	 methods:{
        dangky(){
            var arr={   'name':this.fullname ,
							'gioitinh':this.gioitinh,
						    'email':this.email,
					        'address':this.address,
					        'phone':this.phone,
					        'password':this.password, };
            this.$validator.validateAll().then((valid)=>{
						if(valid){
                            Vue.axios.post('/api/dangky',arr)
						.then(res =>{
							
							this.thongbaoUser=res.data;
							console.log(this.thongbaoUser);
							$('.them-thanh-cong').css('opacity','0.8');
							
						setTimeout(function(){ $('.them-thanh-cong').css('opacity','0.0'); }, 1500);
						})
						.catch(function (error) {
							this.thongbaoUser=error.data;
							$('.them-thanh-cong').css('opacity','0.8');
							
						setTimeout(function(){ $('.them-thanh-cong').css('opacity','0.0'); }, 1500);
						})
                        }
                       
						
				})
        },
		
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
margin: 40px auto;
	    width: 46%;
    text-align: center;
	 padding: 15px 20px;
	 color: #fff;

    font-size: 16px;
	background-color:cadetblue;
    border-radius: 13px;
	z-index: 9999;

	opacity: 0.0;

 }
 .them-thanh-cong span{
	 font-weight: 600;
 }
</style>