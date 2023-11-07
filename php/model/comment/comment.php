<?php 

class Comment 
{
    private ?int $id;
    private int $userId; 
    private string $content; 
    private ?DateTime $posted;

    public function __construct($userId, $content)
    {
        $this->userId = $userId; 
        $this->content = $content;
    }

    /**
     * Get the value of id
     *
     * @return ?int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param ?int $id
     *
     * @return self
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of userId
     *
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @param int $userId
     *
     * @return self
     */
    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get the value of content
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @param string $content
     *
     * @return self
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of posted
     *
     * @return DateTime
     */
    public function getPosted(): DateTime
    {
        return $this->posted;
    }

    /**
     * Set the value of posted
     *
     * @param DateTime $posted
     *
     * @return self
     */
    public function setPosted(DateTime $posted): self
    {
        $this->posted = $posted;

        return $this;
    }
}

?>