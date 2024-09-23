<template>
    <nav class="navbar bg-info ">
      <div class="container">
        <a class="navbar-brand text-white"> <b>Kata test Alten</b></a>
        <div class="btn-group dropstart">
          <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-cart-plus-fill"></i> 
            <b> Cart items</b> <span v-if="cartData !== null">{{ cartData.length }}</span>
          </button>
          <ul class="dropdown-menu" v-if="cartData.length >0">
            <li  v-for="product in cartData" :key="product.id">
              <span class="d-flex p-4" >
                <img :src="product.image" width="20" height="20" :alt="product.title">
                <a class="dropdown-item custom__height__text" href="#">{{product.title}}</a>
                <button @click="removeFromCart(product.id)" type="button" class="btn btn-danger">X</button>
              </span>
            </li> 
          </ul>
        </div>
      </div>
    </nav>
</template>
<script>
 export default {
      name: 'Navbar', 
      props: {
        cartData: Object,
      },
      data() {
        return { 
          cartItems:[]
        }
    },
      methods: {
        removeFromCart(productId) {  
            this.cartItems = this.cartData.filter(product => product.id !== productId);
            this.$emit('update-cartItems', this.cartItems);
        }
      },
 
  }

</script>