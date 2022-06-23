<template>
  <Navbar></Navbar>
  <div class="titres">
    <h5 class="text-center">Les partenaires</h5>
  </div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
      <tr class="text-center entete">
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Information</th>
        <th scope="col">Action</th>

      </tr>
      </thead>
      <tbody>
      <tr class="text-center"   v-for="(partenaire,id) in partenaire_data_Accepté" :key="id">
        <td>{{partenaire.nom}}</td>
        <td>{{partenaire.prénom}}</td>
        <td><button type="button" class="btn btn-dark" @click="Select_partenaire(partenaire)"  data-bs-toggle="modal" data-bs-target="#exampleModal">Autre information</button></td>
        <td><div class="l-icons"><button class="icons text-white bg-dark" @click="Select_idpartenaire(partenaire.id)" data-bs-toggle="modal" data-bs-target="#trashModal"> <FAIFatma  :icon="['fas' ,'trash']" class="icon alt"/></button></div></td>
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
            <p>{{ partenaire_information.nom }} {{partenaire_information.prénom}}</p>
            <p>URL du magasin:<a>https://fr.shein.com/</a></p>
            <p>{{partenaire_information.email}}</p>
            <p>Paye:Maroc</p>
            <p>Catégorie:accessoires</p>
            <p>Plateforme:woo commerce</p>
            <p>Chiffre d'affaires annuel: plus de 15 mille dollars</p>
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
  <div class="modal fade" id="trashModal" tabindex="-1" aria-labelledby="trashModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="col text-center"> <h5 class="modal-title" id="exampleModalLabel"> Supprimer partenaire</h5></div>
        </div>
        <div class="modal-body">
          <div class="text-center">
            vouslez-vous supprimer?
          </div>
        </div>
        <div class="modal-footer">
          <div class="col text-center">  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button></div>
          <div class="col text-center">  <button type="button" class="btn btn-dark" data-bs-dismiss="modal" @click="deletepartenaire()">Enregistrer</button></div>
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
  name: `Partenaire`,
  components: {
      Navbar,
  },
  data() {
    return {
      partenaire_data:[],
      currentpartenaire:{},
      partenaire_information:{},
      }
  },
  mounted(){
    let test_type_of_user=JSON.parse(localStorage.getItem("Type_user"));
    // this.get_R_U=test_type_of_user;
    if(test_type_of_user!==1){
      this.$router.push({path:'/'});
    }
    this.getrendez_vousdata();
  },computed:{
    partenaire_data_Accepté(){
      return this.partenaire_data.filter((el)=>el.option==='Accepté');
    }
  }
,
  methods: {
    Select_partenaire(info){
      this.partenaire_information=info;
    },
    Select_idpartenaire(info){
      this.id=info;
    },
      async  getrendez_vousdata(){
        let res= await axios.get("http://localhost/Backend_filRouge/Read-rv")
        const restdata=res.data;
        if(res.status==200)
        {
          if(restdata.error){
            //si il ya erreur
            this.errMsg=restdata.message;

          }else{
            this.partenaire_data=restdata.r_v;
          }

        }
      },
    toFormData(obj){
      var fd=new FormData();
      for (var i in obj) {
        fd.append(i, obj[i]);
      }
      return fd;
    },
    async  deletepartenaire(){
      let formData_rv = this.toFormData({id:this.id});
      let res= await axios.post("http://localhost/Backend_filRouge/Delete-rv", formData_rv);
      const restdata=res.data;
      if(res.status==200)
      {
        if(restdata.error){
          //si il ya erreur
          this.errMsg=restdata.message;

        }else{
          this.currentrendez_vous= {};
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
button.btn.btn-danger {
  width: 144px;
  border-radius: 100px;
  height:30px;
  text-align: center;
  padding: 0px;
  font-size: 15px;
}
button.icons {
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
.l-icons {
  display: flex;
  justify-content: center;
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