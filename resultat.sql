SELECT idEntreprise, exo, 
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
WHERE (CAST(compte AS VARCHAR) LIKE '280%')
    AND idEntreprise = 16 and exo = 1
GROUP BY idEntreprise, exo;

---------------------------*****************************-------------------

SELECT CASE 
           WHEN SUM(brut) is not null THEN sum(brut)
           ELSE 0
       END AS brut,
       CASE 
           WHEN SUM(ammortissement) is not null THEN SUM(ammortissement)
           ELSE 0
       END AS ammortissement, 
       CASE 
           WHEN ABS(SUM(brut) - SUM(ammortissement))  is not null THEN ABS(SUM(brut) - SUM(ammortissement)) 
           ELSE 0
       END AS net 
       from (SELECT idEntreprise, exo, 
            CASE 
                WHEN CAST(compte AS VARCHAR) LIKE '22%' THEN sum(debit)
                ELSE 0
            END AS brut,
            CASE 
                WHEN CAST(compte AS VARCHAR) LIKE '282%' THEN SUM(credit)
                ELSE 0 
            END AS ammortissement
            FROM journaux 
            WHERE (CAST(compte AS VARCHAR) LIKE '282%' 
            OR CAST(compte AS VARCHAR) LIKE '22%')
            AND idEntreprise = 16 and exo = 1
            GROUP BY idEntreprise,  exo, compte
       ) tab;
