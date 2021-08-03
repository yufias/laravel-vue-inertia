<template>
    <h1>Shopping cart</h1>

    <div class="container-fluid">
        <div class="row align-items-start" v-for="cart in $store.state.carts" :key="cart.id">
            <div class="col-2"></div>
            <div class="col-lg-8">
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
                            <button type="button" class="btn btn-danger" @click="deleteCartFromList(cart.id)">Delete</button>
                        </div>
                        <div class="col-lg-2 inline-flex">
                            <button @click="updateQuantity(cart.id, cart.quantity, 'minus')">
                                <MinusCircleIcon class="h-10 w-10 text-blue-500"/>
                            </button>
                            <input 
                                type="number" 
                                class="form-control" 
                                :min=1 
                                :max="cart.product.quantity" 
                                :value="+cart.quantity > +cart.product.stock ? +cart.product.stock : +cart.quantity < 1 ? 1 : +cart.quantity" 
                                @change="updateQuantity(cart.id, $event)"
                            >
                            <button @click="updateQuantity(cart.id, cart.quantity, 'plus')" :disabled="isDisabled(cart.product.stock, cart.quantity)">
                                <PlusCircleIcon class="h-10 w-10 text-blue-500" />
                            </button>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row">
            <div class="col-8"></div>
            <div class="col-2">
                <p style="color:#fa591d; font-weight:bold;">Rp {{ subTotal.toLocaleString() }}</p>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</template>

<script>
    import { PlusCircleIcon, MinusCircleIcon } from '@heroicons/vue/outline'
    import { mapState, mapMutations, mapActions } from 'vuex'


    export default {
        components: {
            PlusCircleIcon,
            MinusCircleIcon
        },
        props: ['cart'],
        methods: {
            ...mapActions(['updateCart', 'getCart', 'deleteCart']),
            updateQuantity(cartId, qty, operator) {
                let qtyFormat = typeof qty == "object" ? qty.target.value : qty
                console.log(qtyFormat, "====")
                const data = {
                    cartId: cartId,
                    quantity: Number(qtyFormat),
                    operator: operator
                }

                console.log(data, "^^^^^^")
                this.updateCart(data)
                .then(result => {
                    this.getCartList()
                    console.log(result, "======")

                })
                .catch(err => {
                    console.log(err, "**(*****")
                })
            },
            getCartList() {
                console.log("HERE")
                this.getCart()
                .then(result => {
                    console.log(result, "=====")
                    this.$store.commit('resetCart')
                    this.$store.commit('setCart', result.data)
                })
                .catch(err => {
                    // this.$store.state.error = err
                    this.loading = false
                })
            },
            deleteCartFromList(id) {
                this.deleteCart(id)
                .then(result => {
                    console.log(result, "=====")
                    this.getCartList()
                })
                .catch(err => {
                    // this.$store.state.error = err
                    this.loading = false
                })
            },
            isDisabled(stock, qty) {
                if(qty == stock) {
                    return true
                } else {
                    return false
                }
            }
        },
        computed: {
            subTotal() {
                // let subtotal = 0
                // this.$store.state.carts.forEach(el => {
                //     let totalPerProduct = +el.product.price * el.quantity
                //     subtotal += totalPerProduct
                // })

                return this.$store.state.carts.reduce((accumulation, currentValue) => accumulation + (currentValue.product.price * currentValue.quantity), 0)

                return subtotal
            }
        },
        created() {
            this.getCartList()
        }
    }
</script>

<style scoped>
a {
    text-decoration: none;
}
</style>