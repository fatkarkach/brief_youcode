<template>
  <NavbarUser></NavbarUser>
  <div class="titres">
    <h5 class="text-center">les  clients </h5>
  </div>
  <div class="deux">
    <div class="table-responsive">
      <br>
      <p>Nombres  Clients Totales:10</p>
      <table class="table table-striped">
        <thead>
        <tr class="text-center entete">
          <th scope="col">Clients</th>
          <th scope="col">Nombres Clients</th>
        </tr>
        </thead>
        <tbody>
        <tr class="text-center">
          <td>Shein</td>
          <td>3</td>
        </tr>
        <tr class="text-center">
          <td>Addidas</td>
          <td>7</td>
        </tr>
        </tbody>
      </table>
    </div>
    <div class="chart">
      <button type="button" class="btn btn-dark"  data-bs-toggle="modal" data-bs-target="#exampleModal">Entrez les données</button>
      <canvas id="planet-chart"></canvas>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <div class="col text-center"> <h5 class="modal-title" id="exampleModalLabel">  Entrez les données:</h5></div>
          </div>
          <div class="modal-body">
            <div class="donnees">
              <input class="form-control form-control-sm me-3" type="text" placeholder="Entrez le nombre client">
              <input class="form-control form-control-sm" type="text" placeholder="Entrez le mois">
            </div>
          </div>
          <div class="modal-footer">
            <div class="col text-center">  <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button></div>
          </div>
        </div>
      </div>
    </div>
    <!--endmodal-->
  </div>
</template>

<script>
import NavbarUser from "../components/NavbarUser.vue";
import Chart from "chart.js";
export default {
  name: `client`,
  components: {
    NavbarUser,
  },
  data() {
    return {

      planetChartData: {
        type: "line",
        data: {
          labels: ["Janvier", "Février", "Mars", "Avril", "Mai"],
          datasets: [
            {
              label: "Nombres d'Achats de notre boutiques FAHO WORLD (5 derniers mois)",
              data: [100, 300, 100, 300, 200],
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
    const ctx = document.getElementById('planet-chart');
    new Chart(ctx, this.planetChartData);
      let test_type_of_user=JSON.parse(localStorage.getItem("Type_user"));
      if(test_type_of_user!==0){
        this.$router.push({path:'/'});
      }
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
.donnees
{
  display: flex;
}
button.btn.btn-dark {
  width: 144px;
  border-radius: 100px;
  height:30px;
  text-align: center;
  padding: 0px;
  font-size: 12px;
  margin-top:15px;
}
</style>