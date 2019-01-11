<?php
namespace App\Models;
use App\Models\Model;

class Post extends Model
{
    private $id;
    private $title;
    private $content;
    private $date;

    // SETTERS
    public function setId($chapterId)
    {
        $chapterId = (int) $chapterId;

        if($chapterId > 0)
        {
            $this->id = $chapterId;
        }
    }

    public function setTitle($title)
    {
        if(is_string($title))
        {
            $this->title = $title;
        }
    }

    public function setContent($content)
    {
        if(is_string($content))
        {
            $this->content = $content;
        }
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    // GETTERS

    public function id()
    {
        return $this->id;
    }

    public function title()
    {
        return $this->title;
    }

    public function content()
    {
        return $this->content;
    }

    public function date()
    {
        return $this->date;
    }
}
