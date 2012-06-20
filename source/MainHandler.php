<?php
class MainHandler extends ToroHandler {
    public function get() {

        $blogs = $this->__listBlogPosts();
        
        $view = new Savant3(array('template_path' => APP_PATH . '/views/'));
        $view->blogs = $blogs;
        $view->aboutme = $this->__getAboutMe();
         
        $view->display('index.tpl');
        //require APP_PATH . '/view/'
    }
    
    private function __getAboutMe(){
        require APP_PATH . '/lib/markdown.php';
        
        $aboutme_file = APP_PATH . '/cache/pages/readme.md';
        
        $aboutme = '';
        
        if (file_exists($aboutme_file)) {
            $aboutme = file_get_contents($aboutme_file);
            $aboutme = Markdown($aboutme);
            //fclose($handle);
        }
        return $aboutme;
    }
    
    /**
     * 读取博客rss源中的内容
     */
    private function __listBlogPosts(){
        require APP_PATH . '/lib/simplepie.inc';
        require APP_PATH . '/lib/idn/idna_convert.class.php';
        
        $rsser = new SimplePie(BLOG_RSS_URL);
        $rss_data = $rsser->get_items();
        
        $posts = array();
        foreach($rss_data as $post){
            $posts[] = array(
                'title' =>  $post->get_title(),
                'description' => $post->get_description(),
                'link'  =>  $post->get_permalink(),
                'time'  =>  $post->get_date()
            );
        }
        return $posts;
    }
    
    private function __listProjects(){
        
    }
    
    private function __listProfilo(){
        return array(
            array('id'=>1, 'title' => 'Evening Plans', 'body' => "I'm staying in to work on my law blog."),
            array('id'=>3, 'title' => "You don't need double talk; you need Bob Loblaw", 'body' => 'True.'),
            array('id'=>5, 'title' => "Why should you go to jail for a crime someone else noticed?", 'body' => "You shouldn't."),
        );
    }
} 
