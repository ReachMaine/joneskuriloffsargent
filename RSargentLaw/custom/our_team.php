<?php /* customizations for our_team plugin by woothemes */

// change template to apply ID to the containing div (not the text)
add_filter('woothemes_our_team_item_template', 'reach_our_team_template');
function reach_our_team_template($template) {
	// default template: $tpl = '<div itemscope itemtype="http://schema.org/Person" class="%%CLASS%%">%%AVATAR%% %%TITLE%% <div id="team-member-%%ID%%"  class="team-member-text" itemprop="description">%%TEXT%% %%AUTHOR%%</div></div>';
	$template = '<div id="team-member-%%ID%%" itemscope itemtype="http://schema.org/Person" class="%%CLASS%%">%%AVATAR%% %%TITLE%% <div   class="team-member-text" itemprop="description">%%TEXT%% %%AUTHOR%%</div></div>';
	return $template;

}