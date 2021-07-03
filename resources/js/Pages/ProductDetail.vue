<template>
    <navbar>
        <h1>Product Detail</h1>

        <div class="container-fluid">
            <div class="row align-items-start">
                <div class="col-lg-4">
                        <img :src="productDetail.image_url" class="card-img-top" alt="img">
                </div>
                <div class="col-lg-4">
                    <h5 class="card-title">{{ productDetail.product_name}}</h5>
                    <h5>Kategori: {{ productDetail.category.category_name}}</h5>
                    <p class="card-text">{{ productDetail.description }}</p>
                    <p class="card-text">Rating: {{ productDetail.rating }}</p>
                </div>
                <div class="col-lg-1">

                </div>
                <div class="col-lg-3">
                    <p class="card-text">Stok: {{ productDetail.stock }}</p>
                    <p class="card-text">Terjual: {{ productDetail.sold }}</p>
                    <p class="card-text">Rp {{ productDetail.price.toLocaleString() }}</p>
                    
                    <!-- <div v-if="canLogin"> -->
                        <template v-if="$page.props.auth.user" class="text-sm text-gray-700 underline">
                            <a href="#" class="btn btn-primary" v-on:click="addToCart" >Add to cart</a>
                        </template>

                        <template v-else>
                            <inertia-link :href="route('login')" class="text-sm text-gray-700 underline">
                                <a href="#" class="btn btn-primary">Add to cart</a>
                            </inertia-link>
                        </template>
                    <!-- </div> -->
                    <!-- <a href="#" class="btn btn-primary" v-on:click="addToCart">Add to cart</a> -->
                </div>
            </div>
        </div>
    </navbar>
</template>

<script>
    import Navbar from '@/Layouts/Navbar'

    export default {
        props: {
            productDetail: Array,
            canLogin: Boolean,
        },
        components: {
            Navbar,
        },
        methods: {
            addToCart: function() {
                console.log("HERE")
                axios.post('/api/cart', {
                    // user_id: localStorage.getItem("userId"),
                    product_id: `${this.productDetail.id}`,
                    quantity: '1'
                })
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
        },
        beforeCreate() {
            console.log(this.productDetail)
        }
    }
</script>