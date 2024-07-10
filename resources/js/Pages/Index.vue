<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()

const cars = computed(() => page.props.cars)
</script>


<template>
    <h1>Inertia Demo</h1>
    <p>This is a demo of Laravel, Inertia & Postgres running on Vercel.</p>
    <h2>List of cars</h2>
    <div v-for="car in cars" :key="car.id">
        <h3>{{ car.name }}</h3>
        <p>{{ car.created_at }}</p>
    </div>
</template>

<script>
export default {

}
</script>
