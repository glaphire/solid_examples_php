<?php

/**
 * SRP: The Single Responsibility Principle
 * The best structure for a software system is
 * heavily influenced by the social structure of the organization that uses it so that
 * each software module has one, and only one, reason to change.
 */

/**
 * Example of wrong single responsibility
 * General class "Page1" has two purposes - retrieving pages' data and formatting it.
 */
class Page1
{
    public $title;

    public function getPage($title)
    {
        return $this->title;
    }

    public function formatJson()
    {
        return json_encode($this->title);
    }
}

/**
 * Example of good responsibility principle
 * General class "Page2" has one purpose - working with pages' data.
 * Data formatting is moved to separate class and can be changed independently
 */
class Page2
{
    public $title;

    public function getPage($title)
    {
        return $this->title;
    }
}

class JsonPageFormatter
{
    public function format(Page2 $page)
    {
        return json_encode($page->title);
    }
}