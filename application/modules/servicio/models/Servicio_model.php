<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicio_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function getUserContracts($user_id){
        $this->db->select('id, contract_number, monto_total, monto_abonado, monto_cuota');
        $this->db->where('contact_id', $user_id);
        $this->db->from('contratos_account');
        return $this->db->get()->result_array();
    }

    private function now(){
        return date("Y-m-d H:i:s");
    }

    private function getCurrentMonth()
    {
       $date = date('F Y');
       $meses = array(
        'january'   => 'Enero',
        'february'  => 'Febrero',
        'march'     => 'Marzo',
        'april'     => 'Abril',
        'may'       => 'Mayo',
        'june'      => 'Junio',
        'july '     => 'Julio',
        'august'    => 'Agosto',
        'september' => 'Septiembre',
        'october'   => 'Octubre',
        'november'  => 'Noviembre',
        'december'  => 'Diciembre'
       );

       return $meses[$date];
    }  


    // private function openApartadosAccount($userID, $customerID, $apartado$id){}

    private function openContratosAccount($userID, $customerID, $contractID, $monto_total, $prima, $mes_cobro, $monto_cuota, $anno_cobro){

        $saldo_actual = $monto_total - $prima;

        $data['contract_number'] = $contractID;
        $data['contact_id'] = $customerID;
        $data['created_by'] = $userID;
        $data['status'] = "A"; // active
        $data['monto_total'] = $monto_total;
        $data['prima'] = $prima;
        $data['mes_cobro'] = $mes_cobro;
        $data['monto_cuota'] = $monto_cuota;
        $data['saldo'] = $saldo_actual;
        $data['saldo_anterior'] = $monto_total;
        $data['monto_abonado'] = $prima;
        $data['anno_cobro'] = $anno_cobro;
        
        $this->db->insert('contratos_account', $data);
        return $this->db->insert_id();
    }

    // openFunecreditoAccount(                         $_SESSION['user_id'],
    //                                                 $this->input->post('contact_id'), 
    //                                                 $contractID, 
    //                                                 $this->input->post('amountService'), 
    //                                                 $this->input->post('advance_payment'), 
    //                                                 $saldo_actual, 
    //                                                 $data['interes_mensual'],
    //                                                 $data['plazo'],
    //                                                 $data['plazo'], 
    //                                                 $data['cuota'],
    //                                                 $data['cuota'],
    //                                                 $this->now(), 
    //                                                 $this->getCurrentMonth(),
    //                                                 $this->input->post('amount'));

    private function openFunecreditoAccount($userID, $customerID, 
                                        $funeral_id, $monto_principal, $monto_abonado, $saldo, 
                                        $interes_mensual,$plazo_inicial,$plazo_restante, 
                                        $couta_sin_interes,$couta_con_interes,$fecha_aplicacion, 
                                        $mes_cobro,$saldo_anterior){

        $saldo_actual = $monto_total - $prima;

        $data['funeral_id'] = $funeral_id;
        $data['contact_id'] = $customerID;
        $data['monto_principal'] = $monto_principal;
        $data['monto_abonado'] = $monto_abonado;
        $data['saldo'] = $saldo;
        $data['interes_mensual'] = $interes_mensual;
        $data['plazo_inicial'] = $plazo_inicial;
        $data['plazo_restante'] = $plazo_restante;
        $data['couta_sin_interes'] = $couta_sin_interes; // active
        $data['couta_con_interes'] = $couta_con_interes;
        $data['status'] = "A";
        $data['fecha_aplicacion'] = $fecha_aplicacion;
        $data['mes_cobro'] = $mes_cobro;
        $data['saldo_anterior'] = $saldo_anterior;
        $data['created_by'] = $userID;
        
        
        $this->db->insert('funecredito_account', $data);
        return $this->db->insert_id();
    }


    private function openFuneralAccount($userID, $customerID, 
                                        $funeral_id, $monto_principal, $monto_abonado, $saldo, $saldo_anterior){

        // $saldo_actual = $monto_total - $prima;

        $data['funeral_id'] = $funeral_id;
        $data['contact_id'] = $customerID;
        $data['monto_total'] = $monto_principal;
        $data['monto_abonado'] = $monto_abonado;
        $data['saldo'] = $saldo;
        $data['status'] = "A";
        // $data['saldo_anterior'] = $saldo_anterior;
        $data['created_by'] = $userID;
        
        
        $this->db->insert('funeral_account', $data);
        return $this->db->insert_id();
    }



    private function openApartadosAccount($userID, $customerID, $contractID, $monto_total, $prima, $mes_cobro=''){

        $saldo_actual = $monto_total;

        $data['contract_number'] = $contractID;
        $data['contact_id'] = $customerID;
        $data['created_by'] = $userID;
        $data['status'] = "A"; // active
        $data['monto_total'] = $monto_total;
        // $data['mes_cobro'] = $mes_cobro;
        // $data['monto_cuota'] = $monto_cuota;
        $data['saldo'] = $saldo_actual;
        $data['saldo_anterior'] = $monto_total;
        $data['monto_abonado'] = $prima;
        
        $this->db->insert('apartados_account', $data);
        return $this->db->insert_id();
    }


    private function newTransaction($userID, $contractID, $tipo_servicio, $monto, $metodo_pago, $descripcion, $detalles, $saldo_anterior, $status = 'A', $mes_cobro=null,$anno_cobro=null ){
        $data['servicio_id'] = $contractID;
        $data['servicio_tipo'] = $tipo_servicio;
        $data['monto'] = $monto;
        $data['status'] = $status;
        $data['descripcion'] = $descripcion;
        $data['metodo_pago'] = $metodo_pago;
        $data['realizado_por'] = $userID;    
        $data['detalles'] = $detalles;
        $data['saldo_anterior'] = $saldo_anterior;
        
        if(isset($mes_cobro)){
            $data['mes_cobro'] = $mes_cobro;    
        }
        if(isset($anno_cobro)){
            $data['anno_cobro'] = $anno_cobro;    
        }

        $this->db->insert('bk_transaccion', $data);
        return $this->db->insert_id();
    }


    public function newAmountAdjustment(){
        $monto = $this->input->post('abono');
        $contractID = $this->input->post('contractID');
        $concepto = $this->input->post('concepto');
        $acc = $this->getAccountByContractID($contractID);
        // $monto_abonado;
        $saldo = $acc['saldo'];
        $saldo_anterior = $acc['saldo_anterior'];
        
        $monto_total = $acc['monto_total'];
        $monto_abonado = $acc['monto_abonado'];

        $transactionID = $this->newTransaction($_SESSION['user_id'], $acc['id'], 'contrato', $monto,  'n/a', $concepto, '', $acc['saldo_anterior'],'J'); //Status = J Tipo Ajuste
            
            if($transactionID>0){

                $data['monto_total'] = $monto_total + $monto;;
                $data['saldo'] = $saldo + $monto;
                $data['saldo_anterior'] = $acc['saldo_anterior'] + $monto;
                $this->db->where('contract_number', $contractID);
                $this->db->update('contratos_account', $data);
            }  
    }


    public function newAmountDiscount(){
        $monto = $this->input->post('abono');
        $contractID = $this->input->post('contractID');
        $concepto = $this->input->post('concepto');
        $acc = $this->getAccountByContractID($contractID);
        // $monto_abonado;
        $saldo = $acc['saldo'];
        $saldo_anterior = $acc['saldo_anterior'];       
        $monto_total = $acc['monto_total'];
        $monto_abonado = $acc['monto_abonado'];

        $transactionID = $this->newTransaction($_SESSION['user_id'], $acc['id'], 'contrato', $monto,  'n/a', $concepto, '', $acc['saldo_anterior'],'D'); //Status = D Tipo Descuento
            
            if($transactionID>0){

                $data['monto_total'] = $monto_total - $monto;;
                $data['saldo'] = $saldo - $monto;
                $data['saldo_anterior'] = $acc['saldo_anterior'] - $monto;
                $this->db->where('contract_number', $contractID);
                $this->db->update('contratos_account', $data);
            }
        
    }


    private function getAccountByContractID($contractID){
        $sql_account = "select * from bk_contratos_account where contract_number = ?";
        return $this->db->query( $sql_account, array( $contractID ) )->row_array();
    }

    private function getApartadoAccountByContractID($contractID){
        $sql_account = "select * from bk_apartados_account where contract_number = ?";
        return $this->db->query( $sql_account, array( $contractID ) )->row_array();
    }

    private function applyContractPay($contractID, $monto, $mes_cobro){
        
        $acc = $this->getAccountByContractID($contractID);

        // $monto_abonado;
        $saldo = $acc['saldo'];
        $saldo_anterior = $acc['saldo_anterior'];
        // $mes_cobro = $acc['mes_cobro'];
        $monto_abonado = $acc['monto_abonado'];

        $new_saldo = $saldo - $monto;
        $new_monto_abonado = $monto_abonado + $monto;
        $new_saldo_anterior = $saldo_anterior - $monto;


        $data['saldo'] = $new_saldo;
        $data['monto_abonado'] = $new_monto_abonado;
        $data['saldo_anterior'] = $new_saldo_anterior;
        $data['mes_cobro'] = $mes_cobro;
        $this->db->where('contract_number', $contractID);
        $this->db->update('contratos_account', $data);

        $data_contrato['mes_cobro'] = $mes_cobro;
        $this->db->where('id', $contractID);
        $this->db->update('contratos', $data_contrato);
    }


    private function applyApartadosPay($contractID, $monto){
        
        $acc = $this->getApartadoAccountByContractID($contractID);

        // $monto_abonado;
        $saldo = $acc['saldo'];
        $saldo_anterior = $acc['saldo_anterior'];
        // $mes_cobro = $acc['mes_cobro'];
        $monto_abonado = $acc['monto_abonado'];

        $new_saldo = $saldo - $monto;
        $new_monto_abonado = $monto_abonado + $monto;
        $new_saldo_anterior = $saldo_anterior - $monto;


        $data['saldo'] = $new_saldo;
        $data['monto_abonado'] = $new_monto_abonado;
        $data['saldo_anterior'] = $new_saldo_anterior;
        // $data['mes_cobro'] = $mes_cobro;
        $this->db->where('contract_number', $contractID);
        $this->db->update('apartados_account', $data);
    }

    public function contractPay(){
        
        $contractID = $this->input->post('contractID');
        $monto = $this->input->post('abono');
        $forma_pago = $this->input->post('tipo_pago');
        $detalles = $this->input->post('no_transferencia');
        $concepto = $this->input->post('concepto');
        $mes_cobro = $this->input->post('mes_cobro');
        $anno_cobro = $this->input->post('anno_cobro');

        $acc = $this->getAccountByContractID($contractID);
        // echo 'contractID '. $contractID;
        // echo '<pre>';
        // print_r($acc);
        // echo '<pre>';
        // die();

        // ($userID, $contractID, $tipo_servicio, $monto, $metodo_pago, $descripcion, $detalles, $saldo_anterior, $status = 'A', $mes_cobro=null,$anno_cobro=null ){

        $transactionID = $this->newTransaction($_SESSION['user_id'], $acc['id'], 'contrato', $monto,  $forma_pago, $concepto, $detalles, $acc['saldo_anterior'],'A',$mes_cobro,$anno_cobro);
            // print_r($transactionID);die();
            if($transactionID>0){
                $this->applyContractPay($acc['id'], $monto, $mes_cobro);
            }

        return $transactionID;
    }


    public function apartadoPay(){
        $contractID = $this->input->post('contractID');
        $monto = $this->input->post('abono');
        $forma_pago = $this->input->post('tipo_pago');
        $detalles = $this->input->post('no_transferencia');
        $concepto = $this->input->post('concepto');
        $mes_cobro = $this->input->post('mes_cobro');

        $acc = $this->getApartadoAccountByContractID($contractID);
        // echo 'contractID '. $contractID;
        // echo '<pre>';
        // print_r($acc);
        // echo '<pre>';
        // die();

        $transactionID = $this->newTransaction($_SESSION['user_id'], $acc['id'], 'apartado', $monto,  $forma_pago, $concepto, $detalles,$acc['saldo_anterior']);
            // print_r($transactionID);die();
            if($transactionID>0){
                $this->applyApartadosPay($acc['id'], $monto, $mes_cobro);
            }
        
        
        return $transactionID;
    }
   
    public function createContract(){
        // $data['service_id'] = $service_id;
        $data['contact_id'] =  $this->input->post('contact_id') ;
        $data['created_by'] = $_SESSION['user_id'];
       
        // $data['tiempo_contrato'] = $this->input->post('tiempo_contrato');
        $data['fecha_inclusion'] = $this->input->post('fecha_inclusion');
        $data['ruta'] = $this->input->post('ruta');
        $data['vendedor'] = $this->input->post('vendedor');
        $data['forma_pago'] = $this->input->post('forma_pago');
        $data['no_contrato'] = $this->input->post('contract_id');

        $data['monto_total'] = $this->input->post('amount');
        $data['prima'] = $this->input->post('prima');
        $data['monto_cuota'] = $this->input->post('cuota');
        $data['loc_1'] = $this->input->post('local_1');
        $data['loc_2'] = $this->input->post('local_2');
        $data['loc_3'] = $this->input->post('local_3');
        $data['no_recibo'] = $this->input->post('no_recibo');
         
        $data['mes_cobro'] = $this->input->post('mes_cobro');
        $data['saldo_anterior'] = $this->input->post('saldo_anterior');
        $data['saldo_actual'] = $this->input->post('saldo_actual'); 

        $data['observaciones'] = $this->input->post('observaciones'); 
        $data['funeraria_id'] = $this->input->post('funeraria'); 

        $data['anno_cobro'] = $this->input->post('anno_cobro'); 

        $this->db->insert('contratos', $data);
        $contractID = $this->db->insert_id();


        $accID = $this->openContratosAccount(
            $_SESSION['user_id'],  
            $this->input->post('contact_id'), 
            $contractID, 
            $this->input->post('amount'), 
            0, 
            $this->input->post('mes_cobro'), 
            $this->input->post('cuota'), 
            $this->input->post('anno_cobro') );
        

        if($accID > 0){
            $transactionID = $this->newTransaction($_SESSION['user_id'], $accID, 'contrato', $this->input->post('prima'),  $this->input->post('forma_pago'), 'Prima', '', 0);
            if($transactionID>0){
                $this->applyContractPay($accID, $this->input->post('prima'), $this->input->post('mes_cobro'));
            }
        }
        
        //Create account
    }


    public function createFuneral(){
        $max_contracts = 3;
        // $data['service_id'] = $service_id;
        $type =  $this->input->post('type') ;
        $data['contact_id'] =  $this->input->post('contact_id') ;
        $data['created_by'] = $_SESSION['user_id'];

        $data['fallecido_ced'] = $this->input->post('deceased_id_card');
        $data['fallecido_nombre'] = $this->input->post('deceased_first_name');
        $data['fallecido_apellido'] = $this->input->post('deceased_last_name1');
        $data['fallecido_apellido2'] = $this->input->post('deceased_last_name2');
        $data['fallecido_edad'] = $this->input->post('deceased_age');

        $data['acta_defuncion'] = $this->input->post('death_document');
        $data['parentesco'] = $this->input->post('relationship');
        $data['fecha'] = $this->input->post('deseace_date');
        $data['cofre'] = $this->input->post('coffin');
        $data['factura'] = $this->input->post('bill');

        $data['serv_traslado'] = $this->input->post('transfers');
        $data['serv_esquelas'] = $this->input->post('forgetfulness');
        $data['serv_flores'] = $this->input->post('flowers');
        $data['serv_tributos'] = $this->input->post('tributes');
        $data['serv_patologia'] = $this->input->post('pathology');
        $data['serv_patologia_tecnico'] = $this->input->post('technician');
        $data['serv_patologia_costo'] = $this->input->post('pathology_cost');

        $data['serv_cremacion'] = $this->input->post('cremation');
        $data['serv_autopsia'] = $this->input->post('autopsy');
        $data['serv_autopsia_tecnico'] = $this->input->post('autopsy_technician');
        $data['serv_autopsia_costo'] = $this->input->post('autopsy_cost');
        $data['serv_urna'] = $this->input->post('urn');

        $data['tras_morgue'] = $this->input->post('morgue');
        $data['tras_direccion'] = $this->input->post('morgue_address');
        $data['tras_velacion'] = $this->input->post('veiling_site');
        $data['tras_velacion_direccion'] = $this->input->post('veiling_site_address');
        $data['tras_hora'] = $this->input->post('veiling_time');
        $data['tras_hora_det'] = $this->input->post('veiling_time_det');
        $data['tras_bodega_cofre'] = $this->input->post('vault_coffin');
        $data['tras_arreglos'] = $this->input->post('veiling_site_arrangements');
        $data['tras_pedestal'] = $this->input->post('veiling_pedestal');
        $data['tras_candelero'] = $this->input->post('veiling_candlestick');
        $data['tras_alfombra_int'] = $this->input->post('carpet');
        $data['tras_carretilla'] = $this->input->post('pushcart');
        $data['tras_atril'] = $this->input->post('lectern');
        $data['tras_cortinero'] = $this->input->post('curtain');
        $data['tras_carroza'] = $this->input->post('service_float');
        $data['tras_chofer'] = $this->input->post('service_driver');
        $data['tras_observaciones'] = $this->input->post('transfer_observations');

        $data['info_fecha'] = $this->input->post('funeral_date');
        $data['info_hora'] = $this->input->post('funeral_time');
        $data['info_hora_det'] = $this->input->post('funeral_time_det');
        $data['info_iglesia'] = $this->input->post('church');
        $data['info_cementerio'] = $this->input->post('cemetery');
        $data['info_carroza'] = $this->input->post('info_service_float');
        $data['info_chofer'] = $this->input->post('info_service_driver');
        $data['info_decora'] = $this->input->post('info_decoration_float');
        $data['info_decora_chofer'] = $this->input->post('info_decoration_driver');
        $data['info_observaciones'] = $this->input->post('info_service_observations');

        $data['funeral_tipo'] = $this->input->post('forma_pago'); //1 contado - 2 credito
        $data['monto_total'] = $this->input->post('amount');
        $data['saldo_total'] = $this->input->post('saldo');
        $data['prima'] = $this->input->post('advance_payment');
        $data['contrato_1_numero'] = $this->input->post('contrato_1_num');
        $data['contrato_1_valor'] = $this->input->post('contrato_1_val');
        $data['contrato_2_numero'] = $this->input->post('contrato_2_num');
        $data['contrato_2_valor'] = $this->input->post('contrato_2_val');
        $data['contrato_3_numero'] = $this->input->post('contrato_3_num');
        $data['contrato_3_valor'] = $this->input->post('contrato_3_val');
       
        foreach ($data as $key => $value) {
            if($value == 'on'){
               $data[$key] =  1;
            }else if($value== 'off'){
                $data[$key] =  0;
            }
        }

        $this->db->insert('funeral', $data);
        $contractID = $this->db->insert_id();

// $data['contact_id'] =  $this->input->post('contact_id') ;
//         $data['created_by'] = $_SESSION['user_id'];
        if($type == 'funecredito'){
            // $data['contrato_3_valor'] = $this->input->post('contrato_3_val');
             // = $this->input->post('contrato_3_val');
            $saldo_actual = $this->input->post('amountService') - $this->input->post('advance_payment');

            $accID = $this->openFunecreditoAccount( $_SESSION['user_id'],
                                                    $this->input->post('contact_id'), 
                                                    $contractID, 
                                                    $this->input->post('amountService'), 
                                                    $this->input->post('advance_payment'), 
                                                    $saldo_actual, 
                                                    $this->input->post('interes_mensual'),
                                                    $this->input->post('plazo'),
                                                    $this->input->post('plazo'),
                                                    $this->input->post('couta'),
                                                    $this->input->post('couta'),
                                                    $this->now(), 
                                                    $this->getCurrentMonth(),
                                                    $this->input->post('amount'));
            if($accID > 0){
                // newTransaction($userID, $contractID, $tipo_servicio, $monto, $metodo_pago, $descripcion, $detalles, $saldo_anterior, $status = 'A' ){
                $transactionID = $this->newTransaction(
                                                    $_SESSION['user_id'], 
                                                    $accID, 
                                                    'funecredito', 
                                                    $this->input->post('advance_payment'),  
                                                    'Efectivo', 
                                                    'Prima', '', $this->input->post('amountService'));
                if($transactionID>0){
                    $this->applyContractPay(
                                    $accID, 
                                    $this->input->post('advance_payment'), 
                                    $this->getCurrentMonth());
                }
            }

            for($i = 0; $i > $max_contracts; $i++){
                $contractNo = $max_contracts+1;
                $current_contract_id = 'idContract'.$contractNo;
                $current_contract = 'amountContract'.$contractNo;
                if( $this->input->post($current_contract > 0) )
                {
                    $transactionID = $this->newTransaction(
                                                    $_SESSION['user_id'], 
                                                    $accID, 
                                                    'funecredito', 
                                                    $this->input->post($current_contract),  
                                                    'Efectivo', 
                                                    "Pago con Contrato # $current_contract_id", '', 0);
                    if($transactionID>0){
                        $this->applyContractPay(
                                        $accID, 
                                        $this->input->post($current_contract), 
                                        $this->getCurrentMonth());
                    }
                }
            }

        }else{

            /* *********************************************************
             *  
             *  Function for not a funecredito.  
             *
             ********************************************************* */
            $accID = $this->openFuneralAccount( $_SESSION['user_id'], 
                                                $this->input->post('contact_id'), 
                                                $contractID, 
                                                $this->input->post('amount'), 
                                                $this->input->post('amount'), 
                                                0, 
                                                0);
            if($accID > 0){
                
                $transactionID = $this->newTransaction(
                                                    $_SESSION['user_id'], 
                                                    $accID, 
                                                    'funeral', 
                                                    $this->input->post('prima'),  
                                                    $this->input->post('forma_pago'), 
                                                    'Prima', '', 0);
                if($transactionID>0){
                    $this->applyContractPay(
                                    $accID, 
                                    $this->input->post('prima'), 
                                    $this->input->post('mes_cobro'));
                }
            }
        }

        // $accID = $this->openContratosAccount(
        //     $_SESSION['user_id'],  
        //     $this->input->post('contact_id'), 
        //     $contractID, 
        //     $this->input->post('amount'), 
        //     0, 
        //     $this->input->post('mes_cobro'), 
        //     $this->input->post('cuota'), 
        //     $this->input->post('anno_cobro') );
        

        
        
        //Create account
    }

    public function updateFuneral(){
        // $data['service_id'] = $service_id;
        $service_id =  $this->input->post('service_id') ;

        $data['contact_id'] =  $this->input->post('contact_id') ;
        $data['created_by'] = $_SESSION['user_id'];

        $data['fallecido_ced'] = $this->input->post('deceased_id_card');
        $data['fallecido_nombre'] = $this->input->post('deceased_first_name');
        $data['fallecido_apellido'] = $this->input->post('deceased_last_name1');
        $data['fallecido_apellido2'] = $this->input->post('deceased_last_name2');
        $data['fallecido_edad'] = $this->input->post('deceased_age');

        $data['acta_defuncion'] = $this->input->post('death_document');
        $data['parentesco'] = $this->input->post('relationship');
        $data['fecha'] = $this->input->post('deseace_date');
        $data['cofre'] = $this->input->post('coffin');
        $data['factura'] = $this->input->post('bill');

        $data['serv_traslado'] = $this->input->post('transfers');
        $data['serv_esquelas'] = $this->input->post('forgetfulness');
        $data['serv_flores'] = $this->input->post('flowers');
        $data['serv_tributos'] = $this->input->post('tributes');
        $data['serv_patologia'] = $this->input->post('pathology');
        $data['serv_patologia_tecnico'] = $this->input->post('technician');
        $data['serv_patologia_costo'] = $this->input->post('pathology_cost');

        $data['serv_cremacion'] = $this->input->post('cremation');
        $data['serv_autopsia'] = $this->input->post('autopsy');
        $data['serv_autopsia_tecnico'] = $this->input->post('autopsy_technician');
        $data['serv_autopsia_costo'] = $this->input->post('autopsy_cost');
        $data['serv_urna'] = $this->input->post('urn');

        $data['tras_morgue'] = $this->input->post('morgue');
        $data['tras_direccion'] = $this->input->post('morgue_address');
        $data['tras_velacion'] = $this->input->post('veiling_site');
        $data['tras_velacion_direccion'] = $this->input->post('veiling_site_address');
        $data['tras_hora'] = $this->input->post('veiling_time');
        $data['tras_hora_det'] = $this->input->post('veiling_time_det');
        $data['tras_bodega_cofre'] = $this->input->post('vault_coffin');
        $data['tras_arreglos'] = $this->input->post('veiling_site_arrangements');
        $data['tras_pedestal'] = $this->input->post('veiling_pedestal');
        $data['tras_candelero'] = $this->input->post('veiling_candlestick');
        $data['tras_alfombra_int'] = $this->input->post('carpet');
        $data['tras_carretilla'] = $this->input->post('pushcart');
        $data['tras_atril'] = $this->input->post('lectern');
        $data['tras_cortinero'] = $this->input->post('curtain');
        $data['tras_carroza'] = $this->input->post('service_float');
        $data['tras_chofer'] = $this->input->post('service_driver');
        $data['tras_observaciones'] = $this->input->post('transfer_observations');

        $data['info_fecha'] = $this->input->post('funeral_date');
        $data['info_hora'] = $this->input->post('funeral_time');
        $data['info_hora_det'] = $this->input->post('funeral_time_det');
        $data['info_iglesia'] = $this->input->post('church');
        $data['info_cementerio'] = $this->input->post('cemetery');
        $data['info_carroza'] = $this->input->post('info_service_float');
        $data['info_chofer'] = $this->input->post('info_service_driver');
        $data['info_decora'] = $this->input->post('info_decoration_float');
        $data['info_decora_chofer'] = $this->input->post('info_decoration_driver');
        $data['info_observaciones'] = $this->input->post('info_service_observations');

        $data['funeral_tipo'] = $this->input->post('funeral_tipo'); //1 contado - 2 credito
        $data['monto_total'] = $this->input->post('amount');
        $data['saldo_total'] = $this->input->post('saldo');
        $data['prima'] = $this->input->post('prima');
        $data['contrato_1_numero'] = $this->input->post('contrato_1_num');
        $data['contrato_1_valor'] = $this->input->post('contrato_1_val');
        $data['contrato_2_numero'] = $this->input->post('contrato_2_num');
        $data['contrato_2_valor'] = $this->input->post('contrato_2_val');
        $data['contrato_3_numero'] = $this->input->post('contrato_3_num');
        $data['contrato_3_valor'] = $this->input->post('contrato_3_val');
       
        foreach ($data as $key => $value) {
            if($value == 'on'){
               $data[$key] =  1;
            }else if($value== 'off'){
                $data[$key] =  0;
            }
        }

        // echo '<pre>';
        // print_r($data);
        // echo '<pre>';
        // die();
        $this->db->where('id_funeral', $service_id);
        $this->db->update('funeral', $data);
    }

    public function createApartado(){
        $data['contact_id'] =  $this->input->post('contact_id') ;
        $data['created_by'] = $_SESSION['user_id'];

        $data['cremacion'] =  $this->input->post('cremacion') ;
        $data['autopsia'] =  $this->input->post('autopsia') ;
        $data['tecnico'] =  $this->input->post('tecnico') ;
        $data['costo'] =  $this->input->post('costo') ;
        $data['urna'] =  $this->input->post('urna') ;
        $data['preservacion'] =  $this->input->post('preservacion') ;
        $data['monto'] =  $this->input->post('monto') ;
        $data['costo_total'] =  $this->input->post('costo_total') ;
        $data['saldo_anterior'] =  $this->input->post('saldo_anterior') ;
        $data['abono'] =  $this->input->post('abono') ;
        $data['saldo_actual'] =  $this->input->post('saldo_actual') ;


        $data['observaciones'] = $this->input->post('observaciones'); 

        foreach ($data as $key => $value) {
            if($value == 'on'){
               $data[$key] =  1;
            }else if($value== 'off'){
                $data[$key] =  0;
            }
        }

        $this->db->insert('apartados', $data);
        $contractID = $this->db->insert_id();

        $accID = $this->openApartadosAccount( $_SESSION['user_id'],$this->input->post('contact_id'), $contractID, $this->input->post('costo_total'), 0);

        if($accID > 0){
            $transactionID = $this->newTransaction($_SESSION['user_id'], $accID, 'apartado', $this->input->post('abono'), 'efectivo', 'Apertura de cuenta', '',0);
            if($transactionID>0){
                $this->applyApartadosPay($accID, $this->input->post('abono') );
            }
        }
    }

     public function updateContract(){
        $service_id = $this->input->post('service_id');
        // $data['service_id'] = $service_id;
        $data['contact_id'] =  $this->input->post('contact_id') ;
        $data['created_by'] = $_SESSION['user_id'];
       
        // $data['tiempo_contrato'] = $this->input->post('tiempo_contrato');
        $data['fecha_inclusion'] = $this->input->post('fecha_inclusion');
        $data['ruta'] = $this->input->post('ruta');
        $data['vendedor'] = $this->input->post('vendedor');
        $data['forma_pago'] = $this->input->post('forma_pago');
        $data['no_contrato'] = $this->input->post('contract_id');

        $data['monto_total'] = $this->input->post('amount');
        $data['prima'] = $this->input->post('prima');
        $data['monto_cuota'] = $this->input->post('cuota');
        $data['loc_1'] = $this->input->post('local_1');
        $data['loc_2'] = $this->input->post('local_2');
        $data['loc_3'] = $this->input->post('local_3');
        $data['no_recibo'] = $this->input->post('no_recibo');
        $data['funeraria_id'] = $this->input->post('funeraria'); 
         
        $data['mes_cobro'] = $this->input->post('mes_cobro');
        $data['saldo_anterior'] = $this->input->post('saldo_anterior');
        $data['saldo_actual'] = $this->input->post('saldo_actual'); 

        $data['observaciones'] = $this->input->post('observaciones');
        $data['anno_cobro'] = $this->input->post('anno_cobro'); 

        
       
        $this->db->where('id', $service_id);
        $this->db->update('contratos', $data);
    }
    
    public function updateApartado(){
        $service_id = $this->input->post('service_id');
        // $data['service_id'] = $service_id;
        $data['contact_id'] =  $this->input->post('contact_id') ;
        $data['created_by'] = $_SESSION['user_id'];

        $data['cremacion'] =  $this->input->post('cremacion') ;
        $data['autopsia'] =  $this->input->post('autopsia') ;
        $data['tecnico'] =  $this->input->post('tecnico') ;
        $data['costo'] =  $this->input->post('costo') ;
        $data['urna'] =  $this->input->post('urna') ;
        $data['preservacion'] =  $this->input->post('preservacion') ;
        $data['monto'] =  $this->input->post('monto') ;
        $data['costo_total'] =  $this->input->post('costo_total') ;
        $data['saldo_anterior'] =  $this->input->post('saldo_anterior') ;
        $data['abono'] =  $this->input->post('abono') ;
        $data['saldo_actual'] =  $this->input->post('saldo_actual') ;


        $data['observaciones'] = $this->input->post('observaciones'); 

        foreach ($data as $key => $value) {
            if($value == 'on'){
               $data[$key] =  1;
            }else if($value== 'off'){
                $data[$key] =  0;
            }
        }

        $this->db->where('id', $service_id);
        $this->db->update('apartados', $data);

    }

    public function create_servicio() {
        $data['type'] = $this->input->post('type');
        $data['death_date'] = $this->input->post('death_date');
        $data['death_document'] = $this->input->post('death_document');
        $data['deceased_first_name'] = $this->input->post('deceased_first_name');
        $data['deceased_last_name1'] = $this->input->post('deceased_last_name1');
        $data['deceased_last_name2'] = $this->input->post('deceased_last_name2');
        $data['deceased_id_card'] = $this->input->post('deceased_id_card');
        $data['deceased_age'] = $this->input->post('deceased_age');
        $data['contact_id'] = $this->input->post('client_id') ? $this->input->post('client_id') : NULL;
        $data['relationship'] = $this->input->post('relationship');
        $data['payment_method'] = $this->input->post('payment_method');
        $data['amount'] = $this->input->post('amount');
        $data['balance'] = $this->input->post('balance');
        $data['coffin'] = $this->input->post('coffin');
        $data['bill'] = $this->input->post('bill');
        $data['veiling_room'] = $this->input->post('veiling_room');
        $data['veiling_site'] = $this->input->post('veiling_site');
        $data['transfers'] = $this->input->post('transfers');
        $data['forgetfulness'] = $this->input->post('forgetfulness');
        $data['pathology'] = $this->input->post('pathology');
        $data['pathology_technician'] = $this->input->post('pathology_technician');
        $data['flowers'] = $this->input->post('flowers');
        $data['cremation'] = $this->input->post('cremation');
        $data['morgue'] = $this->input->post('morgue');
        $data['transfer_address'] = $this->input->post('transfer_address');
        $data['driver'] = $this->input->post('driver');
        $data['float'] = $this->input->post('float');
        $data['transfer_time'] = $this->input->post('transfer_time');
        $data['vault_coffin'] = $this->input->post('vault_coffin');
        $data['candlestick'] = $this->input->post('candlestick');
        $data['pushcart'] = $this->input->post('pushcart');
        $data['curtain'] = $this->input->post('curtain');
        $data['transfer_observations'] = $this->input->post('transfer_observations');
        $data['arrangements'] = $this->input->post('arrangements');
        $data['pedestal'] = $this->input->post('pedestal');
        $data['lectern'] = $this->input->post('lectern');
        $data['carpet'] = $this->input->post('carpet');
        $data['service_date'] = $this->input->post('service_date');
        $data['service_hour'] = $this->input->post('service_hour');
        $data['church'] = $this->input->post('church');
        $data['cemetery'] = $this->input->post('cemetery');
        $data['service_float'] = $this->input->post('service_float');
        $data['service_driver'] = $this->input->post('service_driver');
        $data['decoration_float'] = $this->input->post('decoration_float');
        $data['decoration_driver'] = $this->input->post('decoration_driver');
        $data['service_observations'] = $this->input->post('service_observations');
        $data['contract_id'] = $this->input->post('contract_id');
        $data['user_id'] = $this->input->post('user_id');
        $data['client_first_name'] = $this->input->post('client_first_name');
        $data['client_last_name1'] = $this->input->post('client_last_name1');
        $data['client_last_name2'] = $this->input->post('client_last_name2');
        $data['client_id_card'] = $this->input->post('client_id_card');
        $data['client_email'] = $this->input->post('client_email');
        $data['client_phone'] = $this->input->post('client_phone');
        $data['client_phone2'] = $this->input->post('client_phone2');
        $data['client_phone3'] = $this->input->post('client_phone3');
        $data['tributes'] = $this->input->post('tributes');
        $data['pathology_cost'] = $this->input->post('pathology_cost');
        $data['autopsy'] = $this->input->post('autopsy');
        $data['autopsy_technician'] = $this->input->post('autopsy_technician'); 
        $data['autopsy_cost'] = $this->input->post('autopsy_cost');
        $data['morgue_address'] = $this->input->post('morgue_address'); 
        $data['veiling_site_address'] = $this->input->post('veiling_site_address');
        $data['funeral_date'] = $this->input->post('funeral_date');
        $data['funeral_time'] = $this->input->post('funeral_time'); 
        $data['urn'] = $this->input->post('urn');
        $data['abono'] = $this->input->post('abono');
        $data['contrato_account_id1'] = $this->input->post('contrato_account_id1');
        $data['contrato_account_id2'] = $this->input->post('contrato_account_id2');
        $data['contrato_account_id3'] = $this->input->post('contrato_account_id3');

        $this->db->insert('service', $data);
        $id = $this->db->insert_id();

        if( $data['type'] == 'contrato' ){
            $this->servicio_model->create_contract($id);
        }
        else if( $data['type'] == 'funecredito' ){
            $this->servicio_model->create_funecredito($id);
        }
        else if($data['type'] == 'apartado' ){
            $this->servicio_model->create_apartado($id);
        }
    }

    public function create_apartado($service_id){
        $data['service_id'] = $service_id;
        $data['contact_id'] =  $this->input->post('client_id');
        $data['monto_total'] = $this->input->post('balance');
        $data['fecha_creacion'] = date('Y-m-d');

        $this->db->insert('apartados_account', $data);
    }

    public function create_funecredito($service_id){
        $data['service_id'] = $service_id;
        $data['contact_id'] =  $this->input->post('client_id');
        $data['monto_total'] = $this->input->post('saldoFunecredito');
        $data['prima'] = $this->input->post('primaFunecredito');
        $data['monto_cuota'] = $this->input->post('cuotaFunecredito');
        $data['interes'] = $this->input->post('interesFunecredito');
        $data['fecha_creacion'] = date('Y-m-d');
        $data['cuotas_pendientes'] = $this->input->post('plazoFunecredito');
        $data['tiempo_servicio'] = $this->input->post('plazoFunecredito');
        $data['saldo'] = $data['monto_total'];

        $this->db->insert('funecredito_account', $data);
    }

    public function create_contract($service_id){
        $data['service_id'] = $service_id;
        $data['contact_id'] =  $this->input->post('client_id') ;
        
       
        // $data['tiempo_contrato'] = $this->input->post('tiempo_contrato');
        $data['fecha_inclusion'] = $this->input->post('fecha_inclusion');
        $data['ruta'] = $this->input->post('ruta');
        $data['vendedor'] = $this->input->post('monto_cuota');
        $data['forma_pago'] = $this->input->post('forma_pago');
        $data['contract_number'] = $this->input->post('contract_id');

        $data['monto_total'] = $this->input->post('amount');
        $data['prima'] = $this->input->post('prima');
        $data['monto_cuota'] = $this->input->post('cuota');
        $data['loc_1'] = $this->input->post('local_1');
        $data['loc_2'] = $this->input->post('local_2');
        $data['loc_3'] = $this->input->post('local_3');
        $data['no_recibo'] = $this->input->post('no_recibo');
         
        $data['mes_cobro'] = $this->input->post('mes_cobro');
        $data['saldo_anterior'] = $this->input->post('saldo_anterior');
        $data['saldo_actual'] = $this->input->post('saldo_actual'); 
         

        // $data['fecha_creacion'] = date('Y-m-d');
        
        // $data['cuotas_pendientes'] = $this->input->post('tiempo_contrato');
        // $data['saldo'] = $data['monto_total'];

        $this->db->insert('contratos_account', $data);
    }

    public function update_servicio($service_id) {
        $data['type'] = $this->input->post('type');
        $data['death_date'] = $this->input->post('death_date');
        $data['death_document'] = $this->input->post('death_document');
        $data['deceased_first_name'] = $this->input->post('deceased_first_name');
        $data['deceased_last_name1'] = $this->input->post('deceased_last_name1');
        $data['deceased_last_name2'] = $this->input->post('deceased_last_name2');
        $data['deceased_id_card'] = $this->input->post('deceased_id_card');
        $data['deceased_age'] = $this->input->post('deceased_age');
        $data['contact_id'] = $this->input->post('client_id') ? $this->input->post('client_id') : NULL;
        $data['relationship'] = $this->input->post('relationship');
        $data['payment_method'] = $this->input->post('payment_method');
        $data['contract_id'] = $this->input->post('contract_id');
        $data['amount'] = $this->input->post('amount');
        $data['balance'] = $this->input->post('balance');
        $data['coffin'] = $this->input->post('coffin');
        $data['bill'] = $this->input->post('bill');
        $data['veiling_room'] = $this->input->post('veiling_room');
        $data['veiling_site'] = $this->input->post('veiling_site');
        $data['transfers'] = $this->input->post('transfers');
        $data['forgetfulness'] = $this->input->post('forgetfulness');
        $data['pathology'] = $this->input->post('pathology');
        $data['pathology_technician'] = $this->input->post('pathology_technician');
        $data['flowers'] = $this->input->post('flowers');
        $data['cremation'] = $this->input->post('cremation');
        $data['morgue'] = $this->input->post('morgue');
        $data['transfer_address'] = $this->input->post('transfer_address');
        $data['driver'] = $this->input->post('driver');
        $data['float'] = $this->input->post('float');
        $data['transfer_time'] = $this->input->post('transfer_time');
        $data['vault_coffin'] = $this->input->post('vault_coffin');
        $data['candlestick'] = $this->input->post('candlestick');
        $data['pushcart'] = $this->input->post('pushcart');
        $data['curtain'] = $this->input->post('curtain');
        $data['transfer_observations'] = $this->input->post('transfer_observations');
        $data['arrangements'] = $this->input->post('arrangements');
        $data['pedestal'] = $this->input->post('pedestal');
        $data['lectern'] = $this->input->post('lectern');
        $data['carpet'] = $this->input->post('carpet');
        $data['service_date'] = $this->input->post('service_date');
        $data['service_hour'] = $this->input->post('service_hour');
        $data['church'] = $this->input->post('church');
        $data['cemetery'] = $this->input->post('cemetery');
        $data['service_float'] = $this->input->post('service_float');
        $data['service_driver'] = $this->input->post('service_driver');
        $data['decoration_float'] = $this->input->post('decoration_float');
        $data['decoration_driver'] = $this->input->post('decoration_driver');
        $data['service_observations'] = $this->input->post('service_observations');
        $data['user_id'] = $this->input->post('user_id');
        $data['client_first_name'] = $this->input->post('client_first_name');
        $data['client_last_name1'] = $this->input->post('client_last_name1');
        $data['client_last_name2'] = $this->input->post('client_last_name2');
        $data['client_id_card'] = $this->input->post('client_id_card');
        $data['client_email'] = $this->input->post('client_email');
        $data['client_phone'] = $this->input->post('client_phone');
        $data['client_phone2'] = $this->input->post('client_phone2');
        $data['client_phone3'] = $this->input->post('client_phone3');
        $data['abono'] = $this->input->post('abono');
        $data['tributes'] = $this->input->post('tributes');
        $data['pathology_cost'] = $this->input->post('pathology_cost');
        $data['autopsy'] = $this->input->post('autopsy');
        $data['autopsy_technician'] = $this->input->post('autopsy_technician');
        $data['autopsy_cost'] = $this->input->post('autopsy_cost');
        $data['morgue_address'] = $this->input->post('morgue_address');
        $data['veiling_site_address'] = $this->input->post('veiling_site_address');
        $data['funeral_date'] = $this->input->post('funeral_date');
        $data['funeral_time'] = $this->input->post('funeral_time');
        $data['urn'] = $this->input->post('urn');
        $data['contrato_account_id1'] = $this->input->post('contrato_account_id1');
        $data['contrato_account_id2'] = $this->input->post('contrato_account_id2');
        $data['contrato_account_id3'] = $this->input->post('contrato_account_id3');

        $this->db->where('service_id', $service_id);
        $this->db->update('service', $data);

        if( $data['type'] == 'contrato' ){
            $this->servicio_model->update_contract($service_id);
        }
        else if($data['type'] == 'funecredito' ){
            $this->servicio_model->update_funecredito($service_id);
        }
        else if($data['type'] == 'apartado' ){
            $this->servicio_model->update_apartado($service_id);
        }
    }

    public function update_apartado($service_id){
        $data['service_id'] = $service_id;
        $data['contact_id'] =  $this->input->post('client_id');
        $data['monto_total'] = $this->input->post('balance');
        $data['fecha_creacion'] = date('Y-m-d');

        $this->db->where('service_id', $service_id);
        $this->db->update('apartados_account', $data);
    }

    public function update_funecredito($service_id){
        $data['contact_id'] =  $this->input->post('client_id');
        $data['monto_total'] = $this->input->post('saldoFunecredito');
        $data['prima'] = $this->input->post('primaFunecredito');
        $data['monto_cuota'] = $this->input->post('cuotaFunecredito');
        $data['interes'] = $this->input->post('interesFunecredito');
        $data['tiempo_servicio'] = $this->input->post('plazoFunecredito');

        $this->db->where('service_id', $service_id);
        $this->db->update('funecredito_account', $data);
    }

    public function update_contract($service_id){
        $data['contact_id'] =  $this->input->post('client_id') ;
        $data['monto_total'] = $this->input->post('amount');
        $data['tiempo_contrato'] = $this->input->post('tiempo_contrato');
        $data['monto_cuota'] = $this->input->post('monto_cuota');
        $data['contract_number'] = $this->input->post('contract_id');

        $this->db->where('service_id', $service_id);
        $this->db->update('contratos_account', $data);
    }

    public function delete_servicio_contrato($service_id) {
        $this->db->where('id', $service_id);
        $this->db->delete('contratos');
    }   

    public function delete_servicio_apartado($service_id) {
        $this->db->where('id', $service_id);
        $this->db->delete('apartados');
    }   
}