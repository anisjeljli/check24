<?php
use src\Entity\TimesTempable;

/**
 * @ORM\Entity
 * @ORM\Table ('comment')
 */
class Comment extends TimesTempable
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
     * @var Article
     *
     * @ORM\ManyToOne(targetEntity="Article", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Article;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable= false)

     */
    private $content;



    /**
     * @var \src\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="src\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;
}