<template>
    <navbar>
        <div class="py-12 bg-white">
            <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
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
                <button @click="openModal()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New Post</button>
                

                <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400" v-if="isOpen">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity">
                            <div class="absolute inset-0 bg-gray-500 opacity-75">

                            </div>
                        </div>

                        <!-- This element is to trick the browser into centering the modal contents. -->
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
                        <div class="inline-block align-top bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                            <form>
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="">
                                    <div class="mb-4">
                                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter Title">

                                        <div class="text-red-500">
                                            ERROR TEMPLATE
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Body:</label>
                                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput2" placeholder="Enter Body"></textarea>
                                        <div class="text-red-500">ERROR TEMPLATE</div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                                <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                    <button @click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Cancel
                                    </button>
                                </span>
                            </div>
                          </form>
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
        data() {
            return {
                isOpen: false,
            }
        },
        props: ['products'],
        components: {
            Navbar,
        },
        methods: {
            openModal() {
                this.isOpen = true
            },
            closeModal() {
                this.isOpen = false
            }
        }
    }
</script>

<style scoped>
a {
    text-decoration: none;
}
</style>