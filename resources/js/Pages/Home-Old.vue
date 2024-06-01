<script setup>
import { defineProps, computed, reactive } from 'vue'
import {router} from "@inertiajs/vue3";

const props = defineProps({
    products: Object,
    user: Object,
})

const registerForm = reactive({
    name: null,
    passcode: null,
})

const loginForm = reactive({
    passcode: null,
})

const logoutForm = reactive({
})

function registerSubmit() {
    router.post('/register', registerForm)
}

function loginSubmit() {
    router.post('/login', loginForm)
}

function logoutSubmit() {
    router.post('/logout', logoutForm)
}

</script>

<template>
    <div>
        <div v-if="user != null">Welcome back, {{user.name}}!</div>
        <br>
        <h1>Create account</h1>

        <form @submit.prevent="registerSubmit">
            <div>
                <label for="name">Name</label>
                <input class="bg-window-glass" v-model="registerForm.name" id="name" type="text" required>
            </div>
            <div>
                <label for="passcode">Passcode</label>
                <input class="bg-window-glass" id="passcode" v-model="registerForm.passcode" required>
            </div>
            <div>
                <button type="submit">Register</button>
            </div>
        </form>
        <br>

        <h1>Or login</h1>

        <form @submit.prevent="loginSubmit">
            <div>
                <label for="passcode">Passcode</label>
                <input class="bg-window-glass" id="passcode" v-model="loginForm.passcode" required>
            </div>
            <div>
                <button type="submit">Login</button>
            </div>
        </form>

        <br>
        <h1>Or logout</h1>
        <form @submit.prevent="logoutSubmit">
            <div>
                <button type="submit">Logout</button>
            </div>
        </form>

    </div>
</template>
