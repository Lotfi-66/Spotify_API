<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use App\Repository\SongRepository;
use Symfony\Component\HttpFoundation\File\File;


#[ORM\Entity(repositoryClass: SongRepository::class)]
class Song
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $filePath = null;

    private ?File $filePathFile = null;


    #[ORM\Column]
    private ?int $duration = null;

    #[ORM\ManyToOne(inversedBy: 'songs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Album $album = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getFilePath(): ?string
    {
        return $this->filePath;
    }

    public function setFilePath(string $filePath): static
    {
        $this->filePath = $filePath;

        return $this;
    }

    //ici méthode de $filePathFile
    public function getFilePathFile(): ?File
    {
        return $this->filePathFile;
    }

    public function setFilePathFile(?File $filePathFile): void
    {
        $this->filePathFile = $filePathFile;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getAlbum(): ?Album
    {
        return $this->album;
    }

    public function setAlbum(?Album $album): static
    {
        $this->album = $album;

        return $this;
    }
}
