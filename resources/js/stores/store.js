import axios from 'axios'
import { createStore } from 'vuex'

const stores = new createStore({
    state: {
        products: [],
        carts: [],
        count: 0
    },
    mutations: {
        setCounter(state) {
            state.count++
        },
        resetCounter(state) {
            state.count = 0
        },
        setCart(state, data) {
            state.carts = data
        }, 
        resetCart(state, data) {
            state.carts = []
        }
    },
    actions: {
        addToCart(context, data) {
            return axios.post('/api/auth/cart', {
                product_id: `${data}`,
                quantity: '1'
            })
        },
        getCart(context, data) {
            return axios.get('/api/auth/cart')
        },
        updateCart(context, data) {
            // console.log("UPDATECART")
            return axios.put(`/api/auth/cart/${data.cartId}`, {
                quantity: `${data.quantity}`,
                operator: `${data.operator}`
            })
        },
        deleteCart(context, id) {
            return axios.delete(`/api/auth/cart/${id}`)
        }
    }
})

export default stores
