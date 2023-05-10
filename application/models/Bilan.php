<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Bilan extends CI_Model {
 
        public function getResultat($idEntreprise, $date, $debut){

            $requete = "SELECT 
                sum(case when compte::text like '70%' then montant else 0 end) as sum70,
                sum(case when compte::text like '71%' then montant else 0 end) as sum71,
                sum(case when compte::text like '60%' then montant else 0 end) as sum60,
                sum(case when compte::text like '61%' AND compte::text like '62%' then montant else 0 end) as sum61_62,
                sum(case when compte::text like '64%' then montant else 0 end) as sum64,
                sum(case when compte::text like '63%' then montant else 0 end) as sum63,
                sum(case when compte::text like '75%' then montant else 0 end) as sum75, 
                sum(case when compte::text like '65%' then montant else 0 end) as sum65, 
                sum(case when compte::text like '68%' then montant else 0 end) as sum68,
                sum(case when compte::text like '78%' then montant else 0 end) as sum78,
                sum(case when compte::text like '76%' then montant else 0 end) as sum76, 
                sum(case when compte::text like '66%' then montant else 0 end) as sum66,
                sum(case when compte::text like '77%' then montant else 0 end) as sum77, 
                sum(case when compte::text like '67%' then montant else 0 end) as sum67
                FROM JournauxExercice where date > '".$debut."' and date 
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                < '".$date."' and identreprise = ".$idEntreprise;

            $query = $this->db->query($requete);       

            $tab = array();
            foreach($query->result_array() as $row){
                $tab = $row;
            }
            return $tab;
        }

    }
?>