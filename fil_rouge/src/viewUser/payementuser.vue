<template>
  <NavbarUser></NavbarUser>
  <div class="titres">
    <h5 class="text-center">les paiments</h5>
  </div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
      <tr class="text-center entete">
        <th scope="col">Facture</th>
        <th scope="col">rembourssement</th>
      </tr>
      </thead>
      <tbody>
      <tr class="text-center" v-for=" (prix,id) in paiment_data" :key="id" >
        <td>{{ prix.Prix}} DH</td>
        <td><button type="button" class="btn btn-danger" :style="prix.type_paiment?{'background-color': 'green','border':'green'}:{'background-color': 'red','border':'red'}">payement</button></td>
      </tr>
      </tbody>
    </table>


  </div>

</template>
<script>
import NavbarUser from "../components/NavbarUser.vue";
import axios from "axios";
export default {
  name: `payementuser`,
  components: {
    NavbarUser,
  },
  data: function () {
    return {
      rembourssement:false,
      paiment_data:null,
      information_partenaire:{}
    }
  },
  mounted(){
    let test_type_of_user=JSON.parse(localStorage.getItem("Type_user"));
    if(test_type_of_user!==0){
      this.$router.push({path:'/'});
    }
    this.getrendez_vousdata();
  },
  methods: {
    select_partenaire(info)
    {
      this.information_partenaire=info;
    },
    async getrendez_vousdata() {
      let res = await axios.get("http://localhost/Backend_filRouge/Read-px");
      const restdata = res.data;
      if (res.status === 200) {
        if (restdata.error) {
          //si il ya erreur
          this.errMsg = restdata.message;

        } else {
          this.paiment_data = restdata.prix.filter((el)=>el.id===JSON.parse(localStorage.getItem("id_user")));
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
button.btn.btn-dark {
  width: 144px;
  border-radius: 100px;
  height:30px;
  text-align: center;
  padding: 0px;
  font-size: 15px;
}
button.btn.btn-danger{
  width: 144px;
  border-radius: 100px;
  height:30px;
  text-align: center;
  padding: 0px;
  font-size: 15px;
}
button {
  border-radius: 10px;
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
.modal-footer
{
  background-image:url('~@/assets/gradient.png');
  background-size: cover;
}
.modal-header
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

</style>