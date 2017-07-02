<?php

class Slug
{

    public function input($value, $field, $data)
    {
        $section = $data['section'];
        $fields = $data['fields'];
        $CI = &get_instance();
        $field_trigger = $this->search_trigger($fields);
        $slug = slug($value);
        if (isset($field_trigger)) {
            $value_trigger = $CI->input->post($field_trigger['database']['column']);
            $slug = $this->set_slug($value_trigger, $field_trigger, $section);
        }

        return $slug;
    }

    private function search_trigger($fields)
    {
        foreach ($fields as $field) {
            if (isset($field['input']['plugins']) && $field['input']['plugins'] == 'slug_trigger') {
                return $field;
            }
        }
    }

    private function set_slug($value, $field, $section)
    {
        $slug = slug($value);
        $CI = &get_instance();
        $CI->load->database();
        $id_post = $CI->uri->segment(8);
        $x = 0;
        $exists = true;

        $column = $field['database']['column'];
        while ($exists == true) {
            $current_slug = $slug;
            if ($x > 0) {
                $current_slug = $current_slug . $x;
            }

            $exists = $CI->db->get_where($section['table'], array('id!=' => $id_post, $column => $current_slug))->row();
            $x++;
        }

        return $current_slug;
    }
}