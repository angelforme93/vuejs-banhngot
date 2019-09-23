import Index from './components/Main.vue';
import Login from './components/main/Login/Login.vue';
import Category from './components/main/category/Category.vue';
import Products from './components/main/products/Products.vue';
import Shopping_cart from './components/main/cart/Cart.vue';
import Search from './components/main/search/Search.vue';
import Dathang from './components/main/Dathang/Dathang.vue';
import About from './components/main/about/About.vue';
import Lienhe from './components/main/lienhe/Lienhe.vue';
import Dangky from './components/main/Login/dangky.vue';
import donhang  from './components/main/Danhsachdonhang.vue';


export const routes =[
    { path:'/' ,name :'index' ,component:Index },
    { path: '/login',name:'user', component:Login },
    { path: '/category/:id',name:'category', component:Category },
    { path: '/product/:id',name:'product', component:Products },
    { path: '/cart',name:'cart', component:Shopping_cart },
    { path: '/search/:key',name:'search', component:Search },
    { path: '/dathang',name:'dathang', component:Dathang },
    { path: '/about',name:'about', component:About },
    { path: '/contact',name:'lienhe', component:Lienhe },
    { path: '/dangky',name:'dangky', component:Dangky },
    { path: '/donhang',name:'donhang', component:donhang },

]