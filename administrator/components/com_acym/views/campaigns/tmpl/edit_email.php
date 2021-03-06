<?php
defined('_JEXEC') or die('Restricted access');
?><div id="acym__campaign__edit_email">
	<input type="hidden" value="<?php echo acym_escape($data['campaignID']); ?>" name="id" id="acym__campaign__recipients__form__campaign">
	<input type="hidden" id="acym__mail__edit__editor__social__icons" value="<?php echo empty($data['social_icons']) ? '{}' : acym_escape($data['social_icons']); ?>">
	<input type="hidden" class="acym__wysid__hidden__save__thumbnail" id="editor_thumbnail" name="editor_thumbnail" value="" />
    <?php echo $data['needDisplayStylesheet']; ?>
	<input type="hidden" name="editor_headers" value="<?php echo acym_escape($data['mailInformation']->headers); ?>">
	<div class="grid-x">
		<div class="cell medium-auto"></div>
		<div class="cell <?php echo $data['containerClass']; ?> grid-x grid-margin-x acym__content acym__editor__area">
            <?php
            $workflow = acym_get('helper.workflow');
            if (empty($data['campaignID'])) {
                $workflow->disabledAfter = 'editEmail';
            }
            echo $workflow->display($this->steps, $this->step);
            include acym_getView('campaigns', 'edit_email_info');
            include acym_getView('campaigns', 'edit_email_attachment', true);
            include acym_getView('campaigns', 'edit_email_actions', true);
            ?>
		</div>
		<div class="cell medium-auto"></div>
	</div>
    <?php acym_formOptions(true, 'edit', 'editEmail'); ?>
</div>
<?php
echo $data['editor']->display();

