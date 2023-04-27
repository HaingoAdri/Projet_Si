SELECT * FROM journaux WHERE CAST(compte AS VARCHAR) LIKE '5%';
SELECT * FROM journaux WHERE CAST(compte AS VARCHAR) LIKE '4%' and compte != 4457 and compte != 4456;
SELECT idEntreprise, compte, exo, sum(debit) debit, sum(credit) credit 
    FROM journaux
    WHERE CAST(compte AS VARCHAR) LIKE '4%' and compte != 4457 and compte != 4456 
    group by idEntreprise, compte, exo;

SELECT idEntreprise, compte, exo, 
       SUM(debit) AS debit, 
       SUM(credit) AS credit, 
       CASE 
           WHEN SUM(credit - debit) < 0 THEN ABS(SUM(credit - debit))
           ELSE 0 
       END AS soldeDebiteur,
       CASE 
           WHEN SUM(credit - debit) > 0 THEN SUM(credit - debit)
           ELSE 0 
       END AS soldeCrediteur
FROM journaux 
WHERE compte IN (4457, 4456) 
GROUP BY idEntreprise, compte, exo;

SELECT idEntreprise, compte, exo, 
       SUM(debit) AS debit, 
       SUM(credit) AS credit, 
       CASE 
           WHEN SUM(credit - debit) < 0 THEN ABS(SUM(credit - debit))
           ELSE 0 
       END AS soldeDebiteur,
       CASE 
           WHEN SUM(credit - debit) > 0 THEN SUM(credit - debit)
           ELSE 0 
       END AS soldeCrediteur
FROM journaux 
WHERE (CAST(compte AS VARCHAR) LIKE '1%' 
    or CAST(compte AS VARCHAR) LIKE '2%'
    or CAST(compte AS VARCHAR) LIKE '3%' 
    or CAST(compte AS VARCHAR) LIKE '5%' 
    or CAST(compte AS VARCHAR) LIKE '6%' 
    or CAST(compte AS VARCHAR) LIKE '7%' 
    or (CAST(compte AS VARCHAR) LIKE '4%' and compte != 4457 and compte != 4456 ))
    AND idEntreprise = 16 and exo = 1
GROUP BY idEntreprise, compte, exo;


SELECT
        CASE 
           WHEN SUM(tab.soldeDebiteur)::integer !=0 THEN SUM(tab.soldeDebiteur)::integer
           ELSE 0 
        END AS soldeDebiteur,
        CASE 
           WHEN SUM(tab.soldeCrediteur)::integer !=0 THEN SUM(tab.soldeCrediteur)::integer
           ELSE 0 
        END AS soldeCrediteur
FROM 
(
    SELECT idEntreprise, compte, exo, 
           SUM(debit) AS debit, 
           SUM(credit) AS credit, 
           CASE 
               WHEN SUM(credit - debit) < 0 THEN ABS(SUM(credit - debit))
               ELSE 0 
           END AS soldeDebiteur,
           CASE 
               WHEN SUM(credit - debit) > 0 THEN SUM(credit - debit)
               ELSE 0 
           END AS soldeCrediteur
    FROM journaux 
    WHERE (CAST(compte AS VARCHAR) LIKE '1%' 
       OR CAST(compte AS VARCHAR) LIKE '2%' 
       or CAST(compte AS VARCHAR) LIKE '3%' 
       OR CAST(compte AS VARCHAR) LIKE '5%' 
       OR CAST(compte AS VARCHAR) LIKE '6%' 
       OR CAST(compte AS VARCHAR) LIKE '7%' 
       OR (CAST(compte AS VARCHAR) LIKE '4%' AND compte != 4457 AND compte != 4456) 
       OR (compte IN (4457, 4456)))
       AND idEntreprise = 16 and exo = 2
    GROUP BY idEntreprise, compte, exo
) tab;


SELECT
        CASE 
           WHEN SUM(tab.soldeDebiteur)::integer !=0 THEN SUM(tab.soldeDebiteur)::integer
           ELSE 0 
        END AS soldeDebiteur,
        CASE 
           WHEN SUM(tab.soldeCrediteur)::integer !=0 THEN SUM(tab.soldeCrediteur)::integer
           ELSE 0 
        END AS soldeCrediteur
FROM 
(
    SELECT idEntreprise, compte, exo, 
           SUM(debit) AS debit, 
           SUM(credit) AS credit, 
           CASE 
               WHEN SUM(credit - debit) < 0 THEN ABS(SUM(credit - debit))
               ELSE 0 
           END AS soldeDebiteur,
           CASE 
               WHEN SUM(credit - debit) > 0 THEN SUM(credit - debit)
               ELSE 0 
           END AS soldeCrediteur
    FROM journaux 
    WHERE CAST(compte AS VARCHAR) LIKE '6%' 
        AND CAST(compte AS VARCHAR) LIKE '7%' 
       AND idEntreprise = 16 and exo = 2
    GROUP BY idEntreprise, compte, exo
) tab;

je veux ajouter deux nouveau champ dans cette requette: soldeCebiteur'et 'solde crediteur', 
refait ma requette en ajouter ces deux nouveaux champs avec il y a une valuer dans le solde debiteur si credit - debit < 0 et 
il y a une valuer dans le champ solde crediteur si credit - credit > 0 et il n'y a pas de solution dans le solde debiteur et solde crediteur si cedit - debit = 0


<!-- SI Interrupteur1..Etat = 1 ALORS
    // L'interrupteur est sélectionné
SINON
    // L'interrupteur n'est pas sélectionné
FIN -->



public function TVAverse() {
            $this->load->model('Compte');
            $requette = "SELECT CASE " .
                               "WHEN SUM(tab.soldeDebiteur)::integer !=0 THEN SUM(tab.soldeDebiteur)::integer
                                ELSE 0 
                                END AS soldeDebiteur,
                                CASE 
                                    WHEN SUM(tab.soldeCrediteur)::integer !=0 THEN SUM(tab.soldeCrediteur)::integer
                                    ELSE 0 
                                END AS soldeCrediteur
                            FROM 
                            (
                            SELECT idEntreprise, compte, exo, 
                                    SUM(debit) AS debit, 
                                    SUM(credit) AS credit, 
                                    CASE 
                                        WHEN SUM(credit - debit) < 0 THEN ABS(SUM(credit - debit))
                                        ELSE 0 
                                    END AS soldeDebiteur,
                                    CASE 
                                        WHEN SUM(credit - debit) > 0 THEN SUM(credit - debit)
                                        ELSE 0 
                                    END AS soldeCrediteur
                            FROM journaux 
                            WHERE 
                                (compte IN (4457, 4456))
                                AND idEntreprise = " . $idEntreprise ." and exo = ". $idExercice ."
                            GROUP BY idEntreprise, compte, exo
                        )tab;";
            $query = $this->db->query($requette);
            $liste = $query->result_array();
            $deductible = 0;
            $collecte = 0;
            if($liste[0]['soldedebiteur'] < $liste[0]['soldecrediteur'])
                $collecte = $liste[0]['soldecrediteur'] - $liste[0]['soldedebiteur'];
            else
                $deductible = $liste[0]['soldecrediteur'] - $liste[0]['soldedebiteur'];
                
            return  new Balance("" . $idEntreprise, "", "", "" . $idExercice , "", "TVA a verser ", "" .  $deductible, "" . $collecte);
        }