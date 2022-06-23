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
      <tr class="text-center">
        <td>Lhoussaine Hssini</td>
        <td><button type="button" class="btn btn-dark"  data-bs-toggle="modal" data-bs-target="#choixModal">Facture</button></td>
        <td><button type="button" class="btn btn-dark">Payer</button></td>
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
            <p>Fatma karkach</p>
              <p>1200DH</p>
            </div>
          </div>
          <div class="modal-footer">
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
export default {
  name: "Suivi_benefices",
  components: {
      Navbar,
  },
  data: function () {
    return {
    }
  },
  mounted(){
    let test_type_of_user=JSON.parse(localStorage.getItem("Type_user"));
    if(test_type_of_user!==1){
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