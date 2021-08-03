<template>
    <navbar>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard OUEHOUFHBUEIB
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Udah Masuk
                    </div>
                </div>
            </div>
        </div>
    </navbar>
</template>

<script>
    import Navbar from '@/Layouts/Navbar'
    import { mapState, mapMutations, mapActions } from 'vuex'


    export default {
        props: ['products'],
        components: {
            Navbar,
        },
        methods: {
            // ...mapActions(['getCart']),
            // ...mapMutations(['setCart', 'resetCart']),
            // getCartList() {
            //     console.log('NAVBAR')
            //     this.loading = true
            //     this.getCart()
            //     .then(result => {
            //         console.log(result, "=====")
            //     })
            //     .catch(err => {
            //         this.loading = false
            //     })
            // }
        },
        beforeCreate() {
            // this.getCartList()
            this.$store.dispatch('getCart')
                .then(result => {
                    console.log(result, "=====")
                    this.$store.commit('resetCart')
                    this.$store.commit('setCart', response.data)
                })
                .catch(err => {
                    // this.$store.state.error = err
                    this.loading = false
                })
        }
    }
</script>
