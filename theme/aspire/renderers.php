<?php
// theme/themename/renderers.php
defined('MOODLE_INTERNAL') || die();

class theme_aspire_core_renderer extends core_renderer {

    protected function render_custom_menu(custom_menu $menu) {
        
        $mycourses = $this->page->navigation->get('mycourses');

        if (isloggedin() && $mycourses && $mycourses->has_children()) {
            $branchlabel = get_string('mycourses');
            $branchurl   = new moodle_url('/course/index.php');
            $branchtitle = $branchlabel;
            $branchsort  = 10000;

            $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);

            foreach ($mycourses->children as $coursenode) {
                $branch->add($coursenode->get_content(), $coursenode->action, $coursenode->get_title());
            }
        }

        return parent::render_custom_menu($menu);
    }

    protected function render_custom_menu_item(custom_menu_item $menunode) {
        $transmutedmenunode = new theme_aspire_transmuted_custom_menu_item($menunode);
        return parent::render_custom_menu_item($transmutedmenunode);
    }

    /**
     * Outputs a heading
     * @param string $text The text of the heading
     * @param int $level The level of importance of the heading. Defaulting to 2
     * @param string $classes A space-separated list of CSS classes
     * @param string $id An optional ID
     * @return string the HTML to output.
     */
    public function heading($text, $level = 2, $classes = 'main', $id = null)
    {
        /*$level = (integer) $level;
        if ($level < 1 or $level > 6) {
            throw new coding_exception('Heading level must be an integer between 1 and 6.');
        }
        return html_writer::tag('h' . $level, $text, array('id' => $id, 'class' => renderer_base::prepare_classes($classes)));*/
        $content  = html_writer::start_tag('div', array('class'=>'headingcontainer'));
        $content .= html_writer::empty_tag('img', array('src'=>$this->pix_url('headingpic', 'theme'), 'alt'=>'', 'class'=>'headingimage'));
        $content .= parent::heading($text, $level, $classes, $id);
        $content .= html_writer::end_tag('div');
        return $content;
    }

}