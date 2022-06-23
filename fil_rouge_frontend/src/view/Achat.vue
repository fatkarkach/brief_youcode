<template>
  <Navbar></Navbar>
  <div class="titres">
    <h5 class="text-center">les Achats</h5>
  </div>
  <div class="deux">
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
      <tr class="text-center entete">
        <th scope="col">Produit</th>
        <th scope="col">Marque</th>
        <th scope="col">Mois</th>
        <th>Achats</th>
      </tr>
      </thead>
      <tbody>
      <tr class="text-center"  v-for="(produit,id) in produit_data" :key="id">
        <td>{{produit.produit}}</td>
        <td>{{produit.marque}}</td>
        <td>{{produit.date_livraison}}</td>
        <td>{{produit.achats}}</td>
      </tr>
      </tbody>
    </table>
  </div>
  <div class="chart">
    <canvas id="planet-chart"></canvas>
  </div>

  </div>
</template>

<script>
import Chart from 'chart.js'
import Navbar from "../components/Navbar.vue";
import axios from "axios";
export default {
  name: `Achat`,
  components: {
    Navbar,
  },
  data() {
    return {
      month :["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Aout","septembre","Octobre","Novembre","Decembre"],
      produit_data:[],
      Achat_data:[],
      planetChartData: {
        type: "line",
        data: {
          labels: [],
          datasets: [
            {
              label: "Nombres d'Achats de notre boutiques FAHO WORLD (5 derniers mois)",
              data: [],
              backgroundColor: "#EDB891",
              borderColor: "black",
              borderWidth: 3
            }
          ]
        },
        options: {
          responsive: true,
          lineTension: 1,
          scales: {
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                  padding: 25
                }
              }
            ]
          }
        }
      },
    }
  },
  mounted() {
    this.getrendez_vousdata();

    let test_type_of_user = JSON.parse(localStorage.getItem("Type_user"));
    if (test_type_of_user !== 1) {
      this.$router.push({path: '/'});
    }
  },
  methods: {
    async  getrendez_vousdata(){
      let res= await axios.get("http://localhost/Backend_filRouge/Produit-rv")
      const restdata=res.data;
      if(res.status==200)
      {
        if(restdata.error){
          //si il ya erreur
          this.errMsg=restdata.message;
        }else{
          this.produit_data=restdata.pv;
          this.produit_data.filter((el) => this.planetChartData.data.labels.push(this.month[new Date(el.date_livraison).getMonth()]));
          this.produit_data.filter((el) => this.planetChartData.data.datasets[0].data.push(el.achats));
          this.produit_data=restdata.pv=this.produit_data.filter((el) => el.date_livraison=this.month[new Date(el.date_livraison).getMonth()]);
          const ctx = document.getElementById('planet-chart');
          new Chart(ctx, this.planetChartData);
        }

      }
    },

  },

}

</script>

<style scoped>

.titres{
  background-image:url('~@/assets/gradient.png');
  border-radius:50px;
  background-size: cover;
  height: 40px;
  width:60%;
  font-family:"Space Grotesk";
  font-style: italic;
  margin: auto;
  margin-top:20px;
  padding: 8px;
}
h5{
  font-weight: bold;
  font-size:15px;
}
table {
  font-size:15px;
  margin-top: 20px;
  font-family:"Space Grotesk";
  margin-top: 10px;
}
tr
{
  border-width: 1px;
  border-color: black;
}
th {
  border-width: 1px;
  border-color: black;
}
td {
  border-width: 1px;
  border-color: black;
  background-color:white;
}
.entete
{
  background-image:url('~@/assets/gradient.png');
  background-size: cover;
}
p {
  color: black;
  font-size:15px;
  font-family:"Space Grotesk";
}
@media screen and (max-width: 600px) {

  .table-responsive {
    margin-left: 20%;
    margin-right:5px;
  }
}
.deux {
  display: flex;
  justify-content: center;
}
.chart
{
  width: 35%;
  height:40%;
  margin-left:5%;
}
button{
  width: 144px;
  border-radius: 100px;
  height:30px;
  text-align: center;
  padding: 0px;
  font-size: 12px;
  margin-top:15px;
}
</style>