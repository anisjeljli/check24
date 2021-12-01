<?php

use Doctrine\ORM\Mapping as ORM;
use src\Entity\TimesTempable;

/**
 * @ORM\Entity
 * @ORM\Table('Article')
 */
class Article extends TimesTempable
{

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @var \src\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="\src\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * @var Comment[]|\Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(
     *      targetEntity="src\Entity\Comment",
     *      mappedBy="Article",
     *      orphanRemoval=true,
     *      cascade={"persist"}
     * )
     * @ORM\OrderBy({"publishedAt": "DESC"})
     */
    private $comments;

    /**
     * @var \src\Entity\Picture
     * @OneToOne(targetEntity="\src\Entity\Picture", mappedBy="Article")
     */
    private $picture;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return \src\Entity\User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param \src\Entity\User $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return Comment[]|\Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Adding Comment to A Article
     * @param Comment $comment
     */
    public function addComments($comment)
    {
        if ($this->comments->contains($comment)) {

            $this->comments = $comment;
        }
    }

    /**
     * Removing Comment from Article
     * @param Comment $comment
     */
    public function removeComments($comment)
    {
        $this->comments->remove($comment);

    }


    /**
     * @return \src\Entity\Picture
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param \src\Entity\Picture $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }


}