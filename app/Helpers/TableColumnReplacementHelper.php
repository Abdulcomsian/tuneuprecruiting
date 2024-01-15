<?php

namespace App\Helpers;

use App\Models\Student;

class TableColumnReplacementHelper
{
    public static function getTableColumnsReplacement() {
        return [
            'student-first_name',
            'student-last_name',
            'recruiter-first_name',
            'recruiter-last_name',
            'program-program_name'
        ];
    }

    public static function getFormattedArray($templateData) {
        $tableColumns = [];

        foreach ($templateData as $table => $model) {
            $tableColumns[$table] = $model->toArray();  // Use toArray() to convert model to array
        }

        return $tableColumns;
    }
    public static function renderDynamicContent($template, $data) {
        $pattern = '/\[([^\]]+)\]/'; // Matches placeholders in format [table-column]

        return preg_replace_callback($pattern, function ($matches) use ($data) {
            // Extract table and column from placeholder
            list($table, $column) = explode('-', $matches[1]);

            // Access value from data array (assuming nested structure)
            return isset($data[$table][$column]) ? $data[$table][$column] : $matches[0]; // If value not found, return original placeholder
        }, $template);
    }
}
