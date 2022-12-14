<?php
/**
 * 这是一个Typecho主题，适合制作资源下载类型网站
 *
 * @package 模高库-MOGOCO
 * @author Gogh Studio
 * @version 0.022.11.28
 * @link http://mogoco.ml
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php'); ?>

<div class="sidebar-left mica">
<?php $this->need('Components/accordion.php'); ?>
</div>
<div class="website-body" id="main" role="main">
    <div class="main post" itemscope itemtype="http://schema.org/BlogPosting" >
    <?php $this->need('Components/breadcrumb.php'); ?>
    <?php $this->need('Components/cardbar.php'); ?>
    <?php $this->need('Components/pagination.php'); ?>
    </div>
    <?php $this->need('footer.php'); ?>
</div>
</body>
</html>