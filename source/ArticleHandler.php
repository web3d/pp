<?php
class ArticleHandler extends ToroHandler {
    public function get($post_id) {
        print_r(func_get_args());
        // Display the post if it exists
        if ($post_id) {
            print_r($post_id);
            echo 'oh';
        }
        else {
            header('HTTP/1.0 404 Not Found');
            echo 'Post does not exist';
            exit;
        }
    }
}
