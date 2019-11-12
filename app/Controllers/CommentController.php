<?php 

class CommentController extends BaseController
{
    public function default()
    {
        RenderView::json([], 401, "Unauthorized");
    }

    public function add()
    {
        $this->protectSelfJSON();

        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data)
            RenderView::json([], 400, "No data submitted");
            
        $comment = [];
        $comment["user_id"] = $this->user["id"];
        $comment["post_id"] = $data["post_id"];
        $comment["comment"] = $data["comment"];

        print_r($comment);

        $resp = $this->model->add($comment);

        print_r($resp);

        if ($resp->isValid())
        {
            $commentObj = $this->model->getCommentById($resp->getId());
            RenderView::json($commentObj, 200);
        }
        RenderView::json($comment, 400, "Nope");
    }
}