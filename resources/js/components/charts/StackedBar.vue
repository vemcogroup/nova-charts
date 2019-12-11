<script>
    const { reactiveProp } = mixins
    import chart from '../mixins/chart'
    import { Bar, mixins } from 'vue-chartjs'

    export default {
        extends: Bar,
        mixins: [chart, reactiveProp],
        computed: {
            chartOptions() {
                return Object.assign(this.options, {
                    scales: {
                        xAxes: [{
                            stacked: true,
                        }],
                        yAxes: [{
                            stacked: true,
                        }],
                    },
                });
            },
        },
    }
</script>
