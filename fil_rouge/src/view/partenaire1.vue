<template>
  <Navbar></Navbar>
  <div class="table-responsive">
    <div class="titres">
        <h5 class="text-center">Nombres des boutiques de chaque partenaire en "FAHO WORLD"</h5>
    </div>
    <table class="table table-striped">
      <thead>
      <tr class="text-center entete">
        <th scope="col">Partenaries</th>
        <th scope="col">Nombre des boutiques</th>
      </tr>
      </thead>
      <tbody>
      <tr class="text-center"  v-for=" (boutique,id) in boutiques_data_Accepté" :key="id">
        <td>{{boutique.nom}} {{boutique.prénom}}</td>
        <td> {{boutique.nbre_boutique}}</td>
      </tr>
      </tbody>
    </table>
  </div>

</template>
<script>
import Navbar from "../components/Navbar.vue";
// import axios from "axios";
export default {
  name: `partenaire1`,
  components: {
    Navbar,
  },
  mounted(){
    this.getrendez_vousdata();
    let test_type_of_user=JSON.parse(localStorage.getItem("Type_user"));
    if(test_type_of_user!==1){
      this.$router.push({path:'/'});
    }
  },
  computed:{
    boutiques_data_Accepté(){
      return this.boutiques_data.filter((el)=>el.option==='Accepté');
    }
  },
  data(){
    return {
      boutiques_data:[],
    }
  },
  methods: {
    async getrendez_vousdata() {
      let res = await axios.get("http://localhost/Backend_filRouge/Partenaire-rv")
      const restdata = res.data;
      if (res.status === 200) {
        if (restdata.error) {
          //si il ya erreur
          this.errMsg = restdata.message;

        } else {
          this.boutiques_data = restdata.r_p;
        }

      }
    },
  }
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
  width: 60%;
  font-family:"Space Grotesk";
  margin: 10px auto;
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
  h5{
    font-size:15px;
  }
  .titres {
    height:60px;
  }

}

</style>