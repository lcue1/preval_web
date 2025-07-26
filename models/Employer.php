<?php
class Employer{
    
    public function getAllEmployers($conexion){
        try {
            $stmt = $conexion->prepare("SELECT * FROM employer");
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $conexion->error);
            } 
            if (!$stmt->execute()) {
                throw new Exception("Error executing statement: " . $stmt->error);
            }
            $result = $stmt->get_result();
            $employers = [];
            while ($employer = $result->fetch_object()) {
                $employers[] = $employer;
            }
            return $employers;
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