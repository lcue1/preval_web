<?php
class Comments{

    public function getAllComments($conexion) {
        try{
            
         $stmt = $conexion->prepare("SELECT * FROM coments ORDER BY date DESC");
        if (!$stmt) {
            throw new Exception("Error preparing statement: " . $conexion->error);
        }
        if (!$stmt->execute()) {
            throw new Exception("Error executing statement: " . $stmt->error);
        }
        
        $comments = [];
        $result = $stmt->get_result();
        while ($comment = $result->fetch_object()) {
            $comments[] = $comment;
        }
        return $comments;
        
        }catch(Exception $e){
            throw $e;
        } finally {
            if (isset($stmmt)) {
                $stmmt->close();
            }
        }
    }
   public function resolveResolution($conexion, $dataComments) {
    
    try {
        $stmt = $conexion->prepare("UPDATE coments SET resolutionDetails = ?, state = 'R' WHERE idComent = ?");
        if (!$stmt) {
            throw new Exception("Error preparing statement: " . $conexion->error);
        }
        $stmt->bind_param("si", $dataComments['resolutionDetails'], $dataComments['idComment']);
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