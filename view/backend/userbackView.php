<?php $title = 'Publications'; ?>

<?php ob_start(); ?>

<div class="col-md-12">
  <div class="card card-plain">
    <div class="card-header card-header-primary">
      <h4 class="card-title mt-0"> Mes publications</h4>
      <p class="card-category"></p>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th class="none">             
              </th>
              <th>Titre</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>                 
            <!-- world posts -->
            <?php
            while ($data = $wposts->fetch())
            {
            ?> 
            <tr>
              <td class= "none">              
              </td>
              <td>
                <a href="index.php?id=<?= $data['id'] ?>&action=worldpost"><?= $data['title'] ?>
              </td>
              <td>
                <?= $data['creation_date_fr'] ?>          
              </td>
              <td>
                <a href="./index.php?action=upview&id=<?= $data['id'] ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                </a>
                <a href="index.php?id=<?= $data['id'] ?>&action=suppr" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                </a>
              </td>                               
            </tr>             
            <?php
            }
            $wposts->closeCursor();
            ?>     
            <!-- entreprise posts -->
            <?php
            while ($edata = $eposts->fetch())
            {
            ?> 
            <tr>
              <td class= "none">              
              </td>
              <td><a href="index.php?id=<?= $edata['id'] ?>&action=entreprisepost"><?= $edata['title'] ?></td>
              <td><?= $edata['creation_date_fr'] ?></td>
              <td>
                <a href="./index.php?action=upentrepriseview&id=<?= $edata['id'] ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                </a>
                <a href="index.php?id=<?= $edata['id'] ?>&action=supprentreprise" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                </a>
              </td>                               
            </tr>             
            <?php
            }
            $eposts->closeCursor();
            ?>  
            <!-- politique posts -->
            <?php
            while ($pdata = $pposts->fetch())
            {
            ?> 
            <tr>
              <td class= "none">              
              </td>
              <td>
                <a href="index.php?id=<?= $pdata['id'] ?>&action=politiquepost"><?= $pdata['title'] ?>
              </td>
              <td><?= $pdata['creation_date_fr'] ?></td>
              <td>
                <a href="./index.php?action=uppolitiqueview&id=<?= $pdata['id'] ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                <a href="index.php?id=<?= $pdata['id'] ?>&action=supprpolitique" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
              </td>                               
            </tr>             
            <?php
            }
            $pposts->closeCursor();
            ?> 
            <!-- story posts -->
            <?php
            while ($sdata = $sposts->fetch())
            {
            ?> 
            <tr>
              <td class= "none">              
              </td>
              <td><a href="index.php?id=<?= $sdata['id'] ?>&action=storypost"><?= $sdata['title'] ?></td>
              <td><?= $sdata['creation_date_fr'] ?></td>
              <td>
                <a href="./index.php?action=upstoryview&id=<?= $sdata['id'] ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                  <a href="index.php?id=<?= $sdata['id'] ?>&action=supprstory" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
              </td>                               
            </tr>             
            <?php
            }
            $sposts->closeCursor();
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