<template>
  <div >
    <table class="table table-hover">
		<thead>
			<tr>
                <th>stt</th>			
                <th>address</th>
                <th>email</th>
                <th>phone_number</th>
                <th>note</th>
                <th>date_order</th>
                <th>total</th>
                <th>payment</th>
                <th>Chi-tiet San pham</th>

			</tr>
		</thead>
		<tbody>
			<tr v-for="(dh,index) in this.donhang" :key={index} >
				<td>{{index +1 }}</td>
                <td>{{dh.email }}</td>
                <td>{{dh.address }}</td>
                <td>{{dh.phone_number }}</td>
                <td>{{dh.note }}</td>
                <td>{{dh.date_order }}</td>
                <td>{{dh.total }}</td>
                <td>{{dh.payment }}</td>
                <td>
                    <ul>
                        <li>{{ dh.name }}</li>
                         <li>{{ dh.unit_price }}</li>
                          <li>{{dh.quantity}}</li>
                    </ul>
                     
                        
                    
                </td>
			</tr>
		</tbody>
	</table>
  </div>
</template>

<script>
import $ from 'jquery';
   export default {
    
	 data(){
		 return {
			donhang:[],
		 }
     },
     mounted(){
         this.loadDH();
     },
	 methods:{
		loadDH(){
            Vue.axios.get('/api/dsdonhang')

        .then(res =>{
         
        this.donhang=res.data;
        })
        
        }
	 }
   }
</script>
<style>
td.a{
    margin-left: 10px;
}
</style>
