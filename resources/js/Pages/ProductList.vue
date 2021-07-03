<template>
    <navbar>
        <div class="py-12 bg-white">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1>Product List</h1>

                <div class="container-fluid ">
                    <div class="row align-items-start">
                        <div class="col-lg-2"  v-for="product in products" :key="product.id">
                            <div class="card" :href="`products/${product.id}`" style="width: 12rem;">
                                <a :href="`products/${product.id}`">
                                    <img :src="product.image_url" class="card-img-top" alt="img">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-weight:bold;">{{ product.product_name}}</h5>
                                        <p class="card-text" style="color:#fa591d; font-weight:bold;">Rp {{ product.price.toLocaleString() }}</p>
                                        <p class="card-text"><small class="text-muted">Rating : {{product.rating}} | Terjual: {{product.sold}}</small></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </navbar>
</template>

<script>
    import Navbar from '@/Layouts/Navbar'

    export default {
        props: ['products'],
        components: {
            Navbar,
        },
    }
</script>

<style scoped>
a {
    text-decoration: none;
}
</style>