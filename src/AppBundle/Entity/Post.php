<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
 *
 * @UniqueEntity("slugEn")
 */
class Post
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title_en", type="string", length=255)
     * @Assert\NotBlank
     */
    private $titleEn;

    /**
     * @var string
     *
     * @ORM\Column(name="slug_en", type="string", length=255, unique=true)
     * @Assert\NotBlank
     * @Assert\Regex(
     *     pattern="/^[A-z0-9-]+$/u",
     *     message="Slug must contain only numbers, letters and dashes"
     * )
     */
    private $slugEn;

    /**
     * @var string
     *
     * @ORM\Column(name="author_name_en", type="string", length=255)
     * @Assert\NotBlank
     */
    private $authorNameEn;

    /**
     * @var string
     *
     * @ORM\Column(name="author_email_en", type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Email
     */
    private $authorEmailEn;

    /**
     * @var string
     *
     * @ORM\Column(name="post_text_en", type="text")
     * @Assert\NotBlank
     */
    private $postTextEn;

    /**
     * @var string
     *
     * @ORM\Column(name="title_de", type="string", length=255)
     * @Assert\NotBlank
     */
    private $titleDe;

    /**
     * @var string
     *
     * @ORM\Column(name="slug_de", type="string", length=255, unique=true)
     * @Assert\Regex(
     *     pattern="/^[A-z0-9-]+$/u",
     *     message="Slug must contain only numbers, letters and dashes"
     * )
     * @Assert\NotBlank
     */
    private $slugDe;

    /**
     * @var string
     *
     * @ORM\Column(name="author_name_de", type="string", length=255)
     * @Assert\NotBlank
     */
    private $authorNameDe;

    /**
     * @var string
     *
     * @ORM\Column(name="author_email_de", type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Email
     */
    private $authorEmailDe;

    /**
     * @var string
     *
     * @ORM\Column(name="post_text_de", type="text")
     * @Assert\NotBlank
     */
    private $postTextDe;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titleEn
     *
     * @param string $titleEn
     *
     * @return Post
     */
    public function setTitleEn($titleEn)
    {
        $this->titleEn = $titleEn;

        return $this;
    }

    /**
     * Get titleEn
     *
     * @return string
     */
    public function getTitleEn()
    {
        return $this->titleEn;
    }

    /**
     * Set slugEn
     *
     * @param string $slugEn
     *
     * @return Post
     */
    public function setSlugEn($slugEn)
    {
        $this->slugEn = $slugEn;

        return $this;
    }

    /**
     * Get slugEn
     *
     * @return string
     */
    public function getSlugEn()
    {
        return $this->slugEn;
    }

    /**
     * Set authorNameEn
     *
     * @param string $authorNameEn
     *
     * @return Post
     */
    public function setAuthorNameEn($authorNameEn)
    {
        $this->authorNameEn = $authorNameEn;

        return $this;
    }

    /**
     * Get authorNameEn
     *
     * @return string
     */
    public function getAuthorNameEn()
    {
        return $this->authorNameEn;
    }

    /**
     * Set authorEmailEn
     *
     * @param string $authorEmailEn
     *
     * @return Post
     */
    public function setAuthorEmailEn($authorEmailEn)
    {
        $this->authorEmailEn = $authorEmailEn;

        return $this;
    }

    /**
     * Get authorEmailEn
     *
     * @return string
     */
    public function getAuthorEmailEn()
    {
        return $this->authorEmailEn;
    }

    /**
     * Set postTextEn
     *
     * @param string $postTextEn
     *
     * @return Post
     */
    public function setPostTextEn($postTextEn)
    {
        $this->postTextEn = $postTextEn;

        return $this;
    }

    /**
     * Get postTextEn
     *
     * @return string
     */
    public function getPostTextEn()
    {
        return $this->postTextEn;
    }

    /**
     * Set titleDe
     *
     * @param string $titleDe
     *
     * @return Post
     */
    public function setTitleDe($titleDe)
    {
        $this->titleDe = $titleDe;

        return $this;
    }

    /**
     * Get titleDe
     *
     * @return string
     */
    public function getTitleDe()
    {
        return $this->titleDe;
    }

    /**
     * Set slugDe
     *
     * @param string $slugDe
     *
     * @return Post
     */
    public function setSlugDe($slugDe)
    {
        $this->slugDe = $slugDe;

        return $this;
    }

    /**
     * Get slugDe
     *
     * @return string
     */
    public function getSlugDe()
    {
        return $this->slugDe;
    }

    /**
     * Set authorNameDe
     *
     * @param string $authorNameDe
     *
     * @return Post
     */
    public function setAuthorNameDe($authorNameDe)
    {
        $this->authorNameDe = $authorNameDe;

        return $this;
    }

    /**
     * Get authorNameDe
     *
     * @return string
     */
    public function getAuthorNameDe()
    {
        return $this->authorNameDe;
    }

    /**
     * Set authorEmailDe
     *
     * @param string $authorEmailDe
     *
     * @return Post
     */
    public function setAuthorEmailDe($authorEmailDe)
    {
        $this->authorEmailDe = $authorEmailDe;

        return $this;
    }

    /**
     * Get authorEmailDe
     *
     * @return string
     */
    public function getAuthorEmailDe()
    {
        return $this->authorEmailDe;
    }

    /**
     * Set postTextDe
     *
     * @param string $postTextDe
     *
     * @return Post
     */
    public function setPostTextDe($postTextDe)
    {
        $this->postTextDe = $postTextDe;

        return $this;
    }

    /**
     * Get postTextDe
     *
     * @return string
     */
    public function getPostTextDe()
    {
        return $this->postTextDe;
    }
}

