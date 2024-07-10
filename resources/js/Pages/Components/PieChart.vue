<template>
    <apexchart width="500" type="polarArea" :options="chartOptions" :series="series"></apexchart>
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
                    id: 'vue-bar-chart1',
                    toolbar: {
                        show: false
                    }
                },
                labels: this.data.map(item => item.manufacture),
                yaxis: {
                    tickAmount: Math.max(...this.data.map(item => item.count)),  // Ensure ticks increment in integers
                    labels: {
                        formatter: function (value) {
                            return Math.round(value);  // Ensure y-axis labels are integers
                        }
                    }
                },
            },
            series: this.data.map(item => item.count),
        };
    },
};
</script>