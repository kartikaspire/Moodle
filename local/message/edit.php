<?php
//echo "Hello World";
require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot . '/local/message/classes/form/edit.php');
global $DB;
$PAGE->set_url(new moodle_url('/local/message/edit.php'));
$PAGE->set_context(context_system::instance());
$PAGE->set_title('Edit');

$mform = new edit();



if ($mform->is_cancelled()) {
    //Handle form cancel operation, if cancel button is present on form
    redirect($CFG->wwwroot . '/local/message/manage.php', 'You cancelled the message form');
} else if ($fromform = $mform->get_data()) {
    $recordintoinsert = new stdClass();
    $recordintoinsert->messagetext = $fromform->messagetext;
    $recordintoinsert->messagetype = $fromform->messagetype;
    $DB->insert_record('message_new', $recordintoinsert);
  //In this case you process validated data. $mform->get_data() returns data posted in form.
} else {
  // this branch is executed if the form is submitted but the data doesn't validate and the form should be redisplayed
  // or on the first display of the form.

  //Set default data (if any);
  //displays the form
}
echo $OUTPUT->header();
$mform->display();
echo $OUTPUT->footer();