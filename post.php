<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="post-body">
    <div class="main" id="main" role="main">
        <?php $this->need('Components/breadcrumb.php'); ?>
        <article class="mica post" itemscope itemtype="http://schema.org/BlogPosting">
            <h1 class="post-title" itemprop="name headline">
                <a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
            </h1>
            <div class="post-content" itemprop="articleBody">
                <?php $this->content(); ?>
            </div>
        </article>
        <ul class="post-near ">
            <li class="mica">上一篇: <?php $this->thePrev('%s', '没有了'); ?></li>
            <li class="mica">下一篇: <?php $this->theNext('%s', '没有了'); ?></li>
        </ul>
        <!-- * 随机文章-s -->
        <?php $this->need('Components/similar.php'); ?>
    </div><!-- end #main-->

<?php $this->need('footer.php'); ?>
</div><!-- end .page-body-->
<?php $this->need('Components/right-sidebar.php'); ?>

</body>

</html>