<?php
class MySettingsPage {


    /**
     * Holds the values to be used in the fields callbacks
     */

    private $options;


    /**
     * Start up
     */

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }


    /**
     * Add options page
     */

    public function add_plugin_page() {
        // This page will be under "Settings"
        add_options_page(
            'Курс доллара',
            'Курс доллара',
            'manage_options',
            'kurs-dollara',
            array( $this, 'create_admin_page' )
        );
    }


    /**
     * Options page callback
     */

    public function create_admin_page()  {
        // Set class property
        $this->options = get_option( 'kurs' );

        ?>
        <div class="wrap">
          <h2>Курс долара</h2>
          <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'kurs_options' );
                do_settings_sections( 'kurs-admin' );
                submit_button();
            ?>
          </form>
        </div>
        <?php
    }


    /**
     * Register and add settings
     */

    public function page_init() {
        register_setting(
            'kurs_options', // Option group
            'kurs', // Option name
             array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'kurs_settings_section', // ID
            '', // Title
             array( $this, 'print_section_info' ), // Callback
            'kurs-admin' // Page
        );

        add_settings_field(
            'kurs', // ID
            'Курс доллара:', // Title
             array( $this, 'kurs_callback' ), // Callback
            'kurs-admin', // Page
            'kurs_settings_section' // Section
        );
    }


    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */

    public function sanitize( $input ) {

//    ["custom_rub"]=> string(5) "20000" }
//    ["rub"]=> string(10) "15090.0000"
//    ["kurs_date"]=> string(29) "Tue, 03 Mar 2015 00:00:00 GMT"
//    ["check_date"]=> string(31) "Tue, 03 Mar 2015 20:44:14 +0000" }

        $old_data = get_option('kurs');

        $input[kurs_date] = $old_data[kurs_date];
        $input[check_date] = $old_data[check_date];
        $input[rub] =  $old_data[rub];

        return $input;
    }


    /**
     * Print the Section text
     */

    public function print_section_info() {
        $msg =  'Оставьте поле пустым, чтобы использовать курс c priorbank.by.';

        if (!$this->options[custom_rub]) {
            $msg .= sprintf('<br>Текущий курс: <b>%s</b>. <br/> Обновлено: <b>%s</b>', $this->options[rub],  $this->options[check_date]);
        }

        print $msg;
    }


    /**
     * Get the settings option array and print one of its values
     */

    public function kurs_callback() {
        printf(
            '<input type="text" id="kurs[custom_rub]" name="kurs[custom_rub]" value="%s" />',
              isset( $this->options['custom_rub'] ) ? esc_attr( $this->options['custom_rub'] ) : '' );
    }
}

if( is_admin() )
$my_settings_page = new MySettingsPage();