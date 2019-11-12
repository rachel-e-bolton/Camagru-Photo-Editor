<style>

.post-view {
    padding: 10px;
    height: 600px;
    display: flex;
    flex-direction: row;
}

.post-image {
    flex: 1 0 auto;
}

.post-image > img {
    width: 96%;
    height: auto;
}

.comments {
    overflow-y: scroll;
    height: 68%;
}

</style>

<div class="post-view">
    <div class="post-image">
        <img src="<?= $data["image"] ?>" alt="">
    </div>
    <div class="post-comments">
        <div class="comments">
        <?php foreach(range(0, 10) as $_): ?>
                <article class="media comment">
                    <figure class="media-left image is-64x64">
                        <p class="">
                        <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
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
                <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
                </p>
            </figure>
            <div class="media-content">
                <div class="field">
                <p class="control">
                    <textarea class="textarea" placeholder="Add a comment..."></textarea>
                </p>
                </div>

                <div class="level-left">
                    <div class="level-item">
                    <a class="button is-info">Submit</a>
                    </div>
                </div>

            </div>
            </article>









        </div>

    </div>
</div>