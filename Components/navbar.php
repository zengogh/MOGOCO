<!--*头部导航栏目-s* -->
<nav class="navbar">
    <div class="navbar-brand">
        <?php if ($this->options->logoUrl) : ?>
            <a class="website-logo" href="<?php $this->options->siteUrl(); ?>">
                <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" title="<?php $this->options->title() ?>" />
            </a>
        <?php else : ?>
            <a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
            <p class="description"><?php $this->options->description() ?></p>
        <?php endif; ?>
    </div>
    <form class="search" id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
        <input type="text" class="form-control" placeholder="<?php _e('输入关键字搜索'); ?>">
        <button type="submit"><?php _e('<i class="bi bi-search"></i>'); ?></button>
    </form>
    <!-- 响应式按钮logo -->
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    <ul class="navbar-nav">
    <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
        <?php while ($categorys->next()) : ?>
            <?php if ($categorys->levels === 0) : ?>
                <?php $children = $categorys->getAllChildren($categorys->mid); ?>
                <?php if (empty($children)) { ?>
        <li class="nav-item"  <?php if ($this->is('category', $categorys->slug)) : ?> <?php endif; ?>>
            <a class="nav-link current"  href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><?php $categorys->name(); ?></a>
        </li>
        <?php } else { ?>
        <li class="nav-item drop-down" >
            <a class="nav-link" href="<?php $categorys->permalink(); ?>"  data-toggle="dropdown"  data-target="#"><?php $categorys->name(); ?> <i class="bi bi-caret-down-fill"></i></a>
            <ul class="nav-sub">
            <?php foreach ($children as $mid) { ?>
                <?php $child = $categorys->getCategory($mid); ?>
                <li class="nav-sub-item" <?php if ($this->is('category', $mid)) : ?> <?php endif; ?> >
                    <a class="nav-sub-link " href="<?php echo $child['permalink'] ?>" title="<?php echo $child['name']; ?>" ><?php _e('<i class="bi bi-record-fill"></i> '); ?> <?php echo $child['name']; ?></a>
                </li>
                <?php } ?>
            </ul>
        </li>
        <?php } ?>
            <?php endif; ?>
        <?php endwhile; ?>
        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <?php while ($pages->next()) : ?>
        <li class="nav-item">
            <a class="nav-link " <?php if ($this->is('page', $pages->slug)) : ?> <?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
        </li>
        <?php endwhile; ?>
    </ul>
</nav>