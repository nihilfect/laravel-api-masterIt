<template>
    <div id="singleArticle" class="container mt-3">
        <div class="row">
            <div class="col-12">
                <h3>{{post.title}}</h3>
            </div>
        </div>

        <h5 class="article-author">{{post.userid}}</h5>
        <p>{{post.body}}</p>
        <h4>Commenti</h4>

        <div
            class="comment-section"
            v-for="comment in post.comments"
            :key="comment.id"
        >
            <div class="single-comment">
                <span class="comment-author">{{comment.user.name}}</span>
                <span>{{comment.body}}</span>
            </div>
        </div>

        <form action="#"> <!----@submit.prevent="edit ? updateContact(contact.id) : createPost()--->
            <div class="form-group">
                <label>Inserisci qui il commento:</label>
                <textarea v-model="comment.body" class="form-control"></textarea>
    </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary comment-input" @click="createComment"><i class="fa fa-paper-plane"></i></button>
            </div>
        </form>
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
    data (){
        return {
            url:'http://127.0.0.1:8000/api/posts/withuser/',
            post: {
                id: '',
                title: '',
                userid: '',
                body: '',
                comments: [],
            },
            users: [],
            usersMap: [],
            comment:{
                userid: '',
                postid: '',
                body: '',
            }
        }
    },
    mounted: function(){

        this.fetchSinglePost();
        this.fetchUsers();

    },
    methods: {
        fetchUsers: function(){
            let url = 'http://127.0.0.1:8000/api/users/';
            let self = this;
            axios.get(url)
                .then((response) => {
                    this.users = response.data

                    console.log(this.users);
                })
        },
        fetchSinglePost:function(){
            console.log('Fetching posts...');
            let lastUrlString = window.location.href.split('/');
            let self = this
            axios.get(this.url+lastUrlString[lastUrlString.length-1])
                .then((response) => {
                    let datas = response.data[0];
                    console.log(response.data[0]);
                    self.post.comments  = datas.comment;
                    self.post.title     = datas.title;
                    self.post.body      = datas.body;
                    self.post.id        = datas.id;
                    console.log(self.post);
                }).catch((error) => {
                console.log(error);
            });

        },

        createComment:function(){
            let self = this;
            let lastUrlString = window.location.href.split('/');
            const regex = /^[0-9]*/;
            const commentParameters = {
                'body': self.comment.body,
                'user_id': localStorage.getItem('userid'),
                'post_id': (lastUrlString[lastUrlString.length-1]).match(regex)[0]
            }
            console.log(commentParameters);
            let commentForm =  getFormData(commentParameters);
            axios.post(window.location.origin+'/api/comments', commentForm)
                 .then(function (){
                     self.fetchSinglePost();
                     self.comment.body = '';
                 })
                .catch(function(error){
                    console.log(error);
                });
        }


    }

}
</script>

<style scoped>
.section-wrapper {
    /* border-left: 2px solid orange; */
    width: 70%;
    margin: 0 auto;
    margin-top: 30px;
    padding: 20px 15px;
}

.comment-author, .article-author {
    color: orange;
    margin-right: 5px;
}

.article-author {
    font-weight: bold;
}

.single-comment {
    padding: 5px 0
}

.comment-input {
    margin-top: 20px;
}

</style>
