<?php

namespace Katas\LinkedList;

use PHPUnit\Framework\TestCase;

class NodeTest extends TestCase
{
    public function testShouldGetTheNodeData(): void
    {
        // Set
        $node = new Node(10);

        // Actions
        $result = $node->getData();

        // Assertions
        $this->assertSame(10, $result);
    }

    public function testShouldSetNextNode(): void
    {
        // Set
        $node = new Node(10);
        $nextNode = new Node(20);

        // Actions
        $node->setNextNode($nextNode);
        $result = $node->getNextNode();

        // Assertions
        $this->assertSame($nextNode, $result);
        $this->assertSame(20, $result->getData());
    }
}
