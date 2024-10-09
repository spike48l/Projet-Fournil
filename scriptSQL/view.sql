USE FOURNIL;
DROP VIEW IF EXISTS vueProduit;

CREATE VIEW vueProduit AS
SELECT 
    photoProduit AS 'Photo', 
    PRODUIT.refProduit AS 'Reference', 
    designationProduit AS 'Designation', 
    prixProduit AS 'Prix', 
    poidsProduit AS 'Poids', 
    descriptionProduit AS 'Description', 
    GROUP_CONCAT(DISTINCT denominationAllergene SEPARATOR ', ') AS 'Allergene', 
    GROUP_CONCAT(DISTINCT trace SEPARATOR ', ') AS 'traces possibles'
FROM PRODUIT, CONTENIR, ALLERGENE
WHERE CONTENIR.refProduit = PRODUIT.refProduit 
AND CONTENIR.numAllergene = ALLERGENE.numAllergene
GROUP BY 
    photoProduit, 
    PRODUIT.refProduit, 
    designationProduit, 
    prixProduit, 
    poidsProduit, 
    descriptionProduit;