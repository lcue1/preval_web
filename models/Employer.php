<?php
class Employer
{

    public function getAllEmployers($conexion)
    {
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

    public function getAllRols($conexion)
    {
        try {
            $stmt = $conexion->prepare("SELECT * FROM employerrol");
            if (!$stmt) {
                throw new Exception("Error rol: " . $conexion->error);
            }
            if (!$stmt->execute()) {
                throw new Exception("Error rol: " . $stmt->error);
            }
            $result = $stmt->get_result();
            $rols = [];
            while ($rol = $result->fetch_object()) {
                $rols[] = $rol;
            }
            return $rols;
        } catch (Exception $e) {
            return $e->getMessage();
        } finally {
            if (isset($stmt)) {
                $stmt->close();
            }
        }
    }
    public function saveEmployer($conexion, $userName, $name, $rolId, $password, $state)
    {
        try {
            $stmt = $conexion->prepare("INSERT INTO employer (userNameEmployer, name, rolId, password, state) VALUES (?, ?, ?, ?, ?)");
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $conexion->error);
            }
            $stmt->bind_param("ssiss", $userName, $name, $rolId, password_hash($password, PASSWORD_DEFAULT), $state);
            if (!$stmt->execute()) {
                throw new Exception("Error executing statement: " . $stmt->error);
            }

            return true;
        } catch (Exception $e) {

            throw new Exception("El nombre de usuario: " . $userName . " ya existe.");
            //error para desarrollador
            //   throw new Exception("error real: " .$e->getMessage());

        } finally {
            if (isset($stmt)) {
                $stmt->close();
            }
        }
    }
    public function updateEmployer($conexion, $employerId, $userName, $name, $rolId, $password, $state)
    {
        try {
            if (empty($password)) {
                // Actualizar sin cambiar la contraseña
                $stmt = $conexion->prepare("UPDATE employer SET userNameEmployer = ?, name = ?, rolId = ?, state = ? WHERE idEmployer = ?");
                if (!$stmt) {
                    throw new Exception("Error preparing statement: " . $conexion->error);
                }
                $stmt->bind_param("ssisi", $userName, $name, $rolId, $state, $employerId);
            } else {
                // Actualizar incluyendo nueva contraseña
                $stmt = $conexion->prepare("UPDATE employer SET userNameEmployer = ?, name = ?, rolId = ?, password = ?, state = ? WHERE idEmployer = ?");
                if (!$stmt) {
                    throw new Exception("Error preparing statement: " . $conexion->error);
                }
                $stmt->bind_param("ssissi", $userName, $name, $rolId, password_hash($password, PASSWORD_DEFAULT), $state, $employerId);
            }

            if (!$stmt->execute()) {
                if ($stmt->errno == 1062) {
                    throw new Exception("El nombre de usuario: " . $userName . " ya existe.");
                }
                throw new Exception("Error executing statement: " . $stmt->error);
            }
            return true;
        } catch (Exception $e) {
            throw new Exception("Error al actualizar el usuario: " . $e->getMessage());
        } finally {
            if (isset($stmt)) {
                $stmt->close();
            }
        }
    }
    public function deleteEmployer($conexion, $userName){
        try {
            $stmt = $conexion->prepare("UPDATE employer SET state = 'I' WHERE idEmployer = ?");

            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $conexion->error);
            }
            $stmt->bind_param("s", $userName);
            if (!$stmt->execute()) {
                throw new Exception("Error executing statement: " . $stmt->error);
            }
            return true;
        } catch (Exception $e) {
            throw new Exception("Error al eliminar el usuario: " . $e->getMessage());
        }
        finally {
            if (isset($stmt)) {
                $stmt->close();
            }
        }
    }
}
