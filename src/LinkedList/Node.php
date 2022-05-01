<?php

namespace Katas\LinkedList;

final class Node
{
    private Node $nextNode;

    public function __construct(private readonly int $data)
    {
    }

    public function getData(): int
    {
        return $this->data;
    }

    public function getNextNode(): ?Node
    {
        return $this->nextNode ?? null;
    }

    public function setNextNode(Node $nextNode): void
    {
        $this->nextNode = $nextNode;
    }
}
