<?php

class Quotation
{

    public function getAllQuotations($conexion){
        try {
            $stmt = $conexion->prepare("SELECT *  FROM quotation");
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
            $stmt = $conexion->prepare('INSERT INTO quotation(productId, structuareType, structureCost, distance, distanceCost, idEmployer, total) VALUES(?, ?, ?, ?, ?, ?, ?);');
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
}
