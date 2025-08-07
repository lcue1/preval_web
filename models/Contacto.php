<?php
class Contacto {
    


    public function saveComment($conexion,$dataComment) {
        try {
            $stmt = $conexion->prepare("INSERT INTO coments (name, email, phone, coment, state, date) VALUES (?, ?, ?, ?, 'E', NOW())");
            if (!$stmt) {
                throw new Exception("Error en prepare: " . $conexion->error);
            }
            if (!$stmt->bind_param("ssss", $dataComment['name'], $dataComment['email'], $dataComment['phone'], $dataComment['coment'])) {
                throw new Exception("Error en bind_param: " . $stmt->error);
            }
            if (!$stmt->execute()) {
                 if ($stmt->errno == 1062) {
                    throw new Exception("Ya recibimos tu solicitud pronto nos contactaremos.");
                } else {
                    throw new Exception("Error en execute: " . $stmt->error);
                }
            }
            return true;
        } catch (Exception $e) {
            throw $e;
        }
        finally {
            if (isset($stmt)) {
                $stmt->close();
            }
        }
    }
}
?>