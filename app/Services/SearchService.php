<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class SearchService
{
    protected array $tables = ['blogs', 'teams', 'events', 'programs', 'publications']; // Tables to search
    protected array $columns = ['name', 'title']; // Columns to search

    public function search($searchText)
    {
        $results = [];

        foreach ($this->tables as $table) {
            // Check if the table has 'name' or 'title' columns
            $columns = DB::select("
                SELECT COLUMN_NAME
                FROM INFORMATION_SCHEMA.COLUMNS
                WHERE TABLE_SCHEMA = DATABASE()
                AND TABLE_NAME = ?
                AND COLUMN_NAME IN ('name', 'title')
            ", [$table]);

            if (!empty($columns)) {
                $whereConditions = [];
                foreach ($columns as $column) {
                    $columnName = $column->COLUMN_NAME;
                    $whereConditions[] = "$columnName LIKE ?";
                }

                // Select the full row when a match is found
                $query = "SELECT *, '$table' AS table_name FROM $table WHERE " . implode(" OR ", $whereConditions);
                $matches = DB::select($query, array_fill(0, count($whereConditions), "%$searchText%"));

                if (!empty($matches)) {
                    $results = array_merge($results, $matches);
                }
            }
        }
        return $results;
    }
}
