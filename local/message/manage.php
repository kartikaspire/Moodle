<?php
//echo "Hello World";
require_once(__DIR__ . '/../../config.php');
$PAGE->set_url(new moodle_url('/local/message/manage.php'));
$PAGE->set_context(context_system::instance());
$PAGE->set_title('Manage Message');
echo $OUTPUT->header();
$templatecontext = (object)[
    'texttodisplay' => 'simple text',
];
echo $OUTPUT->render_from_template('local_message/manage', $templatecontext);
echo $OUTPUT->footer();