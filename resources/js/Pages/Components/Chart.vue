<template>
    <apexchart width="500" type="bar" :options="chartOptions" :series="series"></apexchart>
</template>

<script>
import VueApexCharts from 'vue3-apexcharts';

export default {
    components: {
        apexchart: VueApexCharts,
    },
    props: {
        data: Array
    },
    data() {
        return {
            chartOptions: {
                chart: {
                    id: 'vue-bar-chart',
                    toolbar: {
                        show: false
                    }
                },
                xaxis: {
                    categories: this.data.map(item => item.year),
                },
            },
            series: [{
                name: 'Cars',
                data: this.data.map(item => item.count),
            }],
        };
    },
};
</script>