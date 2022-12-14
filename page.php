<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="page-body">
<article class="mica post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline">
            <a itemprop="url"href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
        </h1>
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
    </article>
</div>

<?php $this->need('footer.php'); ?>

</body>
</html>