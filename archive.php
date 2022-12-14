<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="sidebar-left mica">
<?php $this->need('Components/accordion.php'); ?>
</div>
<div class="website-body">
    <div class="main">
    <?php $this->need('Components/breadcrumb.php'); ?>
    <?php $this->need('Components/cardbar.php'); ?>
    <?php $this->need('Components/pagination.php'); ?>
    </div>
    <?php $this->need('footer.php'); ?>
</div>
