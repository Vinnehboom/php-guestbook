<?php

class Post
{
    private string $author;
    private string $message;
    private DateTime $date;
    private string $title;

    /**
     * Post constructor.
     * @param string $author
     * @param string $message
     * @param string $title
     */
    public function __construct(string $author, string $message, string $title)
    {
        $this->author = htmlspecialchars($author);
        $this->message = htmlspecialchars($message);
        $this->title = htmlspecialchars($title);
        $this->date  = new DateTime('now');
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

}