<script setup>

import {onMounted, ref} from "vue";
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

    onMounted(() => {
        Echo.join('MancWebDemo')
    })

    function participate(){
        axios.post('/api/participant',{
            name: name.value,
            phone: phone.value,
            email: email.value
        })
            .then(function (response){
                toast('Success')
            })
            .catch(function (response){
                toast('Failed Validation')
            })

    }

    let name = ref();
    let phone = ref();
    let email  = ref();

</script>

<template>
    <div class="min-h-full bg-pink-50">
        <div class="py-10">
            <header>
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold leading-tight tracking-tight text-gray-900 pb-2">Participate</h1>
                    <h4> All data will be deleted tomorrow, none will be kept, will be used only for this demo.</h4>
                    <h4> One single text and email will be sent if you provide your details</h4>
                    <h4> Your name will be displayed on-screen.</h4>
                </div>
            </header>
            <main>
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 pt-12">
                    <div class="space-y-10 divide-y divide-gray-900/10">
                        <div class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-3">
                            <form class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                                <div class="px-4 py-6 sm:p-8">
                                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-4">
                                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                            <div class="mt-2">
                                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                    <input  v-model="name" type="text" name="name" id="name" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Harry Messenger" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-4">
                                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                            <div class="mt-2">
                                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                    <input  v-model="email" type="email" name="email" id="email" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="phpleeds@hsmess.dev" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-4">
                                            <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
                                            <div class="mt-2">
                                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                    <input v-model="phone" type="tel" name="phone" id="phone" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="07521531290" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                                    <button @click.prevent="participate" type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>


<style scoped>

</style>
