<script setup>
import {reactive, ref} from 'vue';
import {router} from "@inertiajs/vue3";

const numbers = ref([null, null, null, null]);

const props = defineProps({
    products: Object,
    user: Object,
})

const input_numbers = [
    1, 2, 3,
    4, 5, 6,
    7, 8, 9,
    null, 0,
]

function updateNumbers(number) {
    for(let i = 0; i < numbers.value.length; i++) {
        if(numbers.value[i] == null) {
            numbers.value[i] = number
            if(i === numbers.value.length - 1) {
                loginForm.passcode = numbers.value.join('')
                loginSubmit()
            }
            break
        }
    }
}

function clearNumbers() {
    for(let i = 0; i < numbers.value.length; i++) {
        numbers.value[i] = null
    }
}

const loginForm = reactive({
    passcode: null,
})
function loginSubmit() {
    router.post('/session', loginForm)
}

function logoutSubmit() {
    router.post('/logout')
}

</script>

<template>
    <div class="h-full w-full relative select-none">
        <img class="object-cover" src="../../images/background.jpeg" style="height: 100vh; width: 100vw;"
             alt="background image">
        <div v-if="user != null" class="absolute top-0 left-0 w-full h-full text-white p-4">
            <div> Signed in as <span class="font-bold">{{user.name}}</span> </div>
            <div>{{$page.props.flash.message}}</div>
        </div>
        <div class="absolute top-0 left-0 w-full h-full">

            <div class="flex flex-row min-h-screen justify-between items-center mr-8">

                <div class="ml-[20%] text-4xl font-bold text-white flex flex-col items-center">
                    <div>
                        Velocity Systems
                    </div>
                    <div class="font-normal text-2xl">
                        Accelerate Your Sales, Amplify Your Success
                    </div>
                </div>

                <div>
                    <div class="flex flex-col items-center glass p-4 text-2xl text-white mx-12">
                        <div class="bg-white rounded-full p-8 mb-4"></div>
                        <div class="font-bold pb-2">Sign In</div>
                        <div class="text-xl">Sign in using an ID or your fingerprint.</div>
                        <div class="my-8 flex">

                            <div v-for="number in numbers" class="mx-2 flex flex-col items-center">
                                <div>{{ number }}</div>
                                <div v-if="number != null" class="bg-white rounded-full px-5 py-[5%]"/>
                                <div v-else class="bg-white rounded-full px-5 py-[5%] mt-8"/>
                            </div>

                        </div>
                        <div class="font-bold hover:cursor-pointer" v-on:click="logoutSubmit()">Need help?</div>
                        <div class="text-xl pt-5 pb-12 hover:cursor-pointer" v-on:click="clearNumbers()">Clear</div>
                    </div>
                    <div class="glass -mt-12 px-2 py-4">

                        <div class=" grid grid-cols-3 gap-3">
                            <div v-for="(input, index) in input_numbers" :key="index">


                                <div v-if="input != null"
                                    class="glass-button flex justify-center items-center text-white font-bold py-4 px-8 text-xl"
                                    v-on:click="updateNumbers(input)">
                                    {{ input }}
                                </div>

                                <div v-else>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</template>
