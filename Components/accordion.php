<!-- *-一级分类--one-level-category* -->
<div class="one-level-category">
    <a class="category-icon active" href="<?php $this->options->siteUrl('index.php/category/all/'); ?>" title="全部"><i class="bi bi-grid-3x3-gap-fill"></i></a>
    <a class="category-icon" href="<?php $this->options->siteUrl('index.php/category/modes/'); ?>" title="模型"><i class="bi bi-door-open"></i></a>
    <a class="category-icon" href="<?php $this->options->siteUrl('index.php/category/textures/'); ?>" title="贴图"><i class="bi bi-paint-bucket"></i></a>
    <a class="category-icon" href="<?php $this->options->siteUrl('index.php/category/hdris/'); ?>" title="HDRIs"><i class="bi bi-cloud-sun"></i></a>
    <a class="category-icon" href="<?php $this->options->siteUrl('index.php/category/ies/'); ?>" title="IES"><i class="bi bi-lightbulb"></i></a>
</div>

<!-- <ul class="one-level-category">
    <li><a href="<?php $this->options->siteUrl(); ?>">全部</a></li>
    <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
    <?php while ($categorys->next()) : ?>
        <?php if ($categorys->levels === 1) : ?>
            <?php $children = $categorys->getAllChildren($categorys->mid); ?>
            <?php if (empty($children)) { ?>
                <li class="<?php $categorys->slug(); ?><?php if ($this->is('category', $categorys->slug)) : ?> current<?php endif; ?>">
                    <a href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><?php $categorys->name(); ?></a>
                </li>
            <?php } else { ?>
                <li class="<?php $categorys->slug(); ?>"><a href="<?php $categorys->permalink(); ?>"><?php $categorys->name(); ?></a></li>
            <?php } ?>
        <?php endif; ?>
    <?php endwhile; ?>
</ul> -->
<h3><?php echo $this->categories[0]['name']; ?></h3>
<!-- test -->


<!-- *手风琴菜单--Accordion -->
<div class="accordion">
    <ul class="accordion-nav">
        <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
        <?php while ($categorys->next()) : ?>
            <?php if ($categorys->levels === 1) : ?>
                <?php $children = $categorys->getAllChildren($categorys->mid); ?>
                <?php if (empty($children)) { ?>
                    <li class="accordion-item current" <?php if ($this->is('category', $categorys->slug)) : ?> <?php endif; ?>>
                        <h4><a href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><?php $categorys->name(); ?>
                                <span class="badge"><?php $categorys->count(); ?></span></a></h4>
                    </li>
                <?php } else { ?>
                    <li class="accordion-item" id="<?php $categorys->slug(); ?>">
                        <h4><a href="#<?php $categorys->slug(); ?>"><?php $categorys->name(); ?><span class="caret"> <?php $categorys->count(); ?></span></a></h4>
                        <ul class="accordion-sub">
                            <?php foreach ($children as $mid) { ?>
                                <?php $child = $categorys->getCategory($mid); ?>
                                <li class="accordion-sub-item" <?php if ($this->is('category', $child['slug'])) : ?> <?php endif; ?>>
                                    <a class="accordion-link" href="<?php echo $child['permalink'] ?>"><?php echo $child['name']; ?>
                                        <span class="badge"><?php echo $child['count']; ?></span></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li><?php } ?><?php endif; ?><?php endwhile; ?>

    </ul>
</div>