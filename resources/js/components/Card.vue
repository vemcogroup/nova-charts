<template>
  <card class="flex flex-col items-center justify-center" style="height: auto;">
    <h3 class="mt-4 text-xl text-80 font-semibold">{{ card.title }}</h3>

    <p v-if="card.description" v-text="card.description" class="mt-1 text-80"></p>

    <div class="relative w-full h-full p-6">
      <component
        :is="componentType"
        :chart-data="chartData"
        :show-labels="card.showLabels"
        :show-legends="card.showLegends"
      ></component>

      <div v-if="card.showSelections" class="flex justify-between pt-3">
        <a
          v-for="item in selections"
          href="#"
          @click.prevent="selection = item"
          class="block text-primary"
          :class="[ selection === item ? 'font-bold underline' : 'font-semibold no-underline' ]"
          v-text="item"
        ></a>
      </div>
    </div>
  </card>
</template>

<script>
import BarChart from "./charts/Bar";
import LineChart from "./charts/Line";
import StackedBarChart from "./charts/StackedBar";

export default {
  components: {
    BarChart,
    LineChart,
    StackedBarChart
  },
  props: ["card", "resource", "resourceId", "resourceName"],
  data() {
    return {
      chartData: null,
      selection: this.card.selection,
      selections: this.card.selections
    };
  },
  mounted() {
    if (!this.selection && this.selections.length) {
      this.selection = this.selections[0];
    }

    this.fetch();
  },
  methods: {
    fetch() {
      Nova.request()
        .get(this.url)
        .then(response => {
          this.chartData = response.data;
        })
        .catch(response => {
          this.$toasted.show("Chart data failed: " + response, {
            type: "error"
          });
        });
    }
  },
  computed: {
    componentType() {
      return this.card.type + "Chart";
    },
    url() {
      if (this.resource) {
        return (
          "/nova-vendor/nova-charts/data" +
          "/" +
          this.resourceId +
          "/?model=" +
          this.card.model +
          "&selection=" +
          this.selection +
          "&type=" +
          this.card.type
        );
      }

      return (
        "/nova-vendor/nova-charts/data" +
        "/?model=" +
        this.card.model +
        "&selection=" +
        this.selection +
        "&type=" +
        this.card.type
      );
    }
  },
  watch: {
    selection() {
      this.fetch();
    }
  }
};
</script>
