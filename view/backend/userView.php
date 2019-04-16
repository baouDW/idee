<?php $title = 'Membres'; ?>

<?php ob_start(); ?>

<div class="col-md-12">
  <div class="card card-plain">
    <div class="card-header card-header-primary">
      <h4 class="card-title mt-0"> Membres</h4>
      <p class="card-category"> </p>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th class="none">
              </th>
              <th>Nom</th>
              <th>Pseudo</th>
              <th>Email</th>
              <th>Date d'inscription</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($data = $user->fetch())
            {
            ?>
            <tr>
              <td class="none">
              </td>
              <td><?= $data['nom'] ?></td>
              <td><?= $data['pseudo'] ?></td>
              <td><?= $data['email'] ?></td>  
              <td><?= $data['date_inscription'] ?></td>       
            </tr> 
            <?php
            }
            $user->closeCursor();
            ?>                                 
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- </div> -->
<?php $content = ob_get_clean(); ?>
<?php require('templateBackend.php'); ?>