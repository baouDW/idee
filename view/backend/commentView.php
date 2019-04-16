<?php $title = 'Membres'; ?>

<?php ob_start(); ?>

<div class="col-md-12">
    <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0"> Commentaires</h4>
          <p class="card-category"> </p>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="none">
                        </th>
                        <th>Auteur</th>
                        <th>Date</th>
                        <th>Commentaires</th>
                        <th>Signalement</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($comment = $comments->fetch())
                    {
                    ?>
                    <tr>
                        <td class="none"></td>
                        <td><?= htmlspecialchars($comment['author']) ?></td>
                        <td><?= $comment['comment_date_fr'] ?></td>
                        <td><?= htmlspecialchars($comment['comment']) ?></td>
                        <td><?= $comment['signalement'] ?></td>     
                        <td></td>       
                    </tr> 
                    <?php
                    }
                    $comments->closeCursor();
                    ?>                                         
                </tbody>
            </table>
          </div>
        </div>
    </div>
<!-- </div> -->
<?php $content = ob_get_clean(); ?>
<?php require('templateBackend.php'); ?>