<?php defined('BASEPATH') or exit('No direct script access allowed');

/* ----------------------------------------------------------------------------
 * Easy!Appointments - Online Appointment Scheduler
 *
 * @package     EasyAppointments
 * @author      A.Tselegidis <alextselegidis@gmail.com>
 * @copyright   Copyright (c) Alex Tselegidis
 * @license     https://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        https://easyappointments.org
 * @since       v1.5.0-nad
 * ---------------------------------------------------------------------------- */

class Migration_Add_citizen_id_field_settings extends EA_Migration {
    /**
     * Upgrade method.
     */
    public function up()
    {
        if ( ! $this->db->get_where('settings', ['name' => 'display_citizen_id'])->num_rows())
        {
            $this->db->insert('settings', [
                'name' => 'display_citizen_id',
                'value' => '1'
            ]);
        }
        if ( ! $this->db->get_where('settings', ['name' => 'require_citizen_id'])->num_rows())
        {
            $this->db->insert('settings', [
                'name' => 'require_citizen_id',
                'value' => '1'
            ]);
        }
    }

    /**
     * Downgrade method.
     */
    public function down()
    {
        if ($this->db->get_where('settings', ['name' => 'display_citizen_id'])->num_rows())
        {
            $this->db->delete('settings', ['name' => 'display_citizen_id']);
        }

        if ($this->db->get_where('settings', ['name' => 'require_citizen_id'])->num_rows())
        {
            $this->db->delete('settings', ['name' => 'require_citizen_id']);
        }
    }
}
