<?php

namespace src\Entity;
use Doctrine\ORM\Mapping as ORM;
use src\Entity\TimesTempable;
/**
 * @ORM\Entity
 * @ORM\Table('picture')
 */
class Picture extends TimesTempable
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
     * @ORM\Column(type="string", name="title")
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(type="string", name="link")
     */
    private $link;

    /**
     *
     * @OneToOne(targetEntity="Article", inversedBy="picture")
     * @JoinColumn(name="Article_id", referencedColumnName="id")
     */
    private $Article;





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



}