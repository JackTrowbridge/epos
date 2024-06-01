<script setup>
import {defineProps, reactive} from 'vue'
import {router} from "@inertiajs/vue3";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";

const props = defineProps({
    user: Object,
})

function logoutSubmit() {
    router.post('/logout')
}

</script>

<template>
    <!--    <div>Hello {{user.name}}</div>-->
    <!--    <button v-on:click="logoutSubmit()">Logout</button>-->
    <div class="h-full w-full relative select-none text-white">
        <img class="object-cover" src="../../images/background.jpeg" style="height: 100vh; width: 100vw;"
             alt="background image">
        <div class="absolute top-0 left-0 w-full h-full p-4 flex flex-col">

            <!-- Top Bar -->
            <div class="flex justify-between items-start w-full mb-4">

                <!-- Left -->
                <div>
                    <div class="glass-secondary flex p-2 px-5 justify-between items-center">
                        <font-awesome-icon icon="user" style="color: #ffffff;" class="mr-2"/>
                        <div class="font-bold">{{ user.name }}</div>
                    </div>
                </div>

                <!-- Center -->
                <div class="flex justify-between items-center glass-button font-semibold py-4 px-8 text-xl">
                    <div class="mr-8">9:41 AM</div>
                    <div>Happy Hour!</div>
                </div>

                <!-- Right -->
                <div>

                </div>

            </div>

            <!-- Main Content -->
            <div class="flex-grow grid grid-cols-6 grid-flow-col gap-4">

                <!-- Quick Buttons -->
                <div class="col-span-1 glass-panel">
                    Hello
                </div>

                <!-- Main -->
                <div class="col-span-5 glass-panel ">
                    World
                </div>

            </div>


        </div>

    </div>
</template>

<style scoped>

</style>
