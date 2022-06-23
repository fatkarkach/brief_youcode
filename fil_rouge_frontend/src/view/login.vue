<template>
  <div class="login">
  <img src="../assets/logo1.svg" class="center" alt="logo faho world">
    <form method="POST"  @submit.prevent="routeres">
      <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Email:</label>
        <input type="email" class="form-control" id="formGroupExampleInput" placeholder="Entrez votre Email" v-model="email">
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Mode passe:</label>
        <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Entrez votre Mode passe" v-model="password">
      </div>
      <span class="error-feedback" v-if="v$.email.$error">
                     {{v$.email.$errors[0].$message}}
        </span>
      <div class="col text-center">
        <button type="submit" class="btn btn-dark">Connecter</button>
      </div>
    </form>
  </div>
</template>
<script>
import useVuelidate from "@vuelidate/core"
import { required,email , minLength} from "@vuelidate/validators"
import axios from "axios";
export default {
  name:` login`,
  data(){
    return {
      v$:useVuelidate(),
      errMsg: "",
      successMsg:"",
      connect_successMsg:"",
      is_db_connected:"",
      is_db_connectedMsg:"",
      password: "",
      email:"",
    }
  },
  validations(){
    return{
      email:{required, email},
      password: {required, minLength:minLength(5)},
    }
  },
  mounted(){
    let Type_user=JSON.parse(localStorage.getItem("Type_user"));
    if(Type_user === 1){
      this.$router.push({name:'Home'});
    }else if(Type_user === 0){
      this.$router.push({name:'homeuser'});
    }else{
      this.$router.push({path:'/'});
    }
  },
  methods: {
    toFormData(obj){
      var fd=new FormData();
      for (var i in obj) {
        fd.append(i, obj[i]);
      }
      return fd;
    },
    async routeres() {
      this.v$.$validate();
      let test_type_of_user=null;
      if (!this.v$.$error) {
        let formData_rv = this.toFormData({email: this.email, password: this.password});
        let res = await axios.post(`http://localhost/Backende_filRouge/Login-u`, formData_rv);
        const resData = res.data;
        if (res.status == 200) {
          if (resData.error) {
            this.errMsg = resData.message;
          } else {
            if (resData.user_connecter) {
              this.connect_successMsg = resData.message_user;
              localStorage.setItem("Reference_user", true);
              localStorage.setItem("Type_user", resData.type_user);
              localStorage.setItem("id_user", resData.id_user);
              test_type_of_user=JSON.parse(localStorage.getItem("Type_user"));
              this.email = "";
              this.v$.email.$reset();
              if(test_type_of_user === 1){
                this.$router.push({name:'Home'});
              }else if(test_type_of_user === 0){
                this.$router.push({name:'homeuser'});
              }
              console.log('success');
            } else {
              this.connect_successMsg = resData.message_user;
              console.log('ERROR');
            }
          }

        }

      } else {
        // console.log('login user: not validate successfully');
        console.log('not success');
        localStorage.setItem("Reference_user", false);
      }
    }
  }
}
</script>

<style scoped>

.login {
  margin : auto;
  border: solid;
  padding: 30px;
  margin-top:10%;
  width:30%;
  border-radius: 50px;
  font-family: "Space Grotesk", sans-serif;
  background-image:url('~@/assets/gradient.png');
  background-size: cover;
  }
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
button.btn.btn-dark {
  width: 144px;
  border-radius: 100px;
  height:30px;
  text-align: center;
  padding: 0;
}
@media screen and (max-width: 600px) {
  .login
  {
    width:80%;
  }
}
</style>