<?php

namespace App\Controllers;

//use App\Core\AControllerBase;
use App\Auth;
use App\Config\Configuration;
use App\Models\Comment;
use App\Models\Post;

/**
 * Class HomeController
 * Example of simple controller
 * @package App\Controllers
 */
class HomeController extends AControllerRedirect
{

    public function index()
    {
        $posts = Post::getAll();

        return $this->html(
            [
                'posts' => $posts
            ]);
    }

    public function contact()
    {
        return $this->html(
            []
        );
    }

    public function addLike()
    {
        $postId = $this->request()->getValue('postid');
        if ($postId > 0) {
            $post = Post::getOne($postId);
            $post->addLike();
        }
        $this->redirect('home');
    }

    public function upload()
    {
        if (!Auth::isLogged()) {
            $this->redirect("home");
        }
        if (isset($_FILES['file'])) {
            if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
                $name = date('Y-m-d-H-i-s_') . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], Configuration::UPLOAD_DIR . "$name");
                $newPost = new Post();
                $newPost->setImage($name);
                $newPost->save();
            }
        }
        $this->redirect("home");
    }

    public function post()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        return $this->html();
    }

    public function addComment()
    {
        if (!Auth::isLogged()) {
            $this->redirect("home");
        }

        $postId = $this->request()->getValue('postId');
        if ($postId) {
            $newComment = new Comment();
            $newComment->setPostId($postId);
            $newComment->setText($this->request()->getValue('text'));
            $newComment->save();
        }
        $this->redirect('home') ;
    }
}