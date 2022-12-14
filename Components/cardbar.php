<!--**卡片展示页面-->  
<?php while ($this->next()) : ?>
    <div class="card-item post" itemscope itemtype="http://schema.org/BlogPosting">
        <!-- --卡片式文章列表-cardbra-- -->
        <ul class="card-body post-meta">
            <li><a class="card-img" href="<?php $this->permalink() ?>" style="background-image: url(<?php showThumbnail($this); ?>);"></a></li>
            <li>
                <h4 class="card-title post-title" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h4>
            </li>
            <li class="card-tag">
                <span><?php _e('<i class="bi bi-smartwatch">:</i>'); ?>
                    <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></span>
                <span><?php _e('<i class="bi bi-inboxes-fill">:</i>'); ?><?php $this->category(','); ?></span>
            </li>
        </ul>
    </div>
<?php endwhile; ?>