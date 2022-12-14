<!-- 随机文章-s -->
<h3 class="similar-title">猜你想要</h3>
<div class="AssetPage_similar">
    <?php
    $mid = ''; //此参数为空时为随机文章，为分类mid时则为当前分类下的随机文章
    $cid = $this->cid;//这样设置下cid，随机推荐文章时就不会与当前文章重复了
    $size = 5; //随机输出文章的数量
    $this->widget('Widget_Post_tongleisuiji@suiji', 'mid=' . $mid . '&pageSize=' . $size . '&cid=' . $cid)->to($to); ?>
    <?php if ($to->have()) : ?>
        <?php while ($to->next()) : ?>
            <!--文章内容开始-->
            <div class="card-item post" >
                <ul class="card-body post-meta">
                    <li><a class="card-img" href="<?php $to->permalink() ?>" style="background-image: url(<?php showThumbnail($to); ?>);" ></a></li>
                    <li><a href="<?php $to->permalink() ?>"><h4 class="card-title post-title"><?php $to->title(); ?></h4></a></li>
                    <li class="card-tag"><span><?php $to->date( ); ?></span><span><?php $to->category(','); ?></span></li>
                </ul>
            </div>
            <!--文章内容结束-->
        <?php endwhile; ?>
    <?php endif; ?>
</div>
<!-- 随机文章-s -->