<?php
class PostLoader
{
    const FILE_TEXT = 'messages.txt';

    /** @var Post[] */
    private array $posts;


    public function __construct()
    {
        $posts = unserialize(file_get_contents(self::FILE_TEXT));
        if(is_array($posts)) {
            $this->posts = $posts;
        }
    }

    public function addPosts(Post $post)
    {
        $this->posts[] = $post;
        if (count($this->posts) > 20) {
            array_shift($this->posts);
        }
    }

    public function saveMessages()
    {
        file_put_contents(self::FILE_TEXT, serialize($this->posts));
    }

    /**
     * @return Post[]
     */
    public function getPosts(): array
    {
        // make sure to display newest on top
        return array_reverse($this->posts);
    }

    public function displayPosts() {
        $array = $this->getPosts();
        foreach ($array as  $post) {
            echo "Message title: {$post->getTitle()} <br>
                  Message: \n\r {$post->getMessage()} <br>
                  Author: {$post->getAuthor()} on {$post->getDate()->format('d-m-Y H:i:s')} <br>";
            echo "<hr>";
        }
    }

}
/*$loader = new PostLoader();
$loader->addPosts(new Post('Koen', 'Hello world', 'first message'));
$loader->addPosts(new Post('Vinnie', 'Bye World', 'second message'));
$loader->saveMessages();
var_dump($loader->getPosts());*/
