<?php

namespace App\Models;

use CodeIgniter\Model;

class CommonModel extends Model
{
    /**
     * Execute a custom SQL query.
     *
     * @param string $sql The SQL query to execute.
     * @return array|null The result of the query.
     */
    public function customQuery(string $sql): ?array
    {
        try {
            $query = $this->db->query($sql);
            return $query->getResult();
        } catch (\Exception $e) {
            // Log or handle the exception as needed
            return $e;
        }
    }
}