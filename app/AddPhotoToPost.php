<?php

namespace App;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class AddPhotoToPost
{
    protected $post;
    protected $file;

    public function __construct(Post $post, UploadedFile $file,Thumbnail $thumbnail = null)
    {
        $this->post = $post;
        $this->file = $file;
        $this->thumbnail = $thumbnail ?: new Thumbnail;
    }

    public function save()
    {
        $photo = $this->post->addPhoto($this->makePhoto());
        $this->file->move($photo->baseDir(), $photo->name);
        $this->thumbnail->make($photo->path, $photo->thumbnail_path);
    }

    public function makePhoto()
    {
        return new Photo(['name' => $this->makeFileName()]);
    }

    public function makeFileName()
    {
        $name = sha1(
            time().$this->file->getClientOriginalName()
        );

        $extension = $this->file->getClientOriginalExtension();

        return "{$name}.{$extension}";
    }
}
