<?php

class ToDoListTest extends PHPUnit_Framework_TestCase
{
    private $toDoList;

    public function setUp()
    {
        $this->toDoList = new ToDoList();
    }

    public function testAddItem()
    {
        $this->toDoList->addItem("Finish report");
        $this->assertCount(1, $this->toDoList->getItems());
    }

    public function testEditItem()
    {
        $this->toDoList->addItem("Finish report");
        $this->toDoList->editItem(0, "Complete report");
        $this->assertEquals("Complete report", $this->toDoList->getItem(0));
    }

    public function testDeleteItem()
    {
        $this->toDoList->addItem("Finish report");
        $this->toDoList->deleteItem(0);
        $this->assertCount(0, $this->toDoList->getItems());
    }
}

class ToDoList
{
    private $items = [];

    public function addItem($item)
    {
        $this->items[] = $item;
    }

    public function editItem($index, $item)
    {
        $this->items[$index] = $item;
    }

    public function deleteItem($index)
    {
        unset($this->items[$index]);
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getItem($index)
    {
        return $this->items[$index];
    }
}
