
<!doctype html>
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
    <div id="auth" class="wrapper">   
    <h1 class="h3 mb-3 fw-normal">Reddit 2.0</h1>
    <div class="mb-3">
              <label for="username">Nome utente</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" placeholder="Inserisci il nome utente" required="">
              </div>
            </div><div class="mb-3">
              <label for="username">Password</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Password" required="">
              </div>
            </div>
    <button class="mx-auto w-50 btn btn-lg btn-primary" type="submit">Login</button>
      </div>   
      <footer><span>Antonio && Federico x Master IT Fullstack - 2021</span></footer>   

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
    <style scoped>
      .wrapper {
        display: flex;
    margin: auto;
    width: 50%;
    height: 90vh;
    flex-direction: column;
    justify-content: center;
      }

      footer {
        text-align: center;
        font-size: 1rem;
      }
</style>
    <script>
      new Vue({
        el: '#auth',
        data: function(){
        },
        mounted: function(){
        },

        methods: {}
      });
    </script>
    </body>
</html>
