<script>
    const { reactiveProp } = mixins
    import chart from '../mixins/chart'
    import { Line, mixins } from 'vue-chartjs'

    export default {
        extends: Line,
        mixins: [chart, reactiveProp],
    }
</script>
