<script>
    const { reactiveProp } = mixins
    import chart from '../mixins/chart'
    import { Bar, mixins } from 'vue-chartjs'

    export default {
        extends: Bar,
        mixins: [chart, reactiveProp],
    }
</script>
