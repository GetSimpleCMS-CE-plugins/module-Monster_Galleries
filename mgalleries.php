<?php
/**
 * Module Name: Monster Galleries
 * Module ID: mgalleries
 * Description: Lists Monster Gallery galleries with links to edit.
 * Version: 1.0
 * Default W: 4
 * Default H: 4
 */

if (!defined('IN_GS')) { die('You cannot load this page directly.'); }

// Add $i18n_m for i18n lang files in Modules
$i18n_m = dash_module_i18n('mgalleries');

$uid = 'gal_' . substr(md5(__FILE__), 0, 6);

$gallery_files = defined('GSDATAOTHERPATH')
    ? (glob(GSDATAOTHERPATH . 'monsterGallery/*.json') ?: array())
    : array();
?>

<style>
#<?php echo $uid ?> .gal-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
}
#<?php echo $uid ?> .gal-table th {
    text-align: left;
    padding: 5px 8px;
    border-bottom: 2px solid #eee;
    color: #888;
    font-weight: 600;
}
#<?php echo $uid ?> .gal-table td {
    padding: 6px 8px;
    border-bottom: 1px solid #f3f3f3;
    vertical-align: middle;
}
#<?php echo $uid ?> .gal-table tr:last-child td { border-bottom: none; }
#<?php echo $uid ?> .gal-table tr:hover td { background: #fafafa; }
#<?php echo $uid ?> .gal-name {
    font-weight: 500;
    color: #333;
}
#<?php echo $uid ?> .gal-btn {
    display: inline-block;
    padding: 4px 6px;
    border-radius: 4px;
    line-height: 18px !important;
    background: #925DCA;
    color: #fff !important;
}
#<?php echo $uid ?> .gal-btn:hover { background: #cc7a00; }
#<?php echo $uid ?> .gal-empty {
    color: #bbb;
    font-style: italic;
    text-align: center;
    padding: 16px;
}
</style>

<div id="<?php echo $uid ?>">
    <h3><svg xmlns="http://www.w3.org/2000/svg" style="vertical-align:middle;" width="24" height="24" viewBox="0 0 24 24"><rect width="24" height="24" fill="none"/><path fill="currentColor" d="M22 16V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2m-11-4l2.03 2.71L16 11l4 5H8zM2 6v14a2 2 0 0 0 2 2h14v-2H4V6z"/></svg> <?php echo $i18n_m('lang_Galleries'); ?></h3>

    <?php if (empty($gallery_files)): ?>
        <p class="gal-empty"><?php echo $i18n_m('lang_No_galleries'); ?>.</p>
    <?php else: ?>
    <table class="gal-table">
        <tr>
            <th><?php echo $i18n_m('lang_Title'); ?></th>
            <th style="text-align:center;"><?php echo $i18n_m('lang_Action'); ?></th>
        </tr>
        <?php foreach ($gallery_files as $file):
            $name  = pathinfo($file, PATHINFO_FILENAME);
            $title = str_replace('--', ' ', $name);
            $editUrl = 'load.php?id=monsterGallery&addMonsterGallery&edit=' . $name;
        ?>
        <tr>
            <td class="gal-name"><?php echo htmlspecialchars($title); ?></td>
            <td style="text-align:center;">
                <a class="gal-btn" href="<?php echo $editUrl; ?>" title="<?php echo $i18n_m('lang_Edit'); ?>"><svg xmlns="http://www.w3.org/2000/svg" style="vertical-align:middle;" width="18" height="18" viewBox="0 0 24 24"><rect width="24" height="24" fill="none"/><path fill="currentColor" d="m22.7 14.3l-1 1l-2-2l1-1c.1-.1.2-.2.4-.2c.1 0 .3.1.4.2l1.3 1.3c.1.2.1.5-.1.7M13 19.9V22h2.1l6.1-6.1l-2-2zm-1.79-4.07l-1.96-2.36L6.5 17h6.62l2.54-2.45l-1.7-2.26zM11 19.9v-.85l.05-.05H5V5h14v6.31l2-1.93V5a2 2 0 0 0-2-2H5c-1.1 0-2 .9-2 2v14a2 2 0 0 0 2 2h6z"/></svg></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</div>