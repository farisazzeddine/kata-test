<template> 
<div class="container-fluid p-0">
  <navbar :cartData="cartItems" @update-cartItems="updateCart" />
  <div class="row">
    <div class="col-md-4 col-lg-3 col-xl-2 mb-3 mb-md-4 p-2 d-flex align-items-stretch" v-for="product in products" :key="product.id">
      <div class="card p-2 m-2">
        <img :src="product.image" class="card-img-top img-thumbnail custom__height__img"   :alt="product.title">
        <div class="card-body d-grid gap-2" >
            <h5 class="card-title custom__height__text">{{ product.title }}</h5> 
            <p class="card-text custom__height__descrip">{{ product.description }}</p>
            <h6 class="text-end text-warning">${{ product.price }}</h6>
          <div class="d-grid gap-2" style="height: 38px;">
            <button @click="addToCart(product.id)" type="button" class="btn btn-outline-success">
              <i class="bi bi-cart-plus-fill"></i>
              <b>Add to Cart</b>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
       
  </template>
  
  <script> 
  export default { 

    data() {
      return {
        products:[],
        product:[],
        cartItems:[]
      }
    },
    methods: {
        retriveProducts(){
         return fetch('http://localhost:8080/api/products')
            .then(response => response.json())
            .then(data => { 
            this.products = {...data};
            })
            .catch(error => {
            console.error('Error fetching data:', error);
            });
        },
        async retirveProductById(id,addToCart){
            try {
                const response = await  fetch(`http://localhost:8080/api/product/${id}`);
                if (!response.ok) {
                    throw new Error(`Response status: ${response.status}`);
                } 
                const json = await response.json();  
                if(addToCart){
                    if(this.cartItems.length<5){ 
                        this.cartItems.push(json)
                        localStorage.setItem("cartItems",JSON.stringify(this.cartItems));
                    }
                }
            } catch (error) {
                console.error(error.message);
            }
        },
          addToCart(productId) {           
             this.retirveProductById(productId,true);
        },
        updateCart(cartItemsRecived) {
            this.cartItems = cartItemsRecived;
        }
    },
    created() {
        this.retriveProducts()
    }
 
  }
  </script>