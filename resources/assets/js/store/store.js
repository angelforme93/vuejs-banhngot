import Vue from 'vue'
import Vuex from 'vuex';

Vue.use(Vuex);


Vue.use(Vuex)

export const store =new Vuex.Store({
    state :{
      
        product:[],
        cart: JSON.parse(localStorage.getItem('cart')),
        
        Mess:'',
        username:'',
        password:'',
        user:[],
        nguoidung:[],
        
      
    },
    mutations: {
     
      addcart (state,item) {
            var arr = { id:item.id ,
                        name: item.name,
                        qty:1,
                        price:item.unit_price,
                        image:item.image
                         };
                var index=-1;  
             state.cart.forEach(ele=>{
                  if(ele.id==item.id){
                      ele.qty=ele.qty+1;
                      index =1;
                  }
                
               
             })

             if(index != 1){
                state.cart.push(arr);
             }
             localStorage.removeItem('cart');
              localStorage.setItem('cart',JSON.stringify(state.cart));
              state.Mess='ĐÃ THÊM VÀO GIỎ';           
             
          },
          changqty(state,arr){
            var index= arr.index;
            state.cart[index].qty=arr.qty;
            localStorage.removeItem('cart');
            localStorage.setItem('cart',JSON.stringify(state.cart));
          },
          deleteCart(state,arr){
             state.cart.splice(arr.index,1);
             localStorage.removeItem('cart');
             localStorage.setItem('cart',JSON.stringify(state.cart));
          },
          // login(state,token){
          //   state.token=token;
          // }
          
      },
      actions: {
        
        addcart (context,item) {
          context.commit('addcart',item)
        },
        changqty(context,arr){
          context.commit('changqty',arr);

        },
        deleteCart(context,arr){
          context.commit('deleteCart',arr);

        },
        login(context,user){
        Vue.axios.post('/api/login',{
          username:user.username,
          password:user.password,
        })
        .then(response =>{
          console.log(response);
         this.nguoidung=response.data;
       
        })
        .catch(error =>{
          console.log(error);
        })

        }
       
      },
     
    
 
  
})