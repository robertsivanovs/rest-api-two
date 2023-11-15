<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Countdown from '@/Components/Countdown.vue';
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()
const user = computed(() => page.props.auth.user)

</script>

<template>
    <AppLayout title="Dashboard">
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Dashboard
        </h2>
    </template>

    <div class="mt-4">
        <span class="text-gray-600">Welcome, {{ user.name }}!</span>
    </div>

    <div class="mt-4">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Your current coin balance:
        </h2>
        <span class="text-2xl font-bold">{{ user.coin_balance }}</span>
    </div>

    <div class="mt-4">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Time till next coin payout:
        </h2>
        <span class="text-2xl font-bold">
            <Countdown :startingDate="user.last_coin_payout_at"></Countdown>
        </span>
    </div>

    <hr class="my-4">

    <div v-if="transactionData">
        <h3 class="font-semibold text-lg text-gray-800 leading-tight mb-2">
            Transaction History
        </h3>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Coin amount
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="transaction in transactionData" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ transaction.id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ transaction.amount }} 
                        </td>
                        <td class="px-6 py-4">
                            {{ formatCreatedAt(transaction.created_at) }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
  </AppLayout>
</template>

<script>
export default {
    props: {
        transactionData: Array,
    },
    methods: {
        formatCreatedAt(created_at) {
            // Use JavaScript's Date object to format the date
            const date = new Date(created_at);
            // Format the date as you want, for example, using toLocaleString
            return date.toLocaleString();
            },
        }
    }
</script>
