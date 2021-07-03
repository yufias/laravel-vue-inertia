<template>
    <breeze-validation-errors class="mb-4" />

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
    </div>

    <form @submit.prevent="submit">
        <div>
            <breeze-label for="email" value="Email" />
            <breeze-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />
        </div>

        <div class="mt-4">
            <breeze-label for="password" value="Password" />
            <breeze-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
        </div>

        <div class="block mt-4">
            <label class="flex items-center">
                <breeze-checkbox name="remember" v-model:checked="form.remember" />
                <span class="ml-2 text-sm text-gray-600">Remember me</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <inertia-link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                Forgot your password?
            </inertia-link>

            <breeze-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Log in
            </breeze-button>
        </div>
    </form>
</template>

<script>
    import BreezeButton from '@/Components/Button'
    import BreezeGuestLayout from "@/Layouts/Guest"
    import BreezeInput from '@/Components/Input'
    import BreezeCheckbox from '@/Components/Checkbox'
    import BreezeLabel from '@/Components/Label'
    import BreezeValidationErrors from '@/Components/ValidationErrors'

    export default {
        layout: BreezeGuestLayout,

        components: {
            BreezeButton,
            BreezeInput,
            BreezeCheckbox,
            BreezeLabel,
            BreezeValidationErrors
        },

        props: {
            auth: Object,
            canResetPassword: Boolean,
            errors: Object,
            status: String,
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onSuccess: () => localStorage.setItem('jwtSimulation', 'USER001'),
                        onFinish: () => this.form.reset('password'),
                    })


                // this.form
                //     .transform(data => ({
                //         ... data,
                //         remember: this.form.remember ? 'on' : ''
                //     }))
                //     .post(this.route('login'), {
                //         onSuccess: (res) => {
                //             console.log(res)
                //             localStorage.setItem("userId", res.props.auth.user.id)
                //             // localStorage.setItem("jwtToken", res.access_token)
                //         },
                //         onError: (err) => {
                //             console.log(err, "<==ERROR")
                //         },
                //         onFinish: () => {
                            
                //             this.form.reset('password')
                //         },
                //     })

                // axios.post('api/auth/login', {
                //     email: this.form.email,
                //     password: this.form.password
                // })
                // .then(function (response) {
                //     console.log(response, "<><><><><><");
                //     localStorage.setItem('jwtToken', response.data.access_token)
                    
                // })
                // .catch(function (error) {
                //     console.log(error), "xxxxxxxxx";
                // });
            }
        }
    }
</script>
