<script setup>
import { computed } from 'vue'
import { usePage, Link } from '@inertiajs/vue3'
import Chart from './Components/Chart.vue'
import PieChart from './Components/PieChart.vue'

const page = usePage()

const cars = computed(() => page.props.cars)
const carsPerManufacture = computed(() => page.props.carsPerManufacture)
const carsPerYear = computed(() => page.props.carsPerYear)
const carCountTotal = computed(() => page.props.carCountTotal)
const carManufactureTotal = computed(() => page.props.carManufactureTotal)
const recentCar = computed(() => page.props.recentCar)
</script>


<template>
    <div class="container dashboard">
        <div class="row header">
            <h2>Cars Dashboard</h2>
            <Link class="button green" href="/car/add"> <font-awesome-icon icon="fa-solid fa-plus" />Add Car</Link>
        </div>
        <div class="row">
            <div class="card">
                {{ carCountTotal }}
                <h3>Total Cars</h3>
            </div>
            <div class="card">
                {{ carManufactureTotal }}
                <h3>Total Manufactures</h3>
            </div>
            <div class="card">
                {{ recentCar }}
                <h3>Recently Added</h3>
            </div>
        </div>
        <div class="row">
            <div class="card half">
                <h3>Cars Per Year</h3>
                <Chart :data="carsPerYear" />
            </div>
            <div class="card half">
                <h3>Cars Per Manufacture</h3>
                <PieChart :data="carsPerManufacture" />
            </div>
        </div>

    </div>
</template>

<script>
export default {

}
</script>