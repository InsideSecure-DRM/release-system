<?php
/**
 * @package AkeebaReleaseSystem
 * @copyright Copyright (c)2010-2012 Nicholas K. Dionysopoulos
 * @license GNU General Public License version 3, or later
 * @version $Id$
 */

defined('_JEXEC') or die('Restricted Access');

$editor = JFactory::getEditor();

$this->loadHelper('select');
$this->loadHelper('filtering');

FOFTemplateUtils::addCSS('media://com_ars/css/backend.css');

?>

<form name="adminForm" id="adminForm" action="index.php" method="post">
	<input type="hidden" name="option" value="com_ars" />
	<input type="hidden" name="view" value="categories" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="id" value="<?php echo $this->item->id ?>" />
	<input type="hidden" name="<?php echo JUtility::getToken();?>" value="1" />

	<fieldset>
		<legend><?php echo JText::_('COM_ARS_CATEGORY_BASIC_LABEL'); ?></legend>
		
		<div class="editform-row">
			<label for="title"><?php echo JText::_('COM_ARS_CATEGORIES_FIELD_TITLE'); ?></label>
			<input type="text" name="title" id="title" value="<?php echo $this->item->title ?>">
		</div>
		<div class="editform-row">
			<label for="alias"><?php echo JText::_('COM_ARS_CATEGORIES_FIELD_ALIAS'); ?></label>
			<input type="text" name="alias" id="alias" value="<?php echo $this->item->alias ?>">
		</div>
		<div class="editform-row">
			<label for="vgroup_id"><?php echo JText::_('LBL_CATEGORIES_VGROUP'); ?></label>
			<?php echo ArsHelperSelect::vgroups($this->item->vgroup_id, 'vgroup_id') ?>
		</div>
		<div class="editform-row">
			<label for="type"><?php echo JText::_('COM_ARS_CATEGORIES_FIELD_TYPE'); ?></label>
			<?php echo ArsHelperSelect::categorytypes($this->item->type, 'type') ?>
		</div>
		<div class="editform-row">
			<label for="directory"><?php echo JText::_('COM_ARS_CATEGORIES_FIELD_DIRECTORY'); ?></label>
			<input type="text" name="directory" id="directory" value="<?php echo $this->item->directory ?>">
		</div>
		<div class="editform-row">
			<label for="published">
				<?php echo JText::_('JPUBLISHED'); ?>
			</label>
			<div>
				<?php echo JHTML::_('select.booleanlist', 'published', null, $this->item->published); ?>
			</div>
		</div>
		<div class="editform-row editform-row-noheight">
			<label for="access">
				<?php echo JText::_('JFIELD_ACCESS_LABEL'); ?>
			</label>
			<?php echo JHTML::_('list.accesslevel', $this->item); ?>
		</div>
		<?php if(ArsHelperFiltering::hasAkeebaSubs()): ?>
		<div class="editform-row editform-row-noheight">
			<label for="groups"><?php echo JText::_('COM_ARS_COMMON_CATEGORIES_GROUPS_AKEEBA_LABEL'); ?></label>
			<?php echo ArsHelperSelect::akeebasubsgroups($this->item->groups, 'groups') ?>
		</div>
		<?php endif; ?>
		
		<div class="editform-row editform-row-noheight">
			<label for="language"><?php echo JText::_('JFIELD_LANGUAGE_LABEL'); ?></label>
			<?php echo ArsHelperSelect::languages($this->item->language, 'language') ?>
		</div>
		<div style="clear:left"></div>

	</fieldset>

	<fieldset>
		<legend><?php echo JText::_('COM_ARS_CATEGORY_DESCRIPTION_LABEL'); ?></legend>
		
		<?php echo $editor->display( 'description',  $this->item->description, '600', '350', '60', '20', array() ) ; ?>
	</fieldset>
</form>