<template>
  <Navbar></Navbar>
  <div class="titres">
    <h5 class="text-center">les commandes</h5>
  </div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
      <tr class="text-center entete">
        <th scope="col">Produit</th>
        <th scope="col">Client</th>
        <th scope="col">Quantité</th>
        <th scope="col">Prix(DH)</th>
        <th scope="col">Date de livraison</th>
        <th scope="col">Action</th>

      </tr>
      </thead>
      <tbody>
      <tr class="text-center" v-for="(produit,id_commandes) in produit_data" :key="id_commandes">
        <td>{{produit.produit}}</td>
        <td><button type="button" class="btn btn-dark"   @click="Select_users(produit)" data-bs-toggle="modal" data-bs-target="#exampleModal">Information</button></td>
        <td>{{produit.quantité}}</td>
        <td>{{produit.prix}}</td>
        <td>{{produit.date_livraison}}</td>
        <td><button type="button" class="btn btn-dark"  @click="Select_choix(produit.id_commandes)" data-bs-toggle="modal" data-bs-target="#choixModal" :style= "[produit.option==='livré' ? {'background-color': '#008000','border':'#008000'}: produit.option==='En cours de livraison' ? {'background-color': '#EDB891','border':'#EDB891'} : {'background-color': 'black'}]">{{produit.option}} </button></td>
      </tr>
      </tbody>
    </table>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="col text-center"> <h5 class="modal-title" id="exampleModalLabel"> Autres Informations</h5></div>
        </div>
        <div class="modal-body">
          <div class="text-center">
            <p>Nom et prénom:{{users_information.nom}} {{users_information.prénom}}</p>
            <p>Téléphone:0673317053</p>
            <p>E-mail:{{users_information.email}}</p>
            <p>Paye:Maroc</p>
            <p>{{users_information.cin}}</p>
          </div>
        </div>
        <div class="modal-footer">
          <div class="col text-center">  <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button></div>
        </div>
      </div>
    </div>
  </div>
  <!--endmodal-->
  <!-- Modal -->
  <div class="modal fade" id="choixModal" tabindex="-1" aria-labelledby="choixModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="col text-center"> <h5 class="modal-title" id="choixModalLabel"> Confirmerla demande</h5></div>
        </div>
        <div class="modal-body">
          <div class="text-center">
            <select class="form-select" aria-label="Default select example" v-model="status_commande">

              <option>livré</option>
              <option>En cours de livraison</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <div class="col text-center">  <button type="button" class="btn btn-dark" data-bs-dismiss="modal" @click="updatecommande()">Enregistrer</button></div>
          <div class="col text-center">  <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button></div>
        </div>
      </div>
    </div>
  </div>
  <!--endmodal-->
</template>
<script>
import Navbar from "../components/Navbar.vue";
import axios from "axios";
export default {
  name: `commandes`,
  components: {
    Navbar,
  },
  data: function () {
    return {
      produit_data:[],
      users_information:{},
      status_commande:'',
      currentcommande:{},
      id_commandes:null,

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
        }

      }
    },
    Select_users(info){
      this.users_information=info;
    },
    Select_choix(info){
      this.id_commandes=info;
    },
    toFormData(obj){
      var fd=new FormData();
      for (var i in obj) {
        fd.append(i, obj[i]);
      }
      return fd;
    },
    async updatecommande(){
      let formData_rv = this.toFormData({id_commandes:this.id_commandes,option:this.status_commande});
     console.log(this.id_commandes);
      let res=await axios.post("http://localhost/Backend_filRouge/Update-cmd", formData_rv);
      const resData=res.data;
      if (res.status == 200){
        if (resData.error){
          console.log(resData.message);
        }else {
          this.currentcommande={};
          this.getrendez_vousdata();
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