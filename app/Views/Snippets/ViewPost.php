<style>

.post-view {
    padding: 10px;
    height: 600px;
    display: flex;
    flex-direction: row;
}

.post-image {
    flex: 1 0 auto;
    max-width: 500px;
}

.post-image > img {
    width: 96%;
    height: auto;
}

.post-comments {
    overflow-y: scroll;
    height: 68%;
    min-width: 400px;
    flex: 1 0 auto;
}

.post-detail {
    flex: 1 0  auto;
}

</style>

<div class="post-view">
    <div class="post-image">
        <img src="<?= $data["post"]["image"] ?>" alt="">
    </div>

    <div class="post-detail">
        <div id="post-comments" class="post-comments">



        <?php foreach($data["comments"] as $comment): ?>
            <article class="media">
                <figure class="media-left image is-64x64">
                    <p class="">
                    <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
                    </p>
                </figure>
                <div class="media-content">
                    <div class="content">
                    <p>
                        <strong>@ <?= $comment["handle"] ?></strong> <small>${comment.date}</small>
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
                <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
                </p>
            </figure>
            <div class="media-content">
                <div class="field">
                <p class="control">
                    <textarea data-postid="<?= $data["post"]["id"] ?>" id="comment-text" class="textarea has-fixed-size" placeholder="Add a comment..."></textarea>
                </p>
                </div>

                <div class="level-left">
                    <div class="level-item">
                    <a onclick="addComment()" class="button is-info">Submit</a>
                    </div>
                </div>

            </div>
            </article>

        </div>
    </div>
</div>