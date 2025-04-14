<?php 
    namespace App\Views\Components;

    use App\Core\Paginator;

    class PaginationView {
        public static function render(Paginator $paginator) {
            //var_dump($paginator->getTotalpages());
            $totalPages = $paginator->getTotalPage();
            $currentPage = $paginator->getCurrentPage();
            $baseUrl = $_SERVER['REQUEST_URI'];
            // Kiểm tra xem URL đã có dấu '?' chưa
            if (strpos($baseUrl, '?') !== false) {
                // Đã có '?', kiểm tra nếu đã có 'page=' thì thay thế, nếu chưa thì thêm '&page='
                if (preg_match('/([?&])page=\d+/', $baseUrl)) {
                    $baseUrl = preg_replace('/([?&])page=\d+/', '${1}page=', $baseUrl);
                } else {
                    $baseUrl .= '&page=';
                }
            } else {
                // Chưa có '?', thêm '?page='
                $baseUrl .= '?page=';
            }
            //var_dump($totalPages);
            if ($totalPages <= 1) return '';

            $html = '<nav aria-label="Page navigation"><ul class="pagination justify-content-center">';

            // Nút Previous
            if ($currentPage > 1) {
                $html .= '<li class="page-item"><a class="page-link" href="' . $baseUrl . ($currentPage - 1) . '">‹</a></li>';
            } else {
                $html .= '<li class="page-item disabled"><span class="page-link">‹</span></li>';
            }

            // Hiển thị trang đầu nếu cần
            if ($currentPage > 3) {
                $html .= '<li class="page-item"><a class="page-link" href="' . $baseUrl . '1">1</a></li>';
                if ($currentPage > 4) {
                    $html .= '<li class="page-item disabled"><span class="page-link">...</span></li>';
                }
            }

            // Hiển thị các trang gần currentPage
            for ($i = max(1, $currentPage - 2); $i <= min($totalPages, $currentPage + 2); $i++) {
                if ($i == $currentPage) {
                    $html .= '<li class="page-item active"><span class="page-link">' . $i . '</span></li>';
                } else {
                    $html .= '<li class="page-item"><a class="page-link" href="' . $baseUrl . $i . '">' . $i . '</a></li>';
                }
            }

            // Hiển thị trang cuối nếu cần
            if ($currentPage < $totalPages - 2) {
                if ($currentPage < $totalPages - 3) {
                    $html .= '<li class="page-item disabled"><span class="page-link">...</span></li>';
                }
                $html .= '<li class="page-item"><a class="page-link" href="' . $baseUrl . $totalPages . '">' . $totalPages . '</a></li>';
            }

            // Nút Next
            if ($currentPage < $totalPages) {
                $html .= '<li class="page-item"><a class="page-link" href="' . $baseUrl . ($currentPage + 1) . '">›</a></li>';
            } else {
                $html .= '<li class="page-item disabled"><span class="page-link">›</span></li>';
            }

            $html .= '</ul></nav>';
            return $html;
        }
    }
?>