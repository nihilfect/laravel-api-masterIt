<template>
    <div id="auth" class="glass_login container">
        <div class="row">
            <div class="col-12">
                <h1 class="h3 mb-3 fw-normal d-flex justify-content-center text-white">Reddit 2.0</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex-justify-content-center">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="name-input" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"  required>
                </div>
            </div>
            <div class="col-12 d-flex-justify-content-center">
                <div class="input-group mb-3">
                    <input type="password" class="form-control"  placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" >
                </div>
            </div>
            <div class="offset-3 col-6 d-flex-justify-content-center">
                <button class="w-100 btn btn-lg bg-gradient text-white" type="submit" id="login" @click="fetchUser">Login</button>
            </div>
        </div>

    </div>
</template>

<script>



export default {
    data(){
        return{

        }
    },
    methods:{
        fetchUser: function (){
            let name = document.getElementById('name-input').value;
            axios.get(`/api/users/name/${name}`)
                .then((response)=>{
                    const names = response.data;
                    console.log(response.data);
                    if (names.status === 'error'){
                        alert("L'utente non esiste :'( ");
                    }
                    else{
                    localStorage.setItem('username', names.name);
                    localStorage.setItem('userid', names.id);
                    localStorage.setItem('useremail', names.email);
                    window.location.href = '/home';
                    }
                })



        }
    },
    mounted:function(){
        //this.fetchUser();
    }
}
</script>
