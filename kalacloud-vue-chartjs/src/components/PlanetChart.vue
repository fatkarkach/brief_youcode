<template>
  <div class="all">
    <canvas id="planet-chart"></canvas>
  </div>
</template>
<script>
import Chart from 'chart.js'
import planetChartData from '../planet-data.js'
export default {
  name: `PlanetChart.vue`,
  data() {
    return {
      planetChartData: planetChartData
    }
  },
  mounted() {
    const ctx = document.getElementById('planet-chart');
    new Chart(ctx, this.planetChartData);
  }
}
</script>

<style scoped>
.all
{
  width: 50%;
  height:40%
}
</style>