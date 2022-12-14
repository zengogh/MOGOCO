<!-- 面包屑导航-Breadcrumb s-->
<h3 class="breadcrumb">
    <i class="bi bi-geo-alt-fill"></i>
    <?php if ($this->is('index')) : ?>
        <!-- 页面首页时 -->
        <a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title(); ?>">全部</a>
    <?php elseif ($this->is('post')) : ?>
        <!-- 页面为文章单页时 -->
        <a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title(); ?>"></a> <?php $this->category(); ?> > <?php $this->title() ?>
    <?php else : ?>
        <!-- 页面为其他页时 -->
        <a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title(); ?>">全部</a> > <?php $this->archiveTitle(' &raquo; ', '', ''); ?>
    <?php endif; ?>
</h3>
<!-- 面包屑导航-Breadcrumb e-->