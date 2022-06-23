<template>
  <NavbarUser></NavbarUser>
  <div class="titres">
    <h5 class="text-center">les Bénéfices</h5>
  </div>
  <div class="deux">
    <div class="table-responsive">
      <br>
      <table class="table table-striped">
        <thead>
        <tr class="text-center entete">
          <th scope="col">Boutiques</th>
          <th scope="col">Bénéfices</th>
        </tr>
        </thead>
        <tbody>
        <tr class="text-center"  v-for="(paiment,id) in paiment_data" :key="id">
          <td>{{paiment.nom_boutique}}</td>
          <td><button type="button" class="btn btn-dark" @click="Select_partenaire(paiment.id_boutique)" data-bs-toggle="modal" data-bs-target="#exampleModal">Entrez Bénéfices</button></td>
        </tr>
        </tbody>
      </table>
    </div>
    <div class="chart">
      <canvas id="planet-chart"></canvas>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <div class="col text-center"> <h5 class="modal-title" id="exampleModalLabel">  Entrez Bénéfices:</h5></div>
          </div>
          <div class="modal-body">
            <div class="donnees">
              <input class="form-control form-control-sm me-3" type="text" placeholder="Entrez Prix"  v-model="status_prix">
              <input class="form-control form-control-sm" type="date" placeholder="Entrez mois" v-model="staus_mois">
            </div>
          </div>
          <div class="modal-footer">
            <div class="col text-center">
              <button type="button" class="btn btn-success" data-bs-dismiss="modal" @click="addprix(); rou();">Enregister</button>
            </div>
            <div class="col text-center">
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button>
              </div>
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
import axios from "axios";
export default {
  name: `achatsuser`,
  components: {
    NavbarUser,
  },
  data() {
    return {
      status_prix:'',
      month :["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Aout","septembre","Octobre","Novembre","Decembre"],
      staus_mois:'',
      id:null,
      newprix:{
        Prix: "",
        mois: "",
        id: ""
      },
      paiment_data:[],
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
  methods: {
    rou(){
      window.location.reload();
    },
    toFormData(obj){
      //data commee objet
      var fd=new FormData();
      for (var i in obj) {
        //remplacer chaque element dans un tableau
        fd.append(i, obj[i]);
      }
      return fd;
    },
    async getpaimentdata() {
      let res = await axios.get("http://localhost/Backend_filRouge/Read-bn")
      const restdata = res.data;
      if (res.status == 200) {
        if (restdata.error) {
          //si il ya erreur
          this.errMsg = restdata.message;

        } else {
          this.benefice_data= restdata.r_v;
          //el=a[0]
          this.benefice_data.filter((el) => this.planetChartData.data.labels.push(this.month[new Date(el.mois).getMonth()]));
          this.benefice_data.filter((el) => this.planetChartData.data.datasets[0].data.push(el.Prix));
          const ctx = document.getElementById('planet-chart');
          new Chart(ctx, this.planetChartData);

        }

      }
    },
    async  getrendez_vousdata(){
      let formData_rv = this.toFormData({id_user: JSON.parse(localStorage.getItem("id_user"))});
      let res= await axios.post("http://localhost/Backend_filRouge/Read-py", formData_rv)
      const restdata=res.data;
      if(res.status==200)
      {
        if(restdata.error){
          //si il ya erreur
          this.errMsg=restdata.message;

        }else{
          this.paiment_data=restdata.pv;
          this.getpaimentdata();
        }

      }
    },
    Select_partenaire(info){
      this.id=info;
    },
    async addprix(){
      this.newprix.id=this.id;
      this.newprix.Prix=this.status_prix;
      this.newprix.mois=this.staus_mois;
      let Data_rv=this.toFormData(this.newprix);
      let res=await axios.post("http://localhost/Backend_filRouge/Add-py",Data_rv);
      const resData=res.data;
      if (res.status == 200){
        if (resData.error){
          console.log(resData.message);
        }else {
          this.newprix={
            Prix: "",
            mois: "",
            id_boutiques: ""
          };
          this.getrendez_vousdata();

        }
      }
    },
  }
  ,
  mounted() {
    let test_type_of_user=JSON.parse(localStorage.getItem("Type_user"));
    if(test_type_of_user!==0){
      this.$router.push({path:'/'});
    }
    this.getrendez_vousdata();


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
  margin-top: -2px;
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
  width: 100px;
  border-radius: 100px;
  height:30px;
  text-align: center;
  padding: 0px;
  font-size: 12px;
}
button.btn.btn-success{
  width: 100px;
  border-radius: 100px;
  height:30px;
  text-align: center;
  padding: 0px;
  font-size: 12px;
}
</style>