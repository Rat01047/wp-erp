<?php

$id = isset( $_GET['id'] ) ? absint( wp_unslash( $_GET['id'] ) ) : 0;
$submit_button = esc_attr('Save', 'erp');

if ( $id ) {
    $leave = \WeDevs\ERP\HRM\Models\Leave::find( $id );
    $submit_button = esc_attr('Update', 'erp');
}

?>

<div class="wrap">
    <div id="col-container" class="wp-clearfix create-policy-name">
        <h2><?php esc_html_e( 'Leave Names', 'erp' ); ?>
            <a href="<?php echo esc_url( admin_url( 'admin.php?page=erp-hr&section=leave&sub-section=policies' ) ); ?>" id="erp-leave-policy-new" class="add-new-h2">
                <?php esc_html_e( 'Back To Leave Policies', 'erp' ); ?>
            </a>
        </h2>
        <div id="col-left" class="form-wrap">
            <form action="<?php echo esc_url( erp_hr_new_policy_name_url( $id ) ); ?>" method="POST">

                <!-- show error message -->
                <?php global $policy_name_create_error;
                    if ( isset( $policy_name_create_error ) && count( $policy_name_create_error->errors ) ) {
                        echo '<ul>';
                        foreach ( $policy_name_create_error->get_error_messages() as $error ) {
                            echo '<li style="color: #ef5350">* ' . $error . '</li>';
                        }
                        echo '</ul>';
                    }
                ?>

                <div class="form-field">
                    <?php erp_html_form_input( array(
                        'label'       => esc_html__( 'Policy Name', 'erp' ),
                        'name'        => 'name',
                        'value'       => empty( $leave ) ? '' : $leave->name,
                        'required'    => true,
                        'help'        => esc_html__( 'Unique policy name.', 'erp' ),
                        'placeholder' => 'Annual leave'
                    ) ); ?>
                </div>

                <div class="form-field">
                    <?php erp_html_form_input( array(
                        'label'       => esc_html__( 'Description', 'erp' ),
                        'type'        => 'textarea',
                        'name'        => 'description',
                        'value'       => empty( $leave ) ? '' : $leave->description,
                        'placeholder' => esc_html__( '(optional)', 'erp' ),
                        'custom_attr' => [
                            'rows' => 6
                        ]
                    ) ); ?>
                </div>

                <?php wp_nonce_field( 'erp-leave-policy' ); ?>
                <input type="hidden" name="erp-action" value="hr-leave-policy-name-create">
                <input type="hidden" name="policy-name-id" value="<?php echo esc_attr( $id ); ?>">

                <?php submit_button( $submit_button ); ?>
            </form>
        </div>

        <div id="col-right">
            <div class="list-table-wrap">
                <div class="list-table-inner">

                    <form method="post">
                        <!-- <input type="hidden" name="page" value="erp-hr">
                        <input type="hidden" name="section" value="leave">
                        <input type="hidden" name="sub-section" value="policies"> -->
                        <?php
                        $requests_table = new \WeDevs\ERP\HRM\Leave_Policy_Name_List_Table();
                        $requests_table->prepare_items();
                        $requests_table->views();

                        $requests_table->display();
                        ?>
                    </form>

                </div><!-- .list-table-inner -->
            </div><!-- .list-table-wrap -->
        </div>
    </div>
</div>
