<?php
namespace App\Repositories;

use App\Database\Connection;
use App\Models\Product;
use Exception;
use PDO;
use PDOException;

class ProductException extends Exception {}

class ProductRepository
{
    private PDO $db;
    private const TABLE_NAME = "product";

    public function __construct()
    {
        $this->db = Connection::getInstance();
    }

    // Lấy toàn bộ sản phẩm
    public function getAll(): array
    {
        try {
            $query = $this->db->prepare("SELECT * FROM " . self::TABLE_NAME);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            return empty($results)
                ? []
                : array_map([Product::class, 'fromArray'], $results);
        } catch (PDOException $e) {
            error_log("DB error: " . $e->getMessage());
            throw new ProductException("Lỗi cơ sở dữ liệu.");
        }
    }

    // Lấy sản phẩm theo ID
    public function getById($id): Product
    {
        try {
            $id = is_array($id) ? (int)$id[0] : (int)$id;

            $query = $this->db->prepare("SELECT * FROM " . self::TABLE_NAME . " WHERE id = :id");
            $query->bindValue(":id", $id, PDO::PARAM_INT);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                throw new ProductException("Sản phẩm không tồn tại.");
            }

            return Product::fromArray($result);
        } catch (PDOException $e) {
            error_log("DB error: " . $e->getMessage());
            throw new ProductException("Lỗi cơ sở dữ liệu.");
        }
    }

    // Thêm sản phẩm mới
    public function store(string $name, string $category, float $price, string $description): bool
    {
        try {
            $query = $this->db->prepare("
                INSERT INTO " . self::TABLE_NAME . " (name, category, price, description)
                VALUES (:name, :category, :price, :description)
            ");
            return $query->execute([
                ':name' => $name,
                ':category' => $category,
                ':price' => $price,
                ':description' => $description
            ]);
        } catch (PDOException $e) {
            error_log("DB error: " . $e->getMessage());
            throw new ProductException("Không thể tạo sản phẩm.");
        }
    }

    // Cập nhật sản phẩm
    public function update(int $id, string $name, string $category, float $price, string $description): bool
    {
        try {
            $query = $this->db->prepare("
                UPDATE " . self::TABLE_NAME . "
                SET name = :name, category = :category, price = :price, description = :description
                WHERE id = :id
            ");
            return $query->execute([
                ":id" => $id,
                ":name" => $name,
                ":category" => $category,
                ":price" => $price,
                ":description" => $description,
            ]);
        } catch (PDOException $e) {
            error_log("DB error: " . $e->getMessage());
            throw new ProductException("Không thể cập nhật sản phẩm.");
        }
    }

    // Xoá sản phẩm
    public function delete(int $id): bool
    {
        try {
            $query = $this->db->prepare("DELETE FROM " . self::TABLE_NAME . " WHERE id = :id");
            return $query->execute([":id" => $id]);
        } catch (PDOException $e) {
            error_log("DB error: " . $e->getMessage());
            throw new ProductException("Không thể xoá sản phẩm.");
        }
    }
}
