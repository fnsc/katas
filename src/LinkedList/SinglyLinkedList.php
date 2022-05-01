<?php

namespace Katas\LinkedList;

use Katas\Exceptions\TargetException;

final class SinglyLinkedList
{
    public function __construct(private Node $head)
    {
    }

    /**
     * @return Node
     */
    public function getHead(): Node
    {
        return $this->head;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->getHead());
    }

    /**
     * @return int
     */
    public function size(): int
    {
        $count = 0;
        $current = $this->getHead();

        while (!empty($current)) {
            $current = $current->getNextNode();
            $count++;
        }

        return $count;
    }

    /**
     * @param int $data
     * @return void
     */
    public function prepend(int $data): void
    {
        $newNode = new Node($data);
        $newNode->setNextNode($this->getHead());
        $this->setHead($newNode);
    }

    /**
     * @param int $data
     * @return Node
     * @throws TargetException
     */
    public function search(int $data): Node
    {
        $current = $this->getHead();

        while (!empty($current)) {
            if ($current->getData() === $data) {
                return $current;
            }

            $current = $current->getNextNode();
        }

        throw TargetException::doesNotExists();
    }

    /**
     * @param int $value
     * @return void
     * @throws TargetException
     */
    public function remove(int $value): void
    {
        $current = $this->getHead();
        $previous = null;

        while ($current) {
            if ($current->getData() === $value && $current === $this->getHead()) {
                $this->setHead($current->getNextNode());

                return;
            }

            if ($current->getData() === $value) {
                $previous->setNextNode($current->getNextNode());

                return;
            }

            $previous = $current;
            $current = $current->getNextNode();
        }

        throw TargetException::doesNotExists();
    }

    /**
     * @param Node $head
     * @return void
     */
    private function setHead(Node $head): void
    {
        $this->head = $head;
    }
}
