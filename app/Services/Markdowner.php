<?php
/**
 * Created by PhpStorm.
 * User: Rowan-Gao
 * Date: 2016/6/7
 * Time: 13:31
 */

namespace App\Services;


use Michelf\MarkdownExtra;


class Markdowner
{

    public function toHTML($text)
    {
        $text = $this->preTransformText($text);
        $text = MarkdownExtra::defaultTransform($text);
        $text = $this->postTransformText($text);
        return $text;
    }

    protected function preTransformText($text)
    {
        return $text;
    }

    protected function postTransformText($text)
    {
        return $text;
    }
}