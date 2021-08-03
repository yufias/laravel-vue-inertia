<template>
    <navbar>
        <h1>Product Detail</h1>

        <div class="container-fluid">
            <div class="alert alert-success" role="alert" v-if="success" id="alert-success">
                This is a success alert—check it out!
            </div>
            <div class="row align-items-start">
                <div class="col-lg-4">
                    <img :src="productDetail.image_url" class="card-img-top" alt="img">
                </div>
                <div class="col-lg-4">
                    <h5 class="card-title">{{ productDetail.product_name}}</h5>
                    <h5>Kategori: {{ productDetail.category.category_name}}</h5>
                    <p class="card-text">{{ productDetail.description }}</p>
                    <p class="card-text">Rating: {{ productDetail.rating }}</p>
                    <p class="card-text">Counter VUEX: {{ $store.state.count }}</p>
                    <a href="#" class="btn btn-primary" v-on:click="addCount" >Add Counter</a>
                    <a href="#" class="btn btn-primary" v-on:click="resetCount" >Reset Counter</a>
                </div>
                <div class="col-lg-1">

                </div>
                <div class="col-lg-3">
                    <p class="card-text">Stok: {{ productDetail.stock }}</p>
                    <p class="card-text">Terjual: {{ productDetail.sold }}</p>
                    <p class="card-text">Rp {{ productDetail.price.toLocaleString() }}</p>
                    
                    <!-- <div v-if="canLogin"> -->
                        <template v-if="$page.props.auth.user" class="text-sm text-gray-700 underline">
                            <a href="#" class="btn btn-primary" v-on:click="cart" >Add to cart</a>
                        </template>

                        <template v-else>
                            <inertia-link :href="route('login')" class="text-sm text-gray-700 underline">
                                <a href="#" class="btn btn-primary">Add to cart</a>
                            </inertia-link>
                        </template>

                        <div class="text-center" v-if="loading">
                            <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    <!-- </div> -->
                    <!-- <a href="#" class="btn btn-primary" v-on:click="addToCart">Add to cart</a> -->
                </div>
            </div>
        </div>
    </navbar>
</template>

<script>
    import Navbar from '@/Layouts/Navbar'
    import { mapState, mapMutations, mapActions } from 'vuex'

    export default {
        data () {
            return {
                dismissSecs: 1,
                success: false,
                loading: false
            }
        },
        props: ['productDetail', 'canLogin'],
        computed: {
            currencyRp() {
                // return Rp${this.price.toLocaleString('id-ID')}
            }
        },
        methods: {
            ...mapActions(['addToCart']),
            cart() {
                this.loading = true
                const productId = this.productDetail.id
                this.addToCart(productId)
                .then(result => {
                    this.loading = false
                    this.success = true

                    setTimeout(() => {
                        this.success = false
                    }, 500)
                })
                .catch(err => {
                    this.$store.state.error = err
                    this.loading = false
                })
            }
        },
        beforeCreate() {
            // console.log(this.productDetail)
        }
    }
</script>