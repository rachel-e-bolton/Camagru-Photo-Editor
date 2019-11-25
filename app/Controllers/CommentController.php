<?php 

class CommentController extends BaseController
{
    public function default()
    {
        RenderView::json([], 401, "Unauthorized");
    }

    public function add()
    {
        $user = $this->protectSelfJSON();
        $data = $this->getJSON();

        if (!isset($data["post_id"]) || !isset($data["comment"]))
            RenderView::json([], 400, "Missing data could not complete request.");


        $cmt = nl2br($data["comment"]);

        $resp = $this->model->add($user["id"], $data["post_id"], $cmt);

        if ($resp->isValid())
        {
            $comment = $this->model->getCommentById($resp->getId());
            RenderView::json($comment, 200, "Added comment");
        }
        RenderView::json([], 400, "Count not add comment");
    }

    public function delete($kwargs)
    {
        $user = $this->protectSelfJSON();
        if (!count($kwargs["params"]) > 0)
            RenderView::json([], 404, "Comment does not exist");

        $model = new CommentModel();
        $comment = $model->getCommentById($kwargs["params"][0]);

        if ($comment)
        {
            if ($user["id"] == $comment["user_id"])
            {
                if ($model->deleteCommentById($comment["id"]))
                    RenderView::json([], 200, "Comment deleted.");
                else
                    RenderView::json([], 400, "Could not delete comment.");
            }
            else
            {
                RenderView::json([], 401, "You are not authroised to delete this comment.");
            }
        }
        else
            RenderView::json([], 404, "Comment does not exist");
    }
}