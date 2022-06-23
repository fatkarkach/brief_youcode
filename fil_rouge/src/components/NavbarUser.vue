<template>
  <div class="all" >
    <img src="../assets/logo1.svg" id="logo">
    <div class="bordures">
      <span class="open-slide">
        <a href="#" @click="opened = !opened">
          <div>
            <div v-if="!opened"><FAIFatma   :icon="['fas' ,'align-justify']" class="icon alt" /></div>
            <div v-if="opened"><FAIFatma   :icon="['fas' ,'xmark']" class="icon alt" /></div>
          </div>
        </a>
      </span>
    </div>
  </div>
  <div id="side-menu" class="side-nav" :class="{sidenavopen: opened}">
    <router-link to="/homeuser"><FAIFatma :icon="['fas' ,'house']" class="icon alt" /><span class="mobile">Acceuil</span></router-link>
    <router-link to="/payementuser"><FAIFatma   :icon="['fas' ,'arrow-trend-up']" class="icon alt" /> <span class="mobile">Suivi Paiment</span></router-link>
    <div class="col text-center"> <button type="button" class="btn btn-dark" @click="logout()">Déconnexion</button></div>
  </div>
</template>
<script>
import axios from "axios";

export default {
  name: "NavbarUser",
  el: "#allTheNav",
  data()
  {
    return {
      opened: false,
    }
  },
  methods: {
    async logout() {
      let res= await axios.get("http://localhost/Backend_filRouge/Login-u")
      const restdata=res.data;
      if(res.status==200)
      {
        if(restdata.error){
          //si il ya erreur
          this.errMsg=restdata.message;
        }else{
          localStorage.removeItem('Reference_user');
          localStorage.removeItem('Type_user');
          this.$router.push({name:'login'});
        }

      }
    },
  }
}
</script>
<style scoped>
.all{
  margin-top:5px;
  background-image:url('~@/assets/gradient.png');
  border-radius:50px;
  background-size: cover;
  width: 100%;
  height: 50px;
}
/*siedbar*/
.side-nav{
  height: 80%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 60px;
  left: 20px;
  background-image:url('~@/assets/gradient.png');
  border-radius:50px;
  background-size: cover;
  opacity: 0.9;
  overflow-x: hidden;
  padding-top: 60px;
  transition: 0.3s;
}

.sidenavopen{
  height: 80%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 60px;
  left: 20px;
  background-color: #111;
  opacity: 0.9;
  padding-top: 60px;
  transition: 0.3s;
}

.side-nav a{
  padding: 10px 10px 10px 30px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block;
  transition: 0.3s;
  font-style: normal;
  font-family: Space Grotesk;
  font-weight: bold;
}
.bar{
  display: block;
  height: 3px;
  width: 30px;
  background-color: white;
  margin-top: 5px;
  margin-bottom: 5px;
}
.bordures {
  margin-left: 20px;
  margin-top: -36px;
  padding: 3px;
  border: solid 2px;
  border-radius: 10px;
  position: absolute;
  background-color: black;
  width: 34px;
  padding-left: 8px;
}
button.btn.btn-dark {
  width: 144px;
  border-radius: 100px;
  height:30px;
  text-align: center;
  padding: 0px;
  font-size: 15px;
}
img#logo {
  margin: 10px;
  margin-top:15px;
  margin-left: 70px;
}
@media screen and (max-width: 600px) {
  .sidenavopen{
    height: 30%;
    width: 50px;
    position: fixed;
    z-index: 1;
    top: 60px;
    left: 5px;
    background-color: #111;
    opacity: 0.9;
    padding-top: 60px;
    transition: 0.3s;
  }
  span.mobile {
    display: none;
  }
  .side-nav a {
    padding:12px;
  }
  button.btn.btn-dark {
    display:none;
  }

}
svg.svg-inline--fa.fa-align-justify.icon.alt {
  color: white;
}
svg.svg-inline--fa.fa-xmark.icon.alt
{
  color: white;
}
span.mobile {
  font-size: 15px;
}
svg.svg-inline--fa.fa-xmark.icon.alt {
  margin-left: 2px;
}
</style>