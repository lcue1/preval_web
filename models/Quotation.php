<?php

class Quotation
{

    public function getAllQuotations($conexion){
        try {
            $stmt = $conexion->prepare("SELECT q.quotationId, q.productId, p.productName, q.structureType, q.structureCost, q.distance, q.distanceCost, q.idEmployer,e.name , q.total FROM quotation q
             INNER JOIN product p ON q.productId = p.productId 
             INNER JOIN employer e ON q.idEmployer = q.idEmployer 
            WHERE e.idEmployer = q.idEmployer");
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $conexion->error);
            }
            if (!$stmt->execute()) {
                throw new Exception("Error executing statement: " . $conexion->error);
            }
            $result = $stmt->get_result();
            $quotations = [];
            while ($quotation = $result->fetch_object()) {
                $quotations[] = $quotation;
            }
            return $quotations;
        } catch (Exception $e) {
            throw $e;
        } finally {
            if (isset($stmt)) {
                $stmt->close();
            }
        }
    }

    public function addQuotation($conexion, $quotationData){
        try{
            $stmt = $conexion->prepare('INSERT INTO quotation(productId, structureType, structureCost, distance, distanceCost, idEmployer, total) VALUES(?, ?, ?, ?, ?, ?, ?);');
            if(!$stmt){
                throw new Exception('Quotation error: '.$conexion->error);
            }

            $stmt->bind_param('isdddid',
            $quotationData['productId'],
            $quotationData['structureType'],
            $quotationData['structureCost'],
            $quotationData['distance'],
            $quotationData['distanceCost'],
            $quotationData['idEmployer'],
            $quotationData['total']
        );

        if(!$stmt->execute()){
            throw new Exception("Error quotation".$conexion->error);
        }
        return true;

        }catch(Exception $e){
            throw $e;
        } finally {
            if (isset($stmt)) {
                $stmt->close();
            }
        }
    }

    public function getQuotationById($conexion,$quotationId){
           try {
           $stmt = $conexion->prepare("SELECT q.*, p.* FROM quotation q
             INNER JOIN product p ON q.productId = p.productId WHERE q.quotationId = ?");
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $conexion->error);
            }
            $stmt->bind_param('i', $quotationId);
            if (!$stmt->execute()) {
                throw new Exception("Error executing statement: " . $conexion->error);
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
    
    public function editQuotation($conexion, $quotationData){
        try{
            $stmt = $conexion->prepare('UPDATE quotation 
            SET productId = ?,  structureType = ?, structureCost = ?, distance = ?, distanceCost = ?, idEmployer = ?, total = ? 
            WHERE quotationId =?');
            if(!$stmt){
                throw new Exception('Quotation error: '.$conexion->error);
            }

            $stmt->bind_param('isdddids',
            $quotationData['productId'],
            $quotationData['structureType'],
            $quotationData['structureCost'],
            $quotationData['distance'],
            $quotationData['distanceCost'],
            $quotationData['idEmployer'],
            $quotationData['total'],
            $quotationData['quotationId']
        );

        if(!$stmt->execute()){
            throw new Exception("Error quotation".$conexion->error);
        }
        return true;

        }catch(Exception $e){
            throw $e;
        } finally {
            if (isset($stmt)) {
                $stmt->close();
            }
        }
    }
    public function deleteQuotation($conexion, $quotationId){
        try{
            $stmt = $conexion->prepare('DELETE FROM quotation WHERE quotationId = ?');
            if(!$stmt){
                throw new Exception('Quotation error: '.$conexion->error);
            }

            $stmt->bind_param('i', $quotationId);

        if(!$stmt->execute()){
            throw new Exception("Error deleting quotation".$conexion->error);
        }
        return true;

        }catch(Exception $e){
            throw $e;
        } finally {
            if (isset($stmt)) {
                $stmt->close();
            }
        }
    }
}
