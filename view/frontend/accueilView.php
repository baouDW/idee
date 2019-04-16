
<?php $title = 'accueil'; ?>
<?php ob_start(); ?>
<body>
  <div class="bgded overlay" style="background-image:url('public/images/demo/backgrounds/06.jpg');"> 
   <section id="pageintro" class="hoc clear">
    <div>
      <h2 class="heading">Inspire le monde</h2>
      <p>Venez partager vos idée et inspirez le monde</p>
      <footer><a class="btn" href="index.php?action=acctheme">Theme du jour</a></footer>
    </div>
  </section>
</div>
<div class="wrapper row2">
  <section class="hoc container clear"> 
    <div class="sectiontitle">
      <h6 class="heading">Categories</h6>
      <p>Accedez aux differentes sections du site.</p>
    </div>
    <ul class="nospace group services">
      <li class="one_quarter first">
        <article><a href="#"><i class="fa fa-3x fa-500px"></i></a>
          <h6 class="heading font-x1"><a href="index.php?action=listestory">Histoires</a></h6>
          <p>Partager vos idées de livre, scenarios, films et de romans</p>
        </article>
      </li>
      <li class="one_quarter">
        <article><a href="#"><i class="fa fa-3x fa-lastfm"></i></a>
          <h6 class="heading font-x1"><a href="index.php?action=listeentreprise">Entreprise</a></h6>
          <p>Partager vos idées d'entreprise innovante ou testez votre idée en la presentant a la communauté</p>
        </article>
      </li>
      <li class="one_quarter">
        <article><a href="#"><i class="fa fa-3x fa-puzzle-piece"></i></a>
          <h6 class="heading font-x1"><a href="index.php?action=listepolitique">Politique</a></h6>
          <p>Recreez la politique en partageant des idées nouvelles</p>
        </article>
      </li>
      <li class="one_quarter">
        <article><a href="#"><i class="fa fa-3x fa-ravelry"></i></a>
          <h6 class="heading font-x1"><a href="index.php?action=listeworld">Planete</a></h6>
          <p>Proposez et venez debatre d'idée pour un monde meilleur.</p>
        </article>
      </li>
    </ul>
    <div class="clear"></div>
  </section>
</div>
  
</body>
<?php $content = ob_get_clean(); ?>
<?php require('templateFront.html'); ?>
</html>