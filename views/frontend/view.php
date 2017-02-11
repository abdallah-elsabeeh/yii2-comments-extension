<script  type="text/javascript">
    var globalBlogID = <?= $jsProvider['object_id'] ?>;
    var object = '<?= $jsProvider['object_taxonomy'] ?>';
    var auther = '<?= $jsProvider['auther_taxonomy'] ?>';
  
</script>
<!-- Comments Start -->
<div class="panel panel-white post">
    <h4 class="card-title add-wide-line"><span class="add-line">Comments <span class="stat-item"><i class="fa fa-share icon"></i><?= $commentCounter ?></span><span class="after"></span></span></h4>
    <?php
    foreach ($commentProvider as $key => $comment):
        ?>

        <div class="post-heading">
            <div class="pull-left image">
                <img src="<?=$comment->auther->profile->userImages ?>" class="img-circle avatar" alt="user profile image">
            </div>
            <div class="pull-left meta">
                <div class="title h6">
                    <?= $comment->auther['username'] ?>
                </div>
                <p class="text-muted time"><?= $comment->createdAtFormattedDateString ?></p>
            </div>
        </div> 
        <div class="post-description"> 
            <p><?= $comment->body ?></p>
        </div>
        <?php
    endforeach;
    ?>

    <div class="post-footer">
        <div class="input-group"> 
            <input class="form-control" id="comment-input" placeholder="Add a comment" type="text">
            <span class="input-group-addon">
                <a id="comment-btn"><i class="fa fa-edit"></i></a>  
            </span>
        </div>

    </div>
    <div id="alertLength" class="alert alert-warning alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Your Comment is too short!</strong>
    </div> 
    <div id="alertSucc" class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Success!</strong>
    </div> 
  
  
 
</div>