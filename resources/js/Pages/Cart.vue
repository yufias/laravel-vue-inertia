<template>
    <h1>Shopping cart</h1>

    <div class="container-fluid">
        <div class="row align-items-start">
            <div class="col-lg-10"  v-for="cart in cart" :key="cart.id">
                <div class="card" :href="`products/${cart.id}`">
                    <div class="row">
                        <div class="col-lg-1">
                            <a :href="`products/${cart.product.id}`">
                                <img :src="cart.product.image_url" class="card-img-top" :href="`products/${cart.product.id}`" alt="img" width="80" height="80" >
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a :href="`products/${cart.product.id}`">
                                <h5 class="card-title" style="font-weight:bold;" :href="`products/${cart.product.id}`">{{ cart.product.product_name}}</h5>
                            </a>
                            <p><small class="text-muted">Sisa : {{cart.product.stock}}</small></p>
                            <p style="color:#fa591d; font-weight:bold;">Rp {{ cart.product.price.toLocaleString() }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <!--  -->
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-danger">Delete</button>
                        </div>
                        <div class="col-lg-2">
                            <input type="number" class="form-control quantity" v-model="cart.quantity">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['cart'],
        beforeCreate() {
            console.log(this.cart, "======")
        }
    }
</script>

<style scoped>
a {
    text-decoration: none;
}
</style>