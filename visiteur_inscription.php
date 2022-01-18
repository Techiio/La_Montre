<!DOCTYPE html>
<html lang="fr">
  <head>
    <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Visiteur Inscription</title>

      <!-- font awesome cdn link  -->
      <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      />

      <!-- custom css file link  -->
      <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
      <!-- header section starts  -->

      <header class="header">
        <a class="logo">
          <img src="images/EkoS.png" alt="" />
        </a>
        <nav class="navbar">
          <a href="visiteur_connexion.php">Connexion</a>
        </nav>

        <a href="index.php" class="logo">
          <img src="images/LaMontreS.png" alt="" />
        </a>
      </header>

      <!-- header section ends -->

      <!-- inscription section starts  -->
      <div class="content">
        <h1 class="heading"><span>Je</span> m'inscris</h1>
      </div>

      <section class="inscri" id="inscri">
        <h1 class="heading"><span>Je</span> m'inscris</h1>

        <div class="row">
          <form action="connexion log/register.php" method="post">
            <div class="inputBox">
              <span class="fas fa-user"></span>
              <input type="text" name="Identifiant" placeholder="Prénom" />
            </div>
            <div class="inputBox">
              <span class="fas fa-fire"></span>
              <input type="text" name="CodeProduit" placeholder="Code produit" />
            </div>
            <div class="inputBox">
              <span class="fas fa-house-user"></span>
              <input type="number" name="CodeFamille" placeholder="Code famille" />
            </div>
            <div class="inputBox">
              <span class="fas fa-id-badge"></span>
              <input type="password" name="mdp1" placeholder="Mot de passe" />
            </div>
            <div class="inputBox">
              <span class="fas fa-id-badge"></span>
              <input
                type="password"
                name="mdp2"
                placeholder="Confirmation mot de passe"
              />
            </div>
            <div>
              <input type="checkbox" name="gest" value="check" class="check" />
              <label for="check">
                <h4>
                  Cochez si vous souhaitez être le gestionnaire de votre famille
                </h4>
              </label>
                <br>
                <input type="checkbox" name="CGU" value="check" id="check" class="check" />
                <label for="check">
                    <h4>
                        J'accepte les CGU (Obligatoire) 
                    </h4>
                </label>
            </div>
            <input
              type="submit"
              value="S'inscrire"
              name="formsend"
              id="formsend"
              class="btn"
            />
          </form>
        </div>
      </section>
    </body>
  </head>

  <section class="footer">

      <div class="links">
          <a href="visiteur_CGU.php"  style="margin:0 4%;">CGU</a>
          <a>Version: 1.0.12.201</a>
      </div>


  </section>

</html>
