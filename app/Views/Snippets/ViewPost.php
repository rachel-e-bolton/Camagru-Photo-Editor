<style>

.post-view {
    padding: 10px;
    height: 600px;
    display: flex;
    flex-direction: row;
}

.post-image {
    flex: 1 0 auto;
    position: relative;
}

.post-image > img {
    width: 575px;
    height: auto;
}

.post-comments {
    width: 50%;
}

.list-comments {
    overflow-y: scroll;
    height: 66%;
    padding: 15px 0px;
    padding-right: 15px;
}

.add-comment {
    border-top: 1px solid lightgrey;
    padding: 15px 0px;
    padding-right: 15px;
}

.like-image {
    position: absolute;
    top: 15px;
    right: 80px;
    z-index: 1;
}

.like-image:hover {
    transform: scale(1.15);
    cursor: pointer;
}

</style>
<script src="/js/actions/add-comment.js"></script>
<script src="/js/actions/delete-comment.js"></script>
<script src="/js/actions/delete-image.js"></script>
<div class="is-hidden-desktop has-text-centered has-background-light" style="display: flex; flex-direction: row; justify-content: space-around; padding: .5rem;">
        <?php if ($user): ?>

        <?php if ($data["liked"]): ?>

            <img id="like-image-mobile" data-id="<?= $data["post"]["id"] ?>" class="liked" src="/img/liked.png" alt="" onclick="likeImageMobile();" style="width: 32px; height: 32px;">

        <?php else: ?>

            <img id="like-image-mobile" data-id="<?= $data["post"]["id"] ?>" class="" src="/img/unliked.png" alt="" onclick="likeImageMobile();" style="width: 32px; height: 32px;">

        <?php endif; ?>

        <?php if ($data["post"]["user_id"] == $user["id"]): ?>
            <div class="">
                <img id="delete-image-mobile" data-id="<?= $data["post"]["id"] ?>" class="" src="/img/delete.svg" alt="" onclick="deleteImage(this);" style="width: auto; height: 30px;">         
            </div>
        <?php endif; ?>

        <?php endif; ?>
</div>
<div id="post-view" data-postid="<?= $data["post"]["id"] ?>" class="post-view has-background-light">
    <div class="post-image is-hidden-touch">
        <img src="<?= $data["post"]["image"] ?>" alt="">
        <?php if ($user): ?>

            <?php if ($data["liked"]): ?>

                <img id="like-image" data-id="<?= $data["post"]["id"] ?>" class="like-image liked" src="/img/liked.png" alt="" onclick="likeImage();" style="width: 32px; height: auto;">

            <?php else: ?>

                <img id="like-image" data-id="<?= $data["post"]["id"] ?>" class="like-image" src="/img/unliked.png" alt="" onclick="likeImage();" style="width: 32px; height: auto;">

            <?php endif; ?>

            <?php if ($data["post"]["user_id"] == $user["id"]): ?>
                <div class="icon-delete" data-id="<?= $data["post"]["id"] ?>" onclick="deleteImage(this);"></div>
            <?php endif; ?>

        <?php endif; ?>
    </div>
    <div class="post-comments">
        <div id="list-comments" class="list-comments">
        <?php foreach($data["comments"] as $comment): ?>
                <article class="media comment">
                    <figure class="media-left image is-64x64">
                        <p class="">
                        <img class="is-rounded" src="/img/User Icon.png">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                        <p>
                            <strong>@<?= $comment["handle"] ?></strong> &nbsp; 
                            <?php  if ($comment["uid"] == $user["id"]): ?>
                                <span onclick="deleteComment(this)" id="<?= $comment["cid"] ?>" class="icon-trash is-pulled-right"></span> 
                            <?php endif; ?>
                            <small class="is-pulled-right"><?= $comment["date"] ?></small> 
                                
                            <br>
                            <?= $comment["comment"] ?>
                        </p>
                        </div>
                    </div>
                </article>
        <?php endforeach; ?>

        </div>
        <div class="add-comment">

        <article class="media">
            <figure class="media-left image is-64x64">
                <p class="">
                    <img class="is-rounded" src="/img/User Icon.png">
                </p>
            </figure>
            <div class="media-content">
                <div class="field">
                <p class="control">
                    <textarea id="comment-text" data-postid="<?= $data["post"]["id"] ?>" class="textarea has-fixed-size" placeholder="Add a comment..." height="35"></textarea>
                </p>
                </div>

                <div class="level-right">
                    <div class="level-item">
                        <button onclick="addComment()" class="button is-primary">Submit</button>
                    </div>
                </div>

            </div>
            </article>
        </div>
    </div>
</div>

<style>

@media only screen and (max-width: 768px) {
    .post-view {
        height: calc(100% - 50px);
    }
    .post-comments {
        height: calc(100% - 32px);
    }
}

</style>


<script src="/js/actions/scroll-to-post.js"></script>