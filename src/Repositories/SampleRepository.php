<?php
namespace App\Repositories;

use App\Database\Connection;
use App\Models\Sample;
use Exception;
use PDOException;
use PDOStatement;
use PDO;
class SampleException extends Exception {}
class SampleRepository
{
    private $db;
    private const TABLE_NAME = "sample";
    public function __construct()
    {
        $this->db = Connection::getInstance();
    }

    public function getAll(): array
    {
        try {
            // Retrieve all samples
            $query = $this->db->prepare("SELECT * FROM " . self::TABLE_NAME);
            $query->execute();
            $results = $query->fetchAll();
            if (!$results) {
                throw new Exception("Failed to fetch samples.");
            }
            // convert results to Sample objects using array_map
            return empty($results)
                ? [] // return empty array if no results
                : array_map([Sample::class, "fromArray"], $results);
        } catch (PDOException $e) {
            error_log("DB error:" . $e->getMessage());
            throw new SampleException("Database error: " . $e->getMessage());
        } catch (Exception $e) {
            error_log("DB error:" . $e->getMessage());
            throw new SampleException("Query failed: " . $e->getMessage());
        }
    }

    public function getById($id): Sample
    {
        try {
            $query = $this->db->prepare(
                "SELECT * FROM " . self::TABLE_NAME . " WHERE id = :id"
            );
            $query->bindParam(":id", $id);
            $query->execute();
            // convert fetch result into Sample object
            $result = $query->fetch();
            return Sample::fromArray($result);
        } catch (PDOException $e) {
            error_log("DB error:" . $e->getMessage());
            throw new SampleException("Database error: " . $e->getMessage());
        } catch (Exception $e) {
            error_log("DB error:" . $e->getMessage());
            throw new SampleException("Query failed: " . $e->getMessage());
        }
    }

    public function store($name, $description): bool
    {
        // Create a new sample
        try {
            // prepare query
            $query = $this->db->prepare(
                "INSERT INTO " .
                    self::TABLE_NAME .
                    " (name, description) VALUES (:name, :description)"
            );
            $query->bindParam(":name", $name);
            $query->bindParam(":description", $description);
            return $query->execute();
        } catch (Exception $e) {
            error_log("DB error:" . $e->getMessage());
            throw new SampleException("Query failed: " . $e->getMessage());
        }
    }

    public function update($id, $name, $description)
    {
        // Update a sample
        try {
            // prepare query
            $query = $this->db->prepare(
                "UPDATE " .
                    self::TABLE_NAME .
                    " SET name = :name, description = :description WHERE id = :id"
            );
            $query->bindParam(":id", $id);
            $query->bindParam(":name", $name);
            $query->bindParam(":description", $description);
            return $query->execute();
        } catch (Exception $e) {
            error_log("DB error:" . $e->getMessage());
            throw new SampleException("Query failed: " . $e->getMessage());
        }
    }

    public function delete($id)
    {
        // Delete a sample
        try {
            // prepare query
            $query = $this->db->prepare(
                "DELETE FROM " . self::TABLE_NAME . " WHERE id = :id"
            );
            $query->bindParam(":id", $id);
            return $query->execute();
        } catch (Exception $e) {
            error_log("DB error:" . $e->getMessage());
            throw new SampleException("Query failed: " . $e->getMessage());
        }
    }
}
