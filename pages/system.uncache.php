<?php
$addon = rex_addon::get('uncache');

if (rex_post('uncache') == "structure") {
    $content .= rex_view::success('Structure-Cache (Artikel und Slices) wurde gelöscht.');
}
if (rex_post('uncache') == "core") {
    $content .= rex_view::success('Core-Cache wurde gelöscht.');
}
if (rex_post('uncache') == "yrewrite") {
    $content .= rex_view::success('YRewrite-Addon-Cache wurde gelöscht.');
}
if (rex_post('uncache') == "url") {
    $content .= rex_view::success('URL2-Addon-Cache wurde gelöscht.');
}
if (rex_post('uncache') == "all") {
    $content .= rex_view::error('Der gesamte Cache wurde gelöscht. Schmeiß das Addon Cache Warmup an!');
}
if (rex_post('uncache') == "auto") {
    $content .= rex_view::success('Der REDAXO-Cache ohne Media-Manager-Cache wurde gelöscht.');
}


$content .=  '
<div class="rex-form">
    <form action="' . rex_url::currentBackendPage() . '" method="post">
        <fieldset class="rex-form-action">';
$formElements = [];
$formElements[] = '<div class="btn-toolbar">';
$n = [];
$n['field'] = '<button type="submit" name="uncache" class="btn btn-success" value="auto">Automatisch (empfohlen)</button>';
$formElements[] = $n;
$n['field'] = '<button type="submit" name="uncache" class="btn btn-save" value="yrewrite">Nur YRewrite</button>';
$formElements[] = $n;
$n['field'] = '<button type="submit" name="uncache" class="btn btn-save" value="url">Nur URL2-Cache löschen</button>';
$formElements[] = $n;
$n['field'] = '<button type="submit" name="uncache" class="btn btn-save" value="structure">Nur Artikel-Cache löschen</button>';
$formElements[] = $n;
$n['field'] = '<button type="submit" name="uncache" class="btn btn-danger" value="all">Cache komplett löschen</button>';
$formElements[] = $n;

$formElements[] = "</div>";
$fragment = new rex_fragment();
$fragment->setVar('elements', $formElements, false);
$content .= $fragment->parse('core/form/submit.php');
$content .= '
        </fieldset>
    </form>
</div>';



$fragment = new rex_fragment();
$fragment->setVar('class', 'edit', false);
$fragment->setVar('title', $this->i18n('uncache_settings'), false);
$fragment->setVar('body', $content, false);

?>
<div class="row">
	<div class="col-lg-8">
		<?= $fragment->parse('core/page/section.php') ?>
	</div>
	<div class="col-lg-4">
		<?php

$anchor = '<a target="_blank" href="https://donate.alexplus.de/?addon=uncache"><img src="'.rex_url::addonAssets('uncache', 'jetzt-spenden.svg').'" style="width: 100% max-width: 400px;"></a>';

$fragment = new rex_fragment();
$fragment->setVar('class', 'info', false);
$fragment->setVar('title', $this->i18n('uncache_donate'), false);
$fragment->setVar('body', '<p>' . $this->i18n('uncache_info_donate') . '</p>' . $anchor, false);
echo !rex_config::get("alexplusde", "donated") ? $fragment->parse('core/page/section.php') : "";

$package = rex_install_packages::getUpdatePackages();
if (isset($packages['uncache'])) {
    $current_version = rex_addon::get('uncache')->getProperty('version');
    if (isset($package['files'])) {
        $latest_version = array_pop($updates)['version'];
    }
    if (rex_version::compare($latest_version, $current_version, ">")) {
        echo rex_view::info($this->i18n('uncache_update_available') . " " .$latest_version);
    };
};
?>
	</div>
</div>