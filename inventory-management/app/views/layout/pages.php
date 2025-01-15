<?php if ($total_page >= 2) : ?>
    <div class="pagination">
            <?php if ($prev_page): ?>
                <?php echo '<a href="?page=' . $prev_page . '">' . 'PREV' . '</a>'; ?>
            <?php else: ?>
                <a href="" class="disabled">PREV</a>
            <?php endif; ?>
            <div class="ul">
                <?php 
                    for ($i = 1; $i <= $total_page; $i++) {
                        $current_class = $current_page == $i ? 'current-page' : '';
                            
                        echo '<li class="page ' . $current_class . '">' . '<a href=?page=' . $i . '>' . $i . '</a>' .  '</li>';
                    }
                ?>
            </div>
            <?php if ($next_page): ?>
                <?php echo '<a href="?page=' . $next_page . '">' . 'NEXT' . '</a>'; ?>
            <?php else: ?>
                <a href="" class="disabled">NEXT</a>
            <?php endif; ?>
    </div>
<?php endif; ?>