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
    width: 96%;
    height: auto;
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
    right: 45px;
    z-index: 1;
}

.like-image:hover {
    transform: scale(1.15);
    cursor: pointer;
}

</style>

<div id="post-view" class="post-view has-background-light">
    <div class="post-image">
        <img src="<?= $data["image"] ?>" alt="">
        <img id="like-image" class="like-image" src="img/unliked.png" alt="" onclick="likeImage();" style="width: 64px; height: auto;">
    </div>
    <div class="post-comments">
        <div class="list-comments">
        <?php foreach(range(0, 10) as $_): ?>
                <article class="media comment">
                    <figure class="media-left image is-64x64">
                        <p class="">
                        <img class="is-rounded" src="img/User Icon.png">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                        <p>
                            <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                            <br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
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
                <img class="is-rounded" src="img/User Icon.png">
                </p>
            </figure>
            <div class="media-content">
                <div class="field">
                <p class="control">
                    <textarea class="textarea" placeholder="Add a comment..." height="35"></textarea>
                </p>
                </div>

                <div class="level-right">
                    <div class="level-item">
                    <a class="button is-primary">Submit</a>
                    </div>
                </div>

            </div>
            </article>
        </div>
    </div>
</div>

<script src="/js/likes.js"></script>
