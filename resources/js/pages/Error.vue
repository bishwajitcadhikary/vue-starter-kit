<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { computed } from 'vue';

const errors: Record<number, string> = {
    401: 'Unauthorized',
    402: 'Payment Required',
    403: 'Forbidden',
    404: 'Not Found',
    419: 'Page Expired',
    429: 'Too Many Requests',
    500: 'Server Error',
    503: 'Service Unavailable',
};

const props = defineProps<{
    code: number;
}>();

const error = computed(() => errors[props.code] ?? 'Something went wrong');
</script>

<template>
    <Head :title="error" />

    <div
        class="items-top relative flex min-h-screen justify-center sm:items-center sm:pt-0"
        role="main"
    >
        <div class="mx-auto max-w-xl sm:px-6 lg:px-8">
            <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
                <h1 class="border-r border-gray-400 px-4 text-lg font-bold">
                    {{ code }}
                </h1>

                <div class="ml-4 text-lg">{{ error }}</div>
            </div>
        </div>
    </div>
</template>
