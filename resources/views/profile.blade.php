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
    <div id="profile" class="section-wrapper">
        <h3>Profilo di @{{username}}</h3>
        <h5><strong>@{{completeName}}</strong></h5>
            <span class="label">Bio</span><span>@{{bio}}</span>
            <div class="articles-section">
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
              <tr v-for="article in articleList">
                <th scope="row"><a :href="'/article/' + article.id">@{{article.id}}</a></th>
                <td>@{{article.titolo}}</td>
                <td>@{{article.content}}</td>
              </tr>
            </tbody>
          </table>
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

.articles-section {
    margin-top: 50px;
}

.label {
    margin-right: 5px;
    color: orange;
    font-weight: bold;
}
</style>
    <script>
      new Vue({
        el: '#profile',
        data: function(){
          return {
              username: 'Fgreco',
              completeName: 'Federico Greco',
              bio: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
              articleList: [{
              id:'99',
              titolo:'Primo articolo di Fgreco',
              content:'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
            },
            {
              id:'2',
              titolo:'Secondo articolo di Fgreco',
              content:'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
            }]
          }
        }
      });
    </script>
</body>
</html>