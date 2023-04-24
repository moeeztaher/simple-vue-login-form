<template>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center md:h-screen mt-0">

            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <a href="https://systemhaus.com"
                        class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                        <img class="w-96 h-24" src="https://systemhaus.com/img/logos/logo.webp" alt="logo">
                    </a>
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center">
                        Sign in to view submitted forms
                    </h1>
                    <form class="space-y-4 md:space-y-6" @submit.prevent="submitForm">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="email">
                                E-Mail
                            </label>
                            <input
                                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="email" type="email" placeholder="" v-model.trim="email" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="password">
                                Password
                            </label>
                            <input
                                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="password" type="password" placeholder="" v-model.trim="password" required>
                        </div>
                        <div v-if="showAlert"
                            class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Error! </strong>
                            <span class="block sm:inline">Invalid email or password.</span>

                        </div>
                        <button type="submit"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign
                            in</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center bg-gray-900 bg-opacity-50"
        v-if="selectedPerson">
        <div class="bg-white rounded-lg overflow-hidden" style="max-width: 400px;">
            <div class="bg-gradient-to-b from-green-400 to-blue-500 py-4 px-6">
                <div class="text-white font-bold text-lg mb-2">{{ selectedPerson.name }}</div>
            </div>
            <div class="px-6 py-4">
                <p class="text-gray-700 text-base mb-2">{{ selectedPerson.email }}</p>
                <p class="text-gray-700 text-base mb-2">{{ selectedPerson.street }}</p>
                <p class="text-gray-700 text-base mb-2">{{ selectedPerson.postcode }}</p>
                <p class="text-gray-700 text-base mb-2">{{ selectedPerson.city }}</p>
                <p class="text-gray-700 text-base mb-2">{{ selectedPerson.message }}</p>
            </div>
            <div class="px-6 py-4 bg-gray-100 text-right">
                <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-400"
                    @click="selectedPerson = null">Close</button>
            </div>
        </div>
    </div>
</template>

<script>
import router from '../router';
export default {
    data() {
        return {
            email: '',
            password: '',
            showAlert: false
        };
    },
    methods: {
        async submitForm() {
            this.showAlert = false
            const formData = {
                email: this.email,
                password: this.password,
            };
            console.log(formData);
            const requestOptions = {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ email: formData.email, password: formData.password })
            };
            const response = await fetch("http://localhost:8000/api/login", requestOptions);
            const data = await response.json();
            if (data) {
                this.showAlert = false
                router.push({ path: 'FormView' })
            } else {
                this.showAlert = true
            }
        },
        signup() {
            router.push({ path: 'Register' })
        },
        hideAlert() {
            this.showAlert = false
        },
    },
};

</script>

<style scoped></style>