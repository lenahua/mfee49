<?php
    $x = $y = $r = $op = '';
    if(isset($_GET['x']) && isset($_GET['y'])){
            //  確認是否有x, y
            // $_GET環境變數
            $x = $_GET['x'];
            $y = $_GET['y'];
            $op = $_GET['op'];

            switch($op){
                case '1' : $r = $x + $y; break;
                case '2' : $r = $x - $y; break;
                case '3' : $r = $x * $y; break;
                case '4' : $r = number_format($x / $y, 2); break;
            }
            
    }
    
?>
<form>
    <input name="x" value="<?php echo $x; ?>" />
    <select name="op">
        <option value="1" <?php echo ($op == '1' ?'selected':''); ?>>+</option>
        <!-- 傳遞值是value -->
        <option value="2" <?php echo ($op == '2' ?'selected':''); ?>>-</option>
        <option value="3" <?php echo ($op == '3' ?'selected':''); ?>>X</option>
        <option value="4" <?php echo ($op == '4' ?'selected':''); ?>>/</option>
    </select>
    <input name="y" value="<?php echo $y; ?>" />

    <input type="submit" value="=">
    <!-- 按下提交後會產生url 跟後端發出request -->
    <span><?php echo $r; ?></span>
</form>
