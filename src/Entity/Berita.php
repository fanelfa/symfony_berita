<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BeritaRepository")
 */
class Berita
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $judul;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $isi;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="boolean")
     */
    private $soft_delete;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Kategori", inversedBy="berita")
     * @ORM\JoinColumn(nullable=false)
     */
    private $kategori;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Pengirim", inversedBy="berita")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pengirim;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJudul(): ?string
    {
        return $this->judul;
    }

    public function setJudul(string $judul): self
    {
        $this->judul = $judul;

        return $this;
    }

    public function getIsi(): ?string
    {
        return $this->isi;
    }

    public function setIsi(string $isi): self
    {
        $this->isi = $isi;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getSoftDelete(): ?bool
    {
        return $this->soft_delete;
    }

    public function setSoftDelete(bool $soft_delete): self
    {
        $this->soft_delete = $soft_delete;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getKategori(): ?Kategori
    {
        return $this->kategori;
    }

    public function setKategori(?Kategori $kategori): self
    {
        $this->kategori = $kategori;

        return $this;
    }

    public function getPengirim(): ?Pengirim
    {
        return $this->pengirim;
    }

    public function setPengirim(?Pengirim $pengirim): self
    {
        $this->pengirim = $pengirim;

        return $this;
    }
}
