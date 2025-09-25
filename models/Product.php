<?php
class Product{
    public function getAllProducts($conexion) {
        try {
            $stmt = $conexion->prepare("SELECT * FROM product");
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $conexion->error);
            }
            if (!$stmt->execute()) {
                throw new Exception("Error executing statement: " . $stmt->error);
            }
            $result = $stmt->get_result();
            $products = [];
            while ($product = $result->fetch_object()) {
                $products[] = $product;
            }
            return $products;
        } catch (Exception $e) {
            throw $e;
        } finally {
            if (isset($stmt)) {
                $stmt->close();
            }
        }
    }
     public function getProducctById($conexion, $productId) {
         try {
             $stmt = $conexion->prepare("SELECT * FROM product WHERE productId = ?");
             if (!$stmt) {
                 throw new Exception("Error preparing statement: " . $conexion->error);
             }
             $stmt->bind_param("i", $productId);
             if (!$stmt->execute()) {
                 throw new Exception("Error executing statement: " . $stmt->error);
             }
             $result = $stmt->get_result();
             return $result->fetch_object();
         } catch (Exception $e) {
             throw $e;
         } finally {
             if (isset($stmt)) {
                 $stmt->close();
             }
         }
    }
    function saveProduct($conexion, $productData) {
        
        try {
            $stmt = $conexion->prepare("INSERT INTO product (productName, quantity, material, productCost, state) VALUES (?, ?, ?, ?, ?)");
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $conexion->error);
            }
            $stmt->bind_param("sdsds", $productData['productName'], $productData['quantity'], $productData['material'], $productData['productCost'], $productData['state']);
            if (!$stmt->execute()) {
                throw new Exception("Error executing statement: " . $stmt->error);
            }
            return true;
        } catch (Exception $e) {
            throw $e;
        } finally {
            if (isset($stmt)) {
                $stmt->close();
            }
        }
    }
    function updateProduct($conexion, $productData) {
        try {
            
            $stmt = $conexion->prepare("UPDATE product SET productName = ?, quantity = ?, material = ?, productCost = ?, state = ? WHERE productId = ?");
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $conexion->error);
            }
            $stmt->bind_param("sdsdsi", $productData['productName'], $productData['quantity'], $productData['material'] , $productData['productCost'], $productData['state'], $productData['productId']);
            if (!$stmt->execute()) {
                throw new Exception("Error executing statement: " . $stmt->error);
            }
            return true;
        } catch (Exception $e) {
            throw $e;
        } finally {
            if (isset($stmt)) {
                $stmt->close();
            }
        }
    }
    function deleteProduct($conexion, $productId) {
        try {
            $stmt = $conexion->prepare("UPDATE product SET state ='I' WHERE productId = ?");
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $conexion->error);
            }
            $stmt->bind_param("i", $productId);
            if (!$stmt->execute()) {
                throw new Exception("Error executing statement: " . $stmt->error);
            }
            return true;
        } catch (Exception $e) {
            throw $e;
        } finally {
            if (isset($stmt)) {
                $stmt->close();
            }
        }
    }
}

?>