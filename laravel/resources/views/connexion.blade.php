@include('entete')
    <body>

	<div class="container">
	  <div class="row">
	    <div class="text-center">
	      <h1>
	        <a href="/">Application Parking</a>
	      </h1>
	    </div>
	  </div>
	</div>

	<div class="container">
	<div class="row">
	  <form class="sign-in">
	    <h2 class="form-signin-heading">Connectez-vous</h2>
	    <label for="inputEmail" class="sr-only">Adresse mail</label>
	    <input id="inputEmail" class="form-control" placeholder="Adresse mail" required="" autofocus="" type="email">
      	    <label for="inputPassword" class="sr-only">Mot de passe</label>
	    <input id="inputPassword" class="form-control" placeholder="Mot de passe" required="" type="password">
	    <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
	  </form>
	</div>

    </body>
</html>
