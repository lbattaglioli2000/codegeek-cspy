<div id="pagination">
    <nav class="navbar navbar-default navbar-bottom">
        <div class="text-center">
            <ul class="pagination">
                <li <?php if($lessonType == 1){echo "class='active'";} ?>><a href="../1">Lecture</a></li>
                <li <?php if($lessonType == 2){echo "class='active'";} ?>><a href="../2">Recap</a></li>
                <li <?php if($lessonType == 3){echo "class='active'";} ?>><a href="../3">Challenge</a></li>
                <?php if($lessonType == 3){?>
                    <li><a href="../../<?php echo $lesson + 1; ?>/1">Start Next Lesson</a></li>
                <?php } ?>
            </ul>
        </div>
    </nav>
</div>