<script setup>

import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

import {onMounted, ref} from "vue";

    let counter = ref(0);


    onMounted(() => {
        Echo.join(`MancWebDemo`)
            .here((users) => {
                counter.value = users.length;
            })
            .joining((user) => {
                counter.value = counter.value + 1
            })
            .leaving((user) => {
                counter.value = counter.value - 1
            })
            .error((error) => {
                console.error(error);
            })
            .listen('ParticipantEntered',(e) =>{

                toast(     e.participant.name + ' just entered')
            })
    })


    function contact(){
        axios.post('/api/contact')
    }

</script>

<template>
    <main class="relative isolate min-h-full">
<!--        <img src="https://images.unsplash.com/photo-1545972154-9bb223aac798?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=3050&q=80&exp=8&con=-15&sat=-75" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-top" />-->
        <img src="https://images.unsplash.com/photo-1534996858221-380b92700493?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=3050&q=80&exp=8&con=-15&sat=-75" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-top" />
        <div class="mx-auto max-w-7xl px-6 py-32 text-center sm:py-40 lg:px-8">
            <p class="text-base font-semibold leading-8 text-white">Real Time Laravel Demo</p>
            <h1 class="mt-4 text-3xl font-bold tracking-tight text-white sm:text-5xl">Hello, Manc Web!</h1>
            <p class="mt-4 text-base text-white/70 sm:mt-6">There <span v-if="counter && counter == 1">is</span><span v-else>are</span> currently</p>
            <div class="mt-10 flex text-4xl justify-center text-pink-400">
                {{ counter }}
            </div>
            <p class="mt-4 text-base text-white/70 sm:mt-6"><span v-if="counter && counter == 1">person</span><span v-else>people</span>  on this page.</p>
        </div>
        <div class="mt-5 flex justify-center items-center">
            <img src="https://dontshootdg.s3.eu-west-2.amazonaws.com/79d41d007ce449f4a66935793346084f-20231207004151.png" class="w-[300px] h-[300px] absolute"/>
        </div>
        <div class="mt-40 flex justify-center">
             <button @click="contact()" class="text-sm font-semibold leading-7 text-orange-500"> Contact Them</button>
        </div>
        <div class="mt-10 flex justify-center">
            <div class="text-xs font-semibold leading-7 ">Any contact details submitted to this system will be deleted permanently at the end of the demo.</div>
        </div>

     </main>
</template>

<style scoped>

</style>
