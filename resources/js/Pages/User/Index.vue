<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()

const user = computed(() => page.props.auth.user)

console.log(page.props.auth.user);


</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <span>Welcome!</span>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ user.name }}
        </h2>

        <span>Your current coin balance: </span>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ user.coin_balance }}        
        </h2>

    </AppLayout>
</template>

<script>
export default {
    // data: function() {
    //     return {
    //         user: "test"
    //     }
    // },
    mounted() {
        // console.log(page.props.auth.user);
    }
}
</script>