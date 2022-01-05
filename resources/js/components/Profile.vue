<template>
    <div id="profile" class="section-wrapper">
        <h3>Profilo di {{username}}</h3>
        <!---span class="label">Bio</span><span>{{bio}}</span---->
        <div class="articles-section" v-if="posts.length > 0" >
            <h5><strong>Articoli creati da questo profilo</strong></h5>
            <table class="table">
                <thead class="table-success">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="article in posts">
                    <th scope="row"><a :href="'/post/' + article.id">{{article.id}}</a></th>
                    <td>{{article.title}}</td>
                    <td>{{article.body}}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <h2 v-else>Questo profilo non ha scritto nessuno articolo</h2>
    </div>
</template>


<script>
export default{
    data(){
        return {
            posts: [],
            username: '',

        }
    },
    methods:{
        getProfile: function(){
            axios.get(window.location.origin+'/api/userswithpost/'+localStorage.getItem('userid'))
                .then((response) => {
                    console.log(response.data[0]);
                    let resp = response.data[0];
                    this.posts = resp.posts;
                    this.username = resp.name;
                    console.log(this.posts);
                }).catch((error) => {
                console.log(error);
            });
        }
    },
    mounted: function(){
        this.getProfile();
    }
}
</script>
