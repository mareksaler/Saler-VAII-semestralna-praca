<?php /** @var Array $data */ ?>
<div class="container">
    <div class="row">
        <div class="d-flex justify-content-start flex-wrap">
            <?php foreach ($data['posts'] as $post) { ?>
                <div class="card" style="width: 18rem; margin: 5px">
                    <img src="<?= \App\Config\Configuration::UPLOAD_DIR . $post->getImage() ?>" height="160px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="?c=home&a=addLike&postid=<?= $post->getId() ?>" class="btn btn-primary" >
                            <?= $post->getLikes() ?>
                            <i class="bi bi-hand-thumbs-up"></i>
                        </a>
                        <?php if (\App\Auth::isLogged()) { ?>
                            <div class="text-start mt-2">
                                <form method="post" action="?a=addComment">
                                    <input type="hidden" name="postId" value="<?= $post->getId() ?>">
                                    <input type="text" size="19" name="text" placeholder="Vloz komentar...">
                                    <input type="submit" value="Posli" name="comment">
                                </form>
                            </div>
                            <div class="text-start mt-2 ">
                                <strong>Komentare:</strong><br>
                                <div class="komentare">
                                    <?php foreach ($post->getComments() as $comment) { ?>
                                        <?= $comment->getText() ?><br>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>