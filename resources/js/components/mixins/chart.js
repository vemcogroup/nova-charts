import ChartJsPluginDataLabels from 'chartjs-plugin-datalabels'

export default {
    props: {
        chartData: {
            type: Object,
            required: true,
        },
        showLabels: {
            type: Boolean,
            default: true,
        },
        showLegends: {
            type: Boolean,
            default: true,
        },
    },
    data() {
        return {
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: this.showLegends,
                },
                plugins: {
                    datalabels: {
                        align: 'top',
                        anchor: 'end',
                        font: {
                            size: '14',
                        },
                        display: this.showLabels ? 'auto' : false,
                        color: '#000000',
                    }
                }
            },
        }
    },
    computed: {
        chartOptions() {
            return this.options
        }
    },
    mounted () {
        this.renderChart(this.chartData, this.chartOptions);
    }
}
