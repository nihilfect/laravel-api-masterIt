<template>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6">
                <p class="lead"><br>
                    <!--a class="btn btn-primary" type="button" data-bs-toggle="collapse" data-target="#collapseForm" role="button" aria-expanded="false" aria-controls="collapseForm">
                        Crea un articolo <i class="fa fa-plus ml-2" aria-hidden="true"></i>
                    </a ----->
                    <a class="btn btn-primary"  href="#collapseExample" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Crea un articolo
                    </a>
                </p>
            </div>

        </div>
    </div>
    <div>
        <div class="collapse " id="collapseExample">
            <form action="#"> <!----@submit.prevent="edit ? updateContact(contact.id) : createPost()--->
                <div class="form-group">
                    <label>Titolo</label>
                    <input v-model="post.title" type="text" name="titolo" class="form-control">
                </div>
                <div class="form-group">
                    <label>Racconta qualcosa qui:</label>
                    <textarea v-model="post.body" name="email" class="form-control"></textarea>
                </div>
                <div class="form-group mt-3">
                    <button v-show="!edit" type="submit" class="btn btn-primary" @click="createPost">Invia l'articolo</button>
                    <button v-show="edit" type="submit" class="btn btn-primary" @click="updatePost">Modifica articolo</button>
                </div>
            </form>
        </div>
        <hr>
        <!--<table class="table">
            <thead class="table-success">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Autore</th>
                <th scope="col"></th>
                <th scope="col"></th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="post in list">
                <th scope="row"><a :href="'/post/' + post.id">{{post.id}}</a></th>
                <td>{{post.title}}</td>
                <td>{{post.body}}</td>

                 <td>@{{contact.email}}</td>
                <td>@{{contact.phone}}</td>
                <td class="text-center">
                    <a @click="showPost(post)" class="fa fa-edit fa-lg" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></a>
                    <a @click="deletePost(post.id)" class="fa fa-times fa-lg"  style="color: red; cursor: pointer"></a>
                </td>
            </tr>
            </tbody>
        </table> ---->


        <div class="container d-flex flex-wrap " >
            <div class="card m-2" style="width: 18rem;" v-for="post in list">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title w-75">{{post.title}}</h5>
                        <div v-if="current_user_id == post.user_id" class="w-25 d-flex justify-content-evenly">
                            <a @click="showPost(post)" class="fa fa-edit fa-lg" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></a>
                            <a @click="deletePost(post.id)" class="fa fa-times fa-lg"  style="color: red; cursor: pointer"></a>
                        </div>
                    </div>

                    <p class="card-text">{{post.body}}</p>
                    <small class="fw-bold fst-italic mt-auto mb-1">{{post.name}}</small>
                    <a :href="'/post/' + post.id" class="btn btn-primary">Go to the article</a>
                </div>

            </div>
        </div>
        <div>

            <div class="pagination pagination-lg float-right justify-content-center mt-3 mb-5">
                <button class="page-link" @click="fetchPaginateData(pagination.prev_page_url)" :disabled="!pagination.prev_page_url">
                    &laquo;
                </button>
                <span class="page-link" >{{ pagination.current_page }}  of  {{ pagination.last_page }}</span>
                <button class="page-link" @click="fetchPaginateData(pagination.next_page_url)" :disabled="!pagination.next_page_url">
                    &raquo;
                </button>
            </div>
        </div>
    </div>
</div>
</template>


<script>
function getFormData (object){
    const formData = new FormData();
    Object.keys(object).forEach(key => {
        if (typeof object[key] !== 'object') formData.append(key, object[key]);
        else formData.append(key, JSON.stringify(object[key]));
    });
    return formData;
}

export default {
    data(){
        return {
            current_user_id: localStorage.getItem("userid"),
            edit:false,
            list:[],
            total:'',
            message:'',
            post:{
                title:'',
                body:'',
                id:'',

            },
            url: '/api/posts',
            pagination:[]
        }
    },
    mounted: function(){
        this.fetchPostsList();
    },

    methods: {
        fetchPaginateData:function(url){
            this.url = url
            this.fetchPostsList();
        },

        makePagination:function(data){
            let pagination = {
                current_page: data.current_page,
                last_page: data.last_page,
                next_page_url: data.next_page_url,
                prev_page_url: data.prev_page_url
            }
            this.pagination = pagination
        },
        getContactCount:function(){
            console.log('Counting contacts...');
            axios.get('api/contact/total')
                .then((response) => {
                    this.total = response.data;
                }).catch((error) => {
                console.log(error);
            });
        },
        fetchPostsList:function(){
            console.log('Fetching contacts...');
            let $this = this
            axios.get(this.url)
                .then((response) => {
                    console.log(response.data);
                    this.list = response.data.data;
                    $this.makePagination(response.data);

                }).catch((error) => {
                console.log(error);
            });

        },

        createPost: function(){

            let self = this;
            self.edit = false;
            const postParameters = {
                'title': self.post.title,
                'body': self.post.body,
                'user_id': this.current_user_id
            }
            console.log(postParameters);
            let postForm =  getFormData(postParameters);

            axios.post('api/posts', postForm)
                .then(function(){
                    self.fetchPostsList();
                    self.post.title = '';
                    self.post.body = '';
                    self.post.id = '';
                })
                .catch(function(error){
                    console.log(error);
                });
        },
        showPost: function (post){
            let self = this;
            self.post.id = post.id;
            self.post.title = post.title;
            self.post.body = post.body;
            self.edit = true;
        },
        updatePost: function(){
            let self = this;
            const putParameters = {
                'title': self.post.title,
                'body': self.post.body,
                'user_id': localStorage.getItem('userid'),
                'id': self.post.id
            }
            //let postForm =  getFormData(putParameters);
            axios.put('api/posts/'+self.post.id, putParameters)
                .then(function(){
                    self.fetchPostsList();
                    self.post.title = '';
                    self.post.body = '';
                    self.post.id = '';
                    self.edit = false;
                })
                .catch(function(error){
                    console.log(error);
                });
        },
        deletePost: function(id){
            let self = this;
            axios.delete('api/posts/'+id)
                .then(function(response){
                    self.fetchPostsList();
                })
                .catch(function(error){
                    console.log(error);
                });
        }
    }
}

</script>
