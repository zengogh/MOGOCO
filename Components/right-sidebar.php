<div class="sidebar-right mica">
    <div class="Download">
        <h3>
            <i class="bi bi-download"></i>
            <a href="<?php $this->fields->Download(); ?>" target="blank">下 载 </a>
        </h3>
    </div>
    <ul class="post-meta">
        <li itemprop="author" itemscope itemtype="http://schema.org/Person">
            <?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a>
        </li>
        <li><?php _e('时间: '); ?>
            <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
        </li>
        <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
        <li itemprop="keywords" class="tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></li>
    </ul>
<!--输出标签云 -->
<?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=10')->to($tags); ?>
<?php if($tags->have()): ?>
    <h4 class="tags-title"><i class="bi bi-tags-fill"></i> <?php _e('热门搜索'); ?></h4>
<ul class="tags-list">
<?php while ($tags->next()): ?>
    <li><a href="<?php $tags->permalink(); ?>" rel="tag" class="size-<?php $tags->split(5, 10, 20, 30); ?>" title="<?php $tags->count(); ?> 个话题"><?php $tags->name(); ?></a></li>
<?php endwhile; ?>
<?php else: ?>
    <li><?php _e('没有任何标签'); ?></li>
<?php endif; ?>
</ul>
</div>