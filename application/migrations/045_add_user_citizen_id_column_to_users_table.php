<?php defined('BASEPATH') or exit('No direct script access allowed');

/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      A.Tselegidis <alextselegidis@gmail.com>
 * @author      R.Couto <caligari@treboada.net>
 * @copyright   Copyright (c) 2013 - 2020, Alex Tselegidis
 * @license     http://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        http://easyappointments.org
 * @since       v1.5.0-nad
 * ---------------------------------------------------------------------------- */

class Migration_Add_user_citizen_id_column_to_users_table extends EA_Migration {
    /**
     * Upgrade method.
     */
    public function up()
    {
        if ( ! $this->db->field_exists('citizen_id', 'users'))
        {
            $fields = [
                'citizen_id' => [
                    'type' => 'VARCHAR',
                    'constraint' => '30',
                    'null' => TRUE,
                    'after' => 'delete_datetime'
                ]
            ];

            $this->dbforge->add_column('users', $fields);
        }
    }

    /**
     * Downgrade method.
     */
    public function down()
    {
        if ($this->db->field_exists('citizen_id', 'users'))
        {
            $this->dbforge->drop_column('users', 'citizen_id');
        }
    }
}
