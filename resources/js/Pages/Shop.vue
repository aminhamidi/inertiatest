<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Shop
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <h1 class="p-5">welcome to {{ name }} shop!</h1>
                    <div class="p-5">
                        <button
                            @click.prevent="submit"
                            class="
                                bg-blue-500
                                hover:bg-blue-700
                                text-white
                                font-bold
                                py-2
                                px-4
                                rounded
                            "
                        >
                            ثبت نام کاربر
                        </button>
                        <form @submit.prevent="submit">
                            <label for="name">نام دوست:</label>
                            <input
                                class="
                                    shadow
                                    appearance-none
                                    border
                                    rounded
                                    w-full
                                    py-2
                                    px-3
                                    text-gray-700
                                    leading-tight
                                    focus:outline-none focus:shadow-outline
                                "
                                id="name"
                                v-model="form.name"
                            />
                            <label for="description">توضیحات:</label>
                            <input
                                class="
                                    shadow
                                    appearance-none
                                    border
                                    rounded
                                    w-full
                                    py-2
                                    px-3
                                    text-gray-700
                                    leading-tight
                                    focus:outline-none focus:shadow-outline
                                "
                                id="description"
                                v-model="form.description"
                            />
                            <label for="age">سن:</label>
                            <input
                                class="
                                    shadow
                                    appearance-none
                                    border
                                    rounded
                                    w-full
                                    py-2
                                    px-3
                                    text-gray-700
                                    leading-tight
                                    focus:outline-none focus:shadow-outline
                                "
                                id="age"
                                v-model="form.age"
                            />
                            <button type="submit">ثبت</button>
                        </form>
                        <div v-for="(friend,index) in friends" :key="index">
                            <p>{{friend.name}}</p>
                            <p>{{friend.description}}</p>
                            <p>{{friend.age}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";
import { Inertia } from "@inertiajs/inertia";

export default defineComponent({
    components: {
        AppLayout,
        Welcome,
    },
    data() {
        return {
            form: {
                name: null,
                description: null,
                age: null,
            },
        };
    },
    methods: {
        submit() {
            Inertia.post(route("submit-friend"),this.form,{
                  preserveScroll: true,
                    onSuccess: page => {
                        alert('horraa')
                    },

            });
        },
    },
    props: {
        name: String,
        friends: Object,
    },
});
</script>
