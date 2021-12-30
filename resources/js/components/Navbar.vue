<template>
    <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-green">
        <div class="container">
            <a class="navbar-brand" href="#">Reddit 2.0</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" :href="'profile/'+userLogged">Profilo <span class="sr-only"></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </div>
</template>

<script>
export default {
    data(){
        return{
            userLogged: localStorage.getItem('userid')
        }
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
