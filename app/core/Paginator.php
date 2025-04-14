<?php 
    namespace App\Core;

    class Paginator {
        private $limit;
        private $page;
        private $total;
        private $totalpage;

        public function __construct($limit = 5, $page = 1, $total) {
            $this->limit = max(1, (int) $limit);
            $this->page = max(1, (int) $page);
            $this->total = $total;
            $this->totalpage = ceil($this->total / $this->limit);
    }

    public function getOffset() {
        return ($this->page - 1) * $this->limit;
    }

    public function getLimit() {
        return $this->limit;
    }

    public function getTotalPage() {
        return $this->totalpage;
    }

    public function getCurrentPage() {
        return $this->page;
    }
}
?>