<?php

namespace Katas\LinkedList;

use Katas\Exceptions\TargetException;
use PHPUnit\Framework\TestCase;

class SinglyLinkedListTest extends TestCase
{
    public function testShouldGetTheHeadNodeOfTheList(): void
    {
        // Set
        $node = new Node(10);
        $list = new SinglyLinkedList($node);

        // Actions
        $result = $list->getHead();

        // Assertions
        $this->assertSame($node, $result);
        $this->assertSame(10, $result->getData());
    }

    public function testShouldAssertIfTheListIsEmpty(): void
    {
        // Set
        $node = new Node(10);
        $list = new SinglyLinkedList($node);

        // Actions
        $result = $list->isEmpty();

        // Assertions
        $this->assertFalse($result);
    }

    public function testShouldGetTheListSize(): void
    {
        // Set
        $node = new Node(10);
        $list = new SinglyLinkedList($node);
        $list->prepend(11);
        $list->prepend(12);
        $list->prepend(13);

        // Actions
        $result = $list->size();

        // Assertions
        $this->assertSame(4, $result);
    }

    public function testShouldPrependNewNode(): void
    {
        // Set
        $node = new Node(10);
        $list = new SinglyLinkedList($node);

        // Actions
        $list->prepend(20);
        $result = $list->getHead();

        // Assertions
        $this->assertSame(20, $result->getData());
    }

    public function testShouldSearchAndFoundNode(): void
    {
        // Set
        $node = new Node(10);
        $list = new SinglyLinkedList($node);
        $list->prepend(11);
        $list->prepend(12);
        $list->prepend(13);

        // Actions
        $result = $list->search(12);

        // Assertions
        $this->assertSame(12, $result->getData());
    }

    public function testShouldSearchAndThrowAnExceptionWhenTheDataDoesNotExist(): void
    {
        // Set
        $node = new Node(10);
        $list = new SinglyLinkedList($node);
        $list->prepend(11);
        $list->prepend(12);
        $list->prepend(13);

        // Expectations
        $this->expectException(TargetException::class);
        $this->expectExceptionMessage(
            'The target value does not exists in the array'
        );

        // Actions
        $list->search(40);
    }

    public function testShouldInsertNewNode(): void
    {
        // Set
        $node = new Node(13);
        $list = new SinglyLinkedList($node);
        $list->prepend(12);
        $list->prepend(11);
        $list->prepend(10);

        // Expectations
        $this->expectException(TargetException::class);
        $this->expectExceptionMessage(
            'The target value does not exists in the array'
        );

        // Actions
        $list->remove(11);
        $list->search(11);
    }
}
