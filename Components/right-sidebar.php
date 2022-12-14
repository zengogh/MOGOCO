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

</div>