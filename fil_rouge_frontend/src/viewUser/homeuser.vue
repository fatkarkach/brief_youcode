<template>
  <NavbarUser></NavbarUser>
  <!--  cards-->
  <div class="cartes">
    <div class="container d-flex flex-wrap align-items-center">
      <div class="card" style="width: 16rem;">
        <img src="~@/assets/image3.png" class="card-img-top" alt="...">
        <div class="card-body">
          <router-link to="/achatsuser" class="btn btn-primary"><FAIFatma   :icon="['fas' ,'eye']" class="icon alt" /> Plus détails</router-link>
        </div>
      </div>
      <div class="card" style="width: 16rem;">
        <img src="~@/assets/client.png" class="card-img-top" alt="...">
        <div class="card-body">
          <router-link to="/client" class="btn btn-primary"><FAIFatma   :icon="['fas' ,'eye']" class="icon alt" /> Plus détails</router-link>
        </div>
      </div>
      <div class="card" style="width: 16rem;">
        <img src="~@/assets/image5.png" class="card-img-top" alt="...">
        <div class="card-body">
          <router-link to="/Achat" class="btn btn-primary"><FAIFatma   :icon="['fas' ,'eye']" class="icon alt" /> Plus détails</router-link>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import NavbarUser from "../components/NavbarUser.vue";
export default {
  name: `homeUser`,
  components: {
    NavbarUser,
  }
  ,
  mounted(){
    let test_type_of_user=JSON.parse(localStorage.getItem("Type_user"));
    if(test_type_of_user!==0){
      this.$router.push({path:'/'});
    }
  },
}
</script>
<style scoped>
.cartes{
  font-family: "Space Grotesk";
}
.card{
  border-radius: 8px;
  border: 1px solid #cccccc;
  display: flex;
  box-sizing: border-box;
  transition: all linear 200ms;
}
.card:hover{
  transform: scale(1.1);
  transition: all linear 200ms;
  z-index: 1;
  box-shadow: 1px 1px 10px rgba(0,0,0,.3);
  cursor: pointer;
}
.cartes {
  margin-left: 19%;
  margin-right: 15%;
}
.card {
  margin-left: 10px;
  margin-top: 20px;
}
a.btn.btn-primary {
  margin-bottom: 2px;
  font-size:14px;
}
a.btn.btn-primary {
  background-color: black;
  border:black;
  border-radius:100px
}
.card-body
{
  padding:10px;
}
img{
  height:150px;
}

</style>