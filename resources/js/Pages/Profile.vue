<template>
    <h1>Profile</h1>

    <div class="container-fluid">
        <div class="row align-items-start">
            <div class="col-lg-2"  v-for="product in products" :key="product.id">
                <div class="card" :href="`products/${product.id}`" style="width: 14rem;">
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
</template>

<script>
    export default {
        props: ['user'],
        beforeCreate() {
            axios.get('api/auth/profile',{
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('jwtToken')}`
                }
            })
            .then(function (response) {
                console.log(response, "<><><><><><");
                // localStorage.setItem('jwtToken', response.data.access_token)
                
            })
            .catch(function (error) {
                console.log(error), "xxxxxxxxx";
            });
        }
    }
</script>

<style scoped>
a {
    text-decoration: none;
}
</style>