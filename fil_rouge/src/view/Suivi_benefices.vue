<template>
  <Navbar></Navbar>
  <div class="titres">
    <h5 class="text-center">les paiments</h5>
  </div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
      <tr class="text-center entete">
        <th scope="col">Partenaries</th>
        <th scope="col">Facture</th>
        <th scope="col">Payer</th>
      </tr>
      </thead>
      <tbody>
      <tr class="text-center" v-for=" (prix,id) in paiment_data" :key="id">
        <td>{{prix.nom}}</td>
        <td><button type="button" class="btn btn-dark"  data-bs-toggle="modal" @click="select_partenaire(prix)" data-bs-target="#choixModal">Facture</button></td>
        <td><button type="button" class="btn btn-dark" data-bs-toggle="modal" @click="select_partenaire(prix)" data-bs-target="#payeModal">Payer</button></td>
      </tr>
      </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="choixModal" tabindex="-1" aria-labelledby="choixModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <div class="col text-center"> <h5 class="modal-title" id="choixModalLabel"> Payement</h5></div>
          </div>
          <div class="modal-body">
            <div class="text-center">
            <p>{{information_partenaire.nom}}</p>
              <p>{{information_partenaire.Prix}}DH</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>
    <!--endmodal-->
    <!-- Modal -->
    <div class="modal fade" id="payeModal" tabindex="-1" aria-labelledby="payeModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <div class="col text-center"> <h5 class="modal-title" id="payeModalModalLabel"> Payement</h5></div>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <p> vous pouvez payer?</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal" @click="save_payer()">Enregister</button>
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>
    <!--endmodal-->
  </div>

</template>
<script>
import Navbar from "../components/Navbar.vue";
import axios from "axios";
export default {
  name: "Suivi_benefices",
  components: {
      Navbar,
  },
  data: function () {
    return {
      paiment_data:[],
      information_partenaire:{}
    }
  },
  mounted(){
    let test_type_of_user=JSON.parse(localStorage.getItem("Type_user"));
    if(test_type_of_user!==1){
      this.$router.push({path:'/'});
    }
    this.getrendez_vousdata();
  },
  methods: {
    async getrendez_vousdata() {
      let res = await axios.get("http://localhost/Backend_filRouge/Read-px");
      const restdata = res.data;
      if (res.status === 200) {
        if (restdata.error) {
          //si il ya erreur
          this.errMsg = restdata.message;

        } else {
          this.paiment_data = restdata.prix.filter((el)=>el.type_paiment===0);
        }
      }
    },
    select_partenaire(info)
    {
      this.information_partenaire=info;
    },
    toFormData(obj){
      var fd=new FormData();
      for (var i in obj) {
        fd.append(i, obj[i]);
      }
      return fd;
    },
   async save_payer(){
     let Data_rv=this.toFormData({id_paiment:this.information_partenaire.id_paiment});
     let res=await axios.post("http://localhost/Backend_filRouge/change-ty",Data_rv);
     const resData=res.data;
     if (res.status == 200){
       if (resData.error){
         console.log(resData.message);
       }else {
         this.information_partenaire={};
         this.getrendez_vousdata();
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
button.btn.btn-success {
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