<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $post;

$meta_obj = WP_Job_Board_Pro_Candidate_Meta::get_instance($post->ID);

$salary = WP_Job_Board_Pro_Candidate::get_salary_html($post->ID);

$experience_time = superio_candidate_display_meta($post, 'experience_time');

$email = superio_candidate_display_email($post, false, false);
$phone = superio_candidate_display_phone($post, false, true);

$website = superio_candidate_display_meta($post, 'website');
?>
<div class="job-detail-detail in-sidebar">
    <ul class="list">
        <?php if ( $salary ) { ?>
            <li>
                <div class="icon">
                    <i class="flaticon-money-1"></i>
                </div>
                <div class="details">
                    <div class="text"><?php esc_html_e('Expected Salary', 'superio'); ?></div>
                    <div class="value"><?php echo trim($salary); ?></div>
                </div>
            </li>
        <?php } ?>

        <?php if ( $experience_time ) { ?>
            <li>
                <div class="icon">
                    <i class="flaticon-calendar"></i>
                </div>
                <div class="details">
                    <div class="text"><?php echo trim($meta_obj->get_post_meta_title('experience_time')); ?></div>
                    <div class="value"><?php echo trim($experience_time); ?></div>
                </div>
            </li>
        <?php } ?>

        <?php do_action('wp-job-board-pro-single-candidate-details', $post); ?>
    </ul>
</div>
