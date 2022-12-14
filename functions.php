<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $logoUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'logoUrl',
        null,
        null,
        _t('站点 LOGO 地址'),
        _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO')
    );

    $form->addInput($logoUrl);

    $sidebarBlock = new \Typecho\Widget\Helper\Form\Element\Checkbox(
        'sidebarBlock',
        [
            'ShowRecentPosts'    => _t('显示最新文章'),
            'ShowRecentComments' => _t('显示最近回复'),
            'ShowCategory'       => _t('显示分类'),
            'ShowArchive'        => _t('显示归档'),
            'ShowOther'          => _t('显示其它杂项')
        ],
        ['ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'],
        _t('侧边栏显示')
    );

    $form->addInput($sidebarBlock->multiMode());
}

/*
function themeFields($layout)
{
    $logoUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'logoUrl',
        null,
        null,
        _t('站点LOGO地址'),
        _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO')
    );
    $layout->addItem($logoUrl);
}
*/
/*
*文章缩略图
*/
function showThumbnail($widget)
{
    $mr = '默认图片地址';
    $attach = $widget->attachments(1)->attachment;
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
    if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
        echo $thumbUrl[1][0];
    } elseif ($attach->isImage) {
        echo $attach->url;
    } else {
        echo $mr;
    }
}
/**
 * 添加主题名称与作者
 */
function get_theme_version()
{
    $info = Typecho_Plugin::parseInfo(__DIR__ . '/index.php');
    return $info['version'];
}

function get_theme_author()
{
    $info = Typecho_Plugin::parseInfo(__DIR__ . '/index.php');
    return $info['author'];
}
/**
 * 随机文章-s
 */
class Widget_Post_tongleisuiji extends Widget_Abstract_Contents
{
    public function __construct($request, $response, $params = NULL)
    {
        parent::__construct($request, $response, $params);
        $this->parameter->setDefault(array('pageSize' => $this->options->commentsListSize, 'parentId' => 0, 'ignoreAuthor' => false));
    }
    public function execute()
    {
        $adapterName = $this->db->getAdapterName(); //兼容非MySQL数据库
        if ($adapterName == 'pgsql' || $adapterName == 'Pdo_Pgsql' || $adapterName == 'Pdo_SQLite' || $adapterName == 'SQLite') {
            $order_by = 'RANDOM()';
        } else {
            $order_by = 'RAND()';
        }
        $select  = $this->select()->from('table.contents')
            ->join('table.relationships', 'table.contents.cid = table.relationships.cid');
        if ($this->parameter->mid > 0) {
            $select->where('table.relationships.mid = ?', $this->parameter->mid);
        }
        $select->where('table.contents.cid <> ?', $this->parameter->cid)
            ->where("table.contents.password IS NULL OR table.contents.password = ''")
            ->where('table.contents.type = ?', 'post')
            ->limit($this->parameter->pageSize)
            ->order($order_by);
        $this->db->fetchAll($select, array($this, 'push'));
    }
}
/**
 * 设置个自定义字段-s
 */

function themeFields($layout)
{
    $Download = new Typecho_Widget_Helper_Form_Element_Text('Download', NULL, NULL, _t('下载链接'), _t('输入下载链接)'));
    $layout->addItem($Download);
}
