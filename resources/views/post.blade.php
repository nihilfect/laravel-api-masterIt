<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sky Time Digital - Single Page Application Production">
    <meta name="author" content="">
    <title>Reddit 2.0</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/flatly/bootstrap.css" media="screen">
  </head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
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
                <a class="nav-link" href="/profile/88">Profilo <span class="sr-only"></span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div id="singleArticle" class="section-wrapper">
<h3>@{{article.titolo}}</h3>
<h5 class="article-author">@{{article.autore}}</h5>
<p>@{{article.content}}</p>
<h4> Commenti </h4>
<div class="comment-section" v-for="comment in article.comments" :key="comment.id">
  <div class="single-comment">
<span class="comment-author">@{{comment.by}}</span>
  <span>@{{comment.comment}}</span>
</div>
</div>
<div class="input-group comment-input">
  <input type="text" class="form-control">
  <button class="btn btn-outline-primary" type="button"><i class="fa fa-paper-plane"></i></button>
</div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
    <style scoped>
.section-wrapper {
  border-left: 2px solid orange;
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
    <script>
      new Vue({
        el: '#singleArticle',
        data: function(){
          return {
            article: {
              id:'99',
              titolo:'Titolo di Prova',
              autore:'Fgreco',
              content:'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit expedita explicabo, nobis velit modi ipsum fugit illo nihil ad adipisci et aperiam, dignissimos repellat similique necessitatibus debitis? Minus a ex aliquid ratione perferendis dicta porro.',
              comments: [{
                commentId: '1',
                by: "Pippo",
                comment: "Questo è un commento"
              }, {
                commentId: '2',
                by: "Pluto",
                comment: "Questo è un altro commento"
              }, {
                commentId: '3',
                by: "Paperino",
                comment: "Another one"
              }]
            }
          }
        }
      });
    </script>
</body>
</html>